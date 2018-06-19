<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>@yield('title') | Admininistrador | Heroes In Town</title>

	<link rel="stylesheet" href="{{asset('css/materialize.css')}}">
	<link href="{{asset('css/iconsMaterialDesing.css')}}" rel="stylesheet">

	<style type="text/css">
      html, body { height: 100%; }
  </style>
</head>

<body class="#8d6e63 brown lighten-1">

  {{-- Menú lateral --}}
  <ul id="slide-out" class="side-nav">
    <li>
      <div class="center-align">
        <a href="#image" class="brand-logo center" style="height: 100px;"><img class="circle" src="{{ Auth::user()->avatar }}""></a>
      </div>
    </li>
    <li>
      <a href="#!user" class="waves-effect">
        <i class="material-icons">perm_identity</i> {{ Auth::user()->name }}
      </a>
    </li>
    <li><div class="divider"></div></li>
    <li><a class="waves-effect" href="#!">Mapa</a></li>
    <li><a class="waves-effect" href="#!">Estadística</a></li>
    <li><a class="waves-effect" href="#numerosEmergerncia">Números de emergencia</a></li>
    <li><a class="waves-effect" href="#ayuda">Ayuda</a></li>
    <li><a class="waves-effect" href="#acercade">Acerca de </a></li>
    <li>
      <a class="waves-effect" href="{{ route('logout') }}"
      onclick="event.preventDefault();
      document.getElementById('logout-form').submit();">Cerrar sesión</a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
      </form>
    </li>
  </ul>

  <h4>
    <a href="#" data-activates="slide-out" class="button-collapse white-text left-align"><i class="small material-icons left">menu</i>Menú</a>
    <div class="right">
      <a href="#!"><i class="small material-icons right-align red-text">message</i></a>
      <a href="#!"><i class="small material-icons right-align white-text">new_releases</i></a>
    </div>
  </h4>
  {{-- Menú lateral - Fin --}}

@section('contenido')

@show

<!-- Modal Structure Numeros de emrgencia -->
  <div id="numerosEmergerncia" class="modal">
    <div class="modal-content">
      <h4>Números de emergencia</h4>
      <div class="row">
        <div class="col l4">
          <center>
            <img src="{{asset('imagenes/cruzroja.jpg')}}" style="width: 50%">
          </center>
        </div>
        <div class="col l4">
          <center>
            <img src="{{asset('imagenes/bomberos.jpg')}}"  style="width: 50%" >
          </center>
        </div>
        <div class="col l4">
          <center>
            <img src="{{asset('imagenes/policia.png')}}"  style="width: 50%">
          </center>
        </div>
      </div>

      <div class="row">
        <div class="col l4">
          <center>
            <img src="{{asset('imagenes/emergencia.jpg')}}" style="width: 50%">
          </center>
        </div>
        <div class="col l4">
          <center>
            <img src="{{asset('imagenes/hospital.png')}}"  style="width: 50%" >
          </center>
        </div>
        <div class="col l4">
          <center>
            <img src="{{asset('imagenes/gruas.png')}}"  style="width: 50%">
          </center>
        </div>
      </div>
    </div>
  </div>


  <!-- Modal Structure Ayuda -->
  <div id="ayuda" class="modal">
    <div class="modal-content">
      <h4>Ayuda</h4>
      <div class="row">
        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
      </div>
      <div class="divider"></div>
      <div class="row">
        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
      </div>
    </div>
  </div>


  <!-- Modal Structure Acerca de -->
  <div id="acercade" class="modal">
    <div class="modal-content">
      <h4>Acerca de</h4>
      <div class="row">
          Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.
      </div>
    </div>
  </div>


  <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
  <script src="{{asset('js/materialize.min.js')}}"></script>
  <script src="{{asset('js/alerts.js')}}"></script>

  <script type="text/javascript">

    $(".button-collapse").sideNav();

    $(document).ready(function(){
    $('.modal').modal();

    });

     $('.datepicker').pickadate({
      selectMonths: true, // Creates a dropdown to control month
      selectYears: 15 // Creates a dropdown of 15 years to control year
    });

     $('.timepicker').pickatime({
      default: 'now', // Set default time
      fromnow: 0,       // set default time to * milliseconds from now (using with default = 'now')
      twelvehour: false, // Use AM/PM or 24-hour format
      donetext: 'OK', // text for done-button
      cleartext: 'Clear', // text for clear-button
      canceltext: 'Cancel', // Text for cancel-button
      autoclose: false, // automatic close timepicker
      ampmclickable: true, // make AM PM clickable
      aftershow: function(){} //Function for after opening timepicker
    });

     $(".dropdown-button").dropdown();
  </script>

</body>
</html>
