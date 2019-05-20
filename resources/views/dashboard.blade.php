@extends('layouts.app')

@section('content')
    <div class="row justify-content-center mb-3">
        <div class="col-md-8">
            <h2>Your Schedule</h2><br>
        </div>
        <div class="col-md-4">
            <a href="/todos/create" class="btn btn-success fa-pull-right">Schedule a Task</a>
        </div>
    </div>
    @if(count($todos) > 0)
    <div class="row mb-5">
        @foreach($todos as $todo)
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-3">
            <div class="card"  style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{str_limit($todo->title, 18)}} <span class="badge badge-danger">{{$todo->due}}</span></h5>
                        <a href="/todos/{{$todo->id}}" class="card-link">View Details</a>
                    </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif


    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>Your Business Lists</h2><br>
        </div>
        <div class="col-md-4">
            <a href="/listings/create" class="btn btn-success  ml-5 fa-pull-left">Add a Business</a>
            <a href="/listings" class="btn btn-primary fa-pull-right">Search for a Business</a>
        </div>
    </div>
    @if(count($listings) > 0)
    <div class="row">
        @foreach($listings as $listing)
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-3">
            <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{$listing->name}}</h5>
                        <p class="card-text">{{$listing->email}}</p>
                        <p class="card-text">{{$listing->phone}}</p>
                        <p class="card-text">{{$listing->address}}</p>
                        <a href="/listings/{{$listing->id}}" class="card-link">Business Info</a>
                        <a href="{{$listing->website}}" class="card-link">Business Website</a>
                    </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif

@endsection
