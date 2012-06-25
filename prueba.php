<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Pagina Prueba</title>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui-1.8.16.custom.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/sunny/jquery-ui-1.8.17.custom.css">
	<script type="text/javascript" src="js/jquery-ui-timepicker-addon.js"></script>
	<link rel="stylesheet" type="text/css" href="css/jquery-ui-timepicker-addon.css">
	<script type="text/javascript" src="js/jquery-ui-sliderAccess.js"></script>
	<script type="text/javascript" src="js/jquery-es.js"></script>
</head>
<body>
<input type="text" id="prueba">
<script type="text/javascript">
	$(document).ready(function(){
		$('#prueba').datetimepicker();	
	})
</script>
</body>
</html>