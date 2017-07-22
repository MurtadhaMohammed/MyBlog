<br>
<form action="/commint" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="hidden" name="post_id" value="{{$post->id}}"/>
    <input type="hidden" name="user_id" value="{{Auth::user()->id}}"/>
    <textarea  name="commint" class="form-control" placeholder="add commint..."></textarea>

    <br>
    <button  class="btn btn-default" type="submit">
        <i class="fa fa-paper-plane-o" aria-hidden="true"></i>
    </button>

</div>
</form>