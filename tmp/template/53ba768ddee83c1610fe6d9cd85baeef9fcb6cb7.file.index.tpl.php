<?php /* Smarty version Smarty-3.1.13, created on 2013-04-08 18:22:05
         compiled from "/home/ivan/public_html/mvc/modules/usuarios/views/login/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15646565365162eeada99d45-13641288%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '53ba768ddee83c1610fe6d9cd85baeef9fcb6cb7' => 
    array (
      0 => '/home/ivan/public_html/mvc/modules/usuarios/views/login/index.tpl',
      1 => 1360834088,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15646565365162eeada99d45-13641288',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'datos' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5162eeadb0c8a2_95729060',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5162eeadb0c8a2_95729060')) {function content_5162eeadb0c8a2_95729060($_smarty_tpl) {?><style type="text/css">
    table.table td { vertical-align: middle; }
    table.table td input { margin: 0; }
</style>

<h2>Iniciar Sesi&oacute;n</h2>

<form name="form1" method="post" action="">
    <input type="hidden" value="1" name="enviar" />
    
    <table class="table table-bordered" style="width: 350px;">
        <tr>
            <td style="text-align: right;">Usuario: </td>
            <td><input type="text" name="usuario" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['usuario'])===null||$tmp==='' ? '' : $tmp);?>
" /></td>
        </tr>

        <tr>
            <td style="text-align: right;">Password: </td>
            <td><input type="password" name="pass" /></td>
        </tr>
    </table>
        
    <p><button type="submit" class="btn btn-primary"><li class="icon-ok icon-white"> </li> Entrar</button></p>
</form><?php }} ?>