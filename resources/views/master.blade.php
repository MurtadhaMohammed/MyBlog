<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>myBlog</title>


        <!-- Bootstrap Core CSS -->
        <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="{{ asset('css/blog-home.css')}}" rel="stylesheet">
        <link href="{{ asset('css/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{ asset('css/animate.css')}}" rel="stylesheet">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand wow tada" href="/">
                        <img src="../../img/logo.png"/>
                    </a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


                    <ul class="nav navbar-nav navbar-right">

                        <li>
                            <a class="Home" href="/">Home</a>
                        </li>
                        @if(Auth::check())
                        @if(Auth::user()->hasRole('Admin'))
                        <li>
                            <a href="/control">Control</a>
                        </li>
                        @endif
                        @endif

                        <li>
                            <a href="#">About</a>
                        </li>

                        @if(Auth::check())
                        <li>
                            <a  class="profile" href="/user/{{Auth::user()->id}}"><i class="fa fa-user" aria-hidden="true"></i> {{Auth::user()->name}}</a>
                        </li>
                        <li>
                            <a id="auth"  href="/logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
                        </li>
                        @else
                        <li>
                            <a id="auth" class="login" href="/login" ><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
                        </li>
                        <li>
                            <a id="auth" class="register" href="/register"><i class="fa fa-user-plus" aria-hidden="true"></i> Register</a>
                        </li>
                        @endif

                    </ul>

                </div>


                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>

        <!-- Page Content -->

        <div class="container">
            <div class="row">
                <!-- Blog Entries Column -->
                <div class="col-md-8">        
                    @yield('content')

                </div>







                <!-- Blog Sidebar Widgets Column -->
                <div class="col-md-4">

                    <!-- Blog Search Well -->
                    <div class="well shadow search">
                        <h4>Blog Search</h4>
                        <form id="search" action="/search" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="input-group">
                                <input name="value" type="serach" class="form-control input-search">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                        <span class="glyphicon glyphicon-search"></span>
                                    </button>
                                </span>
                            </div>
                        </form>
                        <!-- /.input-group -->
                    </div>

                    <!-- Blog Categories Well -->
                    <div class="well shadow">
                        <h4>Blog Categories</h4>
                        <div class="row">
                            <div class="col-lg-12">
                                <ul class="list-unstyled">
                                    @foreach($dep as $row)
                                    <li><a href="/dep/{{$row->name}}">
                                            {{$row->name}}
                                        </a>
                                    </li>
                                    @endforeach
                                    <br>
                                    @if(Auth::check())
                                    @if(Auth::user()->hasRole('Admin'))
                                    <form action="../add-dep" method="POST" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="input-group">
                                            <input name="name" class="form-control" placeholder="add new category..." type="text">
                                            <span class="input-group-btn">
                                                <button class="btn btn-success" type="submit">Add</button>
                                            </span>
                                        </div>
                                    </form>
                                    @endif
                                    @endif


                                </ul>
                            </div>
                            <!-- /.col-lg-126 -->

                        </div>
                        <!-- /.row -->
                    </div>

                    <!-- Side Widget Well -->
                    <div class="well shadow">
                        <h4>Side Widget Well</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                    </div>

                </div>

            </div>
            <!-- /.row -->

            <hr>

            <!-- Footer -->
            <footer>
                <div class="row">
                    <div class="col-lg-12">
                        <p>Copyright &copy; Your Website 2014</p>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </footer>

        </div>
        <!-- /.container -->

        <!-- jQuery -->
        <script src="{{ asset('js/jquery.js')}}"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="{{ asset('js/bootstrap.min.js')}}"></script>
        <script src="{{ asset('js/plugin.js')}}"></script>
        <script src="{{ asset('js/wow.min.js')}}"></script>
        <script>new WOW().init();</script>


    </body>

</html>
