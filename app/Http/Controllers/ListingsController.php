<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listing;
use App\User;
use Illuminate\Support\Facades\DB;

class ListingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
         $this->middleware('auth')->except(['index']);
     }

    public function index(Request $request)
    {
        //
        $name = $request->input('name');
        if(!empty($name)){
            $listings = DB::select('SELECT * FROM listings WHERE is_private = ? AND name LIKE ?', ['0', '%'.$name.'%']);
        }else{
            $listings = Listing::where('is_private', '0')->orderBy('id', 'desc')->get();
        }
        return view('listings.index')->with('listings', $listings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('listings.create');
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
        $user = auth()->user();
        $user->listings()->create($request->all());
        return redirect('/dashboard')->with('success', 'The business has been added to the list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $listing = Listing::find($id);
        if($this->allowed($id)){
            return view('listings.show')->with('listing', $listing);
        }
        return redirect('/dashboard')->with('error', 'You are not allowed to view this post');
    }
    private function allowed($id){
        foreach(auth()->user()->listings()->get() as $userListing){
            if($userListing->id == $id){
                return true;
            }
        }
        return false;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $listing = Listing::findOrFail($id);
        if($this->allowed($id)){
            return view('listings.edit')->with('listing', $listing);
        }
        return redirect('/dashboard')->with('error', 'You are not allowed to edit this post');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $listing = Listing::findOrFail($id);
        $listing->name = $request->input('name');
        $listing->website = $request->input('website');
        $listing->email = $request->input('email');
        $listing->phone = $request->input('phone');
        $listing->address = $request->input('address');
        $listing->description = $request->input('description');
        $listing->is_private = $request->input('is_private');
        $listing->save();
        return redirect('/dashboard')->with('success', 'List has been updated.');
    }
    public function add($id){
        if($this->allowed($id)){
            return redirect('/dashboard')->with('error', 'You already have this list');
        }
        $listing = Listing::findOrFail($id);
        auth()->user()->listings()->wherePivot('listing_id', '=', $id)->attach($listing);
        return redirect('/dashboard')->with('success', 'Business list has been added');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $listing = Listing::findOrFail($id);
        auth()->user()->listings()->wherePivot('listing_id', '=', $id)->detach();
        //Check that lsiting doesn't belong to other records and if so delete it
        $exists = DB::table('listing_user')->where('listing_id', $id)->count() > 0;
        if(!$exists){
            $listing->delete();
        }
        
        
        return redirect('/dashboard')->with('success', 'Business list has been deleted');
    }
}
