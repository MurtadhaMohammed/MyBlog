@extends('master')
@section('content')


<!-- Blog Post -->


<div class="row wow fadeInDown">
    <!--title-->
    <div class="col-xs-10 lead">   
        <b>{{$post->title}}</b><small class="gray"> {{$post->departments->name}}</small><br>
        <small>{{$post->created_at}}</small>  <span class="gray">by</span>  <i class="fa fa-user" aria-hidden="true"></i>

        {{$post->users->name}}
    </div>
    <div class="col-xs-2">  
    </div>
    <!--end title-->

    <!--image post-->
    <div class="col-xs-12">
        <img class="img-responsive post" src="../../img/posts/{{$post->img}}" alt=""/>
        <br>
    </div>
    <!--end image post-->

    <!-- post body-->
    <div class="col-xs-12">
        <p class="lead">{{$post->body}}.
        </p>

    </div>
    @if(Auth::check())
    <div class="col-xs-12">
        <div class="col-xs-12 btn-group group" role="group" aria-label="Basic example">

            <a id="like" data-user="{{Auth::user()->id}}" data-post="{{$post->id}}" type="button" class="btn btn-default responsive-btn">
                @if($checklikes=="found")
                <i style="color:blue" class="fa fa-heart" aria-hidden="true"></i> 
                <span style="color:blue" id="num-like"> {{$like}}</span>
                @else
                <i class="fa fa-heart-o" aria-hidden="true"></i> 
                <span id="num-like"> {{$like}}</span>
                @endif
            </a>
            <a  id="commint" type="button" class="btn btn-default responsive-btn"><i class="fa fa-comments-o" aria-hidden="true"></i> <span id="num-commint">{{$numb_commint}}</span></a>



        </div>
    </div>
    @else
    <div class="col-xs-12">
        <div class="col-xs-12 btn-group group" role="group" aria-label="Basic example">

            <a id="like"  type="button" class="btn btn-default responsive-btn"><i class="fa fa-heart-o" aria-hidden="true"></i> <span id="num-like"> {{$like}}</span></a>
            <a  id="commint" type="button" class="btn btn-default responsive-btn"><i class="fa fa-comments-o" aria-hidden="true"></i> <span id="num-commint">{{$numb_commint}}</span></a>

        </div>
    </div>
    @endif
    <div class="col-xs-12">

        <br>

        <div class="commint">
            @foreach($commints as $commint)

            <div class="lead commint-style {{$commint->id}}">
                <div class="pull-left">
                    {{$commint->users->name}}
                </div>
                <div class="pull-right">
                    <small>{{$commint->created_at}} <i class="fa fa-clock-o" aria-hidden="true"></i> </small>
                </div>
                <br>
                <span>{{$commint->commint}} </span>
            </div>
            @endforeach
        </div>
        @if(Auth::check())
        <form  class="form-commint"  action="/commint" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="post_id" value="{{$post->id}}"/>
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}"/>
            <input id="uname" type="hidden" name="user_name" value="{{Auth::user()->name}}"/>
            <input id="uid" type="hidden" name="user_id" value="{{Auth::user()->id}}"/>
            <textarea id="textarea"  name="commint" class="form-control" placeholder="add commint..."></textarea>

            <br>
            <button  class="btn btn-default" type="submit">
                <i class="fa fa-paper-plane-o" aria-hidden="true"></i>
            </button>
        </form>
        @endif   
    </div>

</div>


<!-- end post body-->

@stop
