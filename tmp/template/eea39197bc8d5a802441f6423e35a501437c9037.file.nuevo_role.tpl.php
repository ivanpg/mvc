<?php /* Smarty version Smarty-3.1.13, created on 2013-02-12 11:25:08
         compiled from "C:\xampp\htdocs\mvc\views\acl\nuevo_role.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16197511a1884337145-41062061%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eea39197bc8d5a802441f6423e35a501437c9037' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mvc\\views\\acl\\nuevo_role.tpl',
      1 => 1360664401,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16197511a1884337145-41062061',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'datos' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_511a18844d3303_70772780',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_511a18844d3303_70772780')) {function content_511a18844d3303_70772780($_smarty_tpl) {?><h2>Nuevo Role</h2>

<form name="form1" action="" method="post">
    <input type="hidden" name="guardar" value="1" />
    
    <p>
        Role: <input type="text" name="role" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['role'])===null||$tmp==='' ? '' : $tmp);?>
" />
    </p>
    
    <p>
       <input type="submit" value="Guardar" />
    </p>
</form><?php }} ?>