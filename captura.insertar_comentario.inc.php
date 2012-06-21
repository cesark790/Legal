<?
include("top.php");
include("conexion.php");
$id=$_POST['id'];
session_start();
$user=$_SESSION['usuario'];
$observacion=$_POST['observacion'];
if($c==1){
$fe=explode("/", $fecha_evento);
$fecha_evento=$fe[2].'-'.$fe[1].'-'.$fe[0];
mysql_query("INSERT INTO legal_observaciones(id_demanda,observacion,capturo,fecha_evento,evento) VALUES ('$id','$observacion','$user','$fecha_evento','$evento')");
$ultima=mysql_insert_id();
mysql_query("UPDATE legal_principal SET id_ultima_observacion ='$ultima' WHERE id_demanda = '$id' ");
}else{
mysql_query("INSERT INTO legal_observaciones(id_demanda,observacion,capturo) VALUES ('$id','$observacion','$user')");
$ultima=mysql_insert_id();
mysql_query("UPDATE legal_principal SET id_ultima_observacion ='$ultima' WHERE id_demanda = '$id' ");

}
?>