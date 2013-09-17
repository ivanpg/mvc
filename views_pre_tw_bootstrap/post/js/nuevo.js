$(document).ready(function(){
    $('#form1').validate({
        rules:{
            titulo:{
                required: true
                //email:true
            },
            cuerpo:{
                required: true
            }
        },
        messages:{
            titulo: {
                required: "Debe introducir el titulo del post"
            },
            cuerpo:{
                required: "Debe introducir el cuerpo del post"
            }
        }
    });
});