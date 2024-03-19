<?php

namespace App\Http\Controllers\Administration\Division;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administration\Division\DivisionStoreRequest;
use App\Http\Requests\Administration\Division\DivisionUpdateRequest;
use App\Models\Division\Division;
use Exception;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Division::select(['id','name','gender','status'])->orderBy('created_at', 'desc');
        if ($request->filled('gender')) {
            $query->where('gender', $request->gender);
        }
        if ($request->filled('status')) {
            $query->whereStatus($request->status);
        }

        $divisions = $query->get();
        return view('administration.division.index', compact('divisions', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('administration.division.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DivisionStoreRequest $request)
    {
        try{
           
            $division = new Division();
            $division->name = $request->name;
            $division->gender = $request->gender;
            $division->description = $request->description;
            $division->status = $request->status;
            $division->save();

            toast('A New Division Has Been Created.', 'success');
            return redirect()->route('administration.division.index');
        } catch (Exception $e){

            dd($e);
            alert('DIvision Creation Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Division $division)
    {
        return view('administration.division.show', compact(['division']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Division $division)
    {
        return view('administration.division.edit', compact(['division']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DivisionUpdateRequest $request, Division $division)
    {
        try{
            $division->name = $request->name;
            $division->gender = $request->gender;
            $division->description = $request->description;
            $division->status = $request->status;
            $division->save();

            toast('Division Has Been Updated.', 'success');
            return redirect()->route('administration.division.show', ['division' => $division]);

        } catch (Exception $e){
            dd($e);
            alert('Division Update Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Division $division)
    {
        try {
            $division->delete();

            toast('Division Has Been Deleted.','success');
            return redirect()->route('administration.division.index');
        } catch (Exception $e) {
            dd($e);
            alert('Division Deletation Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }
}
