<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SponsorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('sponsor');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sponsorDashboard');
    }
}
