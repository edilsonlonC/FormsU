function validarForm() {
	if (document.getElementById("nombre").value != "") {
		alert("Este es tu nombre: " + document.getElementById("nombre").value);
	} else{
		alert("Esta vacio xD");
	}
}