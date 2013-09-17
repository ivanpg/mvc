
$(document).ready(function(){
    
    var getCiudades = function(){
        //parametros => url , parámetros enviados por post, 
        //función con datos obtenidos por url, tipo objeto devolución
        $.post('/mvc/ajax/getCiudades','pais=' + $("#pais").val(),function(datos){
            //limpiamos el select de ciudad
            $("#ciudad").html('');
            
            for(var i = 0; i < datos.length; i++){
                $("#ciudad").append('<option value="' + datos[i].id + '">' + datos[i].ciudad + '</option>');
            }
            
        }, 'json');
    }
    
    $("#pais").change(function(){
        // si no se selecciona pais. p.e si se selecciona el primer campo del select =>'seleccione'
        if(!$("#pais").val()){
            $("#ciudad").html('');
        }
        else{
           getCiudades(); 
        }
    });
    
    
    $("#btn_insertar").click(function(){
        $.post('/mvc/ajax/insertarCiudad','pais=' + $("#pais").val() + '&ciudad=' + $("#ins_ciudad").val())
        
        $("#ins_ciudad").val('');
        //actualizamos las ciudades para el pais actual en el que estamos
        getCiudades();
    });
    
});