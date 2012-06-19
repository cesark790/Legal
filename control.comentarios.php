<?
$n=$_POST['n'];
$id=$_POST['id'];
include("conexion.php");

if($n==1){
?>
<link rel="stylesheet" type="text/css" href="css/nueva.css">
<div style="width:99%; height:98%; border:4px solid;border-radius:15px;">
	<table width="100%" border="0" cellpading="0" cellspacing="0">
	<tr style="background:black">
		<td colspan="2" width="80%" style="color:white;font-family:helvetica; padding:0px 10px; font-weight:bold; ">
			Comentario Nuevo
		</td>
		<td width="20%">
			<img align="right" id="cerrar_comentarios" width="20" height="20" style="margin:4px 10px; cursor:pointer;" alt="Çerrar" title="cerrar" src="img/cerrar.png"></td>
		</td>
	</tr>
		<tr align="center">
			<td class="titulo" colspan="3"><strong>Comentario Nuevo</strong></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td align="center" colspan="3">
				<textarea style="width:90%" rows="10" name="seguimiento" id="seguimiento"></textarea>
			</td>
		</tr>
		
				<tr>
			<td align="center" width="33%">
				<div id="aceptar" class="boton_c">ACEPTAR</div>
			</td>
			<td align="center" width="33%"><div style="display:none;" id="info"></div></td>
			<td align="center" width="33%">
				<div id="cancelar" class="boton_c">CANCELAR</div>
			</td>
		</tr>
	</table>
		<?
		$sql_comentarios=mysql_query("SELECT * FROM legal_observaciones WHERE id_demanda = '$id' ORDER BY fecha_captura DESC");
		?>
<table id="tabla_comentarios" aling="center" width="90%">
	<tr style="border:2px solid;">
		<th> FECHA</th>
		<th> COMENTARIO</th>
		<th> USUARIO</th>
	</tr>
	<?
	while ($reg=mysql_fetch_array($sql_comentarios)) {
		?>
		<tr align="center">
			<td align="center" style="border:1px solid;"  width="25%" align="left"><? echo $reg['fecha_captura'];?></td>
			<td align="center" style="border:1px solid"  width="55%" align="left"><? echo $reg['observacion'];?></td>
			<td align="center" style="border:1px solid"  width="10%" align="left"><? echo $reg['capturo'];?></td>
		</tr>
		<?
	}
	?>

</table>


</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#cerrar_comentarios').click(function(){
			$('#tabla_datos').empty();
			$('#tabla_datos').load('control.demandas_tabla.inc.php',function(data){
			$('#tabla_datos').html(data);
				});
			$('#coment').remove();
			
		

		});
	$('#cancelar').click(function(){
		$('#coment').hide(200,function(){
			$('#coment').remove();
		})
	})

	$('#aceptar').click(function(){
		$('#aceptar,#cancelar,#tabla_comentarios').hide(200);
		$.ajax({
			url : 'control.insertar_comentario.inc.php',
			cache : false ,
			type : 'POST',
			data : 'id=<? echo $id;?>&observacion=' + $('#seguimiento').val() ,
			beforeSend : function(){
				$('#coment').html("Cargando...");
				$('#tabla_datos').empty();
			},
			success : function(data){
				$('#coment').remove();
				$('#tabla_datos').load('control.demandas_tabla.inc.php',function(data){
					$('#tabla_datos').html(data);
				})
			}

		})


	})


	})
