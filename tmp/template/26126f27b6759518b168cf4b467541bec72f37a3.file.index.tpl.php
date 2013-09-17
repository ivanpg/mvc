<?php /* Smarty version Smarty-3.1.13, created on 2013-02-13 12:24:30
         compiled from "C:\xampp\htdocs\mvc\modules\usuarios\views\login\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2138511b77ee8862e3-26449106%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '26126f27b6759518b168cf4b467541bec72f37a3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mvc\\modules\\usuarios\\views\\login\\index.tpl',
      1 => 1360753269,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2138511b77ee8862e3-26449106',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'datos' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_511b77eea41031_69860107',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_511b77eea41031_69860107')) {function content_511b77eea41031_69860107($_smarty_tpl) {?><h2>Iniciar Sesi&oacute;n</h2>

<form name="form1" method="post" action="">
    <input type="hidden" value="1" name="enviar" />
    
    <p>
        <label>Usuario: </labe>
        <input type="text" name="usuario" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['usuario'])===null||$tmp==='' ? '' : $tmp);?>
" />
    </p>
    
    <p>
        <label>Password: </labe>
        <input type="password" name="pass" />
    </p>
    
    <p>
        <input type="submit" value="enviar" />
    </p>
</form><?php }} ?>