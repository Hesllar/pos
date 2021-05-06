<!doctype html>
<html class="no-js" lang="en-US">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>FermeApp Ferreter&iacute;a</title>
    <meta name="description" content="Default Description">
    <meta name="keywords" content="E-commerce" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="img/icon/favicon.png">
    <!-- Google Font css -->
    <link href="https://fonts.googleapis.com/css?family=Lily+Script+One" rel="stylesheet">

    <!-- mobile menu css -->
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <!-- animate css -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- nivo slider css -->
    <link rel="stylesheet" href="css/nivo-slider.css">
    <!-- owl carousel css -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- slick css -->
    <link rel="stylesheet" href="css/slick.css">
    <!-- price slider css -->
    <link rel="stylesheet" href="css/jquery-ui.min.css">
    <!-- fontawesome css -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- fancybox css -->
    <link rel="stylesheet" href="css/jquery.fancybox.css">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- default css  -->
    <link rel="stylesheet" href="css/default.css">
    <!-- style css -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive css -->
    <link rel="stylesheet" href="css/responsive.css">

    <!-- modernizr js -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <header>
        <!-- Header Top Start -->
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <!-- Header Top left Start -->
                    <div class="col-lg-4 col-md-12 d-center">
                        <div class="header-top-left">
                            <img src="img/icon/call.png" alt="">Llámanos : [N TELEFONO]
                        </div>
                    </div>
                    <!-- Header Top left End -->
                    <!-- Search Box Start -->
                    <div class="col-lg-4 col-md-6 ml-auto mr-auto">
                        <div class="search-box-view">
                            <form action="#">
                                <input type="text" class="email" placeholder="Buscar Producto" name="product">
                                <button type="submit" class="submit"></button>
                            </form>
                        </div>
                    </div>
                    <!-- Search Box End -->
                    <!-- Header Top Right Start -->
                    <div class="col-lg-4 col-md-12">
                        <div class="header-top-right">
                            <ul class="header-list-menu f-right">
                                <!-- Language Start -->
                                <li><a href="#">Idioma: Espa&ntilde;ol <i class="fa fa-angle-down"></i></a>
                                    <ul class="ht-dropdown">
                                        <li><a href="#">Espa&ntilde;ol</a></li>
                                        <li><a href="#">Ingl&eacute;s</a></li>
                                    </ul>
                                </li>
                                <!-- Language End -->
                                <!-- Currency Start -->
                                <li><a href="#">Divisa: CLP <i class="fa fa-angle-down"></i></a>
                                    <ul class="ht-dropdown">
                                        <li><a href="#">CLP</a></li>
                                        <li><a href="#">USD</a></li>
                                        <li><a href="#">GBP</a></li>
                                        <li><a href="#">EUR</a></li>
                                    </ul>
                                </li>
                                <!-- Currency End -->
                            </ul>
                            <!-- Header-list-menu End -->
                        </div>
                    </div>
                    <!-- Header Top Right End -->
                </div>
            </div>
            <!-- Container End -->
        </div>
        <!-- Header Top End -->
        <!-- Header Bottom Start -->
        <div class="header-bottom header-sticky">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-2 col-sm-5 col-5">
                        <div class="logo">
                            <a href="index.html"><img src="img/logo/logo.png" alt="Ferme Ferreteria"></a>
                        </div>
                    </div>
                    <!-- Primary Vertical-Menu End -->
                    <!-- Search Box Start -->
                    <div class="col-xl-6 col-lg-7 d-none d-lg-block">
                        <div class="middle-menu pull-right">
                            <nav>
                                <ul class="middle-menu-list">
                                    <li><a href="<?php echo base_url(); ?>/home">inicio</a>
                                    </li>
                                    <li><a href="<?php echo base_url(); ?>/productos">Productos<i class="fa fa-angle-down"></i></a>
                                        <!-- Home Version Dropdown Start -->
                                        <ul class="ht-dropdown dropdown-style-two">
                                            <li><a href="product.html">Herramientas de mano</a></li>
                                            <li><a href="compare.html">Herramientas electricas</a></li>
                                            <li><a href="cart.html">Maderas</a></li>
                                            <li><a href="checkout.html">Pinturas</a></li>
                                        </ul>
                                        <!-- Home Version Dropdown End -->
                                    </li>
                                    <li><a href="about.html">acerca de nosotros</a></li>
                                    <li><a href="<?php echo base_url(); ?>/contacto">contacto</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- Search Box End -->
                    <!-- Cartt Box Start -->
                    <div class="col-lg-3 col-sm-7 col-7">
                        <div class="cart-box text-right">
                            <ul>
                                <li><a href="compare.html"><i class="fa fa-cog"></i></a>
                                    <ul class="ht-dropdown">
                                        <li><a href="login.html">Acceder</a></li>
                                        <li><a href="register.html">Registrarme</a></li>
                                        <li><a href="account.html">Cuenta</a></li>
                                    </ul>
                                </li>
                                <li><a href="#"><i class="fa fa-shopping-basket"></i><span class="cart-counter">2</span></a>
                                    <ul class="ht-dropdown main-cart-box">
                                        <li>
                                            <!-- Cart Box Start -->
                                            <div class="single-cart-box">
                                                <div class="cart-img">
                                                    <a href="#"><img src="img/menu/1.jpg" alt="cart-image"></a>
                                                </div>
                                                <div class="cart-content">
                                                    <h6><a href="product.html">Products Name</a></h6>
                                                    <span>1 × $399.00</span>
                                                </div>
                                                <a class="del-icone" href="#"><i class="fa fa-window-close-o"></i></a>
                                            </div>
                                            <!-- Cart Box End -->
                                            <!-- Cart Box Start -->
                                            <div class="single-cart-box">
                                                <div class="cart-img">
                                                    <a href="#"><img src="img/menu/2.jpg" alt="cart-image"></a>
                                                </div>
                                                <div class="cart-content">
                                                    <h6><a href="product.html">Products Name</a></h6>
                                                    <span>2 × $299.00</span>
                                                </div>
                                                <a class="del-icone" href="#"><i class="fa fa-window-close-o"></i></a>
                                            </div>
                                            <!-- Cart Box End -->
                                            <!-- Cart Footer Inner Start -->
                                            <div class="cart-footer fix">
                                                <h5>total :<span class="f-right">$698.00</span></h5>
                                                <div class="cart-actions">
                                                    <a class="checkout" href="checkout.html">Comprar</a>
                                                </div>
                                            </div>
                                            <!-- Cart Footer Inner End -->
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Cartt Box End -->
                    <div class="col-sm-12 d-lg-none">
                        <div class="mobile-menu">
                            <nav>
                                <ul>
                                    <li><a href="index.html">home</a>
                                        <!-- Home Version Dropdown Start -->
                                        <ul>
                                            <li><a href="index.html">Home Version One</a></li>
                                            <li><a href="index-2.html">Home Version Two</a></li>
                                            <li><a href="index-3.html">Home Box Layout</a></li>
                                        </ul>
                                        <!-- Home Version Dropdown End -->
                                    </li>
                                    <li><a href="shop.html">shop</a>
                                        <!-- Mobile Menu Dropdown Start -->
                                        <ul>
                                            <li><a href="product.html">Shop</a>
                                                <ul>
                                                    <li><a href="shop.html">Product Category Name</a>
                                                        <!-- Start Three Step -->
                                                        <ul>
                                                            <li><a href="shop.html">Product Category Name</a></li>
                                                            <li><a href="shop.html">Product Category Name</a></li>
                                                            <li><a href="shop.html">Product Category Name</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="shop.html">Product Category Name</a></li>
                                                    <li><a href="shop.html">Product Category Name</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="product.html">product details Page</a></li>
                                            <li><a href="compare.html">Compare Page</a></li>
                                            <li><a href="cart.html">Cart Page</a></li>
                                            <li><a href="checkout.html">Checkout Page</a></li>
                                            <li><a href="wishlist.html">Wishlist Page</a></li>
                                        </ul>
                                        <!-- Mobile Menu Dropdown End -->
                                    </li>
                                    <li><a href="blog.html">Blog</a>
                                        <!-- Mobile Menu Dropdown Start -->
                                        <ul>
                                            <li><a href="blog-details.html">Blog Details Page</a></li>
                                        </ul>
                                        <!-- Mobile Menu Dropdown End -->
                                    </li>
                                    <li><a href="#">pages</a>
                                        <!-- Mobile Menu Dropdown Start -->
                                        <ul>
                                            <li><a href="login.html">login Page</a></li>
                                            <li><a href="register.html">Register Page</a></li>
                                            <li><a href="404.html">404 Page</a></li>
                                        </ul>
                                        <!-- Mobile Menu Dropdown End -->
                                    </li>
                                    <li><a href="about.html">about us</a></li>
                                    <li><a href="contact.html">contact us</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- Mobile Menu  End -->
                </div>
                <!-- Row End -->
            </div>
            <!-- Container End -->
        </div>
        <!-- Header Bottom End -->
    </header>