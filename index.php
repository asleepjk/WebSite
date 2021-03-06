<!DOCTYPE html>
<html lang="es">

<head>
<title>IGN - REGISTROS</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="icon" type="image/png" href="images/icons/favicon.ico" />

<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">

<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">

<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">

<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">

<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">

<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">

<link rel="stylesheet" type="text/css" href="css/util.css">
<link rel="stylesheet" type="text/css" href="css/main.css">
<script src="jquery/jquery-3.3.1.min.js"></script>  
<script src="js/cargar_clasificacion.js"></script>


</head>
<body>
<div class="container-contact100">
<div class="wrap-contact100">
<form name="Registros" id="Registros" class="contact100-form validate-form" enctype="multipart/form-data" method="post">
<span class="contact100-form-title">
IGN REGISTROS
</span>
<label class="label-input100" for="first-name">Entidad *</label>
<div class="wrap-input100 rs1 validate-input">
<input id="entidad" class="input100" type="text" name="entidad" placeholder="Entidad">
<span class="focus-input100"></span>
</div>
<!--<div class="wrap-input100 rs1 validate-input">
<input class="input100" type="text" name="last-name" placeholder="Last name">
<span class="focus-input100"></span>
</div>-->
<label class="label-input100" for="email">Lugar *</label>
<div class="wrap-input100 validate-input">
<input id="lugar" class="input100" type="text" name="lugar" placeholder="Ejem: Av. Aramburú 1184, Surquillo">
<span class="focus-input100"></span>
</div>
    
<label class="label-input100" for="clasificacion">Clasificación *</label>
<div class="wrap-input100 validate-input">
<select id="clasificacion" name="clasificacion" class="custom-select form-control">
     <!-- cargar con js --> 
</select>
<span class="focus-input100"></span>
</div>
    
<!--<label class="label-input100" for="phone">Phone Number</label>
<div class="wrap-input100">
<input id="phone" class="input100" type="text" name="phone" placeholder="Eg. +1 800 000000">
<span class="focus-input100"></span>
</div>-->
<label class="label-input100" for="descripcion">Descripción *</label>
<div class="wrap-input100 validate-input">
<textarea id="descripcion" class="input100" name="descripcion" placeholder="Escriba una descripción..."></textarea>
<span class="focus-input100"></span>
</div>
    
<label class="label-input100" for="archivo">Archivo Adjunto *</label>
<div class="wrap-input100 validate-input">
    <input id="archivo" class="input100" type="file" name="archivo" placeholder=""><br>
<span class="focus-input100"></span>
</div>

<div class="container-contact100-form-btn">
<button class="contact100-form-btn" id="registrar">
<span>
Enviar
<i class="zmdi zmdi-arrow-right m-l-8"></i>
</span>
</div>

<div class="container-contact100-form-btn">
<button class="contact100-form-btn" id="cancelar">
<span>
Cancelar
<i class="zmdi zmdi-arrow-right m-l-8"></i>
</span>
</div>
    
   <div class="barra">
    
       <div class="barra_azul" id="barra_azul">
            <span></span>
       </div>
  
   </div>
    
    <script>
    
        function limpiar(){
        $("#entidad").val('');
        $("#lugar").val('');
        $("#clasificacion").val('');
        $("#descripcion").val('');
        $("#archivo").val('');
        }

    </script>
    
    <script>
        

    
        function registrar_entidad()
{
    
        if(navigator.geolocation)
        navigator.geolocation.getCurrentPosition(function(position){
            
            let x = position.coords.longitude;
            let y = position.coords.latitude;
            console.log(x);
            console.log(y);
            
        var ab = document.getElementById("archivo").value.replace('C:\\fakepath\\','');
            
        var param = new FormData(document.getElementById("Registros"));
        param.append("X", x);
        param.append("Y", y);
                   
    var parametros =

	{
		"registrar" : "1",
		"entidad":$("#entidad").val(),
        "lugar":$("#lugar").val(),
        "clasificacion":$("#clasificacion").val(),
        "descripcion":$("#descripcion").val(),
        "archivo":$("#archivo").val(),
        "X": x,
        "Y": y
	};
            console.log("Created FormData, " + [...param.keys()].length + " keys in data");
            
	$.ajax({
		data: param,
		url: 'bd/registrar.php',
		type: 'POST',
        processData:false,
        contentType:false,
		beforeSend: function()
		{
		},
		error: function()
		{
			alert("error");
		},
		complete: function()
		{	

		},
		success: function(data)
		{
            if (data == 1) {
		   Swal.fire({
           icon:'success',
           title:'¡Registro de Entidad Correcto!',
           confirmButtonColor: '#3085d6',
           showConfirmButton: false,
           timer: 1200,
           })
           limpiar();
           console.log(data);
            }
            else if(data == 3){
            Swal.fire({
           icon:'warning',
           title:'¡El tamaño del archivo debe ser menor a 3Mb!',
           confirmButtonColor: '#3085d6',
           showConfirmButton: false,
           timer: 1200,
           })
            console.log(data);
            }
            else if(data == 4){
            Swal.fire({
           icon:'error',
           title:'Archivo no válido',
           confirmButtonColor: '#3085d6',
           showConfirmButton: false,
           timer: 1200,
           })
            console.log(data);
            }
            else{
           Swal.fire({
           icon:'warning',
           title:'¡Ha ocurrido un error!',
           confirmButtonColor: '#3085d6',
           showConfirmButton: false,
           timer: 1200,
           })
           console.log(data);
           limpiar();
                }
		}
	})
            
            
        });
        else
            console.log("no se puede");
    

 }
    
    </script>
    

    


</div></form>
</div>


<script src="vendor/animsition/js/animsition.min.js"></script>

<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<script src="vendor/select2/select2.min.js"></script>

<script src="vendor/daterangepicker/moment.min.js"></script>
<script src="vendor/daterangepicker/daterangepicker.js"></script>

<script src="vendor/countdowntime/countdowntime.js"></script>
    
<script src="js/ingresar_registros.js"></script>
<!--<script src="js/main.js"></script>-->

    
<link rel="stylesheet" href="plugins/sweetalert/sweetalert2.min.css">
<script src="plugins/sweetalert/sweetalert2.all.min.js"></script> 
    


</body>
</html>
