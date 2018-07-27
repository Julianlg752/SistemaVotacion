<!DOCTYPE html>
<html>
<head>
	<title>Formulario de votacion</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link rel="stylesheet" href="Estilos.css"/>
</head>
<body>

<header> <label id="sis">Sistema de Votación  </label>

<?php
session_start();
include("conexion.php");
echo "<br>"
?>
<img src="data:image/jpg;base64,<?php echo base64_encode($_SESSION['foto']);?>" width='110' heigth='110' id="imagen"> 
<label><?php echo $_SESSION['nombrePersona'];?></label>
</header>
<form method="POST" action="Ingresado.php">
<iframe src="alcalde.php"></iframe>
<iframe src="consejal.php"></iframe>
<iframe src="edil.php"></iframe>
</body>
</html>

