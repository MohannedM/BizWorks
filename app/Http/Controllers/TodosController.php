<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use App\Listing;

class TodosController extends Controller
{


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $listings = auth()->user()->listings;
        return view('todos.create')->with('listings', $listings);
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
        $this->validate($request, [
            'title'=>'required',
            'due'=>'date'
        ]);
        auth()->user()->todos()->create($request->all());
        return redirect('/dashboard')->with('success', 'Todo has been scheduled');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $todo = Todo::findOrFail($id);
        $listing = Listing::findOrFail($todo->listing_id);
        return view('todos.show')->with('todo', $todo)->with('listing', $listing);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Todo::findOrFail($id)->delete();
        return redirect('/dashboard')->with('success', 'Schedule has been deleted');
    }
}
