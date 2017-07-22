@extends('master')
@section('content')

<div >
    <div class="form-top-left" >
        <h3>Login</h3>
        <p>Enter your information log on:</p>

    </div>

    <div class="form-top-right"  >
        <i class="fa fa-sign-in" aria-hidden="true"></i>
    </div>

</div>

<form action="/login" method="POST" >

    {{ csrf_field() }}
    <div class="form-group">
        <label class="sr-only" for="form-username">Username</label>
        <input type="text" name="name" placeholder="Username..." class="form-username form-control" id="form-username">
    </div>

    <div class="form-group">
        <label class="sr-only" for="form-password">Password</label>
        <input type="password" name="password" placeholder="Password..." class="form-password form-control" id="form-password">
    </div>
    <button type="submit" class="btn btn-success">Sign in</button>
</form>
<hr>
<div class="message">
    <h3>or login with:</h3>
    <div class="social-login-buttons">
        <a class="btn btn-link-1 btn-link-1-facebook"  href="#">
            <i class="fa fa-facebook"></i> Facebook
        </a>
        <a class="btn btn-link-1 btn-link-1-twitter"  href="#">
            <i class="fa fa-twitter"></i> Twitter
        </a>
        <a class="btn btn-link-1 btn-link-1-google-plus"  href="#">
            <i class="fa fa-google-plus"></i> Google Plus
        </a>
    </div>
</div>
<br>
<p class="message">Not registered? <a href="/register">Create an account</a></p>



@stop
