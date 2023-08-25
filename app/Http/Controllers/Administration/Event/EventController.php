<?php

namespace App\Http\Controllers\Administration\Event;

use Exception;
use App\Models\Event\Event;
use App\Models\Sport\Sport;
use App\Models\Venue\Venue;
use Illuminate\Http\Request;
use App\Models\Season\Season;
use App\Models\Division\Division;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Administration\Event\EventStoreRequest;
use App\Http\Requests\Administration\Event\EventUpdateRequest;
use App\Models\Player\Player;

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
                            'venues'
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
        dd($request->all(), $event);
    }
}
