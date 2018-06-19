@extends('principal.plantilla.plantilla')

@section('title', 'Principal')

@section('mapa')
<script src="{{ asset('js/mapa.js') }}"></script>
@endsection

@section('Contendio')

	@include('flash::message')

	<div id="map"></div>

  <!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>
        Seleccione el tipo de delito
        <button class="waves-effect btn-flat modal-close right"><h6>Cerrar</h6></button>
      </h4>
      <div>
      	<center>
		      <table border="1 px">
			      <tr>
				      <td>
					      <center>
                  <a href="#casa" class="" id="open-casa"><img src="{{asset('imagenes/casa0.png')}}" style="width: 43%;"></a>
						      <p>Allanamiento de casa</p>
					      </center>
				      </td>
				      <td>
				      	 <center>
						      <a href="#social" class="" id="open-social"><img src="{{asset('imagenes/social0.png')}}" style="width: 43%;  "></a>
						      <p>Delito social</p>
					      </center>
				      </td>
				      <td>
				      	<center>
						      <a href="#asalto" class="" id="open-asalto"><img src="{{asset('imagenes/robo0.png')}}" style="width: 43%;  "></a>
						      <p>Asalto</p>
					      </center>
				      </td>
			      </tr>
			      <tr>
				      <td>
					      <center>
						      <a href="#carro" class="" id="open-carro"><img src="{{asset('imagenes/carro0.png')}}" style="width: 43%;  "></a>
						      <p>Robo a vehículo</p>
					      </center>
				      </td>
				      <td>
				      	 <center>
						      <a href="#homicidio" class="" id="open-homicidio"><img src="{{asset('imagenes/calavera0.png')}}" style="width: 43%;  "></a>
						      <p>Homicidio</p>
					      </center>
				      </td>
				      <td>
				      	<center>
						      <a href="#otro" class="" id="open-otro"><img src="{{asset('imagenes/otros0.png')}}" style="width: 43%;  "></a>
						      <p>Otros</p>
					      </center>
				      </td>
			      </tr>
		      </table>
	      </center>
      </div>
    </div>
  </div>
  <!-- End Modal Structure -->


  <!-- Modal Structure casa -->
  <div id="casa" class="modal">
    <div class="modal-content">
      <h4>
        Allanamiento de casa
        <button class="waves-effect btn-flat right" id="cerrar-casa"><h6>Regresar</h6></button>
      </h4>
      <div class="row">
        <div class=" col l2 m3 s4">
          <img src="{{asset('imagenes/casa0.png')}}" style="width: 50%;  ">
        </div>
        <div class=" col l10 m9 s8">
          <p>Cualquier robo o acto delictivo que se orginie dentro de una residencia privada</p>
        </div>
      </div>
      {!! Form::open(['route' =>  'denuncia.store', 'method'  => 'POST', 'files'  =>  true]) !!}
        <div class="row">
          <div class="col m10 offset-m1 s12 l10 offset-l1 #d7ccc8 brown lighten-5" style="border-radius: 10px;"> {{-- div form --}}

            <input type="text" name="tipoDenuncia" value="casa" hidden>

            <input type="text" name="ubicacion" id="ubicacion-casa" hidden>

            <div class="input-field col l12 m12 s12">
              <textarea id="descripcion" name="contenidoDenuncia" class="materialize-textarea" required></textarea>
              <label for="descripcion">Descripción</label>
            </div>
            <div class="col l6 m6 s12">
              <label for="fecha">Fecha</label>
              <input id="fecha" type="date" name="fecha" class="datepicker" required>
            </div>
            <div class="col l6 m6 s12">
              <label for="hora">Hora</label>
              <input id="hora" type="text" name="hora" class="timepicker" required>
            </div>
            <div class="row">
              <div class="col l12 m12 s12">
                <div class="file-field input-field">
                  <div class="btn #6d4c41 brown darken-1">
                    <span><i class="large material-icons">photo_camera</i></span>
                    <input type="file" name="foto" multiple>
                  </div>
                  <div class="file-path-wrapper">
                    <input type="text" name="txtFoto" placeholder="Seleccione una fotografia (opcional)" class="file-path validate">
                  </div>
                </div>
              </div>
            </div>
            <div class="row" id="adj-datos-pc-casa" style="display:none;">
              <div class="col l12 m12 s12">
                <div class="card-panel brown center-align">
                  <span class="white-text" id="prueba">Los datos del presunto culpable se agregaron a su denunica.</span>
                </div>
              </div>
            </div>

          </div> {{-- div form --}}
        </div>  {{-- div row --}}

        <div class="row"> {{-- botones --}}
          <div class="col l6 m6 s6">
            <a href="#ver-pc-casa" class="tooltipped" data-position="right" data-delay="50" data-tooltip="Agregar un culpable" id="add-pc-casa"><img src="{{asset('imagenes/otros0.png')}}" style="width: 20%"></a>
          </div>
          <div class="modal-footer">
            <button type="submit" class="waves-effect waves-light btn-flat #6d4c41 brown darken-1 white-text" onclick="validarExt(this.form, this.form.foto.value)">Reportar</button>
          </div>
        </div>  {{-- end botones --}}

        <a name="ver-pc-casa"></a>
        <div class="modal-content" id="datos-pc-casa" style="display:none;">
          <h4>Presunto culpable</h4>
          <div class="row">
            <div class=" col l2 m3 s4">
              <img src="{{asset('imagenes/robo.jpg')}}" style="width: 80%;  ">
            </div>
            <div class=" col l10 m9 s8">
              <p>Agregue los datos que conozca de la persona que usted considere como el presunto culpable.</p>
            </div>

            <div class="row">
              <div class="col m10 offset-m1 s12 l10 offset-l1 #d7ccc8 brown lighten-5" style="border-radius: 10px;">
                <div class="input-field col l12 m12 s12">
                  <input id="nombreAlias-casa" type="text" name="nombreAlias" class="validate">
                  <label for="nombreAlias-casa">Nombre o alias</label>
                </div>
                <div class="input-field col l12 m12 s12">
                  <input id="domicilio-casa" type="text" name="domicilio" class="validate">
                  <label for="domicilio-casa">Domicilio</label>
                </div>
                <div class="input-field col l12 m12 s12">
                  <textarea id="descFisica-casa" name="descFisica" class="materialize-textarea"></textarea>
                  <label for="descFisica-casa">Descripción</label>
                </div>
                <div class="row">
                  <div class="col l12 m12 s12">
                    <div class="file-field input-field">
                      <div class="btn #6d4c41 brown darken-1">
                        <span><i class="large material-icons">photo_camera</i></span>
                        <input id="fotoPc-casa" type="file" name="pcFoto" multiple>
                      </div>
                      <div class="file-path-wrapper">
                        <input id="txtFotoPc-casa" type="text" class="file-path validate" placeholder="Puede seleccionar una o varias fotografías">
                      </div>
                    </div>
                  </div>
                </div>
              </div> {{-- div estilo --}}
            </div>  {{-- div row --}}

            <div class="row">
              <a href="#agregar-pres-culp" class="waves-effect waves-light btn-flat #6d4c41 brown darken-1 white-text" id="guardar-datos-pc-casa">Guardar datos</a>
              <a href="#no-agregar-pres-culp" class="waves-effect waves-light btn-flat #6d4c41 brown darken-1 white-text right" id="cancel-pc-casa">No agregar</a>
            </div>
          </div>
        </div>  {{-- div Pres Culp --}}
      {!! Form::close() !!}
    </div>
  </div>
  <!-- End Modal Structure casa -->


  <!-- Modal Structure social -->
  <div id="social" class="modal">
    <div class="modal-content">
      <h4>
        Delito social
        <button class="waves-effect btn-flat right" id="cerrar-social"><h6>Regresar</h6></button>
      </h4>
      <div class="row">
        <div class=" col l2 m3 s4">
          <img src="{{asset('imagenes/social0.png')}}" style="width: 50%;  ">
        </div>
        <div class=" col l10 m9 s8">
          <p>Cualquier acto delictivo que involucre un grupo de personas.</p>
        </div>
      </div>
      {!! Form::open(['route' =>  'denuncia.store', 'method'  => 'POST', 'files'  =>  true]) !!}
        <div class="row">
          <div class="col m10 offset-m1 s12 l10 offset-l1 #d7ccc8 brown lighten-5" style="border-radius: 10px;"> {{-- div form --}}

            <input type="text" name="tipoDenuncia" value="social" hidden>

            <input type="text" name="ubicacion" id="ubicacion-social" hidden>

            <div class="input-field col l12 m12 s12">
              <textarea id="descripcion" name="contenidoDenuncia" class="materialize-textarea" required></textarea>
              <label for="descripcion">Descripción</label>
            </div>
            <div class="col l6 m6 s12">
              <label for="fecha">Fecha</label>
              <input id="fecha" type="date" name="fecha" class="datepicker" required>
            </div>
            <div class="col l6 m6 s12">
              <label for="hora">Hora</label>
              <input id="hora" type="text" name="hora" class="timepicker" required>
            </div>
            <div class="row">
              <div class="col l12 m12 s12">
                <div class="file-field input-field">
                  <div class="btn #6d4c41 brown darken-1">
                    <span><i class="large material-icons">photo_camera</i></span>
                    <input type="file" name="foto" multiple>
                  </div>
                  <div class="file-path-wrapper">
                    <input type="text" name="txtFoto" placeholder="Seleccione una fotografia (opcional)" class="file-path validate">
                  </div>
                </div>
              </div>
            </div>
            <div class="row" id="adj-datos-pc-social" style="display:none;">
              <div class="col l12 m12 s12">
                <div class="card-panel brown center-align">
                  <span class="white-text" id="prueba">Los datos del presunto culpable se agregaron a su denunica.</span>
                </div>
              </div>
            </div>

          </div> {{-- div form --}}
        </div>  {{-- div row --}}

        <div class="row"> {{-- botones --}}
          <div class="col l6 m6 s6">
            <a href="#ver-pc-social" class="tooltipped" data-position="right" data-delay="50" data-tooltip="Agregar un culpable" id="add-pc-social"><img src="{{asset('imagenes/otros0.png')}}" style="width: 20%"></a>
          </div>
          <div class="modal-footer">
            <button type="submit" class="waves-effect waves-light btn-flat #6d4c41 brown darken-1 white-text" onclick="validarExt(this.form, this.form.foto.value)">Reportar</button>
          </div>
        </div>  {{-- end botones --}}

        <a name="ver-pc-social"></a>
        <div class="modal-content" id="datos-pc-social" style="display:none;">
          <h4>Presunto culpable</h4>
          <div class="row">
            <div class=" col l2 m3 s4">
              <img src="{{asset('imagenes/robo.jpg')}}" style="width: 80%;  ">
            </div>
            <div class=" col l10 m9 s8">
              <p>Agregue los datos que conozca de la persona que usted considere como el presunto culpable.</p>
            </div>

            <div class="row">
              <div class="col m10 offset-m1 s12 l10 offset-l1 #d7ccc8 brown lighten-5" style="border-radius: 10px;">
                <div class="input-field col l12 m12 s12">
                  <input id="nombreAlias-social" type="text" name="nombreAlias" class="validate">
                  <label for="nombreAlias-social">Nombre o alias</label>
                </div>
                <div class="input-field col l12 m12 s12">
                  <input id="domicilio-social" type="text" name="domicilio" class="validate">
                  <label for="domicilio-social">Domicilio</label>
                </div>
                <div class="input-field col l12 m12 s12">
                  <textarea id="descFisica-social" name="descFisica" class="materialize-textarea"></textarea>
                  <label for="descFisica-social">Descripción</label>
                </div>
                <div class="row">
                  <div class="col l12 m12 s12">
                    <div class="file-field input-field">
                      <div class="btn #6d4c41 brown darken-1">
                        <span><i class="large material-icons">photo_camera</i></span>
                        <input type="file" name="pcFoto" id="fotoPc-social" multiple>
                      </div>
                      <div class="file-path-wrapper">
                        <input type="text" id="txtFotoPc-social" class="file-path validate" placeholder="Puede seleccionar una o varias fotografías">
                      </div>
                    </div>
                  </div>
                </div>
              </div> {{-- div estilo --}}
            </div>  {{-- div row --}}

            <div class="row">
              <a href="#agregar-pres-culp" class="waves-effect waves-light btn-flat #6d4c41 brown darken-1 white-text" id="guardar-datos-pc-social">Guardar datos</a>
              <a href="#no-agregar-pres-culp" class="waves-effect waves-light btn-flat #6d4c41 brown darken-1 white-text right" id="cancel-pc-social">No agregar</a>
            </div>
          </div>
        </div>  {{-- div Pres Culp --}}
      {!! Form::close() !!}
    </div>
  </div>
  <!-- End Modal Structure social -->


  <!-- Modal Structure asalto -->
  <div id="asalto" class="modal">
    <div class="modal-content">
      <h4>
        Asalto
        <button class="waves-effect btn-flat right" id="cerrar-asalto"><h6>Regresar</h6></button>
      </h4>
      <div class="row">
        <div class=" col l2 m3 s4">
          <img src="{{asset('imagenes/robo0.png')}}" style="width: 50%;  ">
        </div>
        <div class=" col l10 m9 s8">
          <p>Robo en la calle o en alguna tienda</p>
        </div>
      </div>
      {!! Form::open(['route' =>  'denuncia.store', 'method'  => 'POST', 'files'  =>  true]) !!}
        <div class="row">
          <div class="col m10 offset-m1 s12 l10 offset-l1 #d7ccc8 brown lighten-5" style="border-radius: 10px;"> {{-- div form --}}

            <input type="text" name="tipoDenuncia" value="asalto" hidden>

            <input type="text" name="ubicacion" id="ubicacion-asalto" hidden>

            <div class="input-field col l12 m12 s12">
              <textarea id="descripcion" name="contenidoDenuncia" class="materialize-textarea" required></textarea>
              <label for="descripcion">Descripción</label>
            </div>
            <div class="col l6 m6 s12">
              <label for="fecha">Fecha</label>
              <input id="fecha" type="date" name="fecha" class="datepicker" required>
            </div>
            <div class="col l6 m6 s12">
              <label for="hora">Hora</label>
              <input id="hora" type="text" name="hora" class="timepicker" required>
            </div>
            <div class="row">
              <div class="col l12 m12 s12">
                <div class="file-field input-field">
                  <div class="btn #6d4c41 brown darken-1">
                    <span><i class="large material-icons">photo_camera</i></span>
                    <input type="file" name="foto" multiple>
                  </div>
                  <div class="file-path-wrapper">
                    <input type="text" name="txtFoto" placeholder="Seleccione una fotografia (opcional)" class="file-path validate">
                  </div>
                </div>
              </div>
            </div>
            <div class="row" id="adj-datos-pc-asalto" style="display:none;">
              <div class="col l12 m12 s12">
                <div class="card-panel brown center-align">
                  <span class="white-text" id="prueba">Los datos del presunto culpable se agregaron a su denunica.</span>
                </div>
              </div>
            </div>

          </div> {{-- div form --}}
        </div>  {{-- div row --}}

        <div class="row"> {{-- botones --}}
          <div class="col l6 m6 s6">
            <a href="#ver-pc-asalto" class="tooltipped" data-position="right" data-delay="50" data-tooltip="Agregar un culpable" id="add-pc-asalto"><img src="{{asset('imagenes/otros0.png')}}" style="width: 20%"></a>
          </div>
          <div class="modal-footer">
            <button type="submit" class="waves-effect waves-light btn-flat #6d4c41 brown darken-1 white-text" onclick="validarExt(this.form, this.form.foto.value)">Reportar</button>
          </div>
        </div>  {{-- end botones --}}

        <a name="ver-pc-asalto"></a>
        <div class="modal-content" id="datos-pc-asalto" style="display:none;">
          <h4>Presunto culpable</h4>
          <div class="row">
            <div class=" col l2 m3 s4">
              <img src="{{asset('imagenes/robo.jpg')}}" style="width: 80%;  ">
            </div>
            <div class=" col l10 m9 s8">
              <p>Agregue los datos que conozca de la persona que usted considere como el presunto culpable.</p>
            </div>

            <div class="row">
              <div class="col m10 offset-m1 s12 l10 offset-l1 #d7ccc8 brown lighten-5" style="border-radius: 10px;">
                <div class="input-field col l12 m12 s12">
                  <input id="nombreAlias-asalto" type="text" name="nombreAlias" class="validate">
                  <label for="nombreAlias-asalto">Nombre o alias</label>
                </div>
                <div class="input-field col l12 m12 s12">
                  <input id="domicilio-asalto" type="text" name="domicilio" class="validate">
                  <label for="domicilio-asalto">Domicilio</label>
                </div>
                <div class="input-field col l12 m12 s12">
                  <textarea id="descFisica-asalto" name="descFisica" class="materialize-textarea"></textarea>
                  <label for="descFisica-asalto">Descripción</label>
                </div>
                <div class="row">
                  <div class="col l12 m12 s12">
                    <div class="file-field input-field">
                      <div class="btn #6d4c41 brown darken-1">
                        <span><i class="large material-icons">photo_camera</i></span>
                        <input id="fotoPc-asalto" type="file" name="pcFoto" multiple>
                      </div>
                      <div class="file-path-wrapper">
                        <input id="txtFotoPc-asalto" type="text" class="file-path validate" placeholder="Puede seleccionar una o varias fotografías">
                      </div>
                    </div>
                  </div>
                </div>
              </div> {{-- div estilo --}}
            </div>  {{-- div row --}}

            <div class="row">
              <a href="#agregar-pres-culp" class="waves-effect waves-light btn-flat #6d4c41 brown darken-1 white-text" id="guardar-datos-pc-asalto">Guardar datos</a>
              <a href="#no-agregar-pres-culp" class="waves-effect waves-light btn-flat #6d4c41 brown darken-1 white-text right" id="cancel-pc-asalto">No agregar</a>
            </div>
          </div>
        </div>  {{-- div Pres Culp --}}
      {!! Form::close() !!}
    </div>
  </div>
  <!-- End Modal Structure asalto -->


  <!-- Modal Structure carro -->
  <div id="carro" class="modal">
    <div class="modal-content">
      <h4>
        Robo a vehiculo
        <button class="waves-effect btn-flat right" id="cerrar-carro"><h6>Regresar</h6></button>
      </h4>
      <div class="row">
        <div class=" col l2 m3 s4">
          <img src="{{asset('imagenes/carro0.png')}}" style="width: 50%;  ">
        </div>
        <div class=" col l10 m9 s8">
          <p>Robo de automoviles o autopartes</p>
        </div>
      </div>
      {!! Form::open(['route' =>  'denuncia.store', 'method'  => 'POST', 'files'  =>  true]) !!}
        <div class="row">
          <div class="col m10 offset-m1 s12 l10 offset-l1 #d7ccc8 brown lighten-5" style="border-radius: 10px;"> {{-- div form --}}

            <input type="text" name="tipoDenuncia" value="carro" hidden>

            <input type="text" name="ubicacion" id="ubicacion-carro" hidden>

            <div class="input-field col l12 m12 s12">
              <textarea id="descripcion" name="contenidoDenuncia" class="materialize-textarea" required></textarea>
              <label for="descripcion">Descripción</label>
            </div>
            <div class="col l6 m6 s12">
              <label for="fecha">Fecha</label>
              <input id="fecha" type="date" name="fecha" class="datepicker" required>
            </div>
            <div class="col l6 m6 s12">
              <label for="hora">Hora</label>
              <input id="hora" type="text" name="hora" class="timepicker" required>
            </div>
            <div class="row">
              <div class="col l12 m12 s12">
                <div class="file-field input-field">
                  <div class="btn #6d4c41 brown darken-1">
                    <span><i class="large material-icons">photo_camera</i></span>
                    <input type="file" name="foto" multiple>
                  </div>
                  <div class="file-path-wrapper">
                    <input type="text" name="txtFoto" placeholder="Seleccione una fotografia (opcional)" class="file-path validate">
                  </div>
                </div>
              </div>
            </div>
            <div class="row" id="adj-datos-pc-carro" style="display:none;">
              <div class="col l12 m12 s12">
                <div class="card-panel brown center-align">
                  <span class="white-text" id="prueba">Los datos del presunto culpable se agregaron a su denunica.</span>
                </div>
              </div>
            </div>

          </div> {{-- div form --}}
        </div>  {{-- div row --}}

        <div class="row"> {{-- botones --}}
          <div class="col l6 m6 s6">
            <a href="#ver-pc-carro" class="tooltipped" data-position="right" data-delay="50" data-tooltip="Agregar un culpable" id="add-pc-carro"><img src="{{asset('imagenes/otros0.png')}}" style="width: 20%"></a>
          </div>
          <div class="modal-footer">
            <button type="submit" class="waves-effect waves-light btn-flat #6d4c41 brown darken-1 white-text" onclick="validarExt(this.form, this.form.foto.value)">Reportar</button>
          </div>
        </div>  {{-- end botones --}}

        <a name="ver-pc-carro"></a>
        <div class="modal-content" id="datos-pc-carro" style="display:none;">
          <h4>Presunto culpable</h4>
          <div class="row">
            <div class=" col l2 m3 s4">
              <img src="{{asset('imagenes/robo.jpg')}}" style="width: 80%;  ">
            </div>
            <div class=" col l10 m9 s8">
              <p>Agregue los datos que conozca de la persona que usted considere como el presunto culpable.</p>
            </div>

            <div class="row">
              <div class="col m10 offset-m1 s12 l10 offset-l1 #d7ccc8 brown lighten-5" style="border-radius: 10px;">
                <div class="input-field col l12 m12 s12">
                  <input id="nombreAlias-carro" type="text" name="nombreAlias" class="validate">
                  <label for="nombreAlias-carro">Nombre o alias</label>
                </div>
                <div class="input-field col l12 m12 s12">
                  <input id="domicilio-carro" type="text" name="domicilio" class="validate">
                  <label for="domicilio-carro">Domicilio</label>
                </div>
                <div class="input-field col l12 m12 s12">
                  <textarea id="descFisica-carro" name="descFisica" class="materialize-textarea"></textarea>
                  <label for="descFisica-carro">Descripción</label>
                </div>
                <div class="row">
                  <div class="col l12 m12 s12">
                    <div class="file-field input-field">
                      <div class="btn #6d4c41 brown darken-1">
                        <span><i class="large material-icons">photo_camera</i></span>
                        <input id="fotoPc-carro" type="file" name="pcFoto" multiple>
                      </div>
                      <div class="file-path-wrapper">
                        <input id="txtFotoPc-carro" type="text" class="file-path validate" placeholder="Puede seleccionar una o varias fotografías">
                      </div>
                    </div>
                  </div>
                </div>
              </div> {{-- div estilo --}}
            </div>  {{-- div row --}}

            <div class="row">
              <a href="#agregar-pres-culp" class="waves-effect waves-light btn-flat #6d4c41 brown darken-1 white-text" id="guardar-datos-pc-carro">Guardar datos</a>
              <a href="#no-agregar-pres-culp" class="waves-effect waves-light btn-flat #6d4c41 brown darken-1 white-text right" id="cancel-pc-carro">No agregar</a>
            </div>
          </div>
        </div>  {{-- div Pres Culp --}}
      {!! Form::close() !!}
    </div>
  </div>
  <!-- End Modal Structure carro -->


  <!-- Modal Structure homicidio -->
  <div id="homicidio" class="modal">
    <div class="modal-content">
      <h4>
        Homicidio
        <button class="waves-effect btn-flat right" id="cerrar-homicidio"><h6>Regresar</h6></button>
      </h4>
      <div class="row">
        <div class=" col l2 m3 s4">
          <img src="{{asset('imagenes/calavera0.png')}}" style="width: 50%;  ">
        </div>
        <div class=" col l10 m9 s8">
          <p>Agresión, golpes, daño fisico o una muerte</p>
        </div>
      </div>
      {!! Form::open(['route' =>  'denuncia.store', 'method'  => 'POST', 'files'  =>  true]) !!}
        <div class="row">
          <div class="col m10 offset-m1 s12 l10 offset-l1 #d7ccc8 brown lighten-5" style="border-radius: 10px;"> {{-- div form --}}

            <input type="text" name="tipoDenuncia" value="homicidio" hidden>

            <input type="text" name="ubicacion" id="ubicacion-homicidio" hidden>

            <div class="input-field col l12 m12 s12">
              <textarea id="descripcion" name="contenidoDenuncia" class="materialize-textarea" required></textarea>
              <label for="descripcion">Descripción</label>
            </div>
            <div class="col l6 m6 s12">
              <label for="fecha">Fecha</label>
              <input id="fecha" type="date" name="fecha" class="datepicker" required>
            </div>
            <div class="col l6 m6 s12">
              <label for="hora">Hora</label>
              <input id="hora" type="text" name="hora" class="timepicker" required>
            </div>
            <div class="row">
              <div class="col l12 m12 s12">
                <div class="file-field input-field">
                  <div class="btn #6d4c41 brown darken-1">
                    <span><i class="large material-icons">photo_camera</i></span>
                    <input type="file" name="foto" multiple>
                  </div>
                  <div class="file-path-wrapper">
                    <input type="text" name="txtFoto" placeholder="Seleccione una fotografia (opcional)" class="file-path validate">
                  </div>
                </div>
              </div>
            </div>
            <div class="row" id="adj-datos-pc-homicidio" style="display:none;">
              <div class="col l12 m12 s12">
                <div class="card-panel brown center-align">
                  <span class="white-text" id="prueba">Los datos del presunto culpable se agregaron a su denunica.</span>
                </div>
              </div>
            </div>

          </div> {{-- div form --}}
        </div>  {{-- div row --}}

        <div class="row"> {{-- botones --}}
          <div class="col l6 m6 s6">
            <a href="#ver-pc-homicidio" class="tooltipped" data-position="right" data-delay="50" data-tooltip="Agregar un culpable" id="add-pc-homicidio"><img src="{{asset('imagenes/otros0.png')}}" style="width: 20%"></a>
          </div>
          <div class="modal-footer">
            <button type="submit" class="waves-effect waves-light btn-flat #6d4c41 brown darken-1 white-text" onclick="validarExt(this.form, this.form.foto.value)">Reportar</button>
          </div>
        </div>  {{-- end botones --}}

        <a name="ver-pc-homicidio"></a>
        <div class="modal-content" id="datos-pc-homicidio" style="display:none;">
          <h4>Presunto culpable</h4>
          <div class="row">
            <div class=" col l2 m3 s4">
              <img src="{{asset('imagenes/robo.jpg')}}" style="width: 80%;  ">
            </div>
            <div class=" col l10 m9 s8">
              <p>Agregue los datos que conozca de la persona que usted considere como el presunto culpable.</p>
            </div>

            <div class="row">
              <div class="col m10 offset-m1 s12 l10 offset-l1 #d7ccc8 brown lighten-5" style="border-radius: 10px;">
                <div class="input-field col l12 m12 s12">
                  <input id="nombreAlias-homicidio" type="text" name="nombreAlias" class="validate">
                  <label for="nombreAlias-homicidio">Nombre o alias</label>
                </div>
                <div class="input-field col l12 m12 s12">
                  <input id="domicilio-homicidio" type="text" name="domicilio" class="validate">
                  <label for="domicilio-homicidio">Domicilio</label>
                </div>
                <div class="input-field col l12 m12 s12">
                  <textarea id="descFisica-homicidio" name="descFisica" class="materialize-textarea"></textarea>
                  <label for="descFisica-homicidio">Descripción</label>
                </div>
                <div class="row">
                  <div class="col l12 m12 s12">
                    <div class="file-field input-field">
                      <div class="btn #6d4c41 brown darken-1">
                        <span><i class="large material-icons">photo_camera</i></span>
                        <input id="fotoPc-homicidio" type="file" name="pcFoto" multiple>
                      </div>
                      <div class="file-path-wrapper">
                        <input id="txtFotoPc-homicidio" type="text" class="file-path validate" placeholder="Puede seleccionar una o varias fotografías">
                      </div>
                    </div>
                  </div>
                </div>
              </div> {{-- div estilo --}}
            </div>  {{-- div row --}}

            <div class="row">
              <a href="#agregar-pres-culp" class="waves-effect waves-light btn-flat #6d4c41 brown darken-1 white-text" id="guardar-datos-pc-homicidio">Guardar datos</a>
              <a href="#no-agregar-pres-culp" class="waves-effect waves-light btn-flat #6d4c41 brown darken-1 white-text right" id="cancel-pc-homicidio">No agregar</a>
            </div>
          </div>
        </div>  {{-- div Pres Culp --}}
      {!! Form::close() !!}
    </div>
  </div>
  <!-- End Modal Structure homicidio -->


  <!-- Modal Structure otro -->
  <div id="otro" class="modal">
    <div class="modal-content">
      <h4>
        Otros
        <button class="waves-effect btn-flat right" id="cerrar-otro"><h6>Regresar</h6></button>
      </h4>
      <div class="row">
        <div class=" col l2 m3 s4">
          <img src="{{asset('imagenes/otros0.png')}}" style="width: 50%;  ">
        </div>
        <div class=" col l10 m9 s8">
          <p>Actividad sospechosa</p>
        </div>
      </div>
      {!! Form::open(['route' =>  'denuncia.store', 'method'  => 'POST', 'files'  =>  true]) !!}
        <div class="row">
          <div class="col m10 offset-m1 s12 l10 offset-l1 #d7ccc8 brown lighten-5" style="border-radius: 10px;"> {{-- div form --}}

            <input type="text" name="tipoDenuncia" value="otro" hidden>

            <input type="text" name="ubicacion" id="ubicacion-otro" hidden>

            <div class="input-field col l12 m12 s12">
              <textarea id="descripcion" name="contenidoDenuncia" class="materialize-textarea" required></textarea>
              <label for="descripcion">Descripción</label>
            </div>
            <div class="col l6 m6 s12">
              <label for="fecha">Fecha</label>
              <input id="fecha" type="date" name="fecha" class="datepicker" required>
            </div>
            <div class="col l6 m6 s12">
              <label for="hora">Hora</label>
              <input id="hora" type="text" name="hora" class="timepicker" required>
            </div>
            <div class="row">
              <div class="col l12 m12 s12">
                <div class="file-field input-field">
                  <div class="btn #6d4c41 brown darken-1">
                    <span><i class="large material-icons">photo_camera</i></span>
                    <input type="file" name="foto" multiple>
                  </div>
                  <div class="file-path-wrapper">
                    <input type="text" name="txtFoto" placeholder="Seleccione una fotografia (opcional)" class="file-path validate">
                  </div>
                </div>
              </div>
            </div>
            <div class="row" id="adj-datos-pc-otro" style="display:none;">
              <div class="col l12 m12 s12">
                <div class="card-panel brown center-align">
                  <span class="white-text" id="prueba">Los datos del presunto culpable se agregaron a su denunica.</span>
                </div>
              </div>
            </div>

          </div> {{-- div form --}}
        </div>  {{-- div row --}}

        <div class="row"> {{-- botones --}}
          <div class="col l6 m6 s6">
            <a href="#ver-pc-otro" class="tooltipped" data-position="right" data-delay="50" data-tooltip="Agregar un culpable" id="add-pc-otro"><img src="{{asset('imagenes/otros0.png')}}" style="width: 20%"></a>
          </div>
          <div class="modal-footer">
            <button type="submit" class="waves-effect waves-light btn-flat #6d4c41 brown darken-1 white-text" onclick="validarExt(this.form, this.form.foto.value)">Reportar</button>
          </div>
        </div>  {{-- end botones --}}

        <a name="ver-pc-otro"></a>
        <div class="modal-content" id="datos-pc-otro" style="display:none;">
          <h4>Presunto culpable</h4>
          <div class="row">
            <div class=" col l2 m3 s4">
              <img src="{{asset('imagenes/robo.jpg')}}" style="width: 80%;  ">
            </div>
            <div class=" col l10 m9 s8">
              <p>Agregue los datos que conozca de la persona que usted considere como el presunto culpable.</p>
            </div>

            <div class="row">
              <div class="col m10 offset-m1 s12 l10 offset-l1 #d7ccc8 brown lighten-5" style="border-radius: 10px;">
                <div class="input-field col l12 m12 s12">
                  <input id="nombreAlias-otro" type="text" name="nombreAlias" class="validate">
                  <label for="nombreAlias-otro">Nombre o alias</label>
                </div>
                <div class="input-field col l12 m12 s12">
                  <input id="domicilio-otro" type="text" name="domicilio" class="validate">
                  <label for="domicilio-otro">Domicilio</label>
                </div>
                <div class="input-field col l12 m12 s12">
                  <textarea id="descFisica-otro" name="descFisica" class="materialize-textarea"></textarea>
                  <label for="descFisica-otro">Descripción</label>
                </div>
                <div class="row">
                  <div class="col l12 m12 s12">
                    <div class="file-field input-field">
                      <div class="btn #6d4c41 brown darken-1">
                        <span><i class="large material-icons">photo_camera</i></span>
                        <input id="fotoPc-otro" type="file" name="pcFoto" multiple>
                      </div>
                      <div class="file-path-wrapper">
                        <input id="txtFotoPc-otro" type="text" class="file-path validate" placeholder="Puede seleccionar una o varias fotografías">
                      </div>
                    </div>
                  </div>
                </div>
              </div> {{-- div estilo --}}
            </div>  {{-- div row --}}

            <div class="row">
              <a href="#agregar-pres-culp" class="waves-effect waves-light btn-flat #6d4c41 brown darken-1 white-text" id="guardar-datos-pc-otro">Guardar datos</a>
              <a href="#no-agregar-pres-culp" class="waves-effect waves-light btn-flat #6d4c41 brown darken-1 white-text right" id="cancel-pc-otro">No agregar</a>
            </div>
          </div>
        </div>  {{-- div Pres Culp --}}
      {!! Form::close() !!}
    </div>
  </div>
  <!-- End Modal Structure otro -->


	<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDL59GtSIKZRoxoX7MyfPaGFUDyayZauyM&callback=initMap">
  </script>

@endsection
