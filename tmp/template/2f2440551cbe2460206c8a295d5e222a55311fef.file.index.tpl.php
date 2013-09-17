<?php /* Smarty version Smarty-3.1.13, created on 2013-02-14 10:28:22
         compiled from "C:\xampp\htdocs\mvc\views\acl\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8078511a18793c3845-85505706%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2f2440551cbe2460206c8a295d5e222a55311fef' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mvc\\views\\acl\\index.tpl',
      1 => 1360833962,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8078511a18793c3845-85505706',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_511a18796e7078_86459594',
  'variables' => 
  array (
    '_layoutParams' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_511a18796e7078_86459594')) {function content_511a18796e7078_86459594($_smarty_tpl) {?><h2>Listas de control de acceso</h2>

<ul>
    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
acl/roles">Roles</a></li>
    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
acl/permisos">Permisos</a></li>
</ul><?php }} ?>