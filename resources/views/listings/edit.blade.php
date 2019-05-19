@extends('layouts.app')


@section('content')
<h1>Modify Business List  <a href="/listings/{{$listing->id}}" class="btn btn-secondary btn-sm float-right">Go Back</a> </h1>
<hr>
<form action="/listings/{{$listing->id}}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    
    <div class="form-group">
        <label for="name">Business Name: <sup>*</sup></label>
        <input type="text" name="name" value="{{$listing->name}}" class="form-control">
    </div>    
    <div class="form-group">
        <label for="website">Business Website: <sup>*</sup></label>
        <input type="url" name="website" value="{{$listing->website}}" class="form-control">
    </div>
    <div class="form-group">
        <label for="email">Business Email: <sup>*</sup></label>
        <input type="email" name="email" value="{{$listing->email}}" class="form-control">
    </div>        
    <div class="form-group">
        <label for="phone">Business Phone No. : <sup>*</sup></label>
        <input type="text" name="phone" value="{{$listing->phone}}" class="form-control">
    </div>    
    <div class="form-group">
        <label for="address">Business Address: <sup>*</sup></label>
        <input type="text" name="address" value="{{$listing->address}}" class="form-control">
    </div>
    <div class="form-group">
            <label for="address">Business Description: <span class="text-muted">(optional)</span></label>
            <textarea name="description" style="resize:none" class="form-control">{{$listing->description}}</textarea>
    </div>    
    <div class="form-group">
        <label for="name">Do you want to share business information?</label>
        <br>
        <input type="radio" name="is_private" value="0" checked> <label for="0">Yes</label>
        <input type="radio" name="is_private" value="1"> <label for="1">No</label>
    </div> 
    <input type="hidden" name="_method" value="PUT">   
    <div>
        <input type="submit" value="Update" class="btn btn-primary">
    </div>
    
    
</form>
    
@endsection