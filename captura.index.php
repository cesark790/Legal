<? 
error_reporting(0);
include("top.php");
session_start();
if(!(isset($_SESSION['usuario'])) || $_SESSION['nivel']!=1){
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
	<title>..:: Nueva Demanda ::..</title>
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
		<td height="100x" align="center"><strong>CAPTURA DE DEMANDA</strong></td>
	</tr>
	<tr>
		<td align="right" class="barra_s" height="20px"><img style="margin:auto 8px;" src="img/user.png" width="15" height="15"><? echo $_SESSION['nombre'];?><a style="text-decoration:none;" href="captura.index.php?close=close">(Salir)</a></td> </tr>
</table>
<div>
		&nbsp;
</div>
<table cellpadding="1" cellspacing="1" align="center" width="80%" border="0">
	<tr align="center">
		<td id="opcion1" class="seleccionado" width="10%">Captura</td>
		<td id="opcion2" class="deseleccionado" width="10%">Historial</td>
		<td id="opcion3" class="deseleccionado" width="10%">Buscar</td>
		<td style="border-bottom:1px solid black;" width="70%"></td>
	</tr>
	<tr>
		<td  class="barra" colspan="4" width="100%" height="15px"></td>
	</tr>
</table>
<?
include("conexion.php");
?>
<div align="center">
	<div style="" id="contenedor">

	</div>
</div>
</body>
<script type="text/javascript">
	var x=0;
	$(document).ready(function(){

		$.ajax({
			url : 'captura.captura.php',
			cache : false ,
			type : 'POST',
			beforeSend : function(){
				$('#contenedor').html('<p>Cargando..</p>');
				while(x<=10){
				$('p').fadeOut(650);
				$('p').fadeIn(650);
				x++;
				}
			},
			success : function(data){
				$('p').remove();
				$('#contenedor').slideDown(500);
				$('#contenedor').html(data);
			}
		});

		$('#opcion2').click(function(){
			$('#contenedor').empty();
			$('#opcion2').removeClass().addClass('seleccionado');
			$('#opcion1').removeClass().addClass('deseleccionado');
			$('#opcion3').removeClass().addClass('deseleccionado');
				
			$.ajax({	
			url : 'captura.historial.inc.php',
			cache : false ,
			type : 'POST',
			beforeSend : function(){
				x=0;
				$('#contenedor').html('<p><br><br><br><br>Cargando..</p>');
				while(x<=10){
				$('p').fadeOut(650);
				$('p').fadeIn(650);
				x++;
				}
			},
			success : function(data){
				$('p').remove();
				$('#contenedor').slideDown(500);
				$('#contenedor').html(data);
				}
			});
		})
		$('#opcion1').click(function(){
			$('#contenedor').empty();
			$('#opcion1').removeClass().addClass('seleccionado');
			$('#opcion2').removeClass().addClass('deseleccionado');
			$('#opcion3').removeClass().addClass('deseleccionado');
			$.ajax({
			url : 'captura.captura.php',
			cache : false ,
			type : 'POST',
			beforeSend : function(){
				x=0;
				$('#contenedor').html('<p><br><br><br><br>Cargando..</p>');
				while(x<=10){
				$('p').fadeOut(650);
				$('p').fadeIn(650);
				x++;
				}
			},
			success : function(data){
				$('p').remove();
				$('#contenedor').slideDown(500);
					$('#contenedor').html(data);
				}
			});
		})


		$('#opcion3').click(function(){
			$('#contenedor').empty();
			$('#opcion3').removeClass().addClass('seleccionado');
			$('#opcion2').removeClass().addClass('deseleccionado');
			$('#opcion1').removeClass().addClass('deseleccionado');
			$.ajax({
			url : 'captura.buscar_inicio.inc.php',
			cache : false ,
			type : 'POST',
			beforeSend : function(){
				x=0;
				$('#contenedor').html('<p><br><br><br><br>Cargando..</p>');
				while(x<=10){
				$('p').fadeOut(650);
				$('p').fadeIn(650);
				x++;
				}
			},
			success : function(data){
				$('p').remove();
				$('#contenedor').slideDown(500);
					$('#contenedor').html(data);
				}
			});
		})



	})


</script>
</html>