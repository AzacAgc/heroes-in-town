<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>@yield('titulo', 'Default') | Heroes In Town</title>

	<link rel="stylesheet" href="{{asset('css/materialize.min.css')}}">
  	<link href="{{asset('css/iconsMaterialDesing.css')}}" rel="stylesheet">
  	@yield('estilo', '')
</head>
<body>

	@yield('contenido-pagina')


	<div class="row">
	  <div class="col l12 m12 s12">
    	<footer class="page-foote">
    		<div class="footer-copyright">
          <div class="container white-text">
          	© 2017 Copyright QuetzSoft
          	<a class="right white-text" href="#!">Documentación</a>
          </div>
      	</div>
	    </footer>
	  </div>
	</div>

	<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
	<script src="{{ asset('js/materialize.min.js') }}"></script>
	<script src="{{ asset('js/alerts.js') }}"></script>
	@yield('js')
</body>
</html>