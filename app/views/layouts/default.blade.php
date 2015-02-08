<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Главная | VIP Ставка</title>

        <!-- core CSS -->
        <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="/assets/css/font-awesome.min.css" rel="stylesheet">
        <link href="/assets/css/animate.min.css" rel="stylesheet">
        <link href="/assets/css/prettyPhoto.css" rel="stylesheet">
        <link href="/assets/css/main.css" rel="stylesheet">
        <link href="/assets/css/responsive.css" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="/assets/js/html5shiv.js"></script>
        <script src="/assets/js/respond.min.js"></script>
        <![endif]-->
        <link rel="shortcut icon" href="/assets/images/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/assets/images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/assets/images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/assets/images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="/assets/images/ico/apple-touch-icon-57-precomposed.png">
    </head><!--/head-->

    <body class="homepage">
        <div class="main_wrap">
            <header id="header">

                @include('partials.top-menu')

            </header><!--/header-->

            @yield('content')

        </div><!-- main_wrap -->

        <footer id="footer" class="midnight-blue">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        &copy; 2015 <a target="_blank" href="http://vip-stavka.ru/" title="Прогнозы на спорт">VIP
                                                                                                              Ставка</a>
                    </div>
                    <div class="col-sm-6">
                        <ul class="bottom-menu pull-right">
                            <li><a href="/">Главная</a></li>
                            <li><a href="{{ route('about') }}">О нас</a></li>
                            <li><a href="#">Правила</a></li>
                            <li><a href="{{ route('contacts') }}">Контакты</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer><!--/#footer-->

        <script src="/assets/js/jquery.js"></script>
        <script src="/assets/js/bootstrap.min.js"></script>
        <script src="/assets/js/jquery.prettyPhoto.js"></script>
        <script src="/assets/js/jquery.isotope.min.js"></script>
        <script src="/assets/js/main.js"></script>
        <script src="/assets/js/wow.min.js"></script>
    </body>
</html>