<?php

namespace App\Http\Controllers;

use App\Emigrant;
use Illuminate\Http\Request;

class EmigrantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emigrants = Emigrant::latest()->get();
        return view('emigrants.index', ['emigrants' => $emigrants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Emigrant  $emigrant
     * @return \Illuminate\Http\Response
     */
    public function show(Emigrant $emigrant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Emigrant  $emigrant
     * @return \Illuminate\Http\Response
     */
    public function edit(Emigrant $emigrant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Emigrant  $emigrant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Emigrant $emigrant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Emigrant  $emigrant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Emigrant $emigrant)
    {
        //
    }
}
