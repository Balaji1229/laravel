@extends('layouts.app')
@section('body_content')

@if($errors->any())
<ul>
  {!! implode('', $errors -> all('<li>:message</li>')) !!}
</ul>
@endif


<div class="container  py-5">
<div class="col-md-6">
<form method="POST" action="/registerpost">
    @csrf

    <div class="form-group mb-3">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
  </div>

  <div class="form-group mb-3">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control" placeholder="Enter email" required>
  </div>

  <div class="form-grou mb-3">
    <label for="exampleInputPassword1">Password</label>
    <input type="password"  name="password" class="form-control"  placeholder="Password" required>
  </div>

  <div class="form-group mb-3">
    <label for="exampleInputPassword1">Confirm Password</label>
    <input type="password"  name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
  </div>

  <button type="submit" value="Register" class="btn btn-primary">Submit</button>
</form>
<h6 class="py-3">If you are already Registered user Login Here -> <a href='/login'>Login</a> </h6>
</div>
</div>
@endsection 