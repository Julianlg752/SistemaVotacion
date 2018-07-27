<!DOCTYPE html>
<html>
<head>
	<title>Formulario de votacion</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link rel="stylesheet" href="Estilo2.css"/>
</head>
<body>
<form method="POST" action="consejal.php">

<?php
session_start();
include("conexion.php");
	$selec_fotos="SELECT * FROM ASPIRANTES asp  WHERE CATEGORIA='CONSEJAL'";
	$QUERY= mysql_query("$selec_fotos");
	while ($row = @mysql_fetch_array($QUERY)) {
	   $idAs = $row["idaspirantes"];
 	   $foto= $row["foto"];		
 	   $nombreA = $row["nombre"]; 
 	   ?>
	<div> 
		<input type="image"  name="Aspirante" value="<?php echo $idAs; ?>"
		 src="data:image/jpg;base64,<?php echo base64_encode($foto);?>"/> <br>
		<label class="aspi"><?php echo $nombreA ?> </label> 

	</div>
	<?php
}
	?>	
		</form>
<label class="elegir">ELIJA UN CONSEJAL</label>
<?php 

$idCandidato=@$_POST['Aspirante'];
$idVotante=$_SESSION['idVotante'];

$Validar="SELECT va.idvotante, va.idaspi, asp.categoria from aspi_votan va    join aspirantes asp
on va.idaspi = asp.idaspirantes
join votantes vo
on va.idvotante = vo.idvotante
where va.idvotante=$idVotante and categoria='consejal'";

$query1= mysql_query($Validar);
$filas= mysql_num_rows($query1);
if ($filas==0) {
		$insertar="INSERT INTO ASPI_VOTAN (idvotante,idaspi) VALUES('$idVotante','$idCandidato')";
		$query= mysql_query("$insertar");	
		echo "<script >alert('voto por consejal) </script>";
	}else{	
			
			echo "<script >alert('ya voto por un consejal no puede volver a hacer una votacion') </script>";
			
	}
?>

</body>
</html>