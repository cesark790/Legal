<div id="info">
<div align="right">
<div style="width:30px; height:20px; margin:10px 10px; cursor:pointer;">
	<img class="cerrar" title="CERRAR" alt="CERRAR" id="cerrar" src="img/cerrar.jpg"></div>
</div>
<div id="suceso" style="margin:80px; auto;">
</div>
</div>
<script type="text/javascript">

	$('#cerrar').click(function(){
		$('#nombre').css("display","none");
		$('#no_nomina').val("");
		$('#junta').val("");
		$('#demandado').val("");
		$('#expediente').val("");
		$('#gerente').val("");
		$('#estado').val("");
		$('#entidad').val("");
		$('#observacion').val("");
		$('#fondo').remove();
	})
</script>