</script>
<?
}elseif($n==2){
?>
<link rel="stylesheet" type="text/css" href="css/nueva.css">
<div style="width:99%; height:98%; border:4px solid;border-radius:15px;">
	<table width="100%" border="0" cellpading="0" cellspacing="0">
	<tr style="background:black">
		<td colspan="2" width="80%" style="color:white;font-family:helvetica; padding:0px 10px; font-weight:bold; ">
			Comentario Nuevo
		</td>
		<td width="20%">
			<img align="right" id="cerrar_comentarios" width="20" height="20" style="margin:4px 10px; cursor:pointer;" alt="Çerrar" title="cerrar" src="img/cerrar.png"></td>
		</td>
	</tr>
		<tr align="center">
			<td class="titulo" colspan="3"><strong>Comentario Nuevo</strong></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td align="center" colspan="3">
				<textarea style="width:90%" rows="10" name="seguimiento" id="seguimiento"></textarea>
			</td>
		</tr>
		
				<tr>
			<td align="center" width="33%">
				<div id="aceptar" class="boton_c">ACEPTAR</div>
			</td>
			<td align="center" width="33%"><div style="display:none;" id="info"></div></td>
			<td align="center" width="33%">
				<div id="cancelar" class="boton_c">CANCELAR</div>
			</td>
		</tr>
	</table>
		<?
		$sql_comentarios=mysql_query("SELECT * FROM legal_observaciones WHERE id_demanda = '$id' ORDER BY fecha_captura DESC");
		?>
<table id="tabla_comentarios" aling="center" width="90%">
	<tr style="border:2px solid;">
		<th> FECHA</th>
		<th> COMENTARIO</th>
		<th> USUARIO</th>
	</tr>
	<?
	while ($reg=mysql_fetch_array($sql_comentarios)) {
		?>
		<tr align="center">
			<td align="center" style="border:1px solid;"  width="25%" align="left"><? echo $reg['fecha_captura'];?></td>
			<td align="center" style="border:1px solid"  width="55%" align="left"><? echo $reg['observacion'];?></td>
			<td align="center" style="border:1px solid"  width="10%" align="left"><? echo $reg['capturo'];?></td>
		</tr>
		<?
	}
	?>

</table>


</div>
<script type="text/javascript">
function recargar(){
	$.ajax({
			url : 'control.demandas_tabla.inc.php',
			cache : false ,
			type : 'POST',
			data : "filtro=2",
			beforeSend : function(){
				x=0;
				$('#tabla_datos').html('<p>Cargando..</p>');
				while(x<=10){
				$('p').fadeOut(650);
				$('p').fadeIn(650);
				x++;
				}
			},
			success : function(data){
				$('p').remove();
				$('#tabla_datos').html(data);
				}
			});
			
}
	$(document).ready(function(){
		$('#cerrar_comentarios').click(function(){
			$('#coment').remove();
		$.ajax({
			url : 'control.demandas_tabla.inc.php',
			cache : false ,
			type : 'POST',
			data : "filtro=2",
			beforeSend : function(){
				x=0;
				$('#tabla_datos').html('<p>Cargando..</p>');
				while(x<=10){
				$('p').fadeOut(650);
				$('p').fadeIn(650);
				x++;
				}
			},
			success : function(data){
				$('p').remove();
				$('#tabla_datos').html(data);
				}
				});
			
		});
	$('#cancelar').click(function(){
		$('#coment').hide(200,function(){
			$('#coment').remove();
		})
	})

	$('#aceptar').click(function(){
		$('#aceptar,#cancelar,#tabla_comentarios').hide(200);
		$.ajax({
			url : 'captura.insertar_comentario.inc.php',
			cache : false ,
			type : 'POST',
			data : 'id=<? echo $id;?>&observacion=' + $('#seguimiento').val() ,
			beforeSend : function(){
				$('#coment').html("Cargando...");
				$('#tabla_datos').empty();
			},
			success : function(data){
				$('#coment').remove();
				recargar();
			
			}

		})


	})


	})
</script>
<?
}elseif($n==3){

?>
<link rel="stylesheet" type="text/css" href="css/nueva.css">
<div style="width:99%; height:98%; border:4px solid;border-radius:15px;">
	<table width="100%" border="0" cellpading="0" cellspacing="0">
	<tr style="background:black">
		<td colspan="2" width="80%" style="color:white;font-family:helvetica; padding:0px 10px; font-weight:bold; ">
			Comentario Nuevo
		</td>
		<td width="20%">
			<img align="right" id="cerrar_comentarios" width="20" height="20" style="margin:4px 10px; cursor:pointer;" alt="Çerrar" title="cerrar" src="img/cerrar.png"></td>
		</td>
	</tr>
		<tr align="center">
			<td class="titulo" colspan="3"><strong>Comentario Nuevo</strong></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td align="center" colspan="3">
				<textarea style="width:90%" rows="10" name="seguimiento" id="seguimiento"></textarea>
			</td>
		</tr>
		
				<tr>
			<td align="center" width="33%">
				<div id="aceptar" class="boton_c">ACEPTAR</div>
			</td>
			<td align="center" width="33%"><div style="display:none;" id="info"></div></td>
			<td align="center" width="33%">
				<div id="cancelar" class="boton_c">CANCELAR</div>
			</td>
		</tr>
	</table>
		<?
		$sql_comentarios=mysql_query("SELECT * FROM legal_observaciones WHERE id_demanda = '$id' ORDER BY fecha_captura DESC");
		?>
<table id="tabla_comentarios" aling="center" width="90%">
	<tr style="border:2px solid;">
		<th> FECHA</th>
		<th> COMENTARIO</th>
		<th> USUARIO</th>
	</tr>
	<?
	while ($reg=mysql_fetch_array($sql_comentarios)) {
		?>
		<tr align="center">
			<td align="center" style="border:1px solid;"  width="25%" align="left"><? echo $reg['fecha_captura'];?></td>
			<td align="center" style="border:1px solid"  width="55%" align="left"><? echo $reg['observacion'];?></td>
			<td align="center" style="border:1px solid"  width="10%" align="left"><? echo $reg['capturo'];?></td>
		</tr>
		<?
	}
	?>

</table>


</div>
<script type="text/javascript">
function recargar(){
	$.ajax({
			url : 'control.demandas_tabla.inc.php',
			cache : false ,
			type : 'POST',
			data : "filtro=3",
			beforeSend : function(){
				x=0;
				$('#tabla_datos').html('<p>Cargando..</p>');
				while(x<=10){
				$('p').fadeOut(650);
				$('p').fadeIn(650);
				x++;
				}
			},
			success : function(data){
				$('p').remove();
				$('#tabla_datos').html(data);
				}
			});			
}



	$(document).ready(function(){
		$('#cerrar_comentarios').click(function(){
		$('#coment').remove();

		$.ajax({
			url : 'control.demandas_tabla.inc.php',
			cache : false ,
			type : 'POST',
			data : "filtro=3",
			beforeSend : function(){
				x=0;
				$('#tabla_datos').html('<p>Cargando..</p>');
				while(x<=10){
				$('p').fadeOut(650);
				$('p').fadeIn(650);
				x++;
				}
			},
			success : function(data){
				$('p').remove();
				$('#tabla_datos').html(data);
				}
			});			
		});



	$('#cancelar').click(function(){
		$('#coment').hide(200,function(){
			$('#coment').remove();
		})
	})

	$('#aceptar').click(function(){
		$('#aceptar,#cancelar,#tabla_comentarios').hide(200);
		$.ajax({
			url : 'control.insertar_comentario.inc.php',
			cache : false ,
			type : 'POST',
			data : 'id=<? echo $id;?>&observacion=' + $('#seguimiento').val() ,
			beforeSend : function(){
				$('#coment').html("Cargando...");
				$('#tabla_datos').empty();
			},
			success : function(data){
				$('#coment').remove();
				recargar();
			}

		})


	})


	})
</script>
<?

}elseif($n==4){

?>
<link rel="stylesheet" type="text/css" href="css/nueva.css">
<div style="width:99%; height:98%; border:4px solid;border-radius:15px;">
	<table width="100%" border="0" cellpading="0" cellspacing="0">
	<tr style="background:black">
		<td colspan="2" width="80%" style="color:white;font-family:helvetica; padding:0px 10px; font-weight:bold; ">
			Comentario Nuevo
		</td>
		<td width="20%">
			<img align="right" id="cerrar_comentarios" width="20" height="20" style="margin:4px 10px; cursor:pointer;" alt="Çerrar" title="cerrar" src="img/cerrar.png"></td>
		</td>
	</tr>
		<tr align="center">
			<td class="titulo" colspan="3"><strong>Comentario Nuevo</strong></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td align="center" colspan="3">
				<textarea style="width:90%" rows="10" name="seguimiento" id="seguimiento"></textarea>
			</td>
		</tr>
		
				<tr>
			<td align="center" width="33%">
				<div id="aceptar" class="boton_c">ACEPTAR</div>
			</td>
			<td align="center" width="33%"><div style="display:none;" id="info"></div></td>
			<td align="center" width="33%">
				<div id="cancelar" class="boton_c">CANCELAR</div>
			</td>
		</tr>
	</table>
		<?
		$sql_comentarios=mysql_query("SELECT * FROM legal_observaciones WHERE id_demanda = '$id' ORDER BY fecha_captura DESC");
		?>
<table id="tabla_comentarios" aling="center" width="90%">
	<tr style="border:2px solid;">
		<th> FECHA</th>
		<th> COMENTARIO</th>
		<th> USUARIO</th>
	</tr>
	<?
	while ($reg=mysql_fetch_array($sql_comentarios)) {
		?>
		<tr align="center">
			<td align="center" style="border:1px solid;"  width="25%" align="left"><? echo $reg['fecha_captura'];?></td>
			<td align="center" style="border:1px solid"  width="55%" align="left"><? echo $reg['observacion'];?></td>
			<td align="center" style="border:1px solid"  width="10%" align="left"><? echo $reg['capturo'];?></td>
		</tr>
		<?
	}
	?>

</table>


</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#cerrar_comentarios').click(function(){
			$('#coment').remove();
			$('#coment').empty();
		});



	$('#cancelar').click(function(){
		$('#coment').hide(200,function(){
			$('#coment').remove();

		})
	})

	$('#aceptar').click(function(){
		$('#aceptar,#cancelar,#tabla_comentarios').hide(200);
		$.ajax({
			url : 'control.insertar_comentario.inc.php',
			cache : false ,
			type : 'POST',
			data : 'id=<? echo $id;?>&observacion=' + $('#seguimiento').val() ,
			beforeSend : function(){
				$('#coment').html("Cargando...");
		
			},
			success : function(data){
				$('#coment').remove();
				
			}

		})


	})


	})
</script>
<?

}else{

}
?>
