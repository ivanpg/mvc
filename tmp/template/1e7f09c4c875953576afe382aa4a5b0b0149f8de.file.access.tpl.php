<?php /* Smarty version Smarty-3.1.13, created on 2013-02-11 11:59:45
         compiled from "C:\xampp\htdocs\mvc\views\error\access.tpl" */ ?>
<?php /*%%SmartyHeaderCode:98055118cf21397756-74948416%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1e7f09c4c875953576afe382aa4a5b0b0149f8de' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mvc\\views\\error\\access.tpl',
      1 => 1360497210,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '98055118cf21397756-74948416',
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
  'unifunc' => 'content_5118cf21423494_48445000',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5118cf21423494_48445000')) {function content_5118cf21423494_48445000($_smarty_tpl) {?><h2><?php if (isset($_smarty_tpl->tpl_vars['mensaje']->value)){?> <?php echo $_smarty_tpl->tpl_vars['mensaje']->value;?>
<?php }?></h2>

<p>&nbsp;</p>

<a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
">Ir al Inicio</a> | 
<a href="javascript:history.back(1)">Volver a la p&aacute;gina anterior</a>

<?php if ((!Session::get('autenticado'))){?>

| <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
login">Iniciar Sesi&oacute;n</a>

<?php }?><?php }} ?>