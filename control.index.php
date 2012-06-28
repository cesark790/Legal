<?

session_start();
if(!(isset($_SESSION['usuario'])) || $_SESSION['nivel']!=2){
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
	<title>..:: Control de Demandas ::..</title>
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
	background-attachment: fixed;
	behavior: url(PIE.php);
}
</style>
<table align="center" cellspacing="0" width="80%" border="1">
	<tr>
		<td class="barra_s" height="20px"></td>
	</tr>
	<tr style="background:rgb(0,0,0);color:white">
		<td height="100x" align="center"><strong style="font-size:22px;">CONTROL DE DEMANDAS</strong></td>
	</tr>
	<tr>
		<td align="right" class="barra_s" height="20px"><img style="margin:auto 8px;" src="img/user.png" width="15" height="15"><strong><? echo $_SESSION['nombre'];?></strong><a style="text-decoration:none;" href="control.index.php?close=close">(Salir)</a></td> </tr>
</table>
<div>
		&nbsp;
</div>
<table cellpadding="1" cellspacing="1" align="center" width="80%" border="0">
	<tr align="center">
		<td id="opcion1" class="seleccionado" width="10%">Demandas</td>
		<td id="opcion2" class="deseleccionado" width="10%">Buscar</td>
		<td id="opcion3" class="deseleccionado" width="10%">Reportes</td>
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
			url : 'control.demandas.php',
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

		$('#opcion3').click(function(){
			$('#contenedor').empty();
			$('#opcion3').removeClass().addClass('seleccionado');
			$('#opcion1').removeClass().addClass('deseleccionado');
			$('#opcion2').removeClass().addClass('deseleccionado');
				
			$.ajax({	
			url : 'control.reporte.php',
			cache : false ,
			type : 'POST',
			beforeSend : function(){
				x=0;
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
		})
		$('#opcion1').click(function(){
			$('#contenedor').empty();
			$('#opcion1').removeClass().addClass('seleccionado');
			$('#opcion2').removeClass().addClass('deseleccionado');
			$('#opcion3').removeClass().addClass('deseleccionado');
			$.ajax({
			url : 'control.demandas.php',
			cache : false ,
			type : 'POST',
			beforeSend : function(){
				x=0;
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
		})


		$('#opcion2').click(function(){
			$('#contenedor').empty();
			$('#opcion2').removeClass().addClass('seleccionado');
			$('#opcion3').removeClass().addClass('deseleccionado');
			$('#opcion1').removeClass().addClass('deseleccionado');
			$.ajax({
			url : 'control.buscar_inicio.inc.php',
			cache : false ,
			type : 'POST',
			beforeSend : function(){
				x=0;
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
		})



	})


</script>
</html>