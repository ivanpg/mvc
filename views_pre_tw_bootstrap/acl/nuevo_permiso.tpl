<h2>Agregar Permiso</h2>

<form name="form1" action="" method="post">
    <input type="hidden" name="guardar" value="1" />
    
    <p>
        Permiso: <input type="text" name="permiso" value="{$datos.permiso|default:""}" />
    </p>
    
    <p>
        Key: <input type="text" name="key" value="{$datos.key|default:""}" />
    </p>
    
    <p>
       <input type="submit" value="Guardar" />
    </p>
</form>