<?php

namespace App\Http\Controllers\Administration\Event;

use Exception;
use App\Models\Event\Event;
use App\Models\Sport\Sport;
use Illuminate\Http\Request;
use App\Models\Season\Season;
use App\Http\Controllers\Controller;
use App\Http\Requests\Administration\Event\EventStoreRequest;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::select(['id', 'season_id', 'sport_id', 'logo', 'name', 'status'])
                        ->with([
                            'season' => function($season) {
                                $season->select(['id', 'name']);
                            },
                            'sport' => function($sport) {
                                $sport->select(['id', 'name']);
                            }
                        ])
                        ->orderByDesc('created_at')
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

        return view('administration.event.create', compact(['seasons', 'sports']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventStoreRequest $request)
    {
        // dd($request->all());
        try{
            $logo = upload_avatar($request, 'logo');

            $event = new Event();

            $event->season_id = $request->season_id;
            $event->sport_id = $request->sport_id;
            $event->logo = $logo;
            $event->name = $request->name;
            $event->start = $request->start;
            $event->end = $request->end;
            $event->description = $request->description;
            $event->status = $request->status;
            $event->save();

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
                            }
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

        $event = Event::whereId($event->id)->with([
                            'season' => function($season) {
                                $season->select(['id', 'name']);
                            },
                            'sport' => function($sport) {
                                $sport->select(['id', 'name']);
                            }
                        ])
                        ->firstOrFail();
        return  view('administration.event.edit', compact(['event', 'seasons', 'sports']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }
}
