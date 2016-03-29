<?php
if(isset($_POST["idestado"])){

		$opciones = '<option value="0"> Elige una Ciudad</option>';

		$conexion= new mysqli("localhost","root","","ejemplo");
		$strConsulta = "SELECT * FROM ciudades WHERE id_estado = ".$_POST["idestado"];
		$result = $conexion->query($strConsulta);
		

		while( $fila = $result->fetch_array() )
		{
			$opciones.='<option value="'.$fila["id_ciudad"].'">'.$fila["ciudad"].'</option>';
		}

		echo $opciones;
	}


?>
