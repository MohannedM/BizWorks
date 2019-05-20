@extends('layouts.app')


@section('content')
<a href="/dashboard" class="btn btn-light mb-3">Go Back</a>
<div class="card">
    <div class="card-header">
        <h3>{{$todo->title}} <span class="badge badge-danger">{{$todo->due}}</span></h3>    
    </div>

    <div class="card-body">
        <p>At: <strong>{{$listing->name}}</strong></p> 
        <p class="card-text">{{$todo->description}}</p>
        <form action="/todos/{{$todo->id}}" method="post">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit" class="btn btn-danger btn-block"> <strong>DELETE</strong></button>
        </form>
    </div>
</div>
    
@endsection