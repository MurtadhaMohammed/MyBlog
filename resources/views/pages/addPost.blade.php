
<div class="row-fluid">
    <div class="col-xs-12">
        <br>


    </div> 
    <form action="../add-post" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label class="sr-only" for="form-username">Title</label>
            <input type="text" name="title" placeholder="title..." class="form-username form-control" id="form-username">
        </div>
        <div class="form-group">
            <textarea  name="body" class="form-control" placeholder="body..."></textarea>
        </div>

        <select class="btn btn-default" name="dep">
            @foreach($dep as $row)
            <option value="{{$row->id}}">
                {{$row->name}}
            </option> 
            @endforeach
        </select>

        <label class="btn btn-default img-post" >

            <input type="file" id="url" name="url" value="" hidden>
            <img  id="imgselect" class="btn btn-secondary img-responsive img-post" src="../img/profile/1.png"/>
        </label>

        <input type="hidden" name="user_id" value="{{Auth::user()->id}}"/>
        <button  type="submit" class="btn btn-success pull-right">Post</button>
    </form>

</div> 
</div>
<hr>
<a  href=""><i class="fa  fa-arrow-left fa-2x"></i></a>



