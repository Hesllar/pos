<!-- Slider Area Start -->
<div class="slider-area slider-style-three">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="slider-wrapper theme-default">
                    <!-- Slider Background  Image Start-->
                    
                    <div id="slider" class="nivoSlider">
                        <a href="shop.html"> <img src="img/slider/5.jpg" data-thumb="img/slider/5.jpg" alt="" title="#slider-1-caption1" /></a>
                        <a href="shop.html"><img src="img/slider/6.jpg" data-thumb="img/slider/6.jpg" alt="" title="#slider-1-caption2" /></a>
                    </div>
                    <!-- Slider Background  Image Start-->
                    <div id="slider-1-caption1" class="nivo-html-caption nivo-caption">
                        <div class="text-content-wrapper">
                            <div class="text-content">
                                <h4 class="title2 wow bounceInLeft text-white mb-16" data-wow-duration="2s" data-wow-delay="0s">Oferta!</h4>
                                <h1 class="title1 wow bounceInRight text-white mb-16" data-wow-duration="2s" data-wow-delay="1s">Taladro percutor el&eacute;ctrico <br>10 mm 20V + 1
                                    batería</h1>

                                <div class="banner-readmore wow bounceInUp mt-35" data-wow-duration="2s" data-wow-delay="2s">
                                    <a class="button slider-btn" href="shop.html">Comprar ahora</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="slider-1-caption2" class="nivo-html-caption nivo-caption">
                        <div class="text-content-wrapper">
                            <div class="text-content slide-2">
                                <h4 class="title2 wow bounceInLeft text-white mb-16" data-wow-duration="1s" data-wow-delay="1s">Oferta!</h4>
                                <h1 class="title1 wow flipInX text-white mb-16" data-wow-duration="1s" data-wow-delay="2s">Sierra circular el&eacute;ctrica<br>7 1/4" 1400W</h1>
                                <div class="banner-readmore wow bounceInUp mt-35" data-wow-duration="1s" data-wow-delay="3s">
                                    <a class="button slider-btn" href="shop.html">Comprar ahora</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <!-- Single Banner Start -->
                <div class="single-banner zoom mb-20">
                    <a href="#"><img src="img/banner/9.jpg" alt="slider-banner"></a>
                </div>
                <!-- Single Banner End -->
                <!-- Single Banner Start -->
                <div class="single-banner zoom">
                    <a href="#"><img src="img/banner/10.jpg" alt="slider-banner"></a>
                </div>
                <!-- Single Banner End -->
            </div>
        </div>
    </div>
</div>
<div class="new-products pb-60">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4 order-2">
                <div class="side-product-list">
                    <div class="group-title">
                        <h2>Destacados</h2>
                    </div>
                    <!-- Deal Pro Activation Start -->
                    <?php $conteo = 1; ?>
                    <?php foreach ($destacado as $destacado) { ?>
                        <?php if ($conteo <= 4) { ?>
                            <?php $conteo = $conteo + 1 ?>
                            <div class="slider-right-content side-product-list-active owl-carousel">
                                <div class="double-pro">
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="product.html">
                                                <img class="primary-img" src="<?php echo base_url() . '/img/productos/' . $destacado['imagen']; ?>" alt="imagen">
                                            </a>
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="pro-content">
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <h4><a class="nombre-producto" href="product.html"><?php echo $destacado['nombre']; ?></a></h4>
                                            <p><?php echo $configuracion['signo_moneda']; ?><span><?php echo $destacado['precio_venta']; ?></span>
                                                <del class="prev-price"><?php echo $configuracion['signo_moneda']; ?><?php echo $destacado['precio_venta'] + 2000; ?></del>
                                            </p>
                                            <div class="pro-actions">
                                                <div class="actions-secondary">
                                                    <a href="wishlist.html" title="Añadir a favoritos"><i class="fa fa-heart"></i></a>
                                                    <button id="<?php echo $destacado['id_producto']; ?>" class="add-cart" title="Añadir al carro">Añadir carro</button>
                                                    <!-- <a class="add-cart" href="" data-toggle="tooltip" title="Añadir al carro">Añadir</a>-->

                                                </div>
                                            </div>
                                        </div>
                                        <!-- Product Content End -->
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                    <!-- Deal Pro Activation End -->
                </div>
            </div>
            <div class="col-xl-9 col-lg-8  order-lg-2">
                <!-- New Pro Content End -->
                <div class="new-pro-content">
                    <div class="pro-tab-title border-line">
                        <!-- Featured Product List Item Start -->
                        <ul class="nav product-list product-tab-list">
                            <li><a class="active" data-toggle="tab" href="#new-arrival">Nuevos productos</a>
                            </li>
                        </ul>
                        <!-- Featured Product List Item End -->
                    </div>
                    <div class="tab-content product-tab-content jump">
                        <div id="new-arrival" class="tab-pane active">
                            <!-- New Products Activation Start -->
                            <div class="new-pro-active owl-carousel">
                                <!-- Single Product Start -->
                                <div class="single-product">

                                
                                
                                
                                </div>
            
                 
                            </div>
                            <!-- New Products Activation End -->
                        </div>
                        <!-- New Products End -->
                    </div>
                    <!-- Tab-Content End -->
                    <div class="single-banner zoom mt-30 mt-sm-10">
                        <a href="#"><img src="img/banner/tab-banner.jpg" alt="slider-banner"></a>
                    </div>
                </div>
                <!-- New Pro Content End -->
            </div>
        </div>

    </div>
    <!-- Container End -->
</div>
<!-- New Products End -->
<!-- Company Policy Start -->
<div class="company-policy pb-60">
    <div class="container">
        <div class="row">
            <!-- Single Policy Start -->
            <div class="col-lg-3 col-sm-6">
                <div class="single-policy">
                    <div class="icone-img">
                        <img src="img/icon/1.png" alt="">
                    </div>
                    <div class="policy-desc">
                        <h3>Despacho gratis</h3>
                        <p>Dentro de la ciudad</p>
                    </div>
                </div>
            </div>
            <!-- Single Policy End -->
            <!-- Single Policy Start -->
            <div class="col-lg-3 col-sm-6">
                <div class="single-policy">
                    <div class="icone-img">
                        <img src="img/icon/2.png" alt="">
                    </div>
                    <div class="policy-desc">
                        <h3>Respuesta autom&aacute;tica</h3>
                        <p>Soporte 24 horas</p>
                    </div>
                </div>
            </div>
            <!-- Single Policy End -->
            <!-- Single Policy Start -->
            <div class="col-lg-3 col-sm-6">
                <div class="single-policy">
                    <div class="icone-img">
                        <img src="img/icon/3.png" alt="">
                    </div>
                    <div class="policy-desc">
                        <h3>R&aacute;pida devoluci&oacute;n</h3>
                        <p>Reembolsos dentro de 2 dias</p>
                    </div>
                </div>
            </div>
            <!-- Single Policy End -->
            <!-- Single Policy Start -->
            <div class="col-lg-3 col-sm-6">
                <div class="single-policy">
                    <div class="icone-img">
                        <img src="img/icon/4.png" alt="">
                    </div>
                    <div class="policy-desc">
                        <h3>Descuentos</h3>
                        <p>a clientes frecuentes</p>
                    </div>
                </div>
            </div>
            <!-- Single Policy End -->
        </div>
    </div>
</div>
<!-- Company Policy End -->
<!-- Brand Logo Start -->

<!-- Brand Logo End -->