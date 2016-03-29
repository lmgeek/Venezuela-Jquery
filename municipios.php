<?php
if(isset($_POST["idestado"])){

		//Buscar Municipios
		$opciones2 = '<option value="0"> Elige un Municipio</option>';

		$conexion= new mysqli("localhost","root","","ejemplo");
		$strConsulta2 = "SELECT * FROM municipios WHERE id_estado = ".$_POST["idestado"];
		$result2 = $conexion->query($strConsulta2);
		

		while( $fila2 = $result2->fetch_array() )
		{
			$opciones2.='<option value="'.$fila2["id_municipio"].'">'.$fila2["municipio"].'</option>';
		}

		echo $opciones2;
	}

	
?>
