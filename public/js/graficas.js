var cantidades = [];

$.getJSON("denuncia/est", function(est) {
	var all = 0, as = 0, del = 0, hom = 0, robo = 0, otro = 0;

	$.each( est, function (i) {
		switch( est[i].tipoDenuncia ) {
			case "casa":
        all++;
        break;
      case "social":
        del++;
        break;
      case "asalto":
        as++;
        break;
      case "carro":
        robo++;
        break;
      case "homicidio":
        hom++;
        break;
      case "otro":
        otro++;
        break;
		}// end switch
	})// end each

	cantidades.push( all );
	cantidades.push( as );
	cantidades.push( del );
	cantidades.push( hom );
	cantidades.push( robo );
	cantidades.push( otro );

	//console.log( cantidades );
});

var ctx = document.getElementById("myChart");
var myChart = new Chart(ctx, {
	type: 'bar',
	data: {
		labels: ["Allanamiento", "Asalto", "Delito social", "Homicido", "Robo a vehiculo", "Otro"],
		datasets: [{
			label: '# de denuncias',
			// data: [12, 19, 3, 5, 2, 3],
			data: cantidades,
			backgroundColor: [
			'rgba(255, 99, 132, 0.2)',
			'rgba(54, 162, 235, 0.2)',
			'rgba(255, 206, 86, 0.2)',
			'rgba(75, 192, 192, 0.2)',
			'rgba(153, 102, 255, 0.2)',
			'rgba(255, 159, 64, 0.2)'
			],
			borderColor: [
			'rgba(255,99,132,1)',
			'rgba(54, 162, 235, 1)',
			'rgba(255, 206, 86, 1)',
			'rgba(75, 192, 192, 1)',
			'rgba(153, 102, 255, 1)',
			'rgba(255, 159, 64, 1)'
			],
			borderWidth: 1
		}]
	},
	options: {
		scales: {
			yAxes: [{
				ticks: {
					beginAtZero:true
				}
			}]
		}
	}
});


/**
 * Agregar datos de cantidades de denuncias por usuarios
 */
$.getJSON("denuncia/cant", function(cant) {
	var all = 0, as = 0, ds = 0, hom = 0, robo = 0, otro = 0, total = 0;

	$.each( cant, function (i) {
		switch( cant[i].tipoDenuncia ) {
			case "casa":
	        all++;
	        break;
	      case "social":
	        ds++;
	        break;
	      case "asalto":
	        as++;
	        break;
	      case "carro":
	        robo++;
	        break;
	      case "homicidio":
	        hom++;
	        break;
	      case "otro":
	        otro++;
	        break;
		}// end switch
	})// end each
	total = all + as + ds + hom + robo + otro;
	//console.log(total);

	// Asignar valores
	// Total
	document.getElementById('totalDen').innerHTML = total;
	// Categorias
	document.getElementById('cantAll').innerHTML = all;
	document.getElementById('cantDS').innerHTML = ds;
	document.getElementById('cantAs').innerHTML = as;
	document.getElementById('cantRobo').innerHTML = robo;
	document.getElementById('cantHom').innerHTML = hom;
	document.getElementById('cantOtro').innerHTML = otro;
});