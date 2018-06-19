@extends('admin.plantilla.plantilla')

@section('title', 'Numeros de emergencia')

@section('contenido')

	<div class="row">
		@include('flash::message')
	</div>

	<div class="row white">
		<div class="">
			<span>Registrar numero de emergencia</span>
			{!! Form::open(['route'	=>	'numem.store', 'method'	=>	'POST', 'class'	=>	'col s12']) !!}
				<div class="row">
					<div class="input-field col s12">
						{!! Form::text('nombreDependencia', null, ['required', 'class'	=> '']) !!}
						{!! Form::label('nombreDependencia', 'Nombre de la dependencia', ['class'	=>	'']) !!}
					</div>

					<div class="input-field col s12">
						{!! Form::text('telefono', null, ['required', 'class'	=>	'']) !!}
						{!! Form::label('telefono', 'Número de telefono', ['class'	=>	'']) !!}
					</div>
				</div>

				{!! Form::button('Registrar número', ['type'	=>	'submit', 'class'	=>	'waves-effect waves-light btn']) !!}

			{!! Form::close() !!}
		</div>
	</div>

	{{-- <div class="row white">
		@if (session('status'))
	    <div class="alert alert-success">
	        {{ session('status') }}
	    </div>
		@endif
	</div> --}}
@endsection