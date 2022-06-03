<?php

    	include 'conexion.php';
        $objeto = new Cconexion();
        $conexion = $objeto->ConexionDB();
        //$tracking = $_POST['tracking'];
        $x = $_POST['X'];
        $y = $_POST['Y'];
        $fecha = date('d-m-Y');

        define('KB', 1024);
        define('MB', 1048576);
        define('GB', 1073741824);
        define('TB', 1099511627776);
        $formatos = array(
        'application/pdf',
        'image/jpeg',
        'image/jpg',
        'image/gif',
        'image/png',
        'video/mp4'
    );
       # foreach($foto as $key => $value){
       #    echo $key.' '.$value.'->'; 
       #    }

            $consulta = "INSERT INTO tb_entidad (ENTIDAD, DESCRIPCION, TIPO_CLASIFICACION, LUGAR, ARCHIVO_ADJUNTO, X, Y, DNI) VALUES
            ('Tracking', 'Track de puntos', '1', 'Alrededores del IGN', 'foto', '$x','$y', '40805146')";
            $result = $conexion->prepare($consulta);
            $result->execute();
            echo 1;
      



 ?>