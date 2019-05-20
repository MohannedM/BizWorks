@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Available Businesses</h1><br>
        </div>
        <div class="col-md-4">
            <form action="/listings" method="GET">
                <div class="form-row">
                    <div class="col-12 col-md-9 mb-2 mb-md-0">
                        <input type="text" name="name" class="form-control form-control-md" placeholder="Serch for businesses" required>
                    </div>
                    <div class="col-12 col-md-3">
                        <button type="submit" class="btn btn-block btn-md btn-primary">Search!</button>
                    </div>
                </div>
            </form>
        </div>
        
    </div>
    @if(count($listings) > 0)
    <div class="row">
        @foreach($listings as $listing)
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-3">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{$listing->name}}
                        <a href="/listings/{{$listing->id}}/add" class="btn btn-success btn-sm">Add To My Lists</a>
                    </h5>
                    <p class="card-text">{{$listing->email}}</p>
                    <p class="card-text">{{$listing->phone}}</p>
                    <p class="card-text">{{$listing->address}}</p>
                    <a href="{{$listing->website}}" class="card-link">Business Website</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="text-center">
        <h1>No Results! <a href="/listings" class="btn btn-secondary btn-sm">Refresh</a></h1>
        
    </div>

    @endif

@endsection
