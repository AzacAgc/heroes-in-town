@extends('accesar.plantilla.plantilla')

@section('titulo', 'Ingresar')

@section('estilo')
<link href="{{asset('css/estilosPropios_ingresar.css')}}" rel="stylesheet">
@endsection

@section('contenido-pagina')

	<div class="section"></div>

	<div class="row">

		<div class="col l5">
			<div class="section hide-on-med-and-down"></div>
			<div class="section"></div>

			<div class="card hide-on-med-and-down" style=" background: rgba(140, 70, 49, 0.7); border-radius: 10px;">
				<div class="card-content white-text">
					<span class="card-title" style="font-size: 25px;"> <b>Heroes In Town</b> </span>
					<div class="section"></div>

					<p style="font-size: 18px; text-align: justify;"> Ayuda a prevenir a los usuarios de lugares con mayor posibilidad de riesgo, así como mejorar la comunicación entre los habitantes de la misma población o región y permitir que los mismos usuarios tengan la posibilidad de señalar los lugares en que ellos consideren riesgosos o presencien un acto delictivo y que de esa manera contribuyan a mantener mejor control de la seguridad personal y social.</p>
				</div>
			</div>

			{{-- @include('flash::message') --}}

		</div>

		<div class="col l6 m8 offset-m2 s12 ">
	 		<div class="col l5 m3 offset-s3"></div>
				<img class="responsive-img" width="40%" src="{{asset('imagenes/edificio.png')}}">
	 		<div class="section"></div>

		<div class="row">

			@include('flash::message')

			<form action="{{ route('login') }}"  method="POST" id="login">
				<div class="col s10 offset-s1 l10 offset-l2 #d7ccc8 brown lighten-5" style="border-radius: 15px;">

					{{ csrf_field() }}

					<div class="row">
		    		<div class="input-field col s12 m12 l12">
		    			<i class="material-icons prefix">email</i>

							<input id="email" type="email" class="validate" name="email" value="{{ old('email') }}" required>
							<label for="email" data-error="Ingresa un correo valido" data-success="Correo valido">Correo electrónico</label>
		    		</div>
		    	</div>

					@if ($errors->has('email'))
	    			<div class="card-panel red lighten-4 red-text text-darken-4">
							<strong>{{ $errors->first('email') }}</strong>
	    			</div>
					@endif

					<div class="row">
		    		<div class="input-field col s12 m12 l12">
		    			<i class="material-icons prefix">lock</i>

						<input id="password" type="password" class="validate" name="password" required>
						<label for="password">Contraseña</label>
		    		</div>
		    	</div>

					@if ($errors->has('password'))
						<div class="card-panel red lighten-4 red-text text-darken-4">
							<strong>{{ $errors->first('password') }}</strong>
						</div>
					@endif

					{{-- <div class="row">
						<div class="col s12 m12 l12">
							<input id="remember" type="checkbox" class="filled-in" name="remember" {{ old('remember') ? 'checked' : '' }} />
		    			<label for="remember">Recordar mis datos</label>
						</div>
					</div> --}}

				</div>	{{-- div form --}}
			</form>
		</div>  {{-- row form --}}

		<div class="row">
			<a id="btn-submit" class="col s6 m4 offset-s1 m4 offset-m1 l4 offset-l2 btn waves-effect waves-light #795548 brown darken-1">
				Ingresar <i class="material-icons right">send</i>
			</a>
			<a href="{{ url('/register') }}" class="col s6 m4 offset-s2 m5 offset-m1 l4 offset-l2 btn waves-effect waves-light #795548 brown darken-1">
				Registrarse <i class="material-icons right">face</i>
			</a>
		</div>  {{-- row botones --}}

		<div class="row">
			<a class="col s8 m8 offset-s2 m18 offset-m2 l6 offset-l4 btn waves-effect waves-light #795548 brown darken-1" href="{{ route('password.request') }}"> ¿Olvidaste tu contraseña? </a>
		</div>

		<div class="row">
			<a href="{{ route('social.auth', 'facebook') }}"><img class="col l8 offset-l3 m10 offset-m1 s10 offset-s1" width="80%" src="{{asset('imagenes/face.png')}}"></a>
  	</div>
		<div class="section"></div>

	</div>  {{-- row --}}
@endsection

@section('js')
	<script type="text/javascript">
		$("#btn-submit").click( function() {
		  $("#login").submit();
		});
	</script>
@endsection