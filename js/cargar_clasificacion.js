$(document).ready(function () {
    
        
        let $clasificacion = document.getElementById('clasificacion')
                    
    function cargarClasif(){
                $.ajax({
                    
                    url:'bd/dropbox_clasif.php',
                    type: 'GET',
                    success: function(response){
                        const clasificacion = JSON.parse(response);
                        let template = '<option class="form-control" selected disabled>-- Seleccione --</option>'
                        clasificacion.forEach(clasificacion => {
                            template += `<option class="form-control" value="${clasificacion.tipo_clasificacion}">${clasificacion.simbol}</option>`;
                    })
                        $clasificacion.innerHTML = template;
                }
                    
            })
        }
        cargarClasif()
        
    
})