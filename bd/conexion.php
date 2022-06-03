<?php

class Cconexion{

    public static function ConexionDB(){

        $host='SQL5057.site4now.net';
        $dbname='db_a87e1a_ignregistros';
        $username='db_a87e1a_ignregistros_admin';
        $pasword='asleep22115';
        //$puerto=1433;

        try{
             $conn = new PDO ("sqlsrv:Server=$host;Database=$dbname",$username,$pasword);
        }
        catch(PDOException $exp){
            echo ("No se logró conectar correctamente con la base de datos: $dbname, error: $exp");
        }

        return $conn;
    }

}

?>