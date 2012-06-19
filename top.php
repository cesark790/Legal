<?
date_default_timezone_set('America/Mexico_City');
/*session_start();

 if (!(isset($_SESSION['nombre_s']))) {
 	header("Location:index.php");
 }
	
error_reporting(0);*/
	include("conexion.php");
	foreach ($_POST as $nombre => $value) {
		$expresion="\$".$nombre."='".$value."';";
		eval($expresion);
	}
	foreach ($_GET as $nombre => $value) {
		$expresion="\$".$nombre."='".$value."';";
		eval($expresion);
	}
	
	foreach($_SESSION as $nombre_campo => $valor){ 
   $asignacion = "\$" . $nombre_campo . "='" . $valor . "';"; 
   	eval($asignacion); 

}

$user="PRUEBA";

function convierte_f($fecha){
	$f=explode(" ",$fecha);
	$fecha=$f[0];
	$hora=$f[1];
	$f=explode("-", $fecha);
	$fecha_completa = $f[2]."/".$f[1]."/".$f[0]." ".$hora." hrs";
	return $fecha_completa;
}

function comprobar_f($dato){
	if ($dato=="") {
		$dato = " Sin Terminar";
		return $dato;
	}
	else{
		return $dato;
	}
}
function cambia($palabra){
	$result=utf8_encode($palabra);
	return $result;
}

function mes($mes){
	switch ($mes) {
		case "1": $mes = "Enero";break;
		case "2": $mes = "Febrero";break;
		case "3": $mes = "Marzo"; break;
		case "4": $mes = "Abril";break;
		case "5": $mes = "Mayo"; break;
		case "6": $mes = "Junio"; break;
		case "7": $mes = "Julio"; break;
		case "8": $mes = "Agosto"; break;
		case "9": $mes = "Septiembre"; break;
		case "10": $mes = "Octubre"; break;
		case "11": $mes = "Noviembre"; break;
		case "12": $mes = "Diciembre"; break;
}
return $mes;
}


function recortar($texto){
	$tex=substr($texto,0,45);
	$fin=$tex."...";
	return $fin;

}
function recortar_junta($texto){
	$tex=substr($texto,0,20);
	$fin=$tex."...";
	return $fin;

}
function fecha_inicio($fecha){
	$exp=explode("/",$fecha);
	$fecha=$exp[2]."-".$exp[1]."-".$exp[0]." 00:00:00";
	return $fecha;
}
function fecha_final($fecha){
	$exp=explode("/",$fecha);
	$fecha=$exp[2]."-".$exp[1]."-".$exp[0]." 23:59:59";
	return $fecha;
}
$horas = array("08:00","08:30","09:00","09:30","10:00","10:30","11:00","11:30","12:00","12:30","13:00","13:30","14:00","14:30","15:00","15:30","16:00","16:30","17:00","17:30","18:00","18:30","19:00","19:30","20:00","20:30");
 ?>

