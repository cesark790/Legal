<?
include("conexipn.php");
include("top.php");
session_start();
$id_usuario=$_SESSION['id_usuario'];
$nombre=$_SESSION['usuario'];
mysql_query("INSERT INTO legal_gastos(id_demanda, concepto, referencia_bancaria, monto, id_usuario, capturo) VALUES ('$id_demanda','$concepto','$refencia','$monto','$id_usuario','$nombre')");
$ultimo_id=mysql_insert_id();
mysql_query("UPDATE legal_principal SET id_ultimo_gasto = '$ultimo_id' WHERE id_demanda = '$id_demanda'");
?>