
<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SIGA RIOPAILA - Recuperar contraseña</title>

  <!-- Custom fonts for this template-->
  <link href="{{asset("assets/$theme/vendor/fontawesome-free/css/all.min.css")}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset("assets/$theme/css/sb-admin-2.min.css")}}" rel="stylesheet">

</head>

<body class="bg-gray-100">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">

            {{-- Estatus de sesión --}}
            @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-2">Olvidó su contraseña?</h1>
                    <p class="mb-4">Ingrese el correo administrativo para enviarle un link de recuperación</p>
                  </div>
                  <form class="user" method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                      @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                    </div>
                    

                    <button type="submit" class="btn btn-danger btn-user btn-block">
                        Enviar Link Renovación de Contraseña
                    </button>

                  

                  </form>
                  <hr>

                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{asset("assets/$theme/vendor/jquery/jquery.min.js")}}"></script>
  <script src="{{asset("assets/$theme/vendor/bootstrap/js/bootstrap.bundle.min.js")}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset("assets/$theme/vendor/jquery-easing/jquery.easing.min.js")}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset("assets/$theme/js/sb-admin-2.min.js")}}"></script>

</body>

</html>
