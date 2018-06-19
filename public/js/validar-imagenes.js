// // Extensiones permitidas
// extenciones = new Array(".jpg", ".jpeg", ".png");

// function validarExt(form, file) {
// 	// Permitir enviar el formulario
// 	allowSubmit = false;

// 	// En caso de no seleccionar ningun archivo
// 	if (!file) return;

// 	while ( file.indexOf("\\") != -1 )
// 	file = file.slice(file.indexOf("\\") + 1);
// 	ext = file.slice(file.indexOf(".")).toLowerCase();

// 	// Comprobar si la extension esta permitida. Si es admitida, se envia
// 	for (var i = 0; i < extenciones.length; i++) {
// 		if (extenciones[i] == ext) { allowSubmit = true; break; }
// 	}

// 	// Verificar envió
// 	if (allowSubmit) form.submit();
// 	else
// 	alert("Se permiten únicamente archivos con la extención: "
// 	+ (extenciones.join(", ")) + "\nPor favor, seleccione otro archivo "
// 	+ "e intente de nuevo.");
// }// end of validarExt