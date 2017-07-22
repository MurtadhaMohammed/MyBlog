@extends('master')
@section('content')

<div id="profile" class="row">
    <br>
    <div class="col-sm-2 center" >
        <a href="../img/profile/{{$user->img}}">
            <div id="img-profile">
                <img  class="user-imag" src="../img/profile/{{$user->img}}"/>

            </div>
        </a>
    </div>
    <div class="col-sm-10 lead center user-profile-head" >
        <p>{{$user->name}} </p>
        <p class="gray">{{$user->email}}</p>
        <br>
        <div class="col-xs-12 btn-group group" role="group" aria-label="Basic example">
            @if(Auth::check())
            @if(Auth::user()->id ==$user->id)
            @if(!Auth::user()->hasRole('User'))
            <button id="add-post"  type="button" class="btn btn-default responsive-btn"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Add Post</button>
            @endif

            <button id="edit-acount" data-user="{{Auth::user()->id}}" type="button" class="btn btn-default responsive-btn"><i class="fa fa-edit" aria-hidden="true"></i> Edit Acount</button>
            @endif
            @endif
        </div>  
    </div>
    <div id="posts">
        <!-- Blog Post -->
        @foreach($posts as $post)
        <div  class="row wow fadeInUp" data-wow-offset="250">
            <!--title-->
            <div class="col-xs-10 lead">   
                <b>{{$post->title}}</b><small class="gray"> {{$post->departments->name}}</small><br>
                <small>{{$post->created_at}}</small>  <span class="gray">by</span>  <i class="fa fa-user" aria-hidden="true"></i>
                {{$post->users->name}}

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
</div>
@stop
