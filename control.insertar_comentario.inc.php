<?
include("top.php");
include("conexion.php");
$id=$_POST['id'];
session_start();
$id_usuario=$_SESSION['id_usuario'];
$user=$_SESSION['usuario'];
$observacion=$_POST['observacion'];
mysql_query("INSERT INTO legal_observaciones(id_demanda,observacion,capturo,id_usuario) VALUES ('$id','$observacion','$user','$id_usuario')");
$ultima=mysql_insert_id();
mysql_query("UPDATE legal_principal SET id_ultima_observacion ='$ultima' WHERE id_demanda = '$id' ");
?>