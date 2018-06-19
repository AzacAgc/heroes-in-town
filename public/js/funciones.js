$(document).ready(function(){
  $('.modal').modal();

  /**
   * Funciones para abrir y cerrar cada opción de las ventanas modales
   */
  // Casa
  // Abrir 'modal' de casa
  $('#open-casa').click(function(){
    // Abrir el modal de ventana
    $('#casa').modal('open');
    // Luego cerrar el modal de delitos
    $('#modal1').modal('close');
  });

  // Cerrar 'modal' de casa
  $('#cerrar-casa').click(function(){
    // Cerrar el modal de ventana
    $('#casa').modal('close');
    // Luego abrir el modal general
    $('#modal1').modal('open');
  });

  // Social
  // Abrir 'modal' de social
  $('#open-social').click(function(){
    // Abrir el modal de ventana
    $('#social').modal('open');
    // Luego cerrar el modal de delitos
    $('#modal1').modal('close');
  });

  // Cerrar 'modal' de social
  $('#cerrar-social').click(function(){
    // Cerrar el modal de ventana
    $('#social').modal('close');
    // Luego abrir el modal general
    $('#modal1').modal('open');
  });

  // Asalto
  // Abrir 'modal' de asalto
  $('#open-asalto').click(function(){
    // Abrir el modal de ventana
    $('#asalto').modal('open');
    // Luego cerrar el modal de delitos
    $('#modal1').modal('close');
  });

  // Cerrar 'modal' de asalto
  $('#cerrar-asalto').click(function(){
    // Cerrar el modal de ventana
    $('#asalto').modal('close');
    // Luego abrir el modal general
    $('#modal1').modal('open');
  });

  // Carro
  // Abrir 'modal' de carro
  $('#open-carro').click(function(){
    // Abrir el modal de ventana
    $('#carro').modal('open');
    // Luego cerrar el modal de delitos
    $('#modal1').modal('close');
  });

  // Cerrar 'modal' de carro
  $('#cerrar-carro').click(function(){
    // Cerrar el modal de ventana
    $('#carro').modal('close');
    // Luego abrir el modal general
    $('#modal1').modal('open');
  });

  // Homicidio
  // Abrir 'modal' de homicidio
  $('#open-homicidio').click(function(){
    // Abrir el modal de ventana
    $('#homicidio').modal('open');
    // Luego cerrar el modal de delitos
    $('#modal1').modal('close');
  });

  // Cerrar 'modal' de homicidio
  $('#cerrar-homicidio').click(function(){
    // Cerrar el modal de ventana
    $('#homicidio').modal('close');
    // Luego abrir el modal general
    $('#modal1').modal('open');
  });

  // Otros
  // Abrir 'modal' de otros
  $('#open-otro').click(function(){
    // Abrir el modal de ventana
    $('#otro').modal('open');
    // Luego cerrar el modal de delitos
    $('#modal1').modal('close');
  });

  // Cerrar 'modal' de otros
  $('#cerrar-otro').click(function(){
    // Cerrar el modal de ventana
    $('#otro').modal('close');
    // Luego abrir el modal general
    $('#modal1').modal('open');
  });

  /**
   * Funciones para la ventana modal de Pres Culp
   */
  // Casa
  // Abrir 'modal' de presculpable casa
  $('#add-pc-casa').click(function(){
    // Abrir el modal de pres-c
    document.getElementById('datos-pc-casa').style.display = 'block';
  });

  // Mostrar mensaje de pres culpable casa
  $('#guardar-datos-pc-casa').click(function () {
    // Mostrar mensaje de datos
    var nomb = $('#nombreAlias-casa').val().length;
    var domi = $('#domicilio-casa').val().length;
    var desc = $('#descFisica-casa').val().length;
    var foto = $('#fotoPc-casa').val().length;
    if ( ((nomb + domi + desc + foto) >= 1) ) {
      document.getElementById('adj-datos-pc-casa').style.display = 'block';
    }
    // Ocultar datos de pres culpable
    document.getElementById('datos-pc-casa').style.display = 'none';
  });

  // Cerrar y vaciar datos de pres culpable casa
  $('#cancel-pc-casa').click(function () {
    // Ocultar datos pres culpable
    document.getElementById('datos-pc-casa').style.display = 'none';
    document.getElementById('adj-datos-pc-casa').style.display = 'none';
    // Vaciar campos
    document.getElementById('nombreAlias-casa').value = "";
    document.getElementById('domicilio-casa').value = "";
    document.getElementById('descFisica-casa').value = "";
    document.getElementById('fotoPc-casa').value = "";
    document.getElementById('txtFotoPc-casa').value = "";
  });

  // Social
  // Abrir 'modal' de presculpable social
  $('#add-pc-social').click(function(){
    // Abrir el modal de pres-c
    document.getElementById('datos-pc-social').style.display = 'block';
  });

  // Mostrar mensaje de pres culpable social
  $('#guardar-datos-pc-social').click(function () {
    // Mostrar mensaje de datos
    var nomb = $('#nombreAlias-social').val().length;
    var domi = $('#domicilio-social').val().length;
    var desc = $('#descFisica-social').val().length;
    var foto = $('#fotoPc-social').val().length;
    if ( ((nomb + domi + desc + foto) >= 1) ) {
      document.getElementById('adj-datos-pc-social').style.display = 'block';
    }
    // Ocultar datos de pres culpable
    document.getElementById('datos-pc-social').style.display = 'none';
  });

  // Cerrar y vaciar datos de pres culpable social
  $('#cancel-pc-social').click(function () {
    // Ocultar datos pres culpable
    document.getElementById('datos-pc-social').style.display = 'none';
    document.getElementById('adj-datos-pc-social').style.display = 'none';
    // Vaciar campos
    document.getElementById('nombreAlias-social').value = "";
    document.getElementById('domicilio-social').value = "";
    document.getElementById('descFisica-social').value = "";
    document.getElementById('fotoPc-social').value = "";
    document.getElementById('txtFotoPc-social').value = "";
  });

  // Asalto
  // Abrir 'modal' de presculpable asalto
  $('#add-pc-asalto').click(function(){
    // Abrir el modal de pres-c
    document.getElementById('datos-pc-asalto').style.display = 'block';
  });

  // Mostrar mensaje de pres culpable asalto
  $('#guardar-datos-pc-asalto').click(function () {
    // Mostrar mensaje de datos
    var nomb = $('#nombreAlias-asalto').val().length;
    var domi = $('#domicilio-asalto').val().length;
    var desc = $('#descFisica-asalto').val().length;
    var foto = $('#fotoPc-asalto').val().length;
    if ( ((nomb + domi + desc + foto) >= 1) ) {
      document.getElementById('adj-datos-pc-asalto').style.display = 'block';
    }
    // Ocultar datos de pres culpable
    document.getElementById('datos-pc-asalto').style.display = 'none';
  });

  // Cerrar y vaciar datos de pres culpable asalto
  $('#cancel-pc-asalto').click(function () {
    // Ocultar datos pres culpable
    document.getElementById('datos-pc-asalto').style.display = 'none';
    document.getElementById('adj-datos-pc-asalto').style.display = 'none';
    // Vaciar campos
    document.getElementById('nombreAlias-asalto').value = "";
    document.getElementById('domicilio-asalto').value = "";
    document.getElementById('descFisica-asalto').value = "";
    document.getElementById('fotoPc-asalto').value = "";
    document.getElementById('txtFotoPc-asalto').value = "";
  });

  // Carro
  // Abrir 'modal' de presculpable carro
  $('#add-pc-carro').click(function(){
    // Abrir el modal de pres-c
    document.getElementById('datos-pc-carro').style.display = 'block';
  });

  // Mostrar mensaje de pres culpable carro
  $('#guardar-datos-pc-carro').click(function () {
    // Mostrar mensaje de datos
    var nomb = $('#nombreAlias-carro').val().length;
    var domi = $('#domicilio-carro').val().length;
    var desc = $('#descFisica-carro').val().length;
    var foto = $('#fotoPc-carro').val().length;
    if ( ((nomb + domi + desc + foto) >= 1) ) {
      document.getElementById('adj-datos-pc-carro').style.display = 'block';
    }
    // Ocultar datos de pres culpable
    document.getElementById('datos-pc-carro').style.display = 'none';
  });

  // Cerrar y vaciar datos de pres culpable carro
  $('#cancel-pc-carro').click(function () {
    // Ocultar datos pres culpable
    document.getElementById('datos-pc-carro').style.display = 'none';
    document.getElementById('adj-datos-pc-carro').style.display = 'none';
    // Vaciar campos
    document.getElementById('nombreAlias-carro').value = "";
    document.getElementById('domicilio-carro').value = "";
    document.getElementById('descFisica-carro').value = "";
    document.getElementById('fotoPc-carro').value = "";
    document.getElementById('txtFotoPc-carro').value = "";
  });

  // Homicidio
  // Abrir 'modal' de presculpable homicidio
  $('#add-pc-homicidio').click(function(){
    // Abrir el modal de pres-c
    document.getElementById('datos-pc-homicidio').style.display = 'block';
  });

  // Mostrar mensaje de pres culpable homicidio
  $('#guardar-datos-pc-homicidio').click(function () {
    // Mostrar mensaje de datos
    var nomb = $('#nombreAlias-homicidio').val().length;
    var domi = $('#domicilio-homicidio').val().length;
    var desc = $('#descFisica-homicidio').val().length;
    var foto = $('#fotoPc-homicidio').val().length;
    if ( ((nomb + domi + desc + foto) >= 1) ) {
      document.getElementById('adj-datos-pc-homicidio').style.display = 'block';
    }
    // Ocultar datos de pres culpable
    document.getElementById('datos-pc-homicidio').style.display = 'none';
  });

  // Cerrar y vaciar datos de pres culpable homicidio
  $('#cancel-pc-homicidio').click(function () {
    // Ocultar datos pres culpable
    document.getElementById('datos-pc-homicidio').style.display = 'none';
    document.getElementById('adj-datos-pc-homicidio').style.display = 'none';
    // Vaciar campos
    document.getElementById('nombreAlias-homicidio').value = "";
    document.getElementById('domicilio-homicidio').value = "";
    document.getElementById('descFisica-homicidio').value = "";
    document.getElementById('fotoPc-homicidio').value = "";
    document.getElementById('txtFotoPc-homicidio').value = "";
  });

  // Otro
  // Abrir 'modal' de presculpable otros
  $('#add-pc-otro').click(function(){
    // Abrir el modal de pres-c
    document.getElementById('datos-pc-otro').style.display = 'block';
  });

  // Mostrar mensaje de pres culpable otro
  $('#guardar-datos-pc-otro').click(function () {
    // Mostrar mensaje de datos
    var nomb = $('#nombreAlias-otro').val().length;
    var domi = $('#domicilio-otro').val().length;
    var desc = $('#descFisica-otro').val().length;
    var foto = $('#fotoPc-otro').val().length;
    if ( ((nomb + domi + desc + foto) >= 1) ) {
      document.getElementById('adj-datos-pc-otro').style.display = 'block';
    }
    // Ocultar datos de pres culpable
    document.getElementById('datos-pc-otro').style.display = 'none';
  });

  // Cerrar y vaciar datos de pres culpable otro
  $('#cancel-pc-otro').click(function () {
    // Ocultar datos pres culpable
    document.getElementById('datos-pc-otro').style.display = 'none';
    document.getElementById('adj-datos-pc-otro').style.display = 'none';
    // Vaciar campos
    document.getElementById('nombreAlias-otro').value = "";
    document.getElementById('domicilio-otro').value = "";
    document.getElementById('descFisica-otro').value = "";
    document.getElementById('fotoPc-otro').value = "";
    document.getElementById('txtFotoPc-otro').value = "";
  });


  // Función para mostrar ventana modal de mensajes
  $('#modal-message').modal('open');

});

$(".button-collapse").sideNav();


$('.datepicker').pickadate({
  monthsFull: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
  weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jeu', 'Vie', 'Sab'],
  selectMonths: true, // Creates a dropdown to control month
  selectYears: 15, // Creates a dropdown of 15 years to control year
  today: 'Hoy', // Text for today-button
  clear: 'Limpiar', // Text for clear-button
  close: 'Ok', // Text for close-button
  formatSubmit: 'yyyy-mm-dd' // Formato que recibe al dar 'submit'
});

$('.timepicker').pickatime({
  default: 'now', // Set default time: 'now', '1:30AM', '16:30'
  fromnow: 0,       // set default time to * milliseconds from now (using with default = 'now')
  twelvehour: true, // Use AM/PM or 24-hour format
  donetext: 'Ok', // text for done-button
  cleartext: 'Limpiar', // text for clear-button
  canceltext: 'Cancelar', // Text for cancel-button
  formatSubmit: 'HH:i', // Formato que recibe al dar 'submit'
  autoclose: false, // automatic close timepicker
  ampmclickable: true // make AM PM clickable
});

$(".dropdown-button").dropdown();

/**
 * Validar extension de archivos subidos
 *
 * -> Extensiones permitidas
 */
extenciones = new Array(".jpg", ".jpeg", ".png");

function validarExt(form, file) {
  //alert(file);

  // Permitir enviar el formulario
  allowSubmit = false;

  // En caso de no seleccionar ningun archivo
  if (!file) return;

  while ( file.indexOf("\\") != -1 )
  file = file.slice(file.indexOf("\\") + 1);
  ext = file.slice(file.indexOf(".")).toLowerCase();

  // Comprobar si la extension esta permitida. Si es admitida, se envia
  for (var i = 0; i < extenciones.length; i++) {
    if (extenciones[i] == ext) { allowSubmit = true; break; }
  }

  // Verificar envió
  if (allowSubmit) {
    form.submit();
  } else {
    alert("Se permiten únicamente archivos con la extención: "
    + (extenciones.join(", ")) + "\nPor favor, seleccione otro archivo "
    + "e intente de nuevo.");
  }
}// end of validarExt

