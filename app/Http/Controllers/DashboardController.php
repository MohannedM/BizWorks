<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['welcome']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userListings = auth()->user()->listings()->orderBy('id', 'desc')->get();
        return view('dashboard')->with('listings', $userListings);
    }
    public function welcome(){
        return view('welcome');
    }
}
