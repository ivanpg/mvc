<h2>Nuevo Role</h2>

<form name="form1" action="" method="post">
    <input type="hidden" name="guardar" value="1" />
    
    <p>
        Role: <input type="text" name="role" value="{$datos.role|default:""}" />
    </p>
    
    <p>
       <input type="submit" value="Guardar" />
    </p>
</form>