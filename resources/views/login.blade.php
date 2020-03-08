@extends('layouts.master')
@section('content')
<div class="register padd-60">
  <div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
      <h1 class="padd-30">Login</h1>
        <form action="{{route('login')}}" method="post">
          @csrf 
          <div class="form-group">
            <input name="email" value="" type="text" class="form-control" placeholder="Email">
          </div>
          <div class="form-group">
            <input name="password" value="" type="text" class="form-control" placeholder="Password">
          </div>
          <button type="submit" class="btn btn-success">Login</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
