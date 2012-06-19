<div style="width:95%;">
	<?
	include("conexion.php");
	$sql_demandados=mysql_query("SELECT id_demandado,empresa FROM legal_demandado");
	?>
<br>
<div style="border:1px solid black;margin:10px auto;">
	<div style="margin:10px auto;"><strong>Buscar por No. Nomina segun la empresa o buscar por No. Expediente :</strong></div>
	<br>
	<tables style="margin:20px auto;" width="100%">
		<tr height="130px">
			<td align="right" width="10%"> Empresa : </td>
			<td align="left" width="10%">
				<select id="demandado">
					<?
					while($reg=mysql_fetch_array($sql_demandados)){
						?>
						<option value="<?echo $reg['id_demandado'];?>"><?echo $reg['empresa'];?></option>
						<?
					}
					?>
				</select>
			</td>
			<td align="right" width="20%"> No. Nomina : </td>
			<td align="left" width="10%"><input style="text-align:center;" type="text" name="no_nomina" id="no_nomina" size="5"></td>
			<td width="10%"></td>
		</tr>
	</table>
	<table>
		<tr>
			<td align="right" width="20%"> Expediente : </td>
			<td align="left" width="20%"><input style="text-align:center;" type="text" name="expediente" id="expediente" size="15"></td>
		</tr>
	</table>
</div>
<div id="tabla_info">

</div>
<br>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#no_nomina,#expediente').blur(function(){
			$.ajax({
				url : "control.buscar_resultado.php",
				type : "POST",
				cache : false,
				data: "r=2&no_nomina=" + $('#no_nomina').val() + "&expediente=" + $('#expediente').val() + "&demandado=" + $('#demandado').val() ,
				beforeSend : function(){
				x=0;
				$('#tabla_info').html('<p>Cargando..</p>');
				while(x<=10){
				$('p').fadeOut(650);
				$('p').fadeIn(650);
				x++;
				}
			},
				success:function(data){
					$('#tabla_info').html(data);
				}
			})

		})
	})
</script>