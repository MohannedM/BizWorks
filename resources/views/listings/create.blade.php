@extends('layouts.app')


@section('content')
<h1>Add a Business  <a href="/dashboard" class="btn btn-secondary btn-sm float-right">Go Back</a> </h1>
<hr>
<form action="/listings" method="POST">
    {{csrf_field()}}
    
    <div class="form-group">
        <label for="name">Business Name: <sup>*</sup></label>
        <input type="text" name="name" class="form-control">
    </div>    
    <div class="form-group">
        <label for="website">Business Website: <sup>*</sup></label>
        <input type="url" name="website" class="form-control">
    </div>
    <div class="form-group">
        <label for="email">Business Email: <sup>*</sup></label>
        <input type="email" name="email" class="form-control">
    </div>        
    <div class="form-group">
        <label for="phone">Business Phone No. : <sup>*</sup></label>
        <input type="text" name="phone" class="form-control">
    </div>    
    <div class="form-group">
        <label for="address">Business Address: <sup>*</sup></label>
        <input type="text" name="address" class="form-control">
    </div>
    <div class="form-group">
            <label for="description">Business Description: <span class="text-muted">(optional)</span></label>
            <textarea name="description" style="resize:none" class="form-control"></textarea>
    </div>    
    <div class="form-group">
        <label for="name">Do you want to share business information?</label>
        <br>
        <input type="radio" name="is_private" value="0" checked> <label for="0">Yes</label>
        <input type="radio" name="is_private" value="1"> <label for="1">No</label>
    </div>    
    <div>
        <input type="submit" value="Submit" class="btn btn-primary">
    </div>
    
    
</form>
    
@endsection