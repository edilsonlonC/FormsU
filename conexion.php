<?php 
$conn=mysqli_connect("127.0.0.1","root","root","Formulario");
if (!$conn) echo "error al conectar";
else 
{
	$nombre=$_POST['Nombre'];
	$apellido1=$_POST['Apellido1'];
	$apellido2=$_POST['Apellido2'];
	$email=$_POST['Email'];
	$query="INSERT into usuario values ('$nombre','$apellido1','$apellido2','$email')";
	mysqli_query($conn,$query);
	echo "valores ingresaos correctamente";
}

?>