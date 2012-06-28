<? 	include('conexion.php');
error_reporting(0);
	include('top.php');
	$sql_empresa=mysql_query("SELECT id_empresa,empresa FROM legal_empresa");
	$sql_gerente=mysql_query("SELECT id_gerente,gerente FROM legal_gerentes");
	$sql_demandado=mysql_query("SELECT id_demandado,empresa FROM legal_demandado");
	$sql_estado=mysql_query("SELECT id_estado,estado FROM legal_estados");

?>
<script language=""="JavaScript">
    function conMayusculas(field) {
            field.value = field.value.toUpperCase()
}
</script>
<div style="background:rgb(252,252,252);border:3px solid black;">
<table cellpadding="0" cellspacing="0" align="center" width="80%" border="0">
		<tr height="50px" >
	
		<td align="right" width="15%"><strong>Demandado :</strong></td>
		<td align="left" width="25%">
			<input style="margin:5px 15px;" name="demandado" id="demandado" onChange="conMayusculas(this)" size="25">
		</td>
		</td>
			<td colspan="2" align="right" width="60%"><strong style="margin:auto 25px;">
									<? echo date("d-m-Y");?>
									  </strong>
		</td>
	</tr>
	<tr height="50px">
		<td align="right" width="15%"><strong>No Nomina:</strong></td>
		<td align="left" width="10%">
			<input style="margin:5px 15px;" size="10" name="no_nomina" id="no_nomina">
			<td width="75%" colspan="4">
	<strong>Actor:</strong>:<input type="text" name="actor" id="actor" size="35" onChange="conMayusculas(this)">
</td>
	</tr>
	<tr height="50px" >
		<td align="right" width="15%"><strong>Gerente :</strong></td>
		<td align="left" width="25%">
			<select style="margin:5px 15px;" id="gerente" name="id_gerente">
					<option value=""></option>
						<?
					while($reg=mysql_fetch_array($sql_gerente)){
						?>
					<option value="<?echo $reg['id_gerente'];?>"><?echo utf8_encode($reg['gerente']);?></option>
						<?
					}
					?>
			</select>
		</td>
		<td colspan="3" width="60%"></td>
	</tr>

	<tr height="50px" >
		<td align="right" width="15%"><strong>Junta :</strong></td>
		<td align="left" width="25%">
			<input style="margin:5px 15px;" onChange="conMayusculas(this)" id="junta" type="text" size="22" name="junta">
		</td>
		<td align="right" width="15%"><strong>Expediente :</strong></td>
		<td align="left" width="25%">
					<input style="margin:5px 15px;"  type="text" onChange="conMayusculas(this)" name="expediente" id="expediente">
			</select>
		</td>
		<td width="20%"></td>
	</tr>

	<tr height="50px" >
		<td align="right" width="15%"><strong>Estado :</strong></td>
		<td align="left" width="30%">
			<select style="margin:5px 15px;" id="estado" name="id_estado">
					<option value=""></option>
						<?
					while($reg=mysql_fetch_array($sql_estado)){
						?>
					<option value="<?echo $reg['id_estado'];?>"><?echo utf8_encode($reg['estado']);?></option>
						<?
					}
					?>
			</select>
		</td>
		<td colspan="3"  width="25%"><strong>E.Federativa :</strong>
	
			<select style="margin:5px 15px; width:120px" id="entidad" name="id_entidad">
			</select>
		</td>
		<td width="20%"></td>
	</tr>
	<tr height="50px" >
		<td align="right" width="15%"><strong>Observaciones</strong></td>
		<td colspan="6" align="center" width="25%">
			<textarea id="observacion" name="observacion" style="width:97%" rows="5"></textarea>
		</td>
	</tr>
	<tr height="50px" >
		<td align="right" width="15%">
			<strong></strong>
		</td>
		<td colspan="6" align="center" width="25%">
			<div id="enviar" class="boton"><div align="center" style="padding:1px 1px">Enviar</div></div>
		</td>
	</tr>
</table>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#no_nomina').blur(function(){
			$.ajax({
				url : 'access_datos.php',
				type : 'POST',
				cache : false,
				data : 'id=' + $('#no_nomina').val() +"&empresa=" + $('#demandado').val()  ,
				beforeSend : function(){
					$('#nombre').html('Buscando nombre..');
				},
				success : function(data){	
					$('#nombre').css('display','block');				
					$('#nombre').html(data);
					
				}
			})
		})



		$('#estado').change(function(){
			$.ajax({
				url : 'entidades_federativas.php',				type : 'POST',
				cache : false ,
				data : 'id_estado=' + $('#estado').val() ,
				success: function(data){
					$('#entidad').html(data);
				}

			})
		})

		$('#enviar').click(function(){
			$('.error').empty();
			if ($('#demandado').val()=="") {
				$('#demandado').after('<strong class="error">*</strong>');
			}
			if ($('#no_nomina').val()=="") {
				$('#no_nomina').after('<strong class="error">*</strong>');
			}
			if ($('#junta').val()=="") {
				$('#junta').after('<strong class="error">*</strong>');
			}
			if ($('#gerente').val()=="") {
				$('#gerente').after('<strong class="error">*</strong>');
			}
			if ($('#estado').val()=="") {
				$('#estado').after('<strong class="error">*</strong>');
			}else{
			
			$('body').append("<div align='center' id='fondo'></div>")
			$('#fondo').css('display','block');
			$('#fondo').load('captura.info.php',function(data){
				$('#fondo').html(data);
			});
			
			$.ajax({
				url : 'captura.insertar_demanda.php',
				type : 'POST',
				cache : false , 
				data : 'junta=' + $('#junta').val() + '&gerente=' + $('#gerente').val() + '&actor=' + $('#actor').val()  + '&estado=' + $('#estado').val() + '&entidad=' + $('#entidad').val() + '&demandado=' + $('#demandado').val() + '&observaciones=' + $('#observacion').val() + "&expediente=" + $('#expediente').val() + "&no_nomina=" + $('#no_nomina').val() ,
				beforeSend : function(){
				 var x=0;
				$('#suceso').html('<p>Cargando..</p>');
				while(x<=10){
				$('p').fadeOut(650);
				$('p').fadeIn(650);
				x++;
					}
				},
				success : function(data){
					$('p').remove();
					$('#suceso').html('<div> Listo demanda agregada</div><img src="img/listo.png" width="25" style="margin:20px auto;" height="25"> '	);
				}
			})
		 }		 
	})


})
</script>