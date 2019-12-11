<!DOCTYPE html>
<!--[if IE 8]> <html class="ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <?=$this->getMeta();?>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <link rel="stylesheet" media="all" href="/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap&subset=cyrillic" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>

<header id="header">
    <div class="container">
        <a href="index.html" id="logo" title="Olga’s jewelry">Olga’s jewelry</a>
        <div class="right-links">
            <ul>
                <li>
                    <div class="custom-select" style="width:80px;">
                        <select id="curr">
                            <?php new app\widgets\currency\Currency(); ?>
                        </select>
                    </div>
                </li>
                <li><a href="cart.html"><span class="ico ico-products"></span>3 products, $4 500.00</a></li>
                <li><a href="#"><span class="ico ico-account"></span>Account</a></li>
                <li><a href="#"><span class="ico ico-signout"></span>Sign out</a></li>
            </ul>

        </div>
    </div>
    <!-- / container -->
</header>
<!-- / header -->

<?php new \app\widgets\menu\Menu([
    'tpl' => WWW . '/menu/menu.php',
]); ?>

<nav id="menu">
    <div class="container">
        <div class="trigger"></div>



<!--        <ul>-->
<!--            --><?php //foreach($categorys as $category): ?>
<!--                <li><a href="--><?//=$category->alias;?><!--">--><?//=mb_strtoupper($category->title);?><!--</a></li>-->
<!--            --><?php //endforeach; ?>
<!--        </ul>-->
    </div>
    <!-- / container -->
</nav>
<!-- / navigation -->

<?=$content;?>



<footer id="footer">
    <div class="container">
        <div class="cols">
            <div class="col">
                <h3>Frequently Asked Questions</h3>
                <ul>
                    <li><a href="#">Fusce eget dolor adipiscing </a></li>
                    <li><a href="#">Posuere nisl eu venenatis gravida</a></li>
                    <li><a href="#">Morbi dictum ligula mattis</a></li>
                    <li><a href="#">Etiam diam vel dolor luctus dapibus</a></li>
                    <li><a href="#">Vestibulum ultrices magna </a></li>
                </ul>
            </div>
            <div class="col media">
                <h3>Social media</h3>
                <ul class="social">
                    <li><a href="#"><span class="ico ico-fb"></span>Facebook</a></li>
                    <li><a href="#"><span class="ico ico-tw"></span>Twitter</a></li>
                    <li><a href="#"><span class="ico ico-gp"></span>Google+</a></li>
                    <li><a href="#"><span class="ico ico-pi"></span>Pinterest</a></li>
                </ul>
            </div>
            <div class="col contact">
                <h3>Contact us</h3>
                <p>Diana’s Jewelry INC.<br>54233 Avenue Street<br>New York</p>
                <p><span class="ico ico-em"></span><a href="#">contact@dianasjewelry.com</a></p>
                <p><span class="ico ico-ph"></span>(590) 423 446 924</p>
            </div>
            <div class="col newsletter">
                <h3>Join our newsletter</h3>
                <p>Sed ut perspiciatis unde omnis iste natus sit voluptatem accusantium doloremque laudantium.</p>
                <form action="#">
                    <input type="text" placeholder="Your email address...">
                    <button type="submit"></button>
                </form>
            </div>
        </div>
        <p class="copy">Copyright 2013 Jewelry. All rights reserved.</p>
    </div>
    <!-- / container -->
</footer>
<!-- / footer -->

<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script>window.jQuery || document.write("<script src='js/jquery-1.11.1.min.js'>\x3C/script>")</script>
<script src="js/plugins.js"></script>
<script src="js/main.js"></script>
</body>
</html>