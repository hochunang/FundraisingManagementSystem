<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DsaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('dsa');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dsaDashboard');
    }
}
