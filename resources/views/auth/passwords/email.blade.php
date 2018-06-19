@extends('accesar.plantilla.plantilla')

@section('titulo', 'Restablecer contraseña')

@section('estilo')
<link href="{{asset('css/estilosPropios_recuperar.css')}}" rel="stylesheet">
@endsection

@section('contenido-pagina')

<div class="row">
  {{-- <a href="{{ route('ingresar') }}" title="Inicio">
    <img src="{{ asset('imagenes/edificio.png') }}" class="col l2 hide-on-med-and-down" >
  </a> --}}
  <center>
    <h3 class="col s10 offset-s1 m7 offset-m3 l5 offset-l3 #795548 brown darken-1 white-text z-depth-4" style="border-radius: 5px">
      <center>
        Restablecer contraseña<i class="medium material-icons right">cached</i>
      </center>
    </h3>
  </center>
</div>

<div class="row">

  <div class="col l5">
    <div class="section hide-on-med-and-down"></div>
    <div class="section"></div>

    <div class="card hide-on-med-and-down" style=" background: rgba(140, 70, 49, 0.7); border-radius: 10px;">

      <div class="card-content white-text">
        <span class="card-title" style="font-size: 25px;"> <b>Restablecer contraseña</b> </span>
        <div class="section"></div>

        <p style="font-size: 18px; text-align: justify;">
          <b>Indicaciones</b> <br>
          1. Ingrese el correo electrónico con el que se registro <br>
          2. De clic en el botón "Enviarme correo de recuperación" <br>
          3. Revise su coreo electrónico  <br>
          4. Siga las instrucciones que vienen en el correo <br>
        </p>
      </div>

    </div>
  </div>

  <div class="col l6 m8 offset-m2 s12">
    <div class="col l5 m3 offset-s3"></div>
      <a href="{{ route('ingresar') }}" title="Inicio">
        <img class="responsive-img" width="35%" src="{{asset('imagenes/edificio.png')}}">
      </a>
      <div class="section"></div>

      <div class="col s10 offset-s1 l10 offset-l2 #d7ccc8 brown lighten-5" style="border-radius: 15px;">

        @if (session('status'))
        <div class="card-panel green lighten-4 green-text text-darken-4">
          {{ session('status') }}
        </div>
        @endif

        <div class="section"></div>

        <form id="form-reset" method="POST" action="{{ route('password.email') }}">
          {{ csrf_field() }}

          <div class="row">
            <div class="input-field col l12 m12 s12">
              <i class="material-icons prefix">email</i>

              <input id="email" type="email" name="email" value="{{ old('email') }}" class="validate" required>
              <label for="email" data-error="Correo inválido" data-success="Correo electrónico valido">Correo electrónico</label>

              @if ($errors->has('email'))
              <div class="card-panel red lighten-4 red-text text-darken-4">
                <strong>{{ $errors->first('email') }}</strong>
              </div>
              @endif
            </div>
          </div>

        </form>

        <div class="section"></div>

        <div class="row">
          <center>
            <button id="btn-reset" class="btn waves-effect waves-light #795548 brown darken-1">
              Enviarme correo de recuperación <i class="material-icons right">send</i>
            </button>
          </center>
        </div>

      </div>  {{-- row style form --}}
    </div>  {{-- col l6 m8 offset-m2 s12 --}}
  {{-- </div> --}}
</div>

<div class="section"></div>
@endsection

@section('js')
  <script type="text/javascript">
    $('#btn-reset').click(function() {
      $('#form-reset').submit();
    });
  </script>
@endsection
