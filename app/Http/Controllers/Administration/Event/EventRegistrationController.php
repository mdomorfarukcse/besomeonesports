<?php

namespace App\Http\Controllers\Administration\Event;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administration\Event\Registration\EventRegistrationStoreRequest;
use App\Http\Requests\Administration\Event\Registration\EventRegistrationUpdateRequest;
use App\Models\Event\Registration\EventRegistration;
use Illuminate\Http\Request;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventRegistrationStoreRequest $request)
    {
        //
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
