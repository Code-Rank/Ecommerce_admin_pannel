<?php

namespace App\Http\Controllers;

use App\Models\guestadmin;
use Illuminate\Http\Request;


class GuestadminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/guestadmin');
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
     * @param  \App\Models\guestadmin  $guestadmin
     * @return \Illuminate\Http\Response
     */
    public function show(guestadmin $guestadmin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\guestadmin  $guestadmin
     * @return \Illuminate\Http\Response
     */
    public function edit(guestadmin $guestadmin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\guestadmin  $guestadmin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, guestadmin $guestadmin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\guestadmin  $guestadmin
     * @return \Illuminate\Http\Response
     */
    public function destroy(guestadmin $guestadmin)
    {
        //
    }
}
