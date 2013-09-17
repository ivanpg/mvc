<h2>Administracion de permisos de role</h2>

<h3>Role: {$role.role}</h3>

<p>Permisos</p>

<form name="form1" method="post" action="">
    <input type="hidden" name="guardar" value="1" />
    
    {if isset($permisos) && count($permisos)}
        <table>
            <tr>
                <th>Permiso</th>
                <th>Habilitado</th>
                <th>Denegado</th>
                <th>Ignorar</th>
            </tr>
            {foreach item=pr from=$permisos}
                <tr>
                    <td>{$pr.nombre}</td>
                    <td><input type="radio" name="perm_{$pr.id}" value="1" {if ($pr.valor == 1)}checked="checked"{/if}/></td>
                    <td><input type="radio" name="perm_{$pr.id}" value="" {if ($pr.valor == "")}checked="checked"{/if}/></td>
                    <td><input type="radio" name="perm_{$pr.id}" value="x" {if ($pr.valor === "x")}checked="checked"{/if}/></td>
                </tr>
            {/foreach}
        </table>
    {/if}
    
    <p><input type="submit" value="Guardar" /></p>
</form> 