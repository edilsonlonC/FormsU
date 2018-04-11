<html>
<head>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
<?php
require '../class/user.php';

$us = user::singleton();
if (isset($_POST['nombre'])) {
	$save = $us->saveUser($_POST['nombre'], $_POST['apellido1'], $_POST['apellido2'], $_POST['email']);
}
$show = $us->getUsers();
?>

<table border="1">
	<tr>
		<th>Nombre</th>
		<th>Primer Apellido</th>
		<th>Segundo Apellido</th>
		<th>Email</th>
	</tr>
	<?php
	foreach ($show as $data) {
		echo "<tr>";
		echo "<td>".$data['nombre']."</td><td>".$data['apellido1']."</td><td>".$data['apellido2']."</td><td>".$data['email']."</td>";
		echo "</tr>";
	}
	?>
</table>
</body>
</html>