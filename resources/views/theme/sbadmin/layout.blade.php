<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
   
    <title>SIGA | Bienvenido</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset("assets/$theme/vendor/fontawesome-free/css/all.min.css")}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset("assets/$theme/css/sb-admin-2.min.css")}}" rel="stylesheet">
    {{-- Notificaciones Visuales --}}
    <link rel="stylesheet" href="{{asset("css/toastr/toastr.min.css")}}">
    
    {{--  Selectpicker  --}}
    <link href="{{asset("assets/$theme/vendor/bootstrap-select/bootstrap-select.min.css")}}" rel="stylesheet">   
    {{-- DataTables --}}
    <link href="{{asset("assets/$theme/vendor/datatables/dataTables.bootstrap4.min.css")}}" rel="stylesheet">
    {{-- Incluye Estilos como el Toogle de Bootstrap --}}
    <link href="{{asset("css/bootstrap-toggle/bootstrap-toggle.min.css")}}"  rel="stylesheet">  

    @yield("styles")
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        {{-- Aside --}}
        @include("theme.$theme.aside")


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                {{-- Navbar --}}
                @include("theme.$theme.navbar")

                <div class="container-fluid">


                    
                   {{-- Titulo --}}
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">
                            @yield('title')
                        </h1>
                      </div>
                    
                    {{-- Contenido --}}
                    @yield('content')
                   

                </div>

                {{-- Footer --}}
                @include("theme.$theme.footer")

            </div>
            <!-- End of Page Wrapper -->
        </div>

    </div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    {{-- Logout Modal --}}
    @include("theme.$theme.logout")


    <!-- Bootstrap core JavaScript-->
    <script src="{{asset("assets/$theme/vendor/jquery/jquery.min.js")}}"></script>

        {{-- Librerías para las notificaciones, para el delete y mostrar mensaje superior derecho verde --}}
    <script src="{{asset("js/sweet-alert/sweetalert.min.js")}}"></script>
    <script src="{{asset("js/toastr/toastr.min.js")}}"></script>
    
    <script src="{{asset("assets/$theme/vendor/bootstrap/js/bootstrap.bundle.min.js")}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset("assets/$theme/vendor/jquery-easing/jquery.easing.min.js")}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset("assets/$theme/js/sb-admin-2.min.js")}}"></script>

    {{--  Selectpicker  --}}
    <script src="{{asset("assets/$theme/vendor/bootstrap-select/bootstrap-select.min.js")}}" ></script> 
    {{-- Datatables JS --}}
    <script src="{{asset("assets/$theme/vendor/datatables/jquery.dataTables.min.js")}}"></script>
    <script src="{{asset("assets/$theme/vendor/datatables/dataTables.bootstrap4.min.js")}}"></script>
    <script src="{{asset("assets/$theme/js/demo/datatables-demo.js")}}"></script>
    <script src="{{asset("js/funciones.js")}}"></script>
    <script src="{{asset("js/bootstrap-toggle/bootstrap-toggle.min.js")}}"></script>

    @yield("scripts")

</body>

</html>