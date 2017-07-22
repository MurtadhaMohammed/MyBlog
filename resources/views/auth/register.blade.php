@extends('master') @section('content')

<!-- Top content -->





<div class="form-top-left">
    <h3>Register</h3>
    <p>Enter your information log on:</p>
</div>

<div class="form-top-right">
    <i class="fa fa-user-plus" aria-hidden="true"></i>
</div>
<div class="row">

    <form action="/register" method="POST" enctype="multipart/form-data">
        <div class="col-sm-3 message">
            <div class="btn-group-vertical">
                <img id="imgselect" class="btn btn-secondary img-responsive img-profile" src="img/profile/1.png" />
                <label class="btn btn-default" style="margin-bottom:15px">
                    Browse <input type="file" id="url" name="url" value="" hidden>
                </label>

            </div>
        </div>

        <div class="col-sm-9">
            {{ csrf_field() }}
            <div class="form-group">

                <label class="sr-only" for="form-username">Name</label>
                <input type="text" name="name" placeholder="Name..." class="form-username form-control" id="form-username">
            </div>
            <div class="form-group">
                <label class="sr-only" for="form-email">Email</label>
                <input type="text" name="email" placeholder="Email..." class="form-email form-control" id="form-email">
            </div>
            <div class="form-group">
                <label class="sr-only" for="form-password">Password</label>
                <input type="password" name="password" placeholder="Password..." class="form-password form-control" id="form-password">
            </div>
            <button type="submit" class="btn btn-success">Register</button>
        </div>
    </form>
</div>
<hr>
<div class="message">
    <h3>or register with:</h3>
    <div class="social-login-buttons">
        <a class="btn btn-link-1 btn-link-1-facebook" href="#">
            <i class="fa fa-facebook"></i> Facebook
        </a>
        <a class="btn btn-link-1 btn-link-1-twitter" href="#">
            <i class="fa fa-twitter"></i> Twitter
        </a>
        <a class="btn btn-link-1 btn-link-1-google-plus" href="#">
            <i class="fa fa-google-plus"></i> Google Plus
        </a>
    </div>
</div>
<br>
<p class="message">Already registered? <a href="/login">Sign In</a></p>



@stop