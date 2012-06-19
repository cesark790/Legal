<?
include("conexion.php");
include("top.php");
session_start();
$user=$_SESSION['usuario'];
mysql_query("INSERT INTO legal_junta(id_demanda,fecha_junta,capturo) VALUES ('$id','$junta','$user')");
$ultima_junta=mysql_insert_id();
mysql_query("UPDATE legal_principal SET id_ultima_junta = '$ultima_junta' WHERE id_demanda = '$id' ");
?>