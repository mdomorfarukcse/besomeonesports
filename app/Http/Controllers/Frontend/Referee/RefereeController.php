<?php

namespace App\Http\Controllers\Frontend\Referee;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User\Frontend\RefereeRequest;
use App\Http\Requests\Frontend\Referee\RefereeStoreRequest;

class RefereeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontend.referee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RefereeStoreRequest $request)
    {
        // dd($request['sport_of_interests']);
        try {
            $referee = new RefereeRequest();

            $request['sport_of_interests'] = json_encode($request['sport_of_interests']);
            
            $referee->fill($request->except('avatar'));

            // $avatar = upload_image($request->avatar);
            // $referee->avatar = $avatar;

            $referee->save();
            
            $admins = User::role('admin')->get();
            foreach ($admins as $admin) {
                // Send Mail to the admin email
                //Mail::to($admin->email)->send(new CoachRequestMail($coach, $admin));
            }

            toast('Referee Request Has Been Send.','success');
            return redirect()->back();
        } catch (Exception $e) {
            dd($e);
            alert('referee Request Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
