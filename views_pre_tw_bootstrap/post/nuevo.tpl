<form id="form1" method="post" action="{$_layoutParams.root}post/nuevo"
        enctype="multipart/form-data">
    <input type="hidden" name="guardar" value="1" />
    <p>Titulo:<br />
    <input type="texto" name="titulo" value="{$datos.titulo|default:""}" /></p>
    
    <p>Cuerpo:<br />
    <textarea name="cuerpo">{$datos.cuerpo|default:""}</textarea></p>
    
    <input type="file" name="imagen" />
    
    <p><input type="submit" class="button" value="Guardar" /></p>
</form>