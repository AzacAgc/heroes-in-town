@extends('accesar.plantilla.plantilla')

@section('titulo', 'Establecer nueva contraseña')

@section('estilo')
<link href="{{asset('css/estilosPropios_recuperar.css')}}" rel="stylesheet">
@endsection

@section('contenido-pagina')
<div class="row">
  <a href="{{ route('ingresar') }}" title="Inicio">
    <img src="{{ asset('imagenes/edificio.png') }}" class="col l2 hide-on-med-and-down" >
  </a>
  <center>
    <h3 class="col s10 offset-s1 m7 offset-m3 l4 offset-l2 #795548 brown darken-1 white-text z-depth-4" style="border-radius: 5px">
      <center>
        Nueva contraseña<i class="medium material-icons right">lock</i>
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
        <span class="card-title" style="font-size: 25px;"> <b>Registrar nueva contraseña</b> </span>
        <div class="section"></div>

        <p style="font-size: 18px; text-align: justify;">
          <b>Indicaciones</b> <br>
          1. Ingrese el correo electrónico con el que se registro <br>
          2. Ingrese su nueva contraseña <br>
          3. Confirme su nueva contraseña  <br>
          4. De clic en el botón "Cambiar contraseña" <br>
          5. ¡Listo!
        </p>
      </div>

    </div>
  </div>

  <div class="col l6 m8 offset-m2 s12">
    <div class="col l5 m3 offset-s3"></div>

      <div class="col s10 offset-s1 l10 offset-l2 #d7ccc8 brown lighten-5" style="border-radius: 15px;">

        @if (session('status'))
          <div class="card-panel green lighten-4 green-text text-darken-4">
            {{ session('status') }}
          </div>
        @endif

        <form id="form-newpass" method="POST" action="{{ route('password.request') }}">
          {{ csrf_field() }}

          <input type="hidden" name="token" value="{{ $token }}">


          <div class="row">
            <div class="input-field col l12 m12 s12">
              <i class="material-icons prefix">email</i>

              <input id="email" type="email" class="validate" name="email" value="{{ $email or old('email') }}" required autofocus>
              <label for="email" data-error="Correo inválido" data-success="Correo electrónico valido">Correo electrónico</label>

              @if ($errors->has('email'))
                <div class="card-panel red lighten-4 red-text text-darken-4">
                  <strong>{{ $errors->first('email') }}</strong>
                </div>
              @endif
            </div>
          </div>


          <div class="row">
            <div class="input-field col s12 m12 l12">
              <i class="material-icons prefix">lock</i>

              <input id="password" type="password" class="validate" name="password" required>
              <label for="password">Contraseña</label>

              @if ($errors->has('password'))
                <div class="card-panel red lighten-4 red-text text-darken-4">
                  <strong>{{ $errors->first('password') }}</strong>
                </div>
              @endif
            </div>
          </div>

          <div class="row">
            <div class="input-field col s12 m12 l12">
              <i class="material-icons prefix">lock</i>

              <input id="password-confirm" type="password" class="validate" name="password_confirmation" required>
              <label for="password-confirm">Confirmar su nueva contraseña</label>

              @if ($errors->has('password_confirmation'))
                <div class="card-panel red lighten-4 red-text text-darken-4">
                  <strong>{{ $errors->first('password_confirmation') }}</strong>
                </div>
              @endif
            </div>
          </div>

          <div class="row">
            <center>
              <button type="submit" class="btn waves-effect waves-light #795548 brown darken-1">
                Cambiar contraseña <i class="material-icons right">send</i>
              </button>
            </center>
          </div>
        </form>

      </div>  {{-- div estilo del form --}}
  </div>  {{-- col l6 m8 offset-m2 s12 --}}

</div>  {{-- div row --}}

<div class="section"></div>
@endsection
