@extends('layouts.app')


@section('content')
<h1>Schedule a Task  <a href="/dashboard" class="btn btn-secondary btn-sm float-right">Go Back</a> </h1>
<hr>
<form action="/todos" method="POST">
    {{csrf_field()}}
    
    <div class="form-group">
        <label for="title">Title: <sup>*</sup></label>
        <input type="text" name="title" class="form-control">
    </div>    
    <div class="form-group">
        <label for="company">With Company: <sup>*</sup></label>
        <select name="listing_id" class="form-control">
            @foreach ($listings as $listing)
                <option value="{{$listing->id}}">{{$listing->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="due">Due Date: <sup>*</sup></label>
        <input type="date" name="due" class="form-control">
    </div>    
    <div class="form-group">
            <label for="description">Description: <span class="text-muted">(optional)</span></label>
            <textarea name="description" style="resize:none" class="form-control"></textarea>
    </div>    

    <div>
        <input type="submit" value="Submit" class="btn btn-primary">
    </div>
    
    
</form>
    
@endsection