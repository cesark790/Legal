<?
include("conexion.php");
include("top.php");
echo $id;
echo "UPDATE legal_gastos SET comprobado = '1'  WHERE id_gasto = '$id' ";
mysql_query("UPDATE legal_gastos SET comprobado = '1'  WHERE id_gasto = '$id' ");
?>