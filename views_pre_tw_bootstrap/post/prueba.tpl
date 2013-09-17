<h2>Prueba</h2>

{if isset($posts) && count($posts)}

<table>
    
    {foreach item=datos from=$posts}
    
    <tr>
        <td>{$datos.id}</td>
        <td>{$datos.nombre}</td>
        
    </tr>
    
    {/foreach}
</table>

{else}

<p><strong>No hay posts!</strong></p>

{/if}

{if isset($paginacion)}{$paginacion}{/if}