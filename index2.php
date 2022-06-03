<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IGN - REGISTROS</title>
    
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    
    <link rel="stylesheet" type="text/css" href="css/util.css">
    
    <link rel="stylesheet"href="css/main.css">
    
    <script src="jquery/jquery-3.3.1.min.js"></script> 
</head>
<body>
<div class="container-contact100">
     <div class="wrap-contact100">   
        <span class="contact100-form-title">
        IGN REGISTROS
        </span>
        <form action=""id="Registros">
            
            <label class="label-input100" for="first-name">Entidad *</label>
            <div class="wrap-input100 rs1 validate-input">
            <input id="entidad" class="input100" type="text" name="entidad" placeholder="Entidad">
            <span class="focus-input100"></span>
            </div>
            
            <label class="label-input100" for="email">Lugar *</label>
            <div class="wrap-input100 validate-input">
            <input id="lugar" class="input100" type="text" name="lugar" placeholder="Ejem: Av. Aramburú 1184, Surquillo">
            <span class="focus-input100"></span>
            </div>
            
            <label class="label-input100" for="clasificacion">Clasificación *</label>
            <div class="wrap-input100 validate-input">
            <select id="clasificacion" name="clasificacion" class="custom-select form-control label-input100">
                 <!-- cargar con js --> 
            </select>
            <span class="focus-input100"></span>
            </div>
            
            <label class="label-input100" for="descripcion">Descripción *</label>
            <div class="wrap-input100 validate-input">
            <textarea id="descripcion" class="input100" name="descripcion" placeholder="Escriba una descripción..."></textarea>
            <span class="focus-input100"></span>
            </div>
            
            <div class="form-1-2">
            <label class="label-input100" for="archivo">Archivo Adjunto *</label>
            <input type="file"name="archivo"required>
            </div>
            
            <div class="barra">
                <div class="barra_azul"id="barra_estado">
                     <span></span>
                 </div>
            </div>
            
            <div class="acciones">
                <input type="submit" class="contact100-form-btn" value="Enviar">
                <input type="button" class="contact100-form-btn" id="cancelar"value="Cancelar">
            </div>

        </form>
    </div>
    </div>
    
    <script src="js/subir_archivo.js"></script>
    <script src="js/cargar_clasificacion.js"></script>
        
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
</html>