<?php
$server = 'localhost';
$user = 'root';
$pass = 'admin';
$conexion = mysql_connect($server,$user,$pass);
mysql_select_db('administracion',$conexion);
?>