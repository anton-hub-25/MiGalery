<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ADV</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">
    <link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.png')}}">
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">

    <!------------------------------------------------------------------------------------
     Se incorporara nuevos enlaces de estilos en esta seccion definida en plantillas blade. 
    -------------------------------------------------------------------------------------->
     @yield('css')

  </head>
  <body class="hold-transition skin-blue sidebar-mini">

    <!----------------------------------------------------------------------------
    *                     Cabecera del menu principal.
    *----------------------------------------------------------------------------->
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="{{url('galeria/imagen')}}" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>AD</b>V</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>SISTEMA ADV</b></span>
        </a>

        <!-- #### Navbar que muestra al usuario logeado al sistema. ####-->
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>

          
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              

                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <small class="bg-green">Online</small>
                    <span class="hidden-xs">Usuario: {{ Auth::user()->name }}</span>
                  </a>
                  <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">       
                      <p>
                        Sistema de Galeria ADV
                        <small>www.youtube.com/tutoriales</small>
                      </p>
                    </li>
                    
                    <!-- Menu Footer-->
                    <li class="user-footer">
                      
                      <div class="pull-right">
                        <!-- Cierra la session.-->                
                          <a class="dropdown-item btn btn-default btn-flat" href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Cerrar session') }}
                          </a>
                          <form id="logout-form" action="{{route('logout') }}" method="POST" class="d-none">
                                        @csrf
                          </form>                        
                      </div>
                    </li>
                  </ul>
                </li>
              
            </ul>
          </div>
          
        </nav>
        <!-- #### Fin del Navbar ##### -->
      </header>

      <!----------------------------------------------------------------------------
      *        Side que muestra los modulos de sus gestion del sistema.
      *----------------------------------------------------------------------------->

      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
                    
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Mod. Parametros</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('parametros/categoria')}}"><i class="fa fa-circle-o"></i> Categoria de imagenes</a></li>
                <li><a href="{{url('parametros/tag')}}"><i class="fa fa-circle-o"></i> Tags de imagenes</a></li>
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-th"></i>
                <span>Mod. Galeria</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('galeria/imagen')}}"><i class="fa fa-circle-o"></i> Gestion de imagenes</a>
                </li>      
              </ul>
            </li>
               
            <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Seguridad</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="configuracion/usuario"><i class="fa fa-circle-o"></i>Usuarios</a></li>             
              </ul>
            </li>

             <li>
              <a href="#">
                <i class="fa fa-plus-square"></i> <span>Ayuda</span>
                <small class="label pull-right bg-red">PDF</small>
              </a>
            </li>

            <li>
              <a href="#">
                <i class="fa fa-info-circle"></i> <span>Acerca De...</span>
                <small class="label pull-right bg-yellow">IT</small>
              </a>
            </li>
                        
          </ul>
        </section>
        <!-- Fin del sidebar -->
      </aside>

      <!----------------------------------------------------------------------------
      *      Contenedor que mostrara el contenido de cada plantilla gestionar.
      *----------------------------------------------------------------------------->

       <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        
        <!-- Main content -->
        <section class="content">
          
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Sistema ADV</h3>
                  <div class="box-tools pull-right">
                    <!--Estos botones minimizar, maximizan y cierra el formulario.-->
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>           
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                    <!--  Fin de los botones  -->
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  	<div class="row">
	                  	<div class="col-md-12">
		                      <!----------------------------------------------------
                                Aqui va la seccion que se incrustara de otras
                                plantillas blade.
                          ---------------------------------------------------->
                              @yield('contenido')
		                          <!--Fin Contenido-->
                           </div>
                        </div><!-- /.row -->
                  		</div><!-- /.box-body -->
                  	</div><!-- /.box -->
                </div><!-- /.col-md-12 -->
              
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!--Fin-Contenido-->

  </div><!--Fin-wrapper-->



      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.5.0
        </div>
        <strong>Copyright &copy; 2015-2050 <a href="#">Galeria de imagenes ADV</a>.</strong> Todos los derechos reservados.
      </footer>




      
    <!-- jQuery 2.1.4 -->
    <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('js/app.min.js')}}"></script>
    

    <!------------------------------------------------------------------------------------
        Seccion que enlaza los escripts creados en la plantilla galeria\imagen\create.blade.php
      ------------------------------------------------------------------------------------>
    @stack('scripts')

  </body>
</html>
