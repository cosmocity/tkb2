<?php
/* Smarty version 3.1.31, created on 2017-10-04 08:45:47
  from "D:\Library\GitHub\tkbj2\templates\list1.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59d4839bf0d3c5_27189176',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd9bfb509e967ffa0b652d8130f78b6347fd20404' => 
    array (
      0 => 'D:\\Library\\GitHub\\tkbj2\\templates\\list1.tpl',
      1 => 1499934850,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59d4839bf0d3c5_27189176 (Smarty_Internal_Template $_smarty_tpl) {
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
        <style>
            .navbar {
                font-size: 14px;
                min-height: 85px;
                background: url("img/cover-1.jpg")no-repeat center;
                background-size: cover;
            }

            body {
                padding-top: 90px;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">回答履歴検索</a>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-01">
                        <span class="sr-only">Toggle navigation</span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="navbar-collapse-01">
                    <ul class="nav navbar-nav">
                        <li><a href="/">トップ(出題)に戻る</a></li>
                    </ul>
                </div>
            </nav>

            <form action="<?php echo $_smarty_tpl->tpl_vars['nextpage']->value;?>
" method="post">
                <div class="form-group">
                    <span class="label label-default">回答者番号を入力してください</span>
                    <span class="label label-default">(学内者は学籍番号）</span>
                    <input type="text" class="form-control" name="gakuseki" value="<?php echo $_smarty_tpl->tpl_vars['gakuseki']->value;?>
" placeholder="回答者番号" />
                    <p class="text-danger"><?php echo $_smarty_tpl->tpl_vars['errmsg1']->value;?>
</p>
                    <p class="label label-default">パスワードを入力してください</p>
                    <input type="password" class="form-control" name="pass" value="<?php echo $_smarty_tpl->tpl_vars['password']->value;?>
" placeholder="パスワード" />
                    <p class="text-danger"><?php echo $_smarty_tpl->tpl_vars['errmsg2']->value;?>
</p>
                    <p align="center">
                        <input type="hidden" name="cmd" value="nextinput" />
                        <button type='submit' class="btn btn-sm btn-default" name='action' value='back'>メニューに戻る</button>
                        <button type='submit' class="btn btn-sm btn-primary" name='action' value='next'>次へ</button>
                    </p>
                </div>
            </form>
        </div>

    </body>

</html><?php }
}
