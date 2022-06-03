<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8"/>
    <meta name="viewport"content="width=device-width,initial-scale=1.0"/>
    <title>Tracking location</title>
      
      <script src="jquery/jquery-3.3.1.min.js"></script> 
  </head>
  <body>
    <button id="start">Iniciar </button>
    <button id="stop">Detener</button>
    <script>
        
      const start = document.querySelector("#start");
      const stop = document.querySelector("#stop");
        
      const coordinates = [];
        
      start.addEventListener("click",() => {
        navigator.geolocation.watchPosition(
          data => {
            console.log(data);
            coordinates.push([data.coords.latitude, data.coords.longitude]);
            window.localStorage.setItem("coordinates", JSON.stringify(coordinates))
              
            var parametros = 
            {
                "X": data.coords.longitude,
                "Y": data.coords.latitude
            };
            
    
	       $.ajax({
               data: parametros,
	           url : "bd/tracking.php",
	           type : "POST",
	           success:function(data){
	              console.log(data);
	           }
	       });
              
          },
          error => console.log(error),
            {
                enableHighAccuracy: true
            }
        );
                                                                               

      });
    </script>
  </body>
                                                                        