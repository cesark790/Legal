<table align="center" width="100%" border="0">
	<td style="border:1px solid #ccc;" id="filtro1" align="center" class="opciones" width="20%">Ultimas demandas abiertas</td>
	<td style="border:1px solid #ccc;" id="filtro2" align="center" class="opciones" width="20%">Ultimas demandas cerradas</td>
	<td width="70%"></td>
</table>
<hr>
<div style="background:white;" id="tabla_datos">

</div>
<script type="text/javascript">
$(document).ready(function(){
	$('#tabla_datos').load('captura.historial_tabla.inc.php',function(data){
		$('#tabla_datos').html(data);
	});

	$('#filtro1').click(function(){
		$('#tabla_datos').empty();
		$('#tabla_datos').load('captura.historial_tabla.inc.php',function(data){
		$('#tabla_datos').html(data);
			});
	});

	$('#filtro2').click(function(){
		$('#tabla_datos').empty();
		$.ajax({
			url : 'captura.historial_tabla.inc.php',
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




		})
	
})
</script>

<script type="text/javascript">
function ver(numero,empresa){
	$('#tabla_datos').hide(200,function(){
		$('#tabla_datos').empty();
	});
	$.ajax({
		url : 'captura.buscar_resultado.php',
		type : 'POST',
		cache : false ,
		data : 'id_demanda=' + numero + '&demandado=' + empresa ,
		beforeSend : function(){
			$('#tabla_datos').html('<br><br><br> Cargando..');
		},
		success : function(data){
			$('#tabla_datos').show(200,function(){
				$('#tabla_datos').html(data);
			});			
		}
	})
}

function comentarios(numero){
	$('body').append("<div align='center' id='coment'></div>")
	$.ajax({
		url : 'captura.comentarios.php',
		type : 'POST',
		cache : false ,
		data : 'n=1&id=' + numero ,
		beforeSend : function(){
			$('#coment').html('<br><br><br> Cargando..');
		},
		success : function(data){
			$('#coment').show(200,function(){
				$('#coment').html(data);
			});			
		}
	})


}
</script>