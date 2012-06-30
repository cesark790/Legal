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
	<script type="text/javascript" src="js/jquery-ui-1.8.17.custom.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/sunny/jquery-ui-1.8.17.custom.css">
	<script type="text/javascript" src="tabla/tablefilter_compressed.js"></script>
</head>
<style type="text/css">
body{
	background-image: url(img/fondo.jpg);
	background-repeat: no-repeat;
	background-attachment: fixed;
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
		<td id="opcion1" class="seleccionado" width="20%">
			<a style="text-decoration:none;cursor:default;"  href="externo.index.php">Demandas Activas</a></td>
		<td id="opcion2" class="deseleccionado" width="20%">
			<a style="text-decoration:none;"  href="externo.demandas_cerradas.php">Demandas Cerradas</a></td>
		<td id="opcion3" class="deseleccionado" width="20%"><a style="text-decoration:none;"  href="externo.buscar_demanda.php">Buscar Demanda</a></td>
		<td style="border-bottom:1px solid black;" width="40%"></td>
	</tr>
	<tr>
		<td  class="barra" colspan="4" width="100%" height="15px"></td>
	</tr>
</table>

<div id="datos">

</div>
<script type="text/javascript">
$(document).ready(function(){
	$('#datos').load("externo.tabla_demandas_activas.php",function(data){
		$('#datos').html(data);
	})
})

function ver(numero,empresa){
	$('body').append("<div id='ver_detalle'></div>")
	$.ajax({
		url : 'externo.buscar_resultado.php',
		type : 'POST',
		cache : false ,
		data : 'id_demanda=' + numero + '&demandado=' + empresa ,
		beforeSend : function(){
			$('#ver_detalle').html('<br><br><br> Cargando..');
		},
		success : function(data){
				$('#ver_detalle').html(data);
				
		}
	})
}

function recargar(){
	window.location = reload();
}

function comentarios(numero){
	$('body').append("<div align='center' id='coment'></div>")
	$.ajax({
		url : 'externo.comentarios.php',
		type : 'POST',
		cache : false ,
		data : 'n=1&id=' + numero ,
		beforeSend : function(){
			$('#coment').html('<br><br><br> Cargando..');
		},
		success : function(data){
			$('#coment').show(200,function(){
				$('#coment').html(data);
			});			
		}
	})


}

function gasto(demanda){
	$('body').append("<div align='center' id='gasto'></div>");
	$.ajax({
		url : 'externo.gasto.php',
		type : 'POST',
		cache : false,
		data : 'id_demanda=' + demanda,
		success : function(data){
			$('#gasto').html(data);
		}
	})
}

function junta(numero){
	$('body').append("<div align='center' id='coment'></div>")
	$.ajax({
		url : 'externo.juntas.php',
		type : 'POST',
		cache : false ,
		data : 'n=1&id=' + numero ,
		beforeSend : function(){
			$('#coment').html('<br><br><br> Cargando..');
		},
		success : function(data){
			$('#coment').show(200,function(){
				$('#coment').html(data);
			});			
		}
	})


}
</script>