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
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
        <script src="js/vendor/html5shiv.js"></script>
        <script src="js/vendor/respond.min.js"></script>
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

        .subInner {
            display: none;
            padding: 10px;
            background: #f6f6f6;
        }

        .subContent h6 {
            padding: .5em .75em;
            font-size: 0.9em;
            background-color: #f6f6f6;
            cursor: pointer;
        }

        .subContent h6 span {
            padding: .5em .75em;
            background-color: #f6f6f6;
            border-radius: 6px;
            display: block;
            background: url('img/arrow1.svg') 100% 0% no-repeat;
        }

        .subContent h6 span.open {
            padding: .5em .75em;
            background-color: #f6f6f6;
            border-radius: 6px;
            display: block;
            background: url('img/arrow2.svg') 100% 100% no-repeat;
        }

    </style>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">回答詳細</a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-01">
                        <span class="sr-only">Toggle navigation</span>
                    </button>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse-01">
                <ul class="nav navbar-nav">
                    <li><a href="/list1.php">回答履歴検索に戻る</a></li>
                    <li><a href="/">トップ(出題)に戻る</a></li>
                </ul>
            </div>
        </nav>

        <form action="{$nextpage}" method="post">
            <div class="form-group">
                <p><span class="label label-primary">{$syurui}</span>&nbsp;<span class="label label-default">{$serial}</span></p>
                <p><span class="label label-success">{$gakuseki}</span> &nbsp;
                    <span class="label label-warning">{$sdate}</span></p>
                <p><span class="label label-warning">{$stime}</span> &nbsp;
                    <span class="label label-warning">{$etime}</span></p>
                <div class="alert alert-danger" role="alert">
                    <p>正答率 {$rate}</p>
                </div>
                <div class="alert alert-warning" role="alert">
                    <p><small>{$exp}</small></p>
                </div>
                {section name=row loop=$data2} 問{$data2[row].0}: {$data2[row].1}
                <br /> &nbsp;&nbsp;{$data2[row].2}
                <br /> &nbsp;&nbsp;{$data2[row].3}
                <br /> &nbsp;&nbsp;{$data2[row].4}
                <br /> &nbsp;&nbsp;{$data2[row].5}
                <br /> &nbsp;&nbsp;{$data2[row].6}
                <div class="subContent">
                    <h6><span>解説 (クリックで表示)</span></h6>
                    <div class="subInner">
                        {$data2[row].7}
                    </div>
                    <!-- /.subInner -->
                </div>

                <br />
                <hr>{/section}
                <p align="center">
                    {$backlink}
                </p>
            </div>
        </form>

    </div>
    <script>
        $(function() {
            // #で始まるアンカーをクリックした場合に処理
            $('.menu a[href^=#]').on('click', function() {
                // スムーススクロール
                var speed = 400; // ミリ秒
                var href = $(this).attr("href");
                var target = $(href == "#" || href == "" ? 'html' : href);
                var position = target.offset().top;
                $('body,html').animate({
                    scrollTop: position
                }, speed, 'swing');

                // 開閉パネルが閉じていたら
                if ($(href).children('.subInner').css('display') == 'none') {
                    // 同時に開閉イベントを実行
                    $(href).children('h6').trigger('click');
                }
                return false;
            });

            // 見出しをクリックするとコンテンツを開閉する
            $('.subContent h6').on('click', function() {
                $(this).next('div:not(:animated)').slideToggle();
                $(this).children('span').toggleClass('open');
            });
        });

    </script>
</body>

</html>
