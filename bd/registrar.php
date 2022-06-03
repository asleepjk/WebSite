<?php
	include 'conexion.php';
	$objeto = new Cconexion();
	$conexion = $objeto->ConexionDB();

		$entidad = $_POST['entidad'];
        $lugar = $_POST['lugar'];
        $clasificacion = $_POST['clasificacion'];
        $descripcion = $_POST['descripcion'];
        $foto = $_FILES['archivo'];
        //$archivo = $_POST['archivo'];
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
        'video/*'
    );
        $array = explode('.', $foto['name']);
        $ext = end($array);

       # foreach($foto as $key => $value){
       #    echo $key.' '.$value.'->'; 
       #    }
        
        if((in_array($foto["type"],$formatos)) && ($foto["size"] <= 3*MB)){
            $nom_encriptado = md5($foto["tmp_name"]);
            $ruta = "../images/upload/".$nom_encriptado.".".$ext;
            move_uploaded_file($foto["tmp_name"],$ruta);
            $consulta = "INSERT INTO tb_entidad (ENTIDAD, DESCRIPCION, TIPO_CLASIFICACION, LUGAR, ARCHIVO_ADJUNTO, X, Y) VALUES
            ('$entidad', '$descripcion', '$clasificacion', '$lugar', '$ruta', '$x','$y')";
            $result = $conexion->prepare($consulta);
            $result->execute();
            echo 1;
        }
        else if(($foto["type"] == 'video/mp4') && ($foto["size"] <= 25*MB)){
            $nom_encriptado = md5($foto["tmp_name"]);
            $ruta = "../images/upload/".$nom_encriptado.".".$ext;
            move_uploaded_file($foto["tmp_name"],$ruta);
            $consulta = "INSERT INTO tb_entidad (ENTIDAD, DESCRIPCION, TIPO_CLASIFICACION, LUGAR, ARCHIVO_ADJUNTO, X, Y) VALUES
            ('$entidad', '$descripcion', '$clasificacion', '$lugar', '$ruta', '$x','$y')";
            $result = $conexion->prepare($consulta);
            $result->execute();
            echo 1;
        }
        else if((in_array($foto["type"],$formatos)) && ($foto["size"] > 3*MB)){
            echo 3;
        }
        else if((!in_array($foto["type"],$formatos))){
            echo 4;
        }
            
        

	

?>