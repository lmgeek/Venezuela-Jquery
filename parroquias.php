<?php
if(isset($_POST["idmcpio"])){

		//Buscar Municipios
		$opciones3 = '<option value="0"> Elige una Parroquia</option>';

		$conexion= new mysqli("localhost","root","","ejemplo");
		$strConsulta3 = "SELECT * FROM parroquias WHERE id_municipio = ".$_POST["idmcpio"];
		$result3 = $conexion->query($strConsulta3);
		

		while( $fila3 = $result3->fetch_array() )
		{
			$opciones3.='<option value="'.$fila3["id_parroquia"].'">'.$fila3["parroquia"].'</option>';
		}

		echo $opciones3;
	}

	
?>