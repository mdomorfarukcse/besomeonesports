<?php

namespace App\Http\Controllers\Administration\League;

use Exception;
use App\Models\User;
use App\Models\Round\Round;
use App\Models\Sport\Sport;
use App\Models\Venue\Venue;
use Illuminate\Http\Request;
use App\Models\League\League;
use App\Models\Player\Player;
use App\Models\Season\Season;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Division\Division;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use net\authorize\api\contract\v1\OrderType;
use net\authorize\api\contract\v1\PaymentType;
use net\authorize\api\constants\ANetEnvironment;
use net\authorize\api\contract\v1\CreditCardType;
use net\authorize\api\contract\v1\CustomerDataType;
use net\authorize\api\contract\v1\NameAndAddressType;
use net\authorize\api\contract\v1\TransactionRequestType;
use net\authorize\api\contract\v1\CreateTransactionRequest;
use net\authorize\api\contract\v1\MerchantAuthenticationType;
use net\authorize\api\controller\CreateTransactionController;
use App\Http\Requests\Administration\League\LeagueStoreRequest;
use App\Http\Requests\Administration\League\LeagueUpdateRequest;
use App\Mail\Administration\League\LeaguePlayerRegistrationMail;
use App\Rules\Administration\League\LeagueRegistration\UniqueLeaguePlayerRule;

class LeagueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sports = Sport::select(['id', 'name'])->whereStatus('Active')->get();
        $divisions = Division::select(['id', 'name', 'gender'])->whereStatus('Active')->get();

        $query = League::select(['id', 'season_id', 'sport_id', 'logo', 'name', 'registration_fee', 'start', 'end', 'status'])
                        ->with([
                            'season' => function($season) {
                                $season->select(['id', 'name']);
                            },
                            'sport' => function($sport) {
                                $sport->select(['id', 'name']);
                            },
                            'divisions',
                            'venues'
                        ])
                        ->orderBy('created_at', 'desc');

        if ($request->filled('sport_id')) {
            $query->where('sport_id', $request->sport_id);
        }
        if ($request->filled('division')) {
            $query->whereHas('divisions', function($q) use ($request) {
                $q->where('id', $request->division);
            });
        }
        if ($request->filled('league')) {
            $query->where('id', 'like', '%' . $request->league . '%');
        }
        if ($request->filled('status')) {
            $query->whereStatus($request->status);
        }else{
            $query->whereStatus('Active');
        }
        $leagues = $query->get();

        return view('administration.league.index', compact(['sports', 'divisions', 'leagues', 'request']));
    }

    
    /**
     * Display a listing of the resource.
     */
    public function myLeagues()
    {
        $authUser = Auth::user();
        if ($authUser->hasRole('coach')) {
            // Get the coach
            $coach = $authUser->coach;
            
            // Get the leagues associated with teams where the coach is the coach
            $leagues = League::whereHas('teams', function ($team) use ($coach) {
                $team->where('coach_id', $coach->id);
            })->get();
            
        } elseif ($authUser->hasRole('player')) {
            $player = Player::with('leagues')->whereId($authUser->player->id)->firstOrFail();

            $leagues = $player->leagues;
        } elseif ($authUser->hasRole('guardian')) {
            $guardianPlayers = $authUser->players()->count();
            if ($guardianPlayers > 0) { 
                $player = Player::with('leagues')->whereGuardianId($authUser->id)->firstOrFail();

                $leagues = $player->leagues;
            } else {
                $leagues = [];
            }
        } elseif ($authUser->hasRole('referee')) {
            $referee = User::role('referee')->whereId($authUser->id)->firstOrFail();

            $leagues = $referee->leagues;
        } else {
            $leagues = [];
        }
        return view('administration.league.my', compact(['leagues']));
    }
    
    /**
     * Display a listing of the resource.
     */
    public function apiMyLeagues()
    {
        $authUser = Auth::user();
        if ($authUser->hasRole('coach')) {
            // Get the coach
            $coach = $authUser->coach;
            
            // Get the leagues associated with teams where the coach is the coach
            $leagues = League::whereHas('teams', function ($team) use ($coach) {
                $team->where('coach_id', $coach->id);
            })->get();
            
        } elseif ($authUser->hasRole('player')) {
            $player = Player::with('leagues')->whereId($authUser->player->id)->firstOrFail();

            $leagues = $player->leagues;
        } elseif ($authUser->hasRole('guardian')) {
            $guardianPlayers = $authUser->players()->count();
            if ($guardianPlayers > 0) { 
                $player = Player::with('leagues')->whereGuardianId($authUser->id)->firstOrFail();

                $leagues = $player->leagues;
            } else {
                $leagues = [];
            }
        } elseif ($authUser->hasRole('referee')) {
            $referee = User::role('referee')->whereId($authUser->id)->firstOrFail();

            $leagues = $referee->leagues;
        } else {
            $leagues = [];
        }
        return response()->json(['leagues' => $leagues]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $seasons = Season::select(['id', 'name', 'year', 'status'])->whereStatus('Active')->get();
        $sports = Sport::select(['id', 'name', 'status'])->whereStatus('Active')->get();
        $divisions = Division::select(['id', 'name', 'gender', 'status'])->whereStatus('Active')->get();
        $venues = Venue::select(['id', 'name', 'status'])->whereStatus('Active')->get();
        $referees = User::role('referee')->get();

        return view('administration.league.create', compact(['seasons', 'sports', 'divisions', 'venues', 'referees']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LeagueStoreRequest $request)
    {
        // dd($request->all());
        try{
            DB::transaction(function() use ($request) {
                $league = new League();

                $league->season_id = $request->season_id;
                $league->sport_id = $request->sport_id;
                $league->name = $request->name;
                $league->registration_fee = $request->registration_fee;
                $league->start = $request->start;
                $league->end = $request->end;
                $league->description = $request->description;
                $league->status = $request->status;
                if (isset($request->logo)) {
                    $logo = upload_image($request->logo);
                    $league->logo = $logo;
                }
                $league->save();

                $league->divisions()->attach($request->divisions);
                $league->venues()->attach($request->venues);

                // $league->referees()->attach($request->referees);

                foreach ($request->rounds as $roundName) {
                    $round = new Round(['name' => $roundName]);
                    $league->rounds()->save($round);
                }
            }, 5);

            toast('A New League Has Been Created.', 'success');
            return redirect()->route('administration.league.index');
        } catch (Exception $e){
            //dd($e);
            alert('League Creation Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(League $league)
    {
        $league = League::whereId($league->id)->with([
                            'season' => function($season) {
                                $season->select(['id', 'name']);
                            },
                            'sport' => function($sport) {
                                $sport->select(['id', 'name']);
                            },
                            'divisions',
                            'venues',
                            'referees',
                            'teams',
                        ])
                        ->firstOrFail();
        return  view('administration.league.show', compact(['league']));
    }

    /**
     * Display the specified resource.
     */
    public function apiShow(League $league)
    {
        $league = League::whereId($league->id)->with([
                            'season' => function($season) {
                                $season->select(['id', 'name']);
                            },
                            'sport' => function($sport) {
                                $sport->select(['id', 'name']);
                            },
                            'divisions',
                            'venues',
                            'referees',
                            'teams',
                        ])
                        ->firstOrFail();
    return response()->json(['league' => $league]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(League $league)
    {
        $seasons = Season::select(['id', 'name', 'year', 'status'])->whereStatus('Active')->get();
        $sports = Sport::select(['id', 'name', 'status'])->whereStatus('Active')->get();
        $divisions = Division::select(['id', 'name', 'gender', 'status'])->whereStatus('Active')->get();
        $venues = Venue::select(['id', 'name', 'status'])->whereStatus('Active')->get();
        $referees = User::role('referee')->get();

        $league = League::whereId($league->id)->with([
                            'season' => function($season) {
                                $season->select(['id', 'name']);
                            },
                            'sport' => function($sport) {
                                $sport->select(['id', 'name']);
                            },
                            'divisions',
                            'venues',
                            'referees'
                        ])
                        ->firstOrFail();
        return  view('administration.league.edit', compact(['league', 'seasons', 'sports', 'divisions', 'venues', 'referees']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LeagueUpdateRequest $request, League $league)
    {
        // dd($request->all());
        try{
            DB::transaction(function() use ($request, $league) {

                if (isset($request->logo)) {
                    $logo = upload_image($request->logo);
                }
                $league->season_id = $request->season_id;
                $league->sport_id = $request->sport_id;
                if (isset($request->logo)) {
                    $league->logo = $logo;
                }
                $league->name = $request->name;
                $league->registration_fee = $request->registration_fee;
                $league->start = $request->start;
                $league->end = $request->end;
                $league->description = $request->description;
                $league->status = $request->status;
                $league->save();

                // Sync the divisions and venues in the pivot tables
                $league->divisions()->sync($request->divisions);
                $league->venues()->sync($request->venues);

                // $league->referees()->sync($request->referees);

                // Get the current rounds associated with the league
                $currentRounds = $league->rounds->pluck('name')->toArray();

                // Update or create rounds
                foreach ($request->rounds as $roundName) {
                    $round = $league->rounds()->firstOrNew(['name' => $roundName]);
                    $round->save();
                }

                // Delete rounds that are no longer in the updated list
                $roundsToDelete = array_diff($currentRounds, $request->rounds);

                foreach ($roundsToDelete as $roundName) {
                    $round = $league->rounds()->where('name', $roundName)->first();
                    if ($round) {
                        $round->delete();
                    }
                }
            }, 5);

            toast('League Has Been Updated.', 'success');
            return redirect()->route('administration.league.show', ['league' => $league]);

        } catch (Exception $e){
            //dd($e);
            alert('DIvision Update Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(League $league) {
        try {
            $league->delete();

            toast('League Has Been Deleted.','success');
            return redirect()->route('administration.league.index');
        } catch (Exception $e) {
            //dd($e);
            alert('League Deletation Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }



    /**
     * League Registration Form
     */
    public function registration(League $league) {
        if (Auth::user()->hasRole('guardian')) {
            $players = Player::select(['id', 'user_id', 'guardian_id'])
                                ->with(['user'])
                                ->whereGuardianId(Auth::user()->id)
                                ->whereStatus('Active')
                                ->get();
        } else {
            $players = Player::select(['id', 'user_id'])->with(['user'])->whereStatus('Active')->get();
        }
        // dd($players);
        return view('administration.league.registration.create', compact(['league', 'players']));
    }


    /**
     * League Registration Store
     */
    public function register_player(Request $request, League $league) {
        // dd($request->all(), $league);
        $request->validate([
            'league_id' => 'required|exists:leagues,id',
            'player_id' => ['required', 'exists:players,id', new UniqueLeaguePlayerRule],
        ], [
            'league_id.required' => 'The league field is required.',
            'league_id.exists' => 'The selected league is invalid.',
            'player_id.required' => 'You didn\'t select any player.',
            'player_id.exists' => 'The selected player is not registered yet.',
        ]);
        
        try{
            $cardNumber = $request->card_number;
            $expirationDate = $request->card_expiry;
            $cvv = $request->card_cvc;

            $player = Player::with('user')->whereId($request->player_id)->firstOrFail();

            $invoice_number = 'EPRI'.unique_id(11,11);

            // Remove any non-numeric characters from the card number
            $cleanedCardNumber = preg_replace('/\D/', '', $cardNumber);

            $merchantAuthentication = new MerchantAuthenticationType();
            $merchantAuthentication->setName(env('AUTHORIZENET_API_LOGIN_ID'));
            $merchantAuthentication->setTransactionKey(env('AUTHORIZENET_TRANSACTION_KEY'));

            $creditCard = new CreditCardType();
            $creditCard->setCardNumber($cleanedCardNumber); // Use the cleaned card number
            $creditCard->setExpirationDate($expirationDate);
            $creditCard->setCardCode($cvv);

            $payment = new PaymentType();
            $payment->setCreditCard($creditCard);

            $transactionRequestType = new TransactionRequestType();
            $transactionRequestType->setTransactionType("authCaptureTransaction");
            $transactionRequestType->setAmount($league->registration_fee);
            $transactionRequestType->setPayment($payment);

            // Set order information
            $description = 'League ('.$league->name.') Registration By Player ('.$player->user->name.')';
            $order = new OrderType();
            $order->setInvoiceNumber($invoice_number);
            $order->setDescription($description);
            $transactionRequestType->setOrder($order);

            // Set customer information
            $customerData = new CustomerDataType();
            $customerData->setId($player->player_id);
            $transactionRequestType->setCustomer($customerData);

            // Set shipping information
            $shippingInfo = new NameAndAddressType();
            $shippingInfo->setFirstName($player->first_name);
            $shippingInfo->setLastName($player->last_name);
            $shippingInfo->setAddress($player->street_address);
            $shippingInfo->setCity($player->city);
            $shippingInfo->setState($player->state);
            $shippingInfo->setZip($player->postal_code);
            $transactionRequestType->setShipTo($shippingInfo);

            $tr_request = new CreateTransactionRequest();
            $tr_request->setMerchantAuthentication($merchantAuthentication);
            $tr_request->setRefId("ref" . time());
            $tr_request->setTransactionRequest($transactionRequestType);

            $controller = new CreateTransactionController($tr_request);
            $response = $controller->executeWithApiResponse(ANetEnvironment::SANDBOX);

            if ($response != null) {
                $trasactionReport = $response->getTransactionResponse();

                if ($trasactionReport != null && $trasactionReport->getResponseCode() == "1") {
                    // dd($response, $trasactionReport, $trasactionReport->getTransId());

                    DB::transaction(function () use ($request, $league, $trasactionReport, $invoice_number) {
                        $paidBy = decrypt($request->paid_by);

                        // Attach the player to the league
                        $league->players()->attach($request->player_id, [
                            'paid_by' => $paidBy,
                            'total_paid' => $league->registration_fee,
                            'transaction_id' => $trasactionReport->getTransId(),
                            'invoice_number' => $invoice_number,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                    }, 5);

                    // Send Mail to the creator's email
                    Mail::to($player->user->email)->send(new LeaguePlayerRegistrationMail($league, $player, $invoice_number));

                    toast('Registration completed for the league.', 'success');
                    Session::flash('league_register', 'Registration completed for the league.'); 
                    return redirect()->route('administration.league.registration', ['league' => $league]);
                    // return redirect()->route('administration.league.show', ['league' => $league]);
                } else {
                    // dd($response, $trasactionReport);
                    alert('Payment Failed!', $response->getMessages()->getMessage()[0]->getText(), 'error');
                    return redirect()->back()->withInput();
                }
            } else {
                return "Payment failed: " . $response->getMessages()->getMessage()[0]->getText();
            }
        } catch (Exception $e){
            dd($e);
            alert('Registration Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }


    /**
     * League Registration Store
     */
    public function apiRegisterPlayer(Request $request, League $league) {
        // dd($request->all(), $league);
        $request->validate([
            'league_id' => 'required|exists:leagues,id',
            'player_id' => ['required', 'exists:players,id', new UniqueLeaguePlayerRule],
        ], [
            'league_id.required' => 'The league field is required.',
            'league_id.exists' => 'The selected league is invalid.',
            'player_id.required' => 'You didn\'t select any player.',
            'player_id.exists' => 'The selected player is not registered yet.',
        ]);
        
        try{
            $cardNumber = $request->card_number;
            $expirationDate = $request->card_expiry;
            $cvv = $request->card_cvc;

            $player = Player::with('user')->whereId($request->player_id)->firstOrFail();

            $invoice_number = 'EPRI'.unique_id(11,11);

            // Remove any non-numeric characters from the card number
            $cleanedCardNumber = preg_replace('/\D/', '', $cardNumber);

            $merchantAuthentication = new MerchantAuthenticationType();
            $merchantAuthentication->setName(env('AUTHORIZENET_API_LOGIN_ID'));
            $merchantAuthentication->setTransactionKey(env('AUTHORIZENET_TRANSACTION_KEY'));

            $creditCard = new CreditCardType();
            $creditCard->setCardNumber($cleanedCardNumber); // Use the cleaned card number
            $creditCard->setExpirationDate($expirationDate);
            $creditCard->setCardCode($cvv);

            $payment = new PaymentType();
            $payment->setCreditCard($creditCard);

            $transactionRequestType = new TransactionRequestType();
            $transactionRequestType->setTransactionType("authCaptureTransaction");
            $transactionRequestType->setAmount($league->registration_fee);
            $transactionRequestType->setPayment($payment);

            // Set order information
            $description = 'League ('.$league->name.') Registration By Player ('.$player->user->name.')';
            $order = new OrderType();
            $order->setInvoiceNumber($invoice_number);
            $order->setDescription($description);
            $transactionRequestType->setOrder($order);

            // Set customer information
            $customerData = new CustomerDataType();
            $customerData->setId($player->player_id);
            $transactionRequestType->setCustomer($customerData);

            // Set shipping information
            $shippingInfo = new NameAndAddressType();
            $shippingInfo->setFirstName($player->first_name);
            $shippingInfo->setLastName($player->last_name);
            $shippingInfo->setAddress($player->street_address);
            $shippingInfo->setCity($player->city);
            $shippingInfo->setState($player->state);
            $shippingInfo->setZip($player->postal_code);
            $transactionRequestType->setShipTo($shippingInfo);

            $tr_request = new CreateTransactionRequest();
            $tr_request->setMerchantAuthentication($merchantAuthentication);
            $tr_request->setRefId("ref" . time());
            $tr_request->setTransactionRequest($transactionRequestType);

            $controller = new CreateTransactionController($tr_request);
            $response = $controller->executeWithApiResponse(ANetEnvironment::SANDBOX);

            if ($response != null) {
                $trasactionReport = $response->getTransactionResponse();

                if ($trasactionReport != null && $trasactionReport->getResponseCode() == "1") {
                    // dd($response, $trasactionReport, $trasactionReport->getTransId());

                    DB::transaction(function () use ($request, $league, $trasactionReport, $invoice_number) {
                        $paidBy = decrypt($request->paid_by);

                        // Attach the player to the league
                        $league->players()->attach($request->player_id, [
                            'paid_by' => $paidBy,
                            'total_paid' => $league->registration_fee,
                            'transaction_id' => $trasactionReport->getTransId(),
                            'invoice_number' => $invoice_number,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                    }, 5);

                    return response()->json(['league' => $league]);
                } else {
                    return response()->json(['error' => $response->getMessages()->getMessage()[0]->getText()]);
                }
            } else {
                return response()->json(['error' => 'Payment Failed! '.$response->getMessages()->getMessage()[0]->getText()]);
            }
        } catch (Exception $e){
            return response()->json(['error' => 'Registration Failed! There is some error! Please fix and try again. The Error is: '.$e->getMessage()]);
        }
    }


    /**
     * Download Invoice
     */
    public function downloadInvoice($invoice_number) {
        $payment = DB::table('league_player')->whereInvoiceNumber($invoice_number)->first();
        if (!$payment) {
            throw new Exception('Invoice not found');
        }

        $league = League::whereId($payment->league_id)->first();
        $player = Player::with('user')->whereId($payment->player_id)->first();

        // dd($payment, $league, $player);

        $invoice = Pdf::loadView('administration.league.invoice.invoice', [
            'payment' => $payment,
            'league' => $league,
            'player' => $player
        ]);

        return $invoice->download();
    }
}
