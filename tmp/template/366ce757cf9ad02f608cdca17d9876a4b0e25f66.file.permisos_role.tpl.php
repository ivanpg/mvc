<?php /* Smarty version Smarty-3.1.13, created on 2013-02-12 12:00:07
         compiled from "C:\xampp\htdocs\mvc\views\acl\permisos_role.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9882511a1889354145-25074859%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '366ce757cf9ad02f608cdca17d9876a4b0e25f66' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mvc\\views\\acl\\permisos_role.tpl',
      1 => 1360666699,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9882511a1889354145-25074859',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_511a188944f2d3_77925337',
  'variables' => 
  array (
    'role' => 0,
    'permisos' => 0,
    'pr' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_511a188944f2d3_77925337')) {function content_511a188944f2d3_77925337($_smarty_tpl) {?><h2>Administracion de permisos de role</h2>

<h3>Role: <?php echo $_smarty_tpl->tpl_vars['role']->value['role'];?>
</h3>

<p>Permisos</p>

<form name="form1" method="post" action="">
    <input type="hidden" name="guardar" value="1" />
    
    <?php if (isset($_smarty_tpl->tpl_vars['permisos']->value)&&count($_smarty_tpl->tpl_vars['permisos']->value)){?>
        <table>
            <tr>
                <th>Permiso</th>
                <th>Habilitado</th>
                <th>Denegado</th>
                <th>Ignorar</th>
            </tr>
            <?php  $_smarty_tpl->tpl_vars['pr'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['pr']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['permisos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['pr']->key => $_smarty_tpl->tpl_vars['pr']->value){
$_smarty_tpl->tpl_vars['pr']->_loop = true;
?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['pr']->value['nombre'];?>
</td>
                    <td><input type="radio" name="perm_<?php echo $_smarty_tpl->tpl_vars['pr']->value['id'];?>
" value="1" <?php if (($_smarty_tpl->tpl_vars['pr']->value['valor']==1)){?>checked="checked"<?php }?>/></td>
                    <td><input type="radio" name="perm_<?php echo $_smarty_tpl->tpl_vars['pr']->value['id'];?>
" value="" <?php if (($_smarty_tpl->tpl_vars['pr']->value['valor']=='')){?>checked="checked"<?php }?>/></td>
                    <td><input type="radio" name="perm_<?php echo $_smarty_tpl->tpl_vars['pr']->value['id'];?>
" value="x" <?php if (($_smarty_tpl->tpl_vars['pr']->value['valor']==="x")){?>checked="checked"<?php }?>/></td>
                </tr>
            <?php } ?>
        </table>
    <?php }?>
    
    <p><input type="submit" value="Guardar" /></p>
</form> <?php }} ?>