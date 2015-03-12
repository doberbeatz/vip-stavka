<div class="top-bar">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-xs-6">
                <div class="top-number"><p><i class="fa fa-phone-square"></i>  +7 (495) 100-20-30</p></div>
            </div>
            <div class="col-sm-6 col-xs-6">
                <div class="social">
                    <ul class="social-share">
                        <li><a href="#"><i class="fa fa-vk"></i></a></li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-skype"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div><!--/.container-->
</div><!--/.top-bar-->

<nav class="navbar navbar-inverse" role="banner">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Навигация</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"><img src="/assets/images/logo.png" alt="VIP Ставка"></a>
        </div>

        <div class="collapse navbar-collapse navbar-right">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/">Главная</a></li>
                <li><a href="#">Правила</a></li>
                <li><a href="{{ route('price') }}">Цены</a></li>
                <li><a href="#">Статистика</a></li>
                <li><a href="{{ route('about') }}">О нас</a></li>
                <li><a href="{{ route('contacts') }}">Контакты</a></li>
            </ul>
        </div>
    </div><!--/.container-->
</nav><!--/nav-->