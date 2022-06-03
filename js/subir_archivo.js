document.addEventListener("DOMContentLoaded", () =>{
    let form = document.getElementById("Registros");

    form.addEventListener("submit", function(event) {
        event.preventDefault();
        subir_archivos(this);
    });
});

function subir_archivos(form){
    let barra_estado = form.children[9].children[0],
         span = barra_estado.children[0],
         boton_cancelar = form.children[10].children[1];
    barra_estado.classList.remove('barra_verde','barra_roja');
                                  
    // peticion
    let peticion = new XMLHttpRequest();
    
    // progreso
    peticion.upload.addEventListener("progress",(event)=>{
        let porcentaje=Math.round((event.loaded/event.total)*100);
        console.log(porcentaje);
        barra_estado.style.width=porcentaje+'%';
        span.innerHTML=porcentaje+'%';
    });
    
    // finalizado
    peticion.addEventListener("load", ()=>{
        barra_estado.classList.add('barra_verde');
        span.innerHTML="Proceso Completado";
    });
    
    
    // enviar datos
    if(navigator.geolocation)
    navigator.geolocation.getCurrentPosition(function(position){
            
    let x = position.coords.longitude;
    let y = position.coords.latitude;
    
    var param = new FormData(document.getElementById("Registros"));
    
    peticion.open('post','bd/subir.php');
    param.append("X", x);
    param.append("Y", y);
    peticion.send(param);
    peticion.onload = function(){
        if(this.responseText == 1){
                console.log('EXITO');
        }
        else if(this.responseText == 4){
                barra_estado.classList.remove('barra_verde');
                barra_estado.classList.add('barra_roja');
                span.innerHTML="Archivo No Válido";
        }
        else{
            barra_estado.classList.remove('barra_verde');
            barra_estado.classList.add('barra_roja');
            span.innerHTML="El archivo es demasiado grande";
            console.log(this.responseText);
        }
    }
    });
   
    // cancelar
    boton_cancelar.addEventListener("click", () => {
    peticion.abort(this);
    barra_estado.classList.remove('barra_verde');
    barra_estado.classList.add('barra_roja');
    span.innerHTML="Proceso Cancelado";
    });
    

}
