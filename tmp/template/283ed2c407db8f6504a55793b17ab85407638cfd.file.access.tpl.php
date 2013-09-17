<?php /* Smarty version Smarty-3.1.13, created on 2013-09-17 13:49:26
         compiled from "/home/ivan/public_html/mvc/views/error/access.tpl" */ ?>
<?php /*%%SmartyHeaderCode:201042351523841c6ddefd5-37579471%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '283ed2c407db8f6504a55793b17ab85407638cfd' => 
    array (
      0 => '/home/ivan/public_html/mvc/views/error/access.tpl',
      1 => 1360833962,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '201042351523841c6ddefd5-37579471',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'mensaje' => 0,
    '_layoutParams' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_523841c6e0b4a4_45450312',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_523841c6e0b4a4_45450312')) {function content_523841c6e0b4a4_45450312($_smarty_tpl) {?><h2><?php if (isset($_smarty_tpl->tpl_vars['mensaje']->value)){?> <?php echo $_smarty_tpl->tpl_vars['mensaje']->value;?>
<?php }?></h2>

<p>&nbsp;</p>

<a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
">Ir al Inicio</a> | 
<a href="javascript:history.back(1)">Volver a la p&aacute;gina anterior</a>

<?php if ((!Session::get('autenticado'))){?>

| <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
login">Iniciar Sesi&oacute;n</a>

<?php }?><?php }} ?>