<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>@yield('title') | Heroes In Town</title>

	<link rel="stylesheet" href="{{asset('css/materialize.css')}}">
	<link href="{{asset('css/iconsMaterialDesing.css')}}" rel="stylesheet">

	<style type="text/css">
      html, body { height: 100%; }
      #map { width: 100%; height: 100%; }
    </style>
    @yield('mapa')
</head>

<body class="#8d6e63 brown lighten-1">

  {{-- Menú lateral --}}
  <ul id="slide-out" class="side-nav">
    <li>
      @if ( is_null(Auth::user()->avatar) )
        <div class="center-align">
          <br>
          <img class="responsive-img" width="50%" src="{{ asset('imagenes/edificio.png') }}" />
        </div>
      @else
        <div class="center-align">
          <br>
          <a href="#image" class="brand-logo center" style="height: 100px;"><img class="circle" src="{{ Auth::user()->avatar }}"></a>
        </div>
      @endif
    </li>
    <li>
      <a href="#perfil" class="waves-effect modal-trigger" data-target="perfil">
        <i class="material-icons">person_pin</i> {{ Auth::user()->name }}
      </a>
    </li>
    <li><div class="divider"></div></li>
    <li><a class="waves-effect modal-trigger" data-target="estadisticas" href="#estadisticas"><i class="small material-icons">assessment</i> Estadística</a></li>
    <li><a class="waves-effect modal-trigger" data-target="numerosEmergerncia" href="#numerosEmergerncia"><i class="small material-icons">list</i> Números de emergencia</a></li>
    <li><a class="waves-effect modal-trigger" data-target="ayuda" href="#ayuda"> <i class="small material-icons">help_outline</i> Ayuda</a></li>
    <li><a class="waves-effect modal-trigger" data-target="acercade" href="#acercade"><i class="small material-icons">info_outline</i> Acerca de </a></li>
    <li>
      <a class="waves-effect" href="{{ route('logout') }}"
      onclick="event.preventDefault();
      document.getElementById('logout-form').submit();"> <i class="small material-icons">exit_to_app</i> Cerrar sesión</a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
      </form>
    </li>
  </ul>

  <h4>
    <a href="#" data-activates="slide-out" class="button-collapse white-text"><i class="small material-icons left">menu</i>Menú</a>
    {{-- <div class="right">
      <a href="#!"><i class="medium material-icons right-align red-text">message</i></a>
      <a href="#!"><i class="medium material-icons right-align white-text">new_releases</i></a>
    </div> --}}
  </h4>
  {{-- Menú lateral - Fin --}}

@section('Contendio')

