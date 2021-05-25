<!-- Header Area End -->
<!-- Shop Page Start -->
<div class="main-shop-page pb-60" id="main-producto">
    <div class="container">
        <!-- Row End -->
        <div class="row">

            <!-- Sidebar Shopping Option Start -->
            <div class="col-lg-3  order-2">
                <div class="sidebar white-bg">
                    <div class="single-sidebar">
                        <div class="group-title">
                            <h2 id="catt">categorias</h2>
                        </div>
                        <ul>
                            <li><a href="#">Ver todo</a></li>
                            <?php foreach ($categorias as $categoria) { ?>
                                <li><a href="#"><?php echo $categoria['nombre_categoria']; ?></a></li>
                            <?php } ?>

                        </ul>
                    </div>
                    <!-- Single Banner Start -->
                    <div class="single-sidebar single-banner zoom pt-20">
                        <a href="#" class="hidden-sm"><img src="img/banner/8.jpg" alt="slider-banner"></a>
                        <a href="#" class="visible-sm"><img src="img/banner/6.jpg" alt="slider-banner"></a>
                    </div>
                    <!-- Single Banner End -->
                </div>
            </div>
            <!-- Sidebar Shopping Option End -->
            <!-- Product Categorie List Start -->
            <div class="col-lg-9 order-lg-2">
                <!-- Grid & List View Start -->
                <div class="grid-list-top border-default universal-padding fix mb-30">
                    <div class="grid-list-view f-left">
                        <ul class="list-inline nav">
                            <li><a data-toggle="tab" href="#grid-view"><i class="fa fa-th"></i></a></li>
                            <li><a class="active" data-toggle="tab" href="#list-view"><i class="fa fa-list-ul"></i></a>
                            </li>
                            <li><span class="grid-item-list"> Productos 1-12 de <?php echo count($datos); ?></span></li>
                        </ul>
                    </div>
                    <!-- Toolbar Short Area Start -->
                    <div class="main-toolbar-sorter f-right">
                        <div class="toolbar-sorter">
                            <label>Ordenar por</label>
                            <select class="sorter" name="sorter">
                                <option value="Position" selected="selected">Antiguedad</option>
                                <option value="Product Name">Nombre del producto</option>
                                <option value="Price">Precio</option>
                            </select>
                            <span><a href="#"><i class="fa fa-arrow-up"></i></a></span>
                        </div>
                    </div>
                    <!-- Toolbar Short Area End -->
                </div>
                <!-- Grid & List View End -->
                <div class="main-categorie">
                    <!-- Grid & List Main Area End -->
                    <div class="tab-content fix">
                        <div id="grid-view" class="tab-pane active">


                            <div class="row">
                                <!-- Single Product Start -->
                                <?php foreach ($datos as $dato) { ?>
                                    <div class="col-lg-4 col-sm-6">
                                        <div class="single-product">
                                        <input class="id_produc" value="<?php echo $dato['id_producto']; ?>" hidden>
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="product.html">
                                                    <img class="primary-img" src="<?php echo base_url() . '/img/productos/' . $dato['imagen']; ?>" alt="imagen">
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
                                                <h4><a class="nombre-producto" href="product.html"><?php echo $dato['nombre']; ?></a></h4>
                                                <p><?php echo $configuracion['signo_moneda']; ?><span><?php echo $dato['precio_venta']; ?></span>
                                                    <del class="prev-price"><?php echo $configuracion['signo_moneda']; ?><?php echo $dato['precio_venta'] + 2000; ?></del>
                                                </p>
                                                <div class="pro-actions">
                                                    <div class="actions-secondary">
                                                        <a href="wishlist.html" title="Añadir a favoritos"><i class="fa fa-heart"></i></a>
                                                        <button id="<?php echo $dato['id_producto']; ?>" class="add-cart" title="Añadir al carro">Añadir carro</button>
                                                       <!-- <a class="add-cart" href="" data-toggle="tooltip" title="Añadir al carro">Añadir</a>-->
                                    
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                    </div>
                                <?php } ?>
                                <!-- Single Product End -->
                            </div>
                        </div>

                        <!-- #grid view End -->

                        <div id="list-view" class="tab-pane">
                            <!-- Single Product Start -->
                            <?php foreach ($datos as $dato) { ?>
                                <div class="single-product">
                                <input class="id_produc" id="<?php echo $dato['id_producto']; ?>" value="<?php echo $dato['id_producto']; ?>" hidden>
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="#">
                                            <img class="primary-img" src="<?php echo $dato['imagen'] ?>" alt="single-product">
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

                                        <h4><?php echo $dato['nombre']; ?></h4>
                                        <p><span class="price"><?php echo $configuracion['signo_moneda']; ?><?php echo $dato['precio_venta']; ?></span>
                                            <!--<del class="prev-price">$32.00</del> Precio oferta-->
                                        </p>
                                        <p> <?php echo $dato['descripcion']; ?></p>
                                        <div class="pro-actions">
                                            <div class="actions-secondary">
                                                <a href="wishlist.html" data-toggle="tooltip" title="Añadir a favoritos"><i class="fa fa-heart"></i></a>
                                                </div>
                                        </div>
                                    </div>

                                    <!-- Product Content End -->
                                </div>
                            <?php } ?>
                        </div>
                        <!-- #list view End -->
                    </div>
                    <!-- Grid & List Main Area End -->
                </div>
                <!--Breadcrumb and Page Show Start -->
                <div class="pagination-box fix">
                    <ul class="blog-pagination ">
                        <li><a href="#">1</a></li>
                        <li class="active"><a href="#">2</a></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                    </ul>
                    <div class="toolbar-sorter-footer">
                        <label>mostrar</label>
                        <select class="sorter" name="sorter">
                            <option value="Position" selected="selected">12</option>
                            <option value="Product Name">15</option>
                            <option value="Price">30</option>
                        </select>
                        <span>por p&aacute;gina</span>
                    </div>
                </div>
                <!--Breadcrumb and Page Show End -->
            </div>
            <!-- product Categorie List End -->
        </div>
        <!-- Row End -->
    </div>
    <!-- Container End -->
</div>
<!-- Shop Page End -->
<!-- Brand Logo Start -->
<div class="brand-area pb-60">
    <div class="container">
        <!-- Brand Banner Start -->
        <div class="brand-banner owl-carousel">
            <div class="single-brand">
                <a href="#"><img class="img" src="img/brand/1.png" alt="brand-image"></a>
            </div>
            <div class="single-brand">
                <a href="#"><img src="img/brand/2.png" alt="brand-image"></a>
            </div>
            <div class="single-brand">
                <a href="#"><img src="img/brand/3.png" alt="brand-image"></a>
            </div>
            <div class="single-brand">
                <a href="#"><img src="img/brand/4.png" alt="brand-image"></a>
            </div>
            <div class="single-brand">
                <a href="#"><img src="img/brand/5.png" alt="brand-image"></a>
            </div>
            <div class="single-brand">
                <a href="#"><img class="img" src="img/brand/1.png" alt="brand-image"></a>
            </div>
            <div class="single-brand">
                <a href="#"><img src="img/brand/2.png" alt="brand-image"></a>
            </div>
            <div class="single-brand">
                <a href="#"><img src="img/brand/3.png" alt="brand-image"></a>
            </div>
            <div class="single-brand">
                <a href="#"><img src="img/brand/4.png" alt="brand-image"></a>
            </div>
            <div class="single-brand">
                <a href="#"><img src="img/brand/5.png" alt="brand-image"></a>
            </div>
        </div>
        <!-- Brand Banner End -->
    </div>
</div>
<!-- Brand Logo End -->