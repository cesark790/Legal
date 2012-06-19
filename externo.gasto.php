<link rel="stylesheet" type="text/css" href="css/nueva.css">
<table width="100%" cellspacing="0">
	<tr style="background:black">
		<td width="80%" style="color:white;font-family:helvetica; padding:0px 10px; font-weight:bold; ">
			Ingresar un Gasto
		</td>
		<td width="20%">
			<img align="right" id="cerrar_gasto" width="20" height="20" style="margin:4px 10px; cursor:pointer;" alt="Çerrar" title="cerrar" src="img/cerrar.png"></td>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<fieldset>
				<legend>Concepto</legend>
				<input type="hidden" id="id_demanda" value="<? echo $_POST['id_demanda'];?>">
				<input type="text" name="concepto" id="concepto" size="50">
			</fieldset>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<fieldset>
				<legend>Monto</legend>
				$ &nbsp;<input style="text-align:right;" type="text" name="monto" id="monto" size="5" value=".00">
			</fieldset>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<fieldset>
				<legend>Referencia Bancaria</legend>
				<input type="text" name="referencia" id="referencia" size="50">
			</fieldset>
		</td>
	</tr>
	<tr>
		<td>
			<div id="ver_total_gastos" class="boton" style="text-align:center;width:180px">Ver total de gastos</div>
		</td>
		<td align="center">
			<div id="agregar" class="boton" style="text-align:center;">Agregar</div>		
		</td>
	</tr>
	<tr>
		<td colspan="2" align="center">
			<div id="info_gasto" style="display:none;width:200px; border:3px solid #ccc;background:rgb(239,239,239);"></div>
		</td>
	</tr>
</table>
<script type="text/javascript">
	$('#concepto').click(function(){
		$('#info_gasto').slideUp(250);
	})
	$('#cerrar_gasto').click(function(){
		$('#gasto').remove();
	})

	$('#ver_total_gastos').click(function(){
		$('body').append("<div id='tabla_gastos'></div>")
		$.ajax({
		url : 'externo.gasto_tabla.php',
		type : 'POST',
		cache : false,
		data : 'id_demanda=' + $('#id_demanda').val(),
		success : function(data){
			$('#tabla_gastos').html(data);
			}
		})
	})

	$('#agregar').click(function(){
		$.ajax({
			url : 'externo.insertar_gasto.php',
			type : 'POST',
			cache : false,
			data : 'refencia=' + $('#referencia').val() + '&id_demanda=' + $('#id_demanda').val() + '&concepto=' + $('#concepto').val() + '&monto=' + $('#monto').val() + '&saldo=' + $('#saldo').val() + '&referencia=' + $('#referencia').val(),
			beforeSend : function(){
				$('#info_gasto').slideDown(500).html('<div align="center">Agregando....</div>');
			},
			success : function(){
				$('#info_gasto').html('<div align="center">Agregado Correctamente</div>');
				alert("Gasto Agregado");
				$('input:text').val("");
			}

		})
	})
</script>