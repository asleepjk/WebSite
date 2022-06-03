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
        url: "bd/obtener_linea.php",
        type: "POST",
        success: function(datos){
            console.log(datos[0].COLOR);

    

    

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
        
             
            var coords = [];
             
            
            for(i=0; i < datos.length; i++){
                coords.push([datos[i].X, datos[i].Y]);
            }
      
          var map = new Map({
            basemap: "satellite"
          });
      
          var view = new MapView({
            container: "viewDiv",
            map: map,
            center: coords[coords.length - 1], // longitude, latitude
            zoom: 19
          });

          
          
          var graphicsLayer = new GraphicsLayer();
          map.add(graphicsLayer);
       
      
         
 
              
       /*************************
       * Create a polyline graphic
       *************************/
      //path = new Array(datos[i].X, datos[i].Y);
              
        //const coords = [datos[i].X, datos[i].Y];      
            

             
   
        
      // First create a line geometry (this is the Keystone pipeline)
const polyline = {
    type: "polyline",
    paths: [coords]// autocasts as new Polyline()
  };
             
             //polyline.addPath(coords);
            //polyline.addPath(datos[i].X);
            console.log(coords);
            //console.log(path);
        

      // Create a symbol for drawing the line
      var lineSymbol = new SimpleLineSymbol({
        color: datos[0].COLOR,
        width: 5
      });

      // Create an object for storing attributes related to the line
      var lineAtt = {
        Nombre: "Prueba de puntos",
        IGN: "IGN",
        Prueba: "Prueba"
      };

      /*******************************************
       * Create a new graphic and add the geometry,
       * symbol, and attributes to it. You may also
       * add a simple PopupTemplate to the graphic.
       * This allows users to view the graphic's
       * attributes when it is clicked.
       ******************************************/
      var polylineGraphic = new Graphic({
        geometry: polyline,
        symbol: lineSymbol,
        attributes: lineAtt,
        popupTemplate: { // autocasts as new PopupTemplate()
          title: "{Nombre}",
          content: [{
            type: "fields",
            fieldInfos: [{
              fieldName: "Nombre"
            }, {
              fieldName: "IGN"
            }, {
              fieldName: "Prueba"
            }]
          }]
        }
      });     
           
    graphicsLayer.add(polylineGraphic);
             
              
      
             
         

        });
            
                
            
            }
        
        
        
    })
    })();
        </script>
    <div id="viewDiv"></div>
    
    
