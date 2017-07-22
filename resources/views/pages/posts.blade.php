@extends('master')
@section('content')


<!-- Blog Post -->
<div class="posts-content">
    <br>
    <span class="lead title"><i class="fa fa-home" aria-hidden="true"></i> {{$title}} </span>
    <hr>
    @foreach($posts as $row)
    <div class="row wow fadeInUp" data-wow-offset="250">
        <!--title-->
        <div class="col-xs-10 lead">   
            <b>{{$row->title}}</b><small class="gray"> {{$row->departments->name}}</small><br>
            <small>{{$row->created_at}}</small>  <span class="gray">by</span> <i class="fa fa-user" aria-hidden="true"></i>

            {{$row->users->name}}
        </div>

        <!--end title-->

        <!--image post-->
        <div class="col-xs-12">
            <img class="img-responsive post" src="../img/posts/{{$row->img}}" alt=""/>
            <br>
        </div>
        <!--end image post-->

        <!-- post body-->
        <div class="col-xs-12">
            <p class="lead">{{substr($row->body, 1, 210)}}...
                @if(Auth::check()) 
                <a  href="../post/{{Auth::user()->id}}/{{$row->id}}">Read More </a>
                @else
                <a  href="../post/0/{{$row->id}}">Read More </a>
                @endif
            </p>

        </div>



    </div>

    <hr>

    @endforeach
    <!-- end post body-->
</div>
@stop
