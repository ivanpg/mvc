<?php /* Smarty version Smarty-3.1.13, created on 2013-02-10 13:16:42
         compiled from "C:\xampp\htdocs\mvc\views\post\editar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3240051178faab7fee7-73053636%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '768be14fbdfd238aa76c52b1f06873e3b73d0958' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mvc\\views\\post\\editar.tpl',
      1 => 1360496695,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3240051178faab7fee7-73053636',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'datos' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51178faabfe350_73829021',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51178faabfe350_73829021')) {function content_51178faabfe350_73829021($_smarty_tpl) {?><form id="form1" method="post" action="">
    <input type="hidden" name="guardar" value="1" />
    <p>Titulo:<br />
    <input type="texto" name="titulo" value="<?php if (isset($_smarty_tpl->tpl_vars['datos']->value['titulo'])){?><?php echo $_smarty_tpl->tpl_vars['datos']->value['titulo'];?>
<?php }?>" /></p>
    
    <p>Cuerpo:<br />
    <textarea name="cuerpo"><?php if (isset($_smarty_tpl->tpl_vars['datos']->value['cuerpo'])){?><?php echo $_smarty_tpl->tpl_vars['datos']->value['cuerpo'];?>
<?php }?></textarea></p>
    
    <p><input type="submit" class="button" value="Guardar" /></p>
</form><?php }} ?>