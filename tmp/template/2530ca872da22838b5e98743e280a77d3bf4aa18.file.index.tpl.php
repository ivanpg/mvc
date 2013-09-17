<?php /* Smarty version Smarty-3.1.13, created on 2013-02-14 10:26:52
         compiled from "C:\xampp\htdocs\mvc\views\post\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1261051178904166e15-88255893%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2530ca872da22838b5e98743e280a77d3bf4aa18' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mvc\\views\\post\\index.tpl',
      1 => 1360833963,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1261051178904166e15-88255893',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5117890429a074_72807560',
  'variables' => 
  array (
    '_acl' => 0,
    '_layoutParams' => 0,
    'posts' => 0,
    'datos' => 0,
    'paginacion' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5117890429a074_72807560')) {function content_5117890429a074_72807560($_smarty_tpl) {?><h2>Ultimos Posts</h2>

<?php if ($_smarty_tpl->tpl_vars['_acl']->value->permiso('nuevo_post')){?>
    <p><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
post/nuevo" class="btn btn-primary"><i class="icon-plus-sign icon-white"> </i> Agregar Post</a></p>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['posts']->value)&&count($_smarty_tpl->tpl_vars['posts']->value)){?>

<table class="table table-bordered table-condensed table-striped">
    <tr>
        <th>ID</th>
        <th>Titulo</th>
        <th>Cuerpo</th>
        <th>Imagen</th>
         
        <?php if ($_smarty_tpl->tpl_vars['_acl']->value->permiso('editar_post')){?><th></th><?php }?>
        <?php if ($_smarty_tpl->tpl_vars['_acl']->value->permiso('eliminar_post')){?><th></th><?php }?>
    </tr>
    
     <?php  $_smarty_tpl->tpl_vars['datos'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['datos']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['posts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['datos']->key => $_smarty_tpl->tpl_vars['datos']->value){
$_smarty_tpl->tpl_vars['datos']->_loop = true;
?>
        <tr>
            <td style="text-align: center;"><?php echo $_smarty_tpl->tpl_vars['datos']->value['id'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['datos']->value['titulo'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['datos']->value['cuerpo'];?>
</td>
            <td style="text-align: center;">
                <?php if (isset($_smarty_tpl->tpl_vars['datos']->value['imagen'])){?>

                    <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/post/<?php echo $_smarty_tpl->tpl_vars['datos']->value['imagen'];?>
">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/post/thumb/thumb_<?php echo $_smarty_tpl->tpl_vars['datos']->value['imagen'];?>
" />
                    </a>

                <?php }?>
            </td>
            <?php if ($_smarty_tpl->tpl_vars['_acl']->value->permiso('editar_post')){?>
                <td style="text-align: center; vertical-align: middle;"><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
post/editar/<?php echo $_smarty_tpl->tpl_vars['datos']->value['id'];?>
">Editar</a></td>
            <?php }?>
            
            <?php if ($_smarty_tpl->tpl_vars['_acl']->value->permiso('eliminar_post')){?>
                <td style="text-align: center; vertical-align: middle;"><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
post/eliminar/<?php echo $_smarty_tpl->tpl_vars['datos']->value['id'];?>
">Eliminar</a></td>
            <?php }?>
        </tr>
    <?php } ?>
</table>

<?php }else{ ?>

<p><strong>No hay posts!</strong></p>

<?php }?>

<?php echo (($tmp = @$_smarty_tpl->tpl_vars['paginacion']->value)===null||$tmp==='' ? '' : $tmp);?>


<p> </p><?php }} ?>