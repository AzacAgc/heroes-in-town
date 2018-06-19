@extends('accesar.plantilla.plantilla')

@section('titulo', 'Registrarse')

@section('estilo')
<link href="{{asset('css/estilosPropios_registro.css')}}" rel="stylesheet">
@endsection

@section('contenido-pagina')
<div class="row">
		<a href="{{ route('ingresar') }}" title="Inicio">
			<img src="imagenes/edificio.png" class="col l2 hide-on-med-and-down" >
		</a>
  	<center>
  		<h2 class="col s10 offset-s1 m7 offset-m3 l4 offset-l2 #795548 brown darken-1 white-text z-depth-4" style="border-radius: 5px"><center>Registro<i class="medium material-icons right">assignment</i></center> </h2>
		</center>
	</div>

	<div class="row">

		<div class="col l6">
			<div class="card hide-on-med-and-down" style=" background: rgba(140, 70, 49, 0.7); border-radius: 10px;">
				<div class="card-content white-text">
					<span class="card-title" style="font-size: 35px;"><center> <b>Aviso</b></center></span>
					<div class="section"></div>

					<p style="font-size: 18px; text-align: justify; ">No somos parte de las autoridades, por lo que no mandaremos policias o seguridad extra en su comunidad, no enfocamos en ayudar mutuamente para prevenir lugares y exponerlos para que las autoridades especializadas tomen las medidas.</p>
				</div>
			</div>
  	</div>

		<div class="col l6 m12 s12">
			<div class="row">

				<form action="{{ route('register') }}"  method="POST" class="col m10 offset-m1 s12 l10 offset-l1 #d7ccc8 brown lighten-5" style="border-radius: 10px;">
					{{ csrf_field() }}

				<div class="row">
    				<div class="input-field col l12 m12 s12">
							<i class="material-icons prefix">face</i>
							<label for="name">Nombre de usuario</label>

							<input id="name" type="text" name="name" value="{{ old('name') }}" required>

							@if ($errors->has('name'))
							<div class="card-panel red lighten-4 red-text text-darken-4">
								<strong>{{ $errors->first('name') }}</strong>
							</div>
							@endif
    				</div>
    			</div>

				<div class="row">
    				<div class="input-field col l12 m12 s12">
      				<i class="material-icons prefix">email</i>

							<label for="email">Correo electrónico</label>
							<input id="email" type="email" class="validate" name="email" value="{{ old('email') }}" required>

							@if ($errors->has('email'))
							<div class="card-panel red lighten-4 red-text text-darken-4">
								<strong>{{ $errors->first('email') }}</strong>
							</div>
							@endif
	        	</div>
	        </div>

					<div class="row">
    				<div class="input-field col l12 s12">
      				<i class="material-icons prefix">lock</i>

							<label for="password">Contraseña</label>
							<input id="password" type="password" name="password" required>

							@if ($errors->has('password'))
							<div class="card-panel red lighten-4 red-text text-darken-4">
								<strong>{{ $errors->first('password') }}</strong>
							</div>
							@endif
      			</div>
      		</div>

					<div class="row">
    				<div class="input-field col l12 m12 s12">
      				<i class="material-icons prefix">lock</i>

							<label for="password-confirm">Confirmar contraseña</label>
							<input id="password-confirm" type="password" name="password_confirmation" required>
						</div>
					</div>

					<div class="row">
						<center>
							<button type="submit" class="btn waves-effect waves-light #795548 brown darken-1">
								Registrarse <i class="material-icons right">person_add</i>
							</button>
						</center>
					</div>

				</form>
		</div>  {{-- row --}}
	</div>  {{-- col l6 m12 s12 --}}
</div>	{{-- row --}}
@endsection

@section('js')
<script src="{{ asset('js/compararpass.js') }}"></script>
@endsection
