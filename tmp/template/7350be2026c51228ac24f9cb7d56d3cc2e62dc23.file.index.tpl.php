<?php /* Smarty version Smarty-3.1.13, created on 2013-02-10 12:51:07
         compiled from "C:\xampp\htdocs\mvc\views\login\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17747511789aba45432-27733661%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7350be2026c51228ac24f9cb7d56d3cc2e62dc23' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mvc\\views\\login\\index.tpl',
      1 => 1360496953,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17747511789aba45432-27733661',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'datos' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_511789abaaeb96_72058692',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_511789abaaeb96_72058692')) {function content_511789abaaeb96_72058692($_smarty_tpl) {?><h2>Iniciar Sesi&oacute;n</h2>

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