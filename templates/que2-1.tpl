<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>助詞問題(第2版) / 筑波技術大学</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/dist/css/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/dist/css/flat-ui.min.css" rel="stylesheet">

    <link rel="shortcut icon" href="img/favicon.ico">

    <script src="/dist/js/vendor/jquery.min.js"></script>
    <script src="/dist/js/vendor/video.js"></script>
    <script src="/dist/js/flat-ui.min.js"></script>
    <script src="/docs/assets/js/application.js"></script>
    <!--
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    -->
    <script>
        $(function() {
            $('.btn').click(function() {
                var errmsg = ""
                var check_count_1 = $('.form-group-1 :checked').length;
                var check_count_2 = $('.form-group-2 :checked').length;
                if (check_count_1 == 0) errmsg = "上の設問は、１つ以上、選んでください。";
                if (check_count_2 == 0) {
                    if (check_count_1 == 0) errmsg = errmsg + "\n";
                    errmsg = errmsg + "下の設問は、１つ以上、選んでください。";
                }
                if (errmsg != "") {
                    alert(errmsg)
                    return false;
                }
            });
        });

    </script>


    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
    <script src="js/vendor/html5shiv.js"></script>
    <script src="js/vendor/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="container">
        <p><span class="label label-primary">{$syurui}</span></p>
        <form action="{$nextpage}" method="post">
            <span class="label label-default">{$progress}</span>
            <p>&nbsp;</p>
            <p class="bg-info">{$quest1}</p>
            <p class="text-danger">{$message}</p>
            <div class="form-group-1">
                <label class="checkbox">
                    <input type="checkbox" data-toggle="checkbox" value="1" name="que1[1]">{$qt1.1}
                </label>
                <label class="checkbox">
                    <input type="checkbox" data-toggle="checkbox" value="2" name="que1[2]">{$qt1.2}
                </label>
            </div>
            <p>&nbsp;</p>
            <p class="bg-info">{$quest2}</p>
            <p class="text-danger">{$message}</p>
            <div class="form-group-2">
                <label class="checkbox">
                    <input type="checkbox" data-toggle="checkbox" value="1" name="que2[1]">{$qt2.1}
                </label>
                <label class="checkbox">
                    <input type="checkbox" data-toggle="checkbox" value="1" name="que2[2]">{$qt2.2}
                </label>
                <p align="center">
                    <input type="hidden" name="cmd" value="nextinput" />
                    <button type="submit" class="btn btn-sm btn-primary" name="action" value="next2">次へ</button>
                </p>
            </div>
        </form>
    </div>
</body>

</html>
