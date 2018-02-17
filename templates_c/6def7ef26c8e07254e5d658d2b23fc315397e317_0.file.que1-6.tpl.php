<?php
/* Smarty version 3.1.31, created on 2018-02-03 09:29:38
  from "D:\Library\GitHub\tkbj2\templates\que1-6.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a7572f2c32e76_74798749',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6def7ef26c8e07254e5d658d2b23fc315397e317' => 
    array (
      0 => 'D:\\Library\\GitHub\\tkbj2\\templates\\que1-6.tpl',
      1 => 1517286034,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a7572f2c32e76_74798749 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>助詞問題(第2版) / 筑波技術大学</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/dist/css/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/dist/css/flat-ui.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/dist/css/accordion.css" />

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

    <?php echo $_smarty_tpl->tpl_vars['quescript']->value;?>


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
        <p><span class="label label-primary"><?php echo $_smarty_tpl->tpl_vars['syurui']->value;?>
</span></p>
        <span class="label label-default"><?php echo $_smarty_tpl->tpl_vars['progress']->value;?>
</span>
        <p>&nbsp;</p>
        <?php echo $_smarty_tpl->tpl_vars['quest1']->value;?>

        <ul id="my-accordion" class="accordionjs" data-active-index="false" autoHeight="false">
            <li>
                <div>ポイント (クリックで表示)</div>
                <div><?php echo $_smarty_tpl->tpl_vars['po1']->value;?>
</div>
            </li>
        </ul>
        <p class="text-danger"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</p>
        <form action="<?php echo $_smarty_tpl->tpl_vars['nextpage']->value;?>
" method="post">
            <div class="form-group">
                <label class="checkbox">
                    <input type="checkbox" data-toggle="checkbox" value="1" name="que1[0]"><?php echo $_smarty_tpl->tpl_vars['qt1']->value[0];?>

                </label>
                <label class="checkbox">
                    <input type="checkbox" data-toggle="checkbox" value="1" name="que1[1]"><?php echo $_smarty_tpl->tpl_vars['qt1']->value[1];?>

                </label>
                <label class="checkbox">
                    <input type="checkbox" data-toggle="checkbox" value="1" name="que1[2]"><?php echo $_smarty_tpl->tpl_vars['qt1']->value[2];?>

                </label>
                <label class="checkbox">
                    <input type="checkbox" data-toggle="checkbox" value="1" name="que1[3]"><?php echo $_smarty_tpl->tpl_vars['qt1']->value[3];?>

                </label>
                <label class="checkbox">
                    <input type="checkbox" data-toggle="checkbox" value="1" name="que1[4]"><?php echo $_smarty_tpl->tpl_vars['qt1']->value[4];?>

                </label>
                <label class="checkbox">
                    <input type="checkbox" data-toggle="checkbox" value="1" name="que1[5]"><?php echo $_smarty_tpl->tpl_vars['qt1']->value[5];?>

                </label>
                <p align="center">
                    <input type="hidden" name="cmd" value="nextinput" />
                    <button type="submit" class="btn btn-sm btn-primary" name="action" value="next2">次へ</button>
                </p>
            </div>
        </form>
    </div>
    <?php echo '<script'; ?>
 src="/dist/js/accordion.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
>
        jQuery(document).ready(function($) {
            $("#my-accordion").accordionjs();
        });

        $("#my-accordion").accordionjs({
            // Allow self close.(data-close-able)
            closeAble: true,
            // Animation Speed.(data-slide-speed)
            slideSpeed: 150,
            // The section open on first init. A number from 1 to X or false.(data-active-index)
            activeIndex: false,
            // Callback when a section is open
            openSection: function(section) {},
            // Callback before a section is open
            beforeOpenSection: function(section) {},
        });

    <?php echo '</script'; ?>
>

</body>

</html>
<?php }
}
