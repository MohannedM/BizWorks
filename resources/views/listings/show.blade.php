@extends('layouts.app')

@section('content')
<a href="/dashboard" class="btn btn-light mb-3">Go Back</a>
    <div class="card">
        <div class="card-header">
          {{$listing->name}}
        </div>
        <div class="card-body">
          <blockquote class="blockquote mb-0">
                <p class="card-text"><small> Business Email:</small>{{$listing->email}}</p>
                <p class="card-text"><small>Business Phone no. :</small> {{$listing->phone}}</p>
                <p class="card-text"><small>Business Address: </small>{{$listing->address}}</p>
                <p>{{$listing->description}}</p>
            <footer class="blockquote-footer">Business Website: <a href="{{$listing->website}}">{{$listing->website}}</a></footer>
          </blockquote>
        </div>
      </div>    
      <a href="/listings/{{$listing->id}}/edit" class="btn btn-secondary fa-pull-left">Edit</a>
      <form action="/listings/{{$listing->id}}" method="POST">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="DELETE">
        <input type="submit" value="Delete" class="btn btn-danger fa-pull-right">
      </form>
@endsection