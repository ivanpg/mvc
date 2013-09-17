<?php /* Smarty version Smarty-3.1.13, created on 2013-02-11 11:59:45
         compiled from "C:\xampp\htdocs\mvc\views\post\nuevo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:208505118bedbeb5497-34849599%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '455d16121b6de96bc9ea0ccf10fb1914150e8ef1' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mvc\\views\\post\\nuevo.tpl',
      1 => 1360580317,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '208505118bedbeb5497-34849599',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5118bedc0b4152_10699105',
  'variables' => 
  array (
    '_layoutParams' => 0,
    'datos' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5118bedc0b4152_10699105')) {function content_5118bedc0b4152_10699105($_smarty_tpl) {?><form id="form1" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
post/nuevo"
        enctype="multipart/form-data">
    <input type="hidden" name="guardar" value="1" />
    <p>Titulo:<br />
    <input type="texto" name="titulo" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['titulo'])===null||$tmp==='' ? '' : $tmp);?>
" /></p>
    
    <p>Cuerpo:<br />
    <textarea name="cuerpo"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['cuerpo'])===null||$tmp==='' ? '' : $tmp);?>
</textarea></p>
    
    <input type="file" name="imagen" />
    
    <p><input type="submit" class="button" value="Guardar" /></p>
</form><?php }} ?>