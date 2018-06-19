initMap = function () {
  //usamos la API para geolocalizar el usuario
  navigator.geolocation.getCurrentPosition(
    function (position){
      coords =  {
        lng: position.coords.longitude,
        lat: position.coords.latitude
      };
      setMapa(coords);  //pasamos las coordenadas al metodo para crear el mapa
    },function(error){console.log(error);});
}

function setMapa (coords) {
  //Se crea una nueva instancia del objeto mapa
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 16,
    center:new google.maps.LatLng(coords.lat,coords.lng),
  });

  colocarMarcadores(map);

  map.addListener('click', function(e) {
      placeMarkerAndPanTo(e.latLng, map);
  });
}

function placeMarkerAndPanTo(latLng, map) {
  $('#modal1').modal('open');
  // var marker = new google.maps.Marker({
  //   position: latLng,
  //   map: map
  // });
  var marker = new google.maps.Marker({
    position: latLng
  });

  // Posicion
  var p = marker.getPosition().toString();
  var pos = p.substring(1, p.length-1);
  //console.log(pos);

  // Pasar posicion
  document.getElementById('ubicacion-casa').value = pos;
  document.getElementById('ubicacion-social').value = pos;
  document.getElementById('ubicacion-asalto').value = pos;
  document.getElementById('ubicacion-carro').value = pos;
  document.getElementById('ubicacion-homicidio').value = pos;
  document.getElementById('ubicacion-otro').value = pos;

  map.panTo(latLng);
}

function colocarMarcadores(map) {

  $.getJSON("denuncia/datos", function(denuncias) {

    var marcadores = [];
    var mensajes = [];

    $.each(denuncias, function(i) {
      var marcador = [];
      var mensaje = [];
      var contenido;
      var meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
      var tipo;

      // Tipo de denuncia
      switch( denuncias[i].tipoDenuncia ) {
        case "casa":
          tipo = "Allanamiento a casa";
          break;
        case "social":
          tipo = "Delito social";
          break;
        case "asalto":
          tipo = "Asalto";
          break;
        case "carro":
          tipo = "Robo a vehiculo";
          break;
        case "homicidio":
          tipo = "Homicido";
          break;
        case "otro":
          tipo = "Otro";
          break;
        default:
          tipo = "Tipo de denuncia desconocida";
      }
      marcador.push( tipo );
      // Fecha
      var fh = denuncias[i].fechaHora;
      var fe = fh.split(" ");
      var fecha = fe[0];
      var fsep = fecha.split("-");
      var mes;
      if ( fsep[1].startsWith(0) ) {
        fsep[1] = fsep[1].substring(1, 2);
        mes = meses[ fsep[1]-1 ];
      }
      // Contiene la fecha de forma aceptable para el usuario
      var fOrd = fsep[2] + " de " + mes + " de " + fsep[0];
      // Hora
      var hora = fe[1];
      var time = hora.split(":");
      var hh = time[0];
      var amPm; // Contiene la hora de forma aceptable para el usuario
      if ( hh > 12 ) {
        var h = hh - 12;
        var pm = h + ":" + time[1] + " PM";
        amPm = pm;
      } else {
        if ( time[0].startsWith(0) ) {
          time[0] = time[0].substring(1, 2);
        }
        var am = time[0] + ":" + time[1] + " AM";
        var amPm = am;
      }
      // Ubicacion
      var ub = denuncias[i].ubicacion;
      var pos = ub.split(", ");
      // Lat
      var lat = pos[0];
      marcador.push( lat );
      // Lng
      var lng = pos[1];
      marcador.push( lng );

      // Tipo de denuncia, para el marcador
      marcador.push( denuncias[i].tipoDenuncia );

      // Se agregar el marcador
      marcadores.push( marcador );

      // Diseñar el mensaje
      // contenido = '<div class="row"> <div class="col l12 m12 s12"> <div class="card-panel teal"> <span> <h6 class="">'+ tipo +'</h6> <br> <h6 class="">'+ fOrd +' a las '+ amPm +'</h6> <hr> <p>'+ denuncias[i].contenidoDenuncia +'</p> </span> </div> </div> </div>';
      contenido = '<div class="row"> <div class=""> <span> <h5 class="">'+ tipo +'</h5> <hr> <p>'+ fOrd +' a las '+ amPm +'</p> <p> <strong>Descripción:</strong> <br>'+ denuncias[i].contenidoDenuncia +'</p> </span> </div> </div>';

      // Agregar el contenido de la información
      mensaje.push( contenido );

      // Agregar mensaje al arreglo
      mensajes.push( mensaje );

      //console.log( marcador );
      //console.log( denuncias[i] );
    })

    //console.log( marcadores );

    var customLabel = {
      casa: {
        label: 'AC'
      },
      social: {
        label: 'DS'
      },
      asalto: {
        label: 'A'
      },
      carro: {
        label: 'RV'
      },
      homicidio: {
        label: 'H'
      },
      otro: {
        label: 'O'
      }
    };

    // Add multiple markers to map
    var infoWindow = new google.maps.InfoWindow(), marker, i;

    // Place each marker on the map
    for( i = 0; i < marcadores.length; i++ ) {
      var position = new google.maps.LatLng(marcadores[i][1], marcadores[i][2]);
      var icon = customLabel[ marcadores[i][3] ] || {};
      marker = new google.maps.Marker({
          position: position,
          map: map,
          title: marcadores[i][0],
          label: icon.label
      });

      // Add info window to marker
      google.maps.event.addListener(marker, 'click', (function(marker, i) {
          return function() {
              infoWindow.setContent(mensajes[i][0]);
              infoWindow.open(map, marker);
          }
      })(marker, i));
    }// end for

  }); // getJSON

}


