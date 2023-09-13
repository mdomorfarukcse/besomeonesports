<?php

namespace App\Http\Controllers\Administration\Event;

use Exception;
use App\Models\Event\Event;
use App\Models\Sport\Sport;
use App\Models\Venue\Venue;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Player\Player;
use App\Models\Season\Season;
use App\Models\Division\Division;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use net\authorize\api\contract\v1\OrderType;
use net\authorize\api\contract\v1\PaymentType;
use net\authorize\api\constants\ANetEnvironment;
use net\authorize\api\contract\v1\CreditCardType;
use net\authorize\api\contract\v1\CustomerDataType;
use net\authorize\api\contract\v1\NameAndAddressType;
use net\authorize\api\contract\v1\TransactionRequestType;
use net\authorize\api\contract\v1\CreateTransactionRequest;
use App\Http\Requests\Administration\Event\EventStoreRequest;
use net\authorize\api\contract\v1\MerchantAuthenticationType;
use net\authorize\api\controller\CreateTransactionController;
use App\Http\Requests\Administration\Event\EventUpdateRequest;
use App\Rules\Administration\Event\EventRegistration\UniqueEventPlayerRule;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::select(['id', 'season_id', 'sport_id', 'logo', 'name', 'registration_fee', 'status'])
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
                        ->orderBy('created_at', 'desc')
                        ->get();
        // dd($events);
        return view('administration.event.index', compact(['events']));
    }
    
    /**
     * Display a listing of the resource.
     */
    public function myEvents()
    {
        if (Auth::user()->hasRole('coach')) {
            // Get the coach
            $coach = Auth::user()->coach;
            
            // Get the events associated with teams where the coach is the coach
            $events = Event::whereHas('teams', function ($team) use ($coach) {
                $team->where('coach_id', $coach->id);
            })->get();
            
        } elseif (Auth::user()->hasRole('player')) {
            $player = Player::with('events')->whereId(Auth::user()->player->id)->firstOrFail();

            $events = $player->events;
        } else {
            $events = NULL;
        }
        // dd($events);
        return view('administration.event.my', compact(['events']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $seasons = Season::select(['id', 'name', 'year', 'status'])->whereStatus('Active')->get();
        $sports = Sport::select(['id', 'name', 'status'])->whereStatus('Active')->get();
        $divisions = Division::select(['id', 'name', 'status'])->whereStatus('Active')->get();
        $venues = Venue::select(['id', 'name', 'status'])->whereStatus('Active')->get();

        return view('administration.event.create', compact(['seasons', 'sports', 'divisions', 'venues']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventStoreRequest $request)
    {
        // dd($request->all());
        try{
            DB::transaction(function() use ($request) {
                $logo = upload_avatar($request, 'logo');

                $event = new Event();

                $event->season_id = $request->season_id;
                $event->sport_id = $request->sport_id;
                $event->logo = $logo;
                $event->name = $request->name;
                $event->registration_fee = $request->registration_fee;
                $event->start = $request->start;
                $event->end = $request->end;
                $event->description = $request->description;
                $event->status = $request->status;
                $event->save();

                $event->divisions()->attach($request->divisions);
                $event->venues()->attach($request->venues);
            }, 5);

            toast('A New Event Has Been Created.', 'success');
            return redirect()->route('administration.event.index');

        } catch (Exception $e){
            dd($e);
            alert('DIvision Creation Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        $event = Event::whereId($event->id)->with([
                            'season' => function($season) {
                                $season->select(['id', 'name']);
                            },
                            'sport' => function($sport) {
                                $sport->select(['id', 'name']);
                            },
                            'divisions',
                            'venues',
                            'teams'
                        ])
                        ->firstOrFail();
        return  view('administration.event.show', compact(['event']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        $seasons = Season::select(['id', 'name', 'year', 'status'])->whereStatus('Active')->get();
        $sports = Sport::select(['id', 'name', 'status'])->whereStatus('Active')->get();
        $divisions = Division::select(['id', 'name', 'status'])->whereStatus('Active')->get();
        $venues = Venue::select(['id', 'name', 'status'])->whereStatus('Active')->get();

        $event = Event::whereId($event->id)->with([
                            'season' => function($season) {
                                $season->select(['id', 'name']);
                            },
                            'sport' => function($sport) {
                                $sport->select(['id', 'name']);
                            },
                            'divisions',
                            'venues'
                        ])
                        ->firstOrFail();
        return  view('administration.event.edit', compact(['event', 'seasons', 'sports', 'divisions', 'venues']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventUpdateRequest $request, Event $event)
    {
        // dd($request->all());
        try{
            DB::transaction(function() use ($request, $event) {
                $logo = upload_avatar($request, 'logo');

                $event->season_id = $request->season_id;
                $event->sport_id = $request->sport_id;
                if (isset($request->logo)) {
                    $event->logo = $logo;
                }
                $event->name = $request->name;
                $event->registration_fee = $request->registration_fee;
                $event->start = $request->start;
                $event->end = $request->end;
                $event->description = $request->description;
                $event->status = $request->status;
                $event->save();

                // Sync the divisions and venues in the pivot tables
                $event->divisions()->sync($request->divisions);
                $event->venues()->sync($request->venues);
            }, 5);

            toast('Event Has Been Updated.', 'success');
            return redirect()->route('administration.event.show', ['event' => $event]);

        } catch (Exception $e){
            dd($e);
            alert('DIvision Update Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        try {
            $event->delete();

            toast('Event Has Been Deleted.','success');
            return redirect()->route('administration.event.index');
        } catch (Exception $e) {
            dd($e);
            alert('Event Deletation Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }



    /**
     * Event Registration Form
     */
    public function registration(Event $event) {
        $players = Player::select(['id', 'user_id'])->with(['user'])->whereStatus('Active')->get();
        // dd($players);
        return view('administration.event.registration.create', compact(['event', 'players']));
    }


    /**
     * Event Registration Store
     */
    public function register_player(Request $request, Event $event) {
        // dd($request->all(), $event);
        $request->validate([
            'event_id' => 'required|exists:events,id',
            'player_id' => ['required', 'exists:players,id', new UniqueEventPlayerRule],
        ], [
            'event_id.required' => 'The event field is required.',
            'event_id.exists' => 'The selected event is invalid.',
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
            $transactionRequestType->setAmount($event->registration_fee);
            $transactionRequestType->setPayment($payment);

            // Set order information
            $description = 'Event ('.$event->name.') Registration By Player ('.$player->user->name.')';
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

                    DB::transaction(function () use ($request, $event, $trasactionReport, $invoice_number) {
                        $paidBy = decrypt($request->paid_by);

                        // Attach the player to the event
                        $event->players()->attach($request->player_id, [
                            'paid_by' => $paidBy,
                            'total_paid' => $event->registration_fee,
                            'transaction_id' => $trasactionReport->getTransId(),
                            'invoice_number' => $invoice_number,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                    }, 5);

                    toast('Registration completed for the event.', 'success');
                    return redirect()->route('administration.event.show', ['event' => $event]);
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
}
