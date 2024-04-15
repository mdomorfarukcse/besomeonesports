<?php

namespace App\Http\Controllers\Frontend\Coach;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Models\Coach\Frontend\CoachRequest;
use App\Http\Requests\Frontend\Coach\CoachStoreRequest;
use App\Mail\Administration\Coach\CoachRequestMail;

class CoachController extends Controller
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
        return view('frontend.coach.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CoachStoreRequest $request)
    {
        // dd($request->all());
        try {
            $coach = new CoachRequest();

            $request['sport_of_interests'] = json_encode($request['sport_of_interests']);
            $request['grade_of_interests'] = json_encode($request['grade_of_interests']);
            
            $coach->fill($request->except('avatar'));

            // $avatar = upload_image($request->avatar);
            // $coach->avatar = $avatar;

            $coach->save();
            
            $admins = User::role('admin')->get();
            foreach ($admins as $admin) {
                // Send Mail to the admin email
                Mail::to($admin->email)->send(new CoachRequestMail($coach, $admin));
            }

            toast('Coach Request Has Been Send.','success');
            return redirect()->back();
        } catch (Exception $e) {
            //dd($e);
            alert('Coach Request Failed!', 'There is some error! Please fix and try again.', 'error');
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
