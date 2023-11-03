@extends('layouts.app')
@section('body_content')

@if($errors->any())
<ul>
  {!! implode('', $errors -> all('<li>:message</li>')) !!}
</ul>
@endif

<div class="container py-5 ">
  <div class="col-md-6">
<form method="POST" action="/loginpost">
    @csrf

  <div class="form-group mb-3">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>

  <div class="form-group mb-3">
    <label for="exampleInputPassword1">Password</label>
    <input type="password"  name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>

  <button type="submit" value="Login" class="btn btn-primary">Submit</button>
</form>

<h6 class="py-3">If you are new user Register Here -> <a href='/register'>Register</a> </h6>
</div>
</div>
@endsection 