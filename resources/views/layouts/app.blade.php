<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Santiago Carvajal y Alexis Ortiz">

    <link rel="icon" type="image/gif" href="{{asset('img/unal.png')}}" />
    
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('css/sb-admin-2.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <!-- jQuery -->
    <script src="{{asset('js/jquery.js')}}"></script>

    <script src="{{asset('js/login.js')}}"></script>

    <script src="{{asset('js/main.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

    <title>Ramada App - @yield('title')</title>

    @section('head')

    @show
</head>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div >
                    <a class="navbar-brand" href="{{url('/home')}}">
                    <img src="{{asset('img/resa_color.png')}}" height="150%">
                    </a>
                    
                </div>
                
                
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                
                
                <!-- /.dropdown -->
                 @if(Auth::check())
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{ Auth::user()->name }} <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        
                        
                        <li>
                            <a href="{{url('/logout')}}"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
                @else
                <li><a data-toggle="modal" data-target="#modalLogin"><i class="fa fa-sign-in"></i> Login </a></li>
                @endif
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">

                        <li  id="side-nav-home">
                            <a href="{{url('/home')}}"><i class="fa fa-fw fa-home"></i> Home</a>
                        </li>

                        <li   id="side-nav-mapa">
                            <a href="{{url('/mapa')}}"><i class="fa fa-fw fa-map-marker"></i> Mapa</a>
                        </li>

                        @if(Auth::check())
                        <li id="side-nav-datos">
                            <a href="{{url('/datos')}}"><i class="fa fa-fw fa-database"></i> Administrar Información</a>
                        </li>
                        @endif
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">                    

                    <div class="col-lg-12 col-md-12">
                        <h1 class="page-header">
                            <!-- Dashboard <small>Statistics Overview</small> -->
                            @yield('header')
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <!-- <i class="fa fa-dashboard"></i> Dashboard-->
                                @yield('breadcrumb')
                                
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->   

                @yield('content')                

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>

    <div id="modalLogin" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <form method="post" action="/login">
                {{csrf_field()}}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><strong> Ingreso como Administrador </strong></h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="email">Correo Electrónico:</label>
                        <input required type="email" class="form-control" id="email" placeholder="Correo Electrónico" name="email">
                      </div>
                      <div class="form-group">
                        <label for="pwd">Contraseña:</label>
                        <input  required type="password" class="form-control" name="pwd">
                      </div>
                      <div class="checkbox">
                        <label><input type="checkbox" name="remember" > Recordarme</label>
                      </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">
                        <span class="glyphicon glyphicon-log-in"></span> Ingresar
                    </button>
                </div>
                </form>
            </div>

        </div>
    </div>

    <div id="modalError" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><strong> Error! </strong></h4>
                </div>
                <div class="modal-body">

                    @if($errors->any())
                    <div class="alert alert-danger">
                        <div class="row">
                            <div class="col-md-1">
                                <strong>Error!</strong>                                
                            </div>
                            <div class="col-md-11">
                                <ul id="listaDeErrores">
                                    @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                    @endforeach        
                                </ul>                                 
                            </div>
                        </div>


                    </div>
                    @endif

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Aceptar</button>
                </div>

            </div>

        </div>
    </div>

</body>
</html>