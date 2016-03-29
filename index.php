<?php
	$conexion = new mysqli("localhost","root","","ejemplo");

	//Busca y carga de Estados
	$strConsulta = "SELECT * FROM estados";
	$result = $conexion->query($strConsulta);
	$opciones = '<option value="0"> Elige un estado</option>';
	while( $fila = $result->fetch_array() )
	{
		$opciones.='<option value="'.$fila["id_estado"].'">'.$fila["estado"].'</option>';
	}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>Selects combinados JQuery + Ajax + PHP + MySQL</title>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				//Envia parametros de busca y carga de Ciudades
				$("#estado").change(function(){
					$.ajax({
						url:"ciudades.php",
						type: "POST",
						data:"idestado="+$("#estado").val(),
						
						success: function(opciones){
							$("#ciudad").html(opciones);
						}
						
					})
				});

				//Envia parametros de busca y carga de Municipios
				$("#estado").change(function(){
					$.ajax({
						url:"municipios.php",
						type: "POST",
						data:"idestado="+$("#estado").val(),
						
						success: function(opciones2){
							$("#mcpio").html(opciones2);
						}
						
					})
				});

				//Envia parametros de busca y carga de Paroquias
				$("#mcpio").change(function(){
					$.ajax({
						url:"parroquias.php",
						type: "POST",
						data:"idmcpio="+$("#mcpio").val(),
						
						success: function(opciones3){
							$("#parroquias").html(opciones3);
						}
						
					})
				});


			});
		</script>
    </head>
    <body>
		<div> Selects combinados </div>
		<div> <label> Estado:</label> <select id="estado"><?php echo $opciones; ?></select>  </div>
		<div>
			<label> Ciudad:</label>
			<select id="ciudad">
				<option value="0">Elige un modelo</option>
			</select>
		</div>

		<div>
			<label> Municipio:</label>
			<select id="mcpio">
				<option value="0">Elige un municipio</option>
			</select>
		</div>

		<div>
			<label> Parroquias:</label>
			<select id="parroquias">
				<option value="0">Elige una Parroquia</option>
			</select>
		</div>

    </body>
</html>
