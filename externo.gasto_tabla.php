<link rel="stylesheet" type="text/css" href="css/nueva.css">
<?
error_reporting(0);
include("convierte_moneda.php");
include("conexion.php");
include("top.php");
$color=1;
$sql=mysql_query("SELECT id_gasto,concepto, referencia_bancaria, monto, saldo, capturo, fecha_captura,comprobado FROM legal_gastos WHERE id_demanda = '$_POST[id_demanda]'");
?>
<table width="100%" cellspacing="0">
	<tr style="background:black">
		<td width="80%" style="color:white;font-family:helvetica; padding:0px 10px; font-weight:bold; ">
			Tabla de gastos
		</td>
		<td width="20%">
			<img align="right" id="cerrar_tabla" width="20" height="20" style="margin:4px 10px; cursor:pointer;" alt="Çerrar" title="cerrar" src="img/cerrar.png"></td>
		</td>
	</tr>
</table>
<table cellspacing="0" border="1" align="center" width="100%">
<tr>
	<th width="5%">ID</th>	
	<th width="15%">Fecha de Captura</th>
	<th width="10%">Capturo</th>
	<th width="30%">Concepto de Gasto</th>
	<th width="20%"> Referencia Bancaria</th>
	<th width="10%"> Abono</th>
	<th width="25%"> Cargo</th>
	<th width="10%"> Comprobado</th>
</tr>
<?
while ($reg=mysql_fetch_array($sql)) {
	$color++;
	$suma_monto+=$reg['monto'];
	$suma_saldo+=$reg['saldo'];
?>
	<tr<?if($color%2==0){?> style="background:rgb(245,245,245);"<?}else{?> style="background:white;"<?}?>>
		<td align="center"><? echo $reg['id_gasto'];?></td>
		<td align="center"><? echo convierte_f($reg['fecha_captura']);?></td>
		<td align="center"><? echo $reg['capturo'];?></td>
		<td align="center"><? echo $reg['concepto'];?></td>
		<td align="center"><? echo $reg['referencia_bancaria'];?></td>
		<td align="right"><? echo amoneda($reg['saldo'],pesos);?></td>
		<td align="right"><? echo amoneda($reg['monto'],pesos);?></td>
		<?
		if ($reg['comprobado']==0) {?>
		<td align="center"><button value="<?echo $reg['id_gasto'];?>">Comprobado</button></td>
		<?}else{?>
		<td align="center"><button disabled="disabled">Comprobado</button></td>
		<?}
		?>

	
<?
}
?>
	<tr>
		<td align="center"></td>
		<td align="center"></td>
		<td align="center"></td>
		<td align="center"></td>
		<td align="right"><strong>TOTAL:</strong></td>
		<td align="right"><strong><? echo amoneda($suma_saldo,pesos);?></strong></td>
		<td align="right"><strong><? echo amoneda($suma_monto,pesos);?></strong></td>
		<td align="center"></td>
	</tr>
</table>
<script type="text/javascript">
	$('#cerrar_tabla').click(function(){
		$('#tabla_gastos').remove();
	})

$('button').click(function(){
	var valor=$(this).val();
	 var x= confirm("Confirmar comprobante de gasto");
	 x;
	 if(x==true){
	 	$.ajax({
	 		url : 'externo.comprobar_gasto.php',
	 		type : 'POST',
	 		cache : false ,
	 		data : 'id=' + valor ,
	 		success : function(data){
	 			alert("Gasto Comprobado");
	 		}
	 	})

	 	$(this).attr('disabled','disabled');
	 }else{
	 	
	 }

})
</script>