<?php
$user_session = session();
?>

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
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/meanmenu.min.css">
    <!-- animate css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/animate.css">
    <!-- nivo slider css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/nivo-slider.css">
    <!-- owl carousel css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/owl.carousel.min.css">
    <!-- slick css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/slick.css">
    <!-- price slider css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/jquery-ui.min.css">
    <!-- fontawesome css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/font-awesome.min.css">
    <!-- fancybox css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/jquery.fancybox.css">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/bootstrap.min.css">
    <!-- default css  -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/default.css">
    <!-- style css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/style.css">
    <!-- responsive css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/responsive.css">
    <!-- mensajes flash css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/toastr.min.css">


    <!-- jquery 3.12.4 -->
    <script src="<?php echo base_url(); ?>/js/vendor/jquery-1.12.4.min.js"></script>
    <!-- modernizr js -->
    <script src="<?php echo base_url(); ?>/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!-- Wrapper Start -->
    <div class="wrapper homepage">
        <header>
            <!-- Header Top Start -->
            <div class="header-top">
                <div class="container">
                    <div class="row">
                        <!-- Header Top left Start -->
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
                                <a href="<?php echo base_url() ?>/home"><img src="<?php echo base_url(); ?>/img/logo/logo.png" alt="Ferme Ferreteria"></a>

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
                                        <li><a href="<?php echo base_url(); ?>/Productos">Productos<i class="fa fa-angle-down"></i></a>
                                            <!-- Home Version Dropdown Start -->
                                            <ul class="ht-dropdown dropdown-style-two">
                                                <li><a href="product.html">Herramientas de mano</a></li>
                                                <li><a href="compare.html">Herramientas electricas</a></li>
                                                <li><a href="cart.html">Maderas</a></li>
                                                <li><a href="checkout.html">Pinturas</a></li>
                                            </ul>
                                            <!-- Home Version Dropdown End -->
                                        </li>
                                        <li><a href="<?php echo base_url(); ?>/acerca">acerca de nosotros</a></li>
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
                                    <?php
                                    $tipo_sesion = true;
                                    if ($tipo_sesion) {
                                    ?>
                                        <li><a href="#"><?php echo $user_session->nom_usuario; ?>
                                                <i class="fa fa-user fa-fw"></i>
                                            </a>
                                            <ul class="ht-dropdown">
                                                <li><a href="<?php echo base_url() ?>/acceder">Iniciar</a></li>
                                                <li><a href="<?php echo base_url() ?>/registro">Registrarme</a></li>
                                                <li><a href="<?php echo base_url() ?>/Usuarios/logout">Salir</a></li>
                                            </ul>
                                        </li>
                                    <?php
                                    } else {
                                    ?>
                                        <li><a href="#"><i class="fa fa-cog"></i></a></li>
                                    <?php
                                    }
                                    ?>
                                    <li><a href="#"><i class="fa fa-shopping-basket"></i><span class="cart-counter">0</span></a>
                                        <ul class="ht-dropdown main-cart-box">
                                               <!-- <form class="form-horizontal" id="nuevaCompraPost" method="post" enctype="multipart/form-data" action="<?php // echo base_url() ?>/canasta/nuevaCompra">-->
                                                <li class="lista-carrito">
                                                    <!-- Aqui van los productos del carrito por JS -->
                                                </li>
                                                <li class="footer-carrito">
                                                    <div class="cart-footer fix">
                                                        <input id="tt" name="tt" value="50">
                                                        <h5>total: $<span class="f-right total">0</span></h5>
                                                        <div class="cart-actions">
                                                            <!--<a href="#" id="realizar-compra" class="checkout">Comprar</a> -->
                                                            <button type="submit" id="realizar-compra" class="checkout">Comprar</a>
                                                        </div>
                                                    </div>
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