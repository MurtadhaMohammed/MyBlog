
<div class="row-fluid">
    <h3>Saved posts</h3>
    <hr>
    @foreach($posts as $post)
    <div  class="row wow fadeInUp" data-wow-offset="250">
        <!--title-->
        <div class="col-xs-10 lead">   
            <b>{{$post->title}}</b><small class="gray"> {{$post->departments->name}}</small><br>
            <small>{{$post->created_at}}</small>  <span class="gray">by</span>  <a href=""><i class="fa fa-user" aria-hidden="true"></i>
                {{$post->users->name}}
            </a>

        </div>
        <div class="col-xs-2">  

            <div class="btn-group pull-right setting">
                <button data-toggle="dropdown"  >
                    <i class="fa fa-cog" aria-hidden="true"></i>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" type="button"><i class="fa fa-edit" aria-hidden="true"></i> edit</a><br>
                    <a class="dropdown-item" type="button"><i class="fa fa-trash-o" aria-hidden="true"></i> delete</a>
                </div>
            </div>


        </div>
        <!--end title-->

        <!--image post-->
        <div class="col-xs-12">
            <img class="img-responsive post" src="../img/posts/{{$post->img}}" alt=""/>
            <br>
        </div>
        <!--end image post-->

        <!-- post body-->
        <div class="col-xs-12">
            <p class="lead">{{substr($post->body, 1, 210)}}... 
                @if(Auth::check()) 
                <a  href="../post/{{Auth::user()->id}}/{{$post->id}}">Read More </a>
                @else
                <a  href="../post/0/{{$post->id}}">Read More </a>
                @endif
            </p>

        </div>
    </div>
    <hr>


    <!-- end post body-->
    @endforeach

</div>
<hr>



