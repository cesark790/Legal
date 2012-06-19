<? 
error_reporting(0);
include("top.php");
session_start();
$id_usuario = $_SESSION['id_usuario'];
if(!(isset($_SESSION['usuario'])) || $_SESSION['nivel']!=3){
	header("Location : login.php");
	echo"<script language='javascript'>window.location='login.php'</script>";
}
if(isset($_GET['close']))
{
	session_destroy();
	echo"<script language='javascript'>window.location='index.php'</script>";
}	
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>..:: Legal CI ::..</title>
	<meta charset="utf-8">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/nueva.css">
	<link rel="stylesheet" type="text/css" href="tabla/filtergrid.css">
	<script type="text/javascript" src="tabla/tablefilter_compressed.js"></script>
</head>
<style type="text/css">
body{
	background-image: url(img/fondo.jpg);
	background-repeat: no-repeat;
	behavior: url(PIE.php);
}
</style>
<body>
<table align="center" cellspacing="0" width="80%" border="1">
	<tr>
		<td class="barra_s" height="20px"></td>
	</tr>
	<tr style="background:rgb(0,0,0);color:white">
		<td height="100x" align="center"><strong>MIS DEMANDAS</strong></td>
	</tr>
	<tr>
		<td align="right" class="barra_s" height="20px"><img style="margin:auto 8px;" src="img/user.png" width="15" height="15"><? echo $_SESSION['nombre'];?><a style="text-decoration:none;" href="captura.index.php?close=close">(Salir)</a></td> </tr>
</table>
<div>
		&nbsp;
</div>
<table cellpadding="1" cellspacing="1" align="center" width="80%" border="0">
	<tr align="center">
		<td id="opcion1" class="deseleccionado" width="20%">
			<a style="text-decoration:none;cursor:default;"  href="externo.index.php">Demandas Activas</a></td>
		<td id="opcion2" class="deseleccionado" width="20%">
			<a style="text-decoration:none;"  href="externo.demandas_cerradas.php">Demandas Cerradas</a></td>
		<td id="opcion3" class="seleccionado" width="20%"><a style="text-decoration:none;"  href="externo.buscar_demanda.php">Buscar Demanda</a></td>
		<td style="border-bottom:1px solid black;" width="40%"></td>
	</tr>
	<tr>
		<td  class="barra" colspan="4" width="100%" height="15px"></td>
	</tr>
</table>
<div align="center">
<div style="width:80%;border:2px solid black;background:white;">
	<?
	include("conexion.php");
	$sql_demandados=mysql_query("SELECT id_demandado,empresa FROM legal_demandado");
	?>
	<tables style="margin:20px auto;" width="100%">
		<tr height="30px">
			<td align="right" width="10%"> Empresa : </td>
			<td align="left" width="10%">
				<select id="demandado">
					<?
					while($reg=mysql_fetch_array($sql_demandados)){
						?>
						<option value="<?echo $reg['id_demandado'];?>"><?echo $reg['empresa'];?></option>
						<?
					}
					?>
				</select>
			</td>
			<td align="right" width="20%"> No. Nomina : </td>
			<td align="left" width="10%"><input style="text-align:center;" type="text" name="no_nomina" id="no_nomina" size="5"></td>
		
			<td width="10%"></td>
		</tr>
	</table>
	<table>
		<tr>
			<td align="right" width="20%"> Expediente : </td>
			<td align="left" width="20%"><input style="text-align:center;" type="text" name="expediente" id="expediente" size="15"></td>
		</tr>
	</table>
</div>
<br>

<br>
<div style="background:white; width:80%; border:1px solid black;" id="datos">
</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#no_nomina,#expediente').blur(function(){
			$.ajax({
				url : "externo.buscar_resultado.php",
				type : "POST",
				cache : false,
				data: "no_nomina=" + $('#no_nomina').val() + "&expediente=" + $('#expediente').val() + "&demandado=" + $('#demandado').val() ,
				beforeSend : function(){
				x=0;
				$('#datos').html('<p>Cargando..</p>');
				while(x<=10){
				$('p').fadeOut(650);
				$('p').fadeIn(650);
				x++;
				}
			},
				success:function(data){
					$('#datos').html(data);
				}
			})

		})
	})
</script>