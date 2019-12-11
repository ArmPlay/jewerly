<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <?=$this->getMeta();?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href='http://fonts.googleapis.com/css?family=Montserrat|Raleway:400,200,300,500,600,700,800,900,100' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,700,900' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Aladin' rel='stylesheet' type='text/css'>
    <link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />

</head>
<body>
<!-- header -->
<div class="top_bg">
    <div class="container">
        <div class="header_top-sec">
            <div class="top_right">
                <ul>
                    <li><a href="#">help</a></li>|
                    <li><a href="contact.html">Contact</a></li>|
                    <li><a href="login.html">Track Order</a></li>
                </ul>
            </div>
            <div class="top_left">
                <ul>
                    <li class="top_link">Email:<a href="mailto@example.com">support@mobel.loc</a></li>|
                    <li class="top_link"><a href="login.html">My Account</a></li>|
                </ul>
                <div class="social">
                    <ul>
                        <li><a href="#"><i class="facebook"></i></a></li>
                        <li><a href="#"><i class="twitter"></i></a></li>
                        <li><a href="#"><i class="dribble"></i></a></li>
                        <li><a href="#"><i class="google"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<div class="header_top">
    <div class="container">
        <div class="logo">
            <a href="index.html"><img src="images/logo.png" alt=""/></a>
        </div>
        <div class="header_right">
            <div class="login">
                <a href="login.html">LOGIN</a>
            </div>
            <div class="cart box_1">
                <a href="cart.html">
                    <h3> <span class="simpleCart_total">$0.00</span> (<span id="simpleCart_quantity" class="simpleCart_quantity">0</span> items)<img src="images/bag.png" alt=""></h3>
                </a>
                <p><a href="javascript:;" class="simpleCart_empty">Empty cart</a></p>
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!--cart-->

<!------>
<div class="mega_nav">
    <div class="container">
        <div class="menu_sec">
            <!-- start header menu -->
            <ul class="megamenu skyblue">
                <?php foreach($categorys as $category): ?>
                <li class="grid"><a class="color<?=$category->id?>" href="#"><?=$category->title?></a>
                    <div class="megapanel">
                        <div class="row">
                            <div class="col3">
                                <div class="h_nav">
                                    <h4>Sofas</h4>
                                    <ul>
                                        <li><a href="products.html">All Sofas</a></li>
                                        <li><a href="products.html">Fabric Sofas</a></li>
                                        <li><a href="products.html">Leather Sofas</a></li>
                                        <li><a href="products.html">L-shaped Sofas</a></li>
                                        <li><a href="products.html">Love Seats</a></li>
                                        <li><a href="products.html">Wooden Sofas</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col2"></div>
                            <div class="col1"></div>
                            <div class="col1"></div>
                            <div class="col1"></div>
                            <div class="col1"></div>
                        </div>
                    </div>
                </li>
                <?php endforeach; ?>
            </ul>
            <div class="search">
                <form>
                    <input type="text" value="" placeholder="Search...">
                    <input type="submit" value="">
                </form>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>


<?=$content;?>


<div class="footer-content">
    <div class="container">
        <div class="ftr-grids">
            <div class="col-md-3 ftr-grid">
                <h4>About Us</h4>
                <ul>
                    <li><a href="#">Who We Are</a></li>
                    <li><a href="contact.html">Contact Us</a></li>
                    <li><a href="#">Our Sites</a></li>
                    <li><a href="#">In The News</a></li>
                    <li><a href="#">Team</a></li>
                    <li><a href="#">Carrers</a></li>
                </ul>
            </div>
            <div class="col-md-3 ftr-grid">
                <h4>Customer service</h4>
                <ul>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Shipping</a></li>
                    <li><a href="#">Cancellation</a></li>
                    <li><a href="#">Returns</a></li>
                    <li><a href="#">Bulk Orders</a></li>
                    <li><a href="#">Buying Guides</a></li>
                </ul>
            </div>
            <div class="col-md-3 ftr-grid">
                <h4>Your account</h4>
                <ul>
                    <li><a href="account.html">Your Account</a></li>
                    <li><a href="#">Personal Information</a></li>
                    <li><a href="#">Addresses</a></li>
                    <li><a href="#">Discount</a></li>
                    <li><a href="#">Track your order</a></li>
                </ul>
            </div>
            <div class="col-md-3 ftr-grid">
                <h4>Categories</h4>
                <ul>
                    <li><a href="#">> Furinture</a></li>
                    <li><a href="#">> Bean Bags</a></li>
                    <li><a href="#">> Decor</a></li>
                    <li><a href="#">> Kichen & Dinning</a></li>
                    <li><a href="#">> Bed & Bath</a></li>
                    <li><a href="#">...More</a></li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!---->
<div class="footer">
    <div class="container">
        <div class="store">
            <ul>
                <li class="active">OUR STORE LOCATOR::</li>
                <li><a href="#">Noida</a></li>
                <li><a href="#">|</a></li>
                <li><a href="#">Belgium</a></li>
                <li><a href="#">|</a></li>
                <li><a href="#">China</a></li>
                <li><a href="#">|</a></li>
                <li><a href="#">Germany</a></li>
                <li><a href="#">|</a></li>
                <li><a href="#">Japan</a></li>
                <li><a href="#">|</a></li>
                <li><a href="#">Armenia</a></li>
                <li><a href="#">|</a></li>
                <li><a href="#">South Africa</a></li>
                <li><a href="#">|</a></li>
                <li><a href="#">Malaysia</a></li>
                <li><a href="#">|</a></li>
                <li><a href="#">Indonesia</a></li>
                <li><a href="#">|</a></li>
                <li><a href="#">Mumbai</a></li>
                <li><a href="#">|</a></li>
                <li><a href="#">Portugal</a></li>
                <li><a href="#">|</a></li>
                <li><a href="#">Spain</a></li>
                <li><a href="#">|</a></li>
                <li><a href="#">Northern Ireland</a></li>
                <li><a href="#">|</a></li>
                <li><a href="#">Mohali</a></li>
                <li><a href="#">|</a></li>
                <li><a href="#">Gurgaon</a></li>
                <li><a href="#">|</a></li>
                <li><a href="#">Panchkula</a></li>
                <li><a href="#">|</a></li>
                <li><a href="#">Ambala</a></li>
            </ul>
        </div>
        <div class="copywrite">
            <p>Copyright © 2015 Furnyish Store All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
        </div>
    </div>
</div>
</div>
<!---->
<script type='text/javascript' src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/jquery.flexisel.js"></script>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script type="text/javascript" src="js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<script src="js/menu_jquery.js"></script>
<script src="js/simpleCart.min.js"> </script>
<script src="js/responsiveslides.min.js"></script>
<script>
    // You can also use "$(window).load(function() {"
    $(function () {
        // Slideshow 1
        $("#slider1").responsiveSlides({
            auto: true,
            nav: true,
            speed: 500,
            namespace: "callbacks",
        });
    });
</script>
<script type="text/javascript">
    $(window).load(function() {
        $("#flexiselDemo1").flexisel({
            visibleItems: 5,
            animationSpeed: 1000,
            autoPlay: true,
            autoPlaySpeed: 3000,
            pauseOnHover:true,
            enableResponsiveBreakpoints: true,
            responsiveBreakpoints: {
                portrait: {
                    changePoint:480,
                    visibleItems: 1
                },
                landscape: {
                    changePoint:640,
                    visibleItems: 2
                },
                tablet: {
                    changePoint:768,
                    visibleItems: 3
                }
            }
        });
    });
</script>
</body>
</html>