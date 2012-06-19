<?php 
sleep(1);
session_start();
error_reporting(0);
include("conexion.php");
$user=htmlspecialchars($_POST['user'],ENT_QUOTES);
$pass=$_POST['pass'];
$sql="SELECT idadm_tbl_user,nombre, ap_pat_, ap_mat_, tipo_usuario, user_name, password, email, empresa, tipo_usuario,pagina FROM legal_user WHERE user_name='".$user."'";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);
if(mysql_num_rows($result)>0)
{
	if(strcmp($row['password'],$pass)==0)
	{
		echo "1";
		$_SESSION['id_usuario']=$row['idadm_tbl_user'];
		$_SESSION['usuario']=$row['user_name']; 
		$_SESSION['ses_sucursal']=$row['sucursal'];
		$_SESSION['nivel']=$row['tipo_usuario'];
		$_SESSION['ses_empresa']=$row['empresa'];
		$_SESSION['nombre']=$row['nombre']." ".$row['ap_pat_'];
		$_SESSION['pagina']=$row['pagina'];
	}
	else
		echo "0"; 
}
else
	echo "0"; 
?>