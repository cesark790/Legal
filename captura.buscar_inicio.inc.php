<div style="width:90%;border:2px solid black;">
	<?
	include("conexion.php");
	$sql_demandados=mysql_query("SELECT id_demandado,empresa FROM legal_demandado");
	?>
	<tables style="margin:20px auto;" width="100%">
		<tr height="30px">
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
<br>
<div style="border:2px solid rgb(230,230,230);" id="tabla_info">

</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#no_nomina,#expediente').blur(function(){
			$.ajax({
				url : "captura.buscar_resultado.php",
				type : "POST",
				cache : false,
				data: "no_nomina=" + $('#no_nomina').val() + "&expediente=" + $('#expediente').val() + "&demandado=" + $('#demandado').val() ,
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