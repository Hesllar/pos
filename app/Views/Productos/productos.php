<?php
$user_session = session();
?>

<!-- Header Area End -->
<!-- Shop Page Start -->
<div class="main-shop-page pb-60 " id="main-producto">
    <div class="container ">
        <!-- Row End -->
        <div class="row d-flex justify-content-center">

            <!-- Sidebar Shopping Option Start -->

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
                <div class="main-categorie  border ">
                    <!-- Grid & List Main Area End -->
                    <div class="tab-content fix">
                        <div id="grid-view" class="tab-pane active">
                            <div class="row">
                                <!-- Single Product Start -->
                                <?php foreach ($datos as $dato) { ?>
                                    <div class="col-lg-4 col-sm-6  border ">
                                        <div class="single-product">
                                            <input class="id_produc" value="<?php echo $dato['id_producto']; ?>" hidden>
                                            <!-- Product Image Start -->
                                            <div class="pro-img">

                                                <img class="primary-img" src="<?php echo base_url() . '/img/productos/' . $dato['imagen']; ?>" alt="imagen">

                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content">

                                                <h4><a class="nombre-producto" href="#"><?php echo $dato['nombre']; ?></a></h4>
                                                <p><?php echo $configuracion['signo_moneda']; ?><span><?php echo $dato['precio_venta']; ?></span>
                                                    <del class="prev-price"><?php echo $configuracion['signo_moneda']; ?><?php echo $dato['precio_venta'] + 2000; ?></del>
                                                </p>
                                                <p>Stock: <?php echo $dato['stock'] ?></p>
                                                <div class="pro-actions d-flex justify-content-center">
                                                    <div class="actions-secondary ">
                                                        <?php
                                                        if ($user_session->id_usuario != null) {
                                                        ?>
                                                            <a href="#" title="A??adir a favoritos"><i class="fa fa-heart"></i></a>
                                                            <button id="<?php echo $dato['id_producto']; ?>" class="add-cart">A??adir al carrito</button>

                                                        <?php
                                                        } else {
                                                        ?>
                                                            <button class="add-cart" id="noLogin" onclick="logearse()">A??adir al carrito</button>
                                                        <?php
                                                        } ?>
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
                                            <img class="primary-img" src="img/productos/<?php echo $dato['imagen'] ?>" alt="single-product">
                                        </a>
                                    </div>
                                    <!-- Product Image End -->

                                    <!-- Product Content Start -->

                                    <div class="pro-content">
                                        <h4><?php echo $dato['nombre']; ?></h4>
                                        <p><span class="price"><?php echo $configuracion['signo_moneda']; ?><?php echo $dato['precio_venta']; ?></span>
                                            <!--<del class="prev-price">$32.00</del> Precio oferta-->
                                        </p>
                                        <p> <?php echo $dato['descripcion']; ?></p>
                                        <div class="pro-actions">

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

<!-- Brand Logo End -->