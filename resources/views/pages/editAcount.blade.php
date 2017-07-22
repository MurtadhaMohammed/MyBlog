 
<div class="row">
    <br>
    <form id="edit-form"  action="/edit-acount" method="POST" enctype="multipart/form-data">

        <div class="col-sm-12">
            {{ csrf_field() }}
            <input type="hidden" name="user" value="{{Auth::user()->id}}">
            <div class="form-group">

                <label class="sr-only" for="form-username"></label>
                <input type="text" name="name" placeholder="Name..." class="form-username form-control" id="form-username" value="{{$user->name}}">
            </div>
            <div class="form-group">
                <label class="sr-only" for="form-email"></label>
                <input type="text" name="email" placeholder="Email..." class="form-email form-control" id="form-email" value="{{$user->email}}">
            </div>
            <div class="form-group">
                <label class="sr-only" for="form-password"></label>
                <input type="text" name="password" placeholder="Old Password..." class="form-password form-control" id="form-password" value="">
            </div>
            <div class="form-group">
                <label class="sr-only" for="form-password"></label>
                <input type="text" name="new_password" placeholder="New Password..." class="form-password form-control" id="form-password" value="">
            </div>
            <button  type="submit" class="btn btn-success pull-right"><i class="fa fa-save"></i> Save</button>

        </div>
    </form>
</div>
<hr>
<p class="success-message"></p>
<p class="error-message"></p>
<a  href=""><i class="fa  fa-arrow-left fa-2x"></i></a>
