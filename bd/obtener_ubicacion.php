<?php
	include 'conexion.php';
	$objeto = new Cconexion();
	$conexion = $objeto->ConexionDB();


		if(isset($_POST['obtener_ubicacion']))
	{
    
            $consulta = "SELECT te.ID, te.ENTIDAD, te.DESCRIPCION, te.LUGAR, tc.SIMBOL, te.X, te.Y, right(te.ARCHIVO_ADJUNTO,36) AS ARCHIVO_ADJUNTO FROM TB_ENTIDAD te 
	       INNER JOIN TB_CLASIFICACION tc ON ( te.TIPO_CLASIFICACION = tc.TIPO_CLASIFICACION  )";
            $result = $conexion->prepare($consulta);
            $result->execute();
            
            $coords = array();
            
            while ($get = $result->fetch(PDO::FETCH_BOTH))
            {   $coords[] = array(
            
                'ENTIDAD' => $get['ENTIDAD'],
                'DESCRIPCION' => $get['DESCRIPCION'],
                'LUGAR' => $get['LUGAR'],
                'SIMBOL' => $get['SIMBOL'],
                'X' => $get['X'],
                'Y' => $get['Y'],
                'ARCHIVO' => $get['ARCHIVO_ADJUNTO']
                );
            }
            
            $datos = json_encode($coords);
            echo $datos;
    }

?>