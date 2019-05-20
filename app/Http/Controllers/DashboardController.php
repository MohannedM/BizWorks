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
        $todos = auth()->user()->todos()->orderBy('due', 'asc')->get();
        $userListings = auth()->user()->listings()->orderBy('id', 'desc')->get();
        return view('dashboard')->with('listings', $userListings)->with('todos', $todos);
    }
    public function welcome(){
        return view('welcome');
    }
}
