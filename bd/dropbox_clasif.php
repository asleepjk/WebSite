<?php
    function obtenerClasificacion() {
            require_once 'conexion.php';
            $objeto = new Cconexion();
            $conexion = $objeto->ConexionDB();
        
        
        $consulta = "select tipo_clasificacion, simbol from TB_CLASIFICACION order by SIMBOL asc";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

       $clasificacion = array();
        
        while ($get = $resultado->fetch(PDO::FETCH_BOTH))
		{     $clasificacion[] = array(
                    'tipo_clasificacion' => $get['tipo_clasificacion'],
                    'simbol' => $get['simbol']
                );
			
		}
        $jsonstring = json_encode($clasificacion);
        echo $jsonstring;

    }
        obtenerClasificacion();
?>