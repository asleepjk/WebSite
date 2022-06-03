<?php
	include 'conexion.php';
	$objeto = new Cconexion();
	$conexion = $objeto->ConexionDB();


		if(isset($_POST['obtener_ubicacion']))
	{
    
            $consulta = "SELECT te.ID, te.X, te.Y, tp.COLOR FROM TB_ENTIDAD te 
	       INNER JOIN TB_CLASIFICACION tc ON ( te.TIPO_CLASIFICACION = tc.TIPO_CLASIFICACION  )
		   INNER JOIN TB_PERSONA tp ON ( te.DNI = tp.DNI  )
           where tp.dni is not null order by ID";
            $result = $conexion->prepare($consulta);
            $result->execute();
            
            $coords = array();
            
            while ($get = $result->fetch(PDO::FETCH_BOTH))
            {   $coords[] = array(
            
                'X' => $get['X'],
                'Y' => $get['Y'],
                'COLOR' => $get['COLOR']
                );
            }
            
            $datos = json_encode($coords);
            echo $datos;
    }

?>