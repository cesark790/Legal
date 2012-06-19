
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>**LOGIN**</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link href='http://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
</head>
<style type="text/css">
body{
	font-family: 'Bree Serif', serif;
	background-image:url(img/fondo.jpg);
}
</style>
<body>
<table id="table" style="margin:10% auto;" align="Center" width="50%">
	<tr style="background:white;">
		<th width="50%"><img style="margin:15px 85px;" src="img/logo.jpg"</th>
		<th width="50%"><img style="margin:15px 55px;" src="img/candado.png" width="110" height="110"></th>
	</tr>
	<tr>
		<td colspan="3">
			<div id="caja">
				<table width="80%" border="0" style="border:0px">
					<tr>
						<td width="30%" align="right">Usuario :</td>
						<td colspan="2" width="70%"><input type="text" id="user" style="margin:10px 10px;width:100%;text-align:center"></td>
						
					</tr>
					<tr>
						<td width="30%" align="right">Password :</td>
						<td colspan="2" width="70%"><input type="password" id="pass" style="margin:10px 10px;width:100%;text-align:center"></td>
					</tr>
				</table>
			</div>
		</td>
	</tr>
	<tr style="background:white;">
		<td align="center" colspan="3">
			<div id="login" class="boton">Ingresar</div>
		</td>
	</tr>
	<tr id="efecto" style="background:white;">
		<td align="center" colspan="3">
			<div id="aviso"></div>
		</td>
	</tr>
</table>
</body>
<script type="text/javascript">
function conectar(){
	
		$('#aviso').slideDown(300);
		$.ajax({
			url : 'verificacion.php',
			cache: false,
			type : 'POST',
			data : "user=" + $('#user').val() + "&pass=" + $('#pass').val(),
			beforeSend : function(){
				x=0;
				$('#aviso').html('<div id="dos">Verificando..</div>');
				while(x<=10){
				$('#dos').fadeOut(500);
				$('#dos').fadeIn(500);
				x++;
				}
			},
			success : function(data){
				if (data==1) {
					$('#aviso').html('<div id="dos">Ingresando..</div>');
					window.location="index.php";
				}else{
					$('#aviso').html('<div id="dos">Acceso Denegado..</div>');
				}
			}
		})
}


	$(document).ready(function(){
		$('#user').focus();
	})
	$('#user,#pass').click(function(){
		$('#aviso').slideUp(300);
	})

	$('#login').click(function(){
		conectar();
	})
	$('#pass').blur(function(){
		conectar();
	})

	$(document).keypress(function(e) {
    if(e.which == 13) {
        conectar();
    }
});
</script>
</html>