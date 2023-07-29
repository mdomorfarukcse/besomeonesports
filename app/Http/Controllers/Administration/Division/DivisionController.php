<?php

namespace App\Http\Controllers\Administration\Division;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administration\Division\DivisonStoreRequest;
use App\Models\Division\Division;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $divisions = Division::select(['id','name','status'])->orderBy('created_at', 'desc')->get();
        return view('administration.division.index', compact('divisions'));
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
    public function store(DivisonStoreRequest $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Division $division)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Division $division)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Division $division)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Division $division)
    {
        //
    }
}