@show

    <!-- Modal Structure perfil -->
  <div id="perfil" class="modal">
    <div class="modal-content">
      <h4>Perfil</h4>
      <div class="row">
        <div class="valign-wrapper">
          <i class="material-icons small">person_pin</i> <strong>{{ Auth::user()->name }}</strong>
        </div>
          <p class="right-align">Total de denuncias: <b><span id="totalDen">#</span></b> </p>
        <hr>
      </div>
      <h5>Denuncias registradas</h5>
      <div>
        <center>
          <table border="1 px">
            <tr>
              <td>
                <center>
                  <img src="{{asset('imagenes/casa0.png')}}" style="width: 20%;">
                  <p>Allanamiento de casa</p>
                  <hr>
                  <b><span id="cantAll">#</span></b>
                </center>
              </td>
              <td>
                 <center>
                  <img src="{{asset('imagenes/social0.png')}}" style="width: 20%;">
                  <p>Delito social</p>
                  <hr>
                  <b><span id="cantDS">#</span></b>
                </center>
              </td>
              <td>
                <center>
                  <img src="{{asset('imagenes/robo0.png')}}" style="width: 20%;">
                  <p>Asalto</p>
                  <hr>
                  <b><span id="cantAs">#</span></b>
                </center>
              </td>
            </tr>
            <tr>
              <td>
                <center>
                  <img src="{{asset('imagenes/carro0.png')}}" style="width: 22%;">
                  <p>Robo a vehículo</p>
                  <hr>
                  <b><span id="cantRobo">#</span></b>
                </center>
              </td>
              <td>
                 <center>
                  <img src="{{asset('imagenes/calavera0.png')}}" style="width: 22%;">
                  <p>Homicidio</p>
                  <hr>
                  <b><span id="cantHom">#</span></b>
                </center>
              </td>
              <td>
                <center>
                  <img src="{{asset('imagenes/otros0.png')}}" style="width: 21%;">
                  <p>Otros</p>
                  <hr>
                  <b><span id="cantOtro">#</span></b>
                </center>
              </td>
            </tr>
          </table>
        </center>
      </div>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-light btn-flat #6d4c41 brown darken-1 white-text">Cerrar</a>
    </div>
  </div>

  <!-- Modal Structure estadisticas -->
  <div id="estadisticas" class="modal">
    <div class="modal-content">
      <h4>Estadísticas</h4>
      <p>Aquí se muestran la cantidad total de denuncias que se tienen registradas en total.</p>
      <div class="row">
        <canvas id="myChart" width="400" height="400"></canvas>
      </div>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-light btn-flat #6d4c41 brown darken-1 white-text">Cerrar</a>
    </div>
  </div>

  <!-- Modal Structure Numeros de emrgencia -->
  <div id="numerosEmergerncia" class="modal">
    <div class="modal-content">
      <h4>Números de emergencia</h4>
      <div class="row">
        <div class="col l4">
          <center>
            <br>
            <img src="{{asset('imagenes/cruzroja.jpg')}}" style="width: 50%">
            <hr>
            <b>(246) 462 0920</b>
          </center>
        </div>
        <div class="col l4">
          <center>
            <b>Bomberos</b> <br>
            <img src="{{asset('imagenes/bomberos.jpg')}}"  style="width: 53%" >
            <hr>
            <b>46 4 07 79</b>
          </center>
        </div>
        <div class="col l4">
          <center>
            <br>
            <img src="{{asset('imagenes/policia.png')}}"  style="width: 51%">
            <hr>
            <b>46 8 00 09</b>
          </center>
        </div>
      </div>

      <div class="row">
        <div class="col l4">
          <center>
            <br>
            <img src="{{asset('imagenes/911.jpg')}}" style="width: 50%">
            <br><br>
            <hr>
            <b>911</b>
          </center>
        </div>
        <div class="col l4">
          <center>
            <img src="{{asset('imagenes/proteccion-civil.jpg')}}"  style="width: 50%" >
            <hr>
            <b>46 2 54 79</b>
          </center>
        </div>
        <div class="col l4">
          <center>
            <img src="{{asset('imagenes/angeles-verdes.jpg')}}"  style="width: 51%">
            <hr>
            <b>46 2 36 06</b>
          </center>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-light btn-flat #6d4c41 brown darken-1 white-text">Cerrar</a>
    </div>
  </div>

  <!-- Modal Structure Ayuda -->
  <div id="ayuda" class="modal">
    <div class="modal-content">
      <h4>Ayuda</h4>
      <h5>Guía de uso</h5>
      <div class="row">
        <b>Paso 1: </b>Buscar el lugar en donde ocurrió el delito. <br>
        <img src="{{asset('imagenes/guia/paso1.jpg')}}"  style="width: 90%">
        <hr>
        <b>Paso 2: </b>Dar clic sobre el lugar deseado, ya que ahí se realizará el registro de la denuncia. <br>
        <img src="{{asset('imagenes/guia/paso2.jpg')}}"  style="width: 90%">
        <hr>
        <b>Paso 3: </b>Se abrirá la venta de los delitos y tú debes seleccionar el delito ocurrido. <br>
        <img src="{{asset('imagenes/guia/paso3.jpg')}}"  style="width: 90%">
        <hr>
        <b>Paso 4: </b>Se abrirá otra venta en la cual tú debes llenar los datos de la denuncia que has seleccionado. <br>
        <img src="{{asset('imagenes/guia/paso4.jpg')}}"  style="width: 90%">
        <hr>
        <b>Paso 5: </b>Ahora ya estaría lista la información de tu denuncia. <br>
        <img src="{{asset('imagenes/guia/paso5.jpg')}}"  style="width: 90%">
        <br><br>Puedes decidir si agregas a un "Presunto culpable" que tu consideres.<br>O puedes guardar la denuncia con la información que ya registraste.<br>
        <img src="{{asset('imagenes/guia/paso5_1.jpg')}}"  style="width: 90%">
        <hr>
        <b>Paso 6: </b>¡Listo! Tu denuncia se ha guardado con éxito. <br>
        <img src="{{asset('imagenes/guia/paso6.jpg')}}"  style="width: 90%">
        <br><br>Y podrá verse registrada en el mapa.<br>
        <img src="{{asset('imagenes/guia/paso6_1.jpg')}}"  style="width: 90%">
        <hr>
        <b>Paso 7 (opcional): </b>En caso de querer agregar un "Presunto culpable". Se mostrará un formulario, en donde puede agregar los datos que tenga acerca de la persona que usted considere. <br>
        <img src="{{asset('imagenes/guia/paso7.jpg')}}"  style="width: 90%">
        <hr>
        <b>Paso 8: </b>Cuando rellene la información del presunto culpable puede guardar los datos. O no, según usted lo prefiera. <br>
        <img src="{{asset('imagenes/guia/paso8.jpg')}}"  style="width: 90%">
        <hr>
        <b>Paso 9: </b>En caso de agregará algún dato de "Presunto culpable", se mostrará el siguiente mensaje. <br>
        <img src="{{asset('imagenes/guia/paso9.jpg')}}"  style="width: 90%">
        <hr>
        <b>Paso 10: </b>Ahora puede guardar la denuncia sin ningún problema. <br>Como en el <b>paso 6.</b>
        <img src="{{asset('imagenes/guia/paso10.jpg')}}"  style="width: 90%">
      </div>
      <div class="divider"></div>
      <div class="row">
        <b>Nota: </b>Por motivos de seguridad los datos del "Presunto culpable" que usted agregue no serán mostrados al público.
      </div>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-light btn-flat #6d4c41 brown darken-1 white-text">Cerrar</a>
    </div>
  </div>


  <!-- Modal Structure Acerca de -->
  <div id="acercade" class="modal">
    <div class="modal-content">
      <h4>Acerca de</h4>
      <div class="row">
        <p style="text-align: justify;">
          <b>Importante</b> <br>Aclaramos que el sitio web "Heroes In Town" no es parte de la policia o alguna otra autoridad similar. Por lo cual es un sitio web que funciona de forma independiente sin apoyos gubernamentales.
          <br><br>
          <b>Agradecimiento</b> especial a todos los usuarios que contribuyen con sus denuncias para informar a otras personas y así tomar las precauciones necesarias.
        </p>
      </div>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-light btn-flat #6d4c41 brown darken-1 white-text">Cerrar</a>
    </div>
  </div>

  <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
  <script src="{{asset('js/materialize.min.js')}}"></script>
  <script src="{{asset('js/Chart.min.js')}}"></script>
  <script src="{{asset('js/funciones.js')}}"></script>
  <script src="{{asset('js/graficas.js')}}"></script>


</body>
</html>
