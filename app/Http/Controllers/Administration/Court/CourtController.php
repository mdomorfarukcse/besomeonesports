<?php

namespace App\Http\Controllers\Administration\Court;

use Exception;
use App\Models\Court\Court;
use App\Models\Venue\Venue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Administration\Court\CourtStoreRequest;

class CourtController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(CourtStoreRequest $request)
    {
        // dd($request->all());
        try{
            Court::create([
                'venue_id' => $request->venue_id,
                'name' => $request->name,
            ]);

            toast('Court Has Been Assigned.', 'success');
            return redirect()->back();
        } catch (Exception $e){

            dd($e);
            alert('Court Creation Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Court $court)
    {
        try{
            $court->delete();

            toast('Court has been removed from the Venue.', 'success');
            return redirect()->back();
        } catch (Exception $e){
            dd($e);
            alert('Court Deletation failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }
}
