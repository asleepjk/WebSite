<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://js.arcgis.com/4.23/"></script>
    <style>
      html, body, #viewDiv {
        padding: 0;
        margin: 0;
        height: 100%;
        width: 100%;
      }
           .esri-icon-visible:before {
        content: "\e613" !important;
        color: inherit;
      }

      .esri-icon-non-visible:before {
        content: "\e612" !important;
        color: inherit;
      }
    
        .esri-popup__main-container{
            max-height: 640px !important;
        }
        
    </style>
<link rel="stylesheet" href="https://js.arcgis.com/4.23/esri/themes/light/main.css">

<script>

    
(function(){
    var parametros =

	{
		"obtener_ubicacion" : "1"
	}; 
    
    $.ajax({
        dataType: 'json',
        data: parametros,
        url: "bd/obtener_ubicacion.php",
        type: "POST",
        success: function(datos){
            var entidad = datos.ENTIDAD;
            var descripcion = datos.DESCRIPCION;
            var X = datos.X;
            var Y = datos.Y;
            var lugar = datos.LUGAR;
            var clasificacion = datos.SIMBOL;
            var url = datos.ARCHIVO;
            console.log(datos[0].X, datos[0].Y);

    

    

var locs = ["51.38254, -2.362804", "51.235249, -2.297804", "-77.021805, -12.093039"]
//var nombres = [data.codigo, "Hola 2", "Compañia de Transportes IV DE"]
//var contenido = ["COMPAÑIA DE TRANSPORTES PRUEBA"]
//var ep = ["3 Oficiales"]
var simbolos = ["https://static.arcgis.com/images/Symbols/Shapes/YellowStarLargeB.png"]


         require([
      "esri/Map",
      "esri/views/MapView",
      "esri/Graphic",
      "esri/layers/GraphicsLayer",
      "esri/geometry/Point",
      "esri/geometry/Polyline",
      "esri/geometry/Polygon",
      "esri/symbols/SimpleMarkerSymbol",
      "esri/symbols/SimpleLineSymbol",
      "esri/symbols/SimpleFillSymbol",
      "esri/geometry/Multipoint",
      "esri/layers/FeatureLayer",
      "esri/geometry/Point"
      
    ], function(Map, MapView, Graphic, GraphicsLayer, Point, Polyline, Polygon, SimpleMarkerSymbol, SimpleLineSymbol, SimpleFillSymbol, Multipoint, FeatureLayer,  
    Point) {
        
      
          var map = new Map({
            basemap: "satellite"
          });
      
          var view = new MapView({
            container: "viewDiv",
            map: map,
            center: [-77.021805, -12.093039], // longitude, latitude
            zoom: 6
          });

          
          
          var graphicsLayer = new GraphicsLayer();
          map.add(graphicsLayer);
       
      
         
          for (i = 0; i < datos.length; i++) {
            // create a point 
             var Point ={
              type: "point",
              longitude: datos[i].X, //check if the point is longitude and change accordingly
               latitude: datos[i].Y //check if the point is latitude and change accordingly

             };
              
              let symbol = {
                  type: "picture-marker",  // autocasts as new PictureMarkerSymbol()
                  url: simbolos[0],
                  width: "64px",
                  height: "64px"
                };

             //*** ADD ***//
            // Create attributes
              var url = 'https://www.idemil.gob.pe/registros/images/upload/';
              
            var attributes = {
              Name: "IV DE",  // The name of the
              Location: "Parte Diario",  // The owner of the
            };
            // Create popup template
            var popupTemplate = {
              title: datos[i].ENTIDAD,
              content: "<br><li> DESCRIPCIÓN: " + datos[i].DESCRIPCION
                        + "<br><li> LUGAR: " + datos[i].LUGAR
                        + "<br><li> CLASIFICACION: " + datos[i].SIMBOL
                        + "<br><li> X: " + datos[i].X 
                        + "<br><li> Y: " + datos[i].Y
                        + "<br><img src=" + "'" + url + datos[i].ARCHIVO + "'"+ "alt='Imagen'>"
            };

            var pointGraphic = new Graphic({
              geometry: Point,
              symbol: symbol,
              //*** ADD ***//
              attributes: attributes,
              popupTemplate: popupTemplate
            });

            graphicsLayer.add(pointGraphic);
          
          }
             
         

        });
            
                
            
            }
        
        
        
    })
    })();
        </script>
    <div id="viewDiv"></div>
    
    
