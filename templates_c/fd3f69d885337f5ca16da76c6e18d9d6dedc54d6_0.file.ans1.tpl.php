<?php
/* Smarty version 3.1.31, created on 2018-01-26 06:16:08
  from "D:\Library\GitHub\tkbj2\templates\ans1.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a6ab9981f4353_58098915',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fd3f69d885337f5ca16da76c6e18d9d6dedc54d6' => 
    array (
      0 => 'D:\\Library\\GitHub\\tkbj2\\templates\\ans1.tpl',
      1 => 1499935826,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a6ab9981f4353_58098915 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>助詞問題 / 筑波技術大学</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/dist/css/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/dist/css/flat-ui.min.css" rel="stylesheet">

    <link rel="shortcut icon" href="img/favicon.ico">

    <?php echo '<script'; ?>
 src="/dist/js/vendor/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/dist/js/vendor/video.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/dist/js/flat-ui.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/docs/assets/js/application.js"><?php echo '</script'; ?>
>
    <!--
    <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"><?php echo '</script'; ?>
>
-->
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
    <?php echo '<script'; ?>
 src="js/vendor/html5shiv.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="js/vendor/respond.min.js"><?php echo '</script'; ?>
>
    <![endif]-->
</head>

<body>
    <div class="container">
        <form action="<?php echo $_smarty_tpl->tpl_vars['nextpage']->value;?>
" method="post">
            <div class="form-group">
                <p><span class="label label-primary"><?php echo $_smarty_tpl->tpl_vars['syurui']->value;?>
</span>&nbsp;<span class="label label-default"><?php echo $_smarty_tpl->tpl_vars['serial']->value;?>
</span></p>
                <p><span class="label label-success"><?php echo $_smarty_tpl->tpl_vars['gakuseki']->value;?>
</span>
                    &nbsp;<span class="label label-warning"><?php echo $_smarty_tpl->tpl_vars['sdate']->value;?>
</span></p>
                <p><span class="label label-warning"><?php echo $_smarty_tpl->tpl_vars['stime']->value;?>
</span>
                    &nbsp;<span class="label label-warning"><?php echo $_smarty_tpl->tpl_vars['etime']->value;?>
</span></p>
                <div class="alert alert-danger" role="alert">
                    <p>正答率 <?php echo $_smarty_tpl->tpl_vars['rate']->value;?>
</p>
                </div>
                <div class="alert alert-warning" role="alert">
                    <p><small><?php echo $_smarty_tpl->tpl_vars['exp']->value;?>
</small></p>
                </div>
                <?php
$__section_row_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_row']) ? $_smarty_tpl->tpl_vars['__smarty_section_row'] : false;
$__section_row_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['data2']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_row_0_total = $__section_row_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_row'] = new Smarty_Variable(array());
if ($__section_row_0_total != 0) {
for ($__section_row_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_row']->value['index'] = 0; $__section_row_0_iteration <= $__section_row_0_total; $__section_row_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_row']->value['index']++){
?> 問<?php echo $_smarty_tpl->tpl_vars['data2']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_row']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_row']->value['index'] : null)][0];?>
: <?php echo $_smarty_tpl->tpl_vars['data2']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_row']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_row']->value['index'] : null)][1];?>

                <br /> &nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['data2']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_row']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_row']->value['index'] : null)][2];?>

                <br /> &nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['data2']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_row']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_row']->value['index'] : null)][3];?>

                <br /> &nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['data2']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_row']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_row']->value['index'] : null)][4];?>

                <br /> &nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['data2']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_row']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_row']->value['index'] : null)][5];?>

                <br />
                <hr><?php
}
}
if ($__section_row_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_row'] = $__section_row_0_saved;
}
?>
                <p align="center">
                    <button type='submit' class="btn btn-sm btn-primary" name='action' value='back'>メニューに戻る</button>
                </p>
            </div>
        </form>

    </div>
</body>

</html><?php }
}
