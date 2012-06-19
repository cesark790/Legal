<?
include("top.php");
include("conexion.php");
$id=$_POST['id'];
session_start();
$user=$_SESSION['usuario'];
$observacion=$_POST['observacion'];
mysql_query("INSERT INTO legal_observaciones(id_demanda,observacion,capturo) VALUES ('$id','$observacion','$user')");
$ultima=mysql_insert_id();
mysql_query("UPDATE legal_principal SET id_ultima_observacion ='$ultima' WHERE id_demanda = '$id' ");
?>