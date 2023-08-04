<?php

namespace App\Http\Controllers\Administration\Event;

use Exception;
use App\Models\Event\Event;
use App\Models\Player\Player;
use App\Http\Controllers\Controller;
use App\Models\Event\Registration\EventRegistration;
use App\Http\Requests\Administration\Event\Registration\EventRegistrationStoreRequest;
use App\Http\Requests\Administration\Event\Registration\EventRegistrationUpdateRequest;
use Illuminate\Support\Facades\Auth;

class EventRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $registrations = EventRegistration::with([
                                                'event',
                                                'player',
                                                'paidBy'
                                            ])
                                            ->orderBy('created_at', 'desc')
                                            ->get();

        return view('administration.event.registration.index', compact(['registrations']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $events = Event::whereStatus('Active')->get();
        $players = Player::whereStatus('Active')->get();
        return view('administration.event.registration.create', compact(['events', 'players']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventRegistrationStoreRequest $request)
    {        
        $existingRegistration = EventRegistration::where('event_id', $request->event_id)
            ->where('player_id', $request->player_id)
            ->exists();
            
        if ($existingRegistration) {
            alert('Event Registration Failed!', 'This Player Is Already Registered For This Event.', 'warning');
            return redirect()->back()->withInput();
        }

        try{
            EventRegistration::create([
                'event_id' => $request->event_id,
                'player_id' => $request->player_id,
                'paid_by' => Auth::user()->id
            ]);

            toast('A New Player Has Been Registered for an Event.', 'success');
            return redirect()->back();
        } catch (Exception $e){

            dd($e);
            alert('Event Registration Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(EventRegistration $event_registration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EventRegistration $event_registration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventRegistrationUpdateRequest $request, EventRegistration $event_registration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EventRegistration $event_registration)
    {
        //
    }
}
