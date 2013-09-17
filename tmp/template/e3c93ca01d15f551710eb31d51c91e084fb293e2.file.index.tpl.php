<?php /* Smarty version Smarty-3.1.13, created on 2013-04-08 17:49:54
         compiled from "/home/ivan/public_html/mvc/views/acl/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12356898835162e72267e107-60398771%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e3c93ca01d15f551710eb31d51c91e084fb293e2' => 
    array (
      0 => '/home/ivan/public_html/mvc/views/acl/index.tpl',
      1 => 1360833962,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12356898835162e72267e107-60398771',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_layoutParams' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5162e7226b9968_42362609',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5162e7226b9968_42362609')) {function content_5162e7226b9968_42362609($_smarty_tpl) {?><h2>Listas de control de acceso</h2>

<ul>
    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
acl/roles">Roles</a></li>
    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
acl/permisos">Permisos</a></li>
</ul><?php }} ?>