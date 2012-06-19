<?error_reporting(0);
/*
	Sistema de Control de Demandas --- LEGAL--

	Ver 1.0
			-4 niveles de usuario 
				-1 Nivel es de Captura 
				-2 Nivel es de Abogado Interno
				-3 Nivel es de Abogado Externo
				-4 Nivel es de Autoria
			-Implementacion de Ajax

	
*/
include("top.php");
include("conexion.php");
session_start();
$pagina=$_SESSION['pagina'];
$usuario=$_SESSION['usuario'];
$nivel=$_SESSION['nivel'];
if($usuario==""){
	header("Location:login.php" );
	?><script type="text/javascript"> window.Location = "<? echo login.php;?>";</script><?
}else{
	header("Location:$pagina");
	?><script type="text/javascript"> window.Location = "<? echo $pagina;?>";</script><?
}?>