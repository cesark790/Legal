<?
include("conexion.php");
date_default_timezone_set('America/Mexico_City');
session_start();
$user=$_SESSION['usuario'];
foreach ($_POST as $nombre => $valor) {
	$exp="\$" . $nombre . "='" . $valor . "';";
	eval($exp);
}
$sql_observacion=mysql_query("SELECT id_observacion FROM legal_observaciones ORDER BY id_observacion DESC");
$u_observacion=mysql_fetch_array($sql_observacion);
$sql_junta=mysql_query("SELECT id_junta FROM legal_junta  ORDER BY id_junta DESC");
$u_junta = mysql_fetch_array($sql_junta);
$ultima_junta = $u_junta['id_junta']+1;
$ultima_oberservacion=$u_observacion['id_observacion'] + 1;
$sql1=mysql_query("INSERT INTO legal_principal(id_empresa,id_gerente,actor, id_demandado, id_estado, id_entidad, id_ultima_observacion,capturo,expediente,id_ultima_junta,no_nomina,id_ultimo_gasto) VALUES ('$demandado','$gerente','$actor','$demandado','$estado','$entidad','$ultima_oberservacion','$user','$expediente','$ultima_junta','$no_nomina','1') ");
$id_demanda=mysql_insert_id();
$sql_damanda=mysql_query("SELECT id_demanda FROM legal_principal ORDER BY id_demanda DESC");
$ultima_demanda=mysql_fetch_array($sql_damanda);
$u_demanda=$ultima_demanda['id_demanda'];

$sql2=mysql_query("INSERT INTO legal_observaciones(id_demanda,observacion,capturo) values ('$u_demanda','$observaciones','$user')");

$sql3=mysql_query("INSERT INTO legal_junta(id_demanda, fecha_junta, capturo) values ('$u_demanda','$junta','$user')");

require("mail/class.phpmailer.php"); 
if($demandado==1){
	$emp="SERTEC";
}else{
	$emp="RECREMEX";
}
$mail = new PHPMailer(); 
$mail->IsSMTP(); 
$mail->SMTPAuth = true; 
$mail->Host = "smtp.cimexico.mx"; 
$mail->Username = "demandas.cimexico@cimexico.mx"; 
$mail->Password = "cimexdci2012mx"; 
$mail->Port = 25;  
$mail->From = "demandas.cimexico@cimexico.mx";
$mail->FromName = "Julio Cesar Sanchez";   
$mail->AddAddress("demandas.cimexico@cimexico.mx");
$mail->IsHTML(true);
$mail->Subject = "Nueva demanda ".date('d/m/Y');
$body = "
<br>
<br>
<div align='center'><h1>Una nueva demanda esta abierta</h1> 
<br>
</div><p>Por favor accesar al sitio <a href='http://192.168.0.184/legal/'>Acceso</a></p>
<br>
<div><strong>Expediente:'$expediente' </strong></div>
<div><strong>Actor:'$actor' </strong></div>
<div><strong>Empresa:'$emp' </strong></div>
<div><strong>Observaciones:'$observaciones' </strong></div>";
$mail->Body = $body; 
$exito = $mail->Send();  

 ?>
