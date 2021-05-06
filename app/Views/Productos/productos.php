<!-- Header Area End -->
<!-- Shop Page Start -->
<div class="main-shop-page pb-60">
    <div class="container">
        <!-- Row End -->
        <div class="row">
            <!-- Sidebar Shopping Option Start -->
            <div class="col-lg-3  order-2">
                <div class="sidebar white-bg">
                    <div class="single-sidebar">
                        <div class="group-title">
                            <h2>categorias</h2>
                            <?php foreach ($datos as $dato) { ?>
                                <tr>
                                    <td> <?php echo $dato['id_producto'] ?></td>
                                    <td> <?php echo $dato['n_registro'] ?></td>
                                    <td> <?php echo $dato['nombre'] ?></td>
                                </tr>
                            <?php } ?>
                        </div>
                        <ul>
                            <li><a href="#">Electrical (9)</a></li>
                            <li><a href="#">Hardware (11)</a></li>
                            <li><a href="#">Drill Machine (8)</a></li>
                            <li><a href="#">Tools Box (10)</a></li>
                            <li><a href="#">Power Saw (5)</a></li>
                        </ul>
                    </div>
                    <div class="single-sidebar">
                        <div class="group-title">
                            <h2>color</h2>
                        </div>
                        <ul class="color-option">
                            <li>
                                <a class="blue" href="#"></a>
                            </li>
                            <li>
                                <a class="green" href="#"></a>
                            </li>
                            <li>
                                <a class="black" href="#"></a>
                            </li>
                            <li>
                                <a class="rose" href="#"></a>
                            </li>
                            <li>
                                <a class="red" href="#"></a>
                            </li>
                            <li>
                                <a class="purple" href="#"></a>
                            </li>
                            <li>
                                <a class="rose" href="#"></a>
                            </li>
                            <li>
                                <a class="yellow" href="#"></a>
                            </li>
                            <li>
                                <a class="orange" href="#"></a>
                            </li>
                        </ul>
                    </div>
                    <div class="single-sidebar">
                        <div class="group-title">
                            <h2>price</h2>
                        </div>
                        <form action="#">
                            <div id="slider-range" class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                            </div>
                            <input id="amount" class="amount" readonly="" type="text">
                        </form>
                    </div>
                    <div class="single-sidebar">
                        <div class="group-title">
                            <h2>manufacturer</h2>

                        </div>
                        <ul class="manufactures-list">
                            <li><a href="#">Brand one (14)</a></li>
                            <li><a href="#">Brand two (13)</a></li>
                            <li><a href="#">Brand three (13)</a></li>
                            <li><a href="#">Brand four (14)</a></li>
                            <li><a href="#">Brand five (13)</a></li>
                        </ul>
                    </div>
                    <div class="single-sidebar">
                        <div class="group-title">
                            <h2>Compare Products</h2>
                        </div>
                        <div class="best-seller-pro-two compare-pro best-seller-pro-two owl-carousel">
                            <!-- Best Seller Multi Product Start -->
                            <div class="best-seller-multi-product">
                                <!-- Single Product Start -->
                                <div class="single-product">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="product.html">
                                            <img class="primary-img" src="img/products/1.jpg" alt="single-product">
                                        </a>
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <h4><a href="product.html">Products Name Here</a></h4>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <p><span class="price">$38.00</span><del class="prev-price">$40.00</del></p>
                                    </div>
                                    <!-- Product Content End -->
                                </div>
                                <!-- Single Product End -->
                            </div>
                            <!-- Best Seller Multi Product End -->
                            <!-- Best Seller Multi Product Start -->
                            <div class="best-seller-multi-product">
                                <!-- Single Product Start -->
                                <div class="single-product">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="product.html">
                                            <img class="primary-img" src="img/products/2.jpg" alt="single-product">
                                        </a>
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <h4><a href="product.html">Products Name Here</a></h4>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <p><span class="price">$32.00</span></p>
                                    </div>
                                    <!-- Product Content End -->
                                </div>
                                <!-- Single Product End -->
                            </div>
                            <!-- Best Seller Multi Product End -->
                            <!-- Best Seller Multi Product Start -->
                            <div class="best-seller-multi-product">
                                <!-- Single Product Start -->
                                <div class="single-product">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="product.html">
                                            <img class="primary-img" src="img/products/3.jpg" alt="single-product">
                                        </a>
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <h4><a href="product.html">Products Name Here</a></h4>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <p><span class="price">$35.00</span><del class="prev-price">39.00</del></p>
                                    </div>
                                    <!-- Product Content End -->
                                </div>
                                <!-- Single Product End -->
                            </div>
                            <!-- Best Seller Multi Product End -->
                        </div>
                    </div>
                    <div class="single-sidebar">
                        <div class="group-title">
                            <h2>My Wish List</h2>
                        </div>
                        <div class="best-seller-pro-two compare-pro best-seller-pro-two owl-carousel">
                            <!-- Best Seller Multi Product Start -->
                            <div class="best-seller-multi-product">
                                <!-- Single Product Start -->
                                <div class="single-product">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="product.html">
                                            <img class="primary-img" src="img/products/4.jpg" alt="single-product">
                                        </a>
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <h4><a href="product.html">Products Name Here</a></h4>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <p><span class="price">$86.00</span><del class="prev-price">90.00</del></p>
                                    </div>
                                    <!-- Product Content End -->
                                </div>
                                <!-- Single Product End -->
                            </div>
                            <!-- Best Seller Multi Product End -->
                            <!-- Best Seller Multi Product Start -->
                            <div class="best-seller-multi-product">
                                <!-- Single Product Start -->
                                <div class="single-product">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="product.html">
                                            <img class="primary-img" src="img/products/1.jpg" alt="single-product">
                                        </a>
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <h4><a href="product.html">Products Name Here</a></h4>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <p><span class="price">$32.00</span></p>
                                    </div>
                                    <!-- Product Content End -->
                                </div>
                                <!-- Single Product End -->
                            </div>
                            <!-- Best Seller Multi Product End -->
                            <!-- Best Seller Multi Product Start -->
                            <div class="best-seller-multi-product">
                                <!-- Single Product Start -->
                                <div class="single-product">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="product.html">
                                            <img class="primary-img" src="img/products/2.jpg" alt="single-product">
                                        </a>
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <h4><a href="product.html">Products Name Here</a></h4>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <p><span class="price">$38.00</span><del class="prev-price">45.00</del></p>
                                    </div>
                                    <!-- Product Content End -->
                                </div>
                                <!-- Single Product End -->
                            </div>
                            <!-- Best Seller Multi Product End -->
                        </div>
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
                            <li><span class="grid-item-list"> Items 1-12 of 13</span></li>
                        </ul>
                    </div>
                    <!-- Toolbar Short Area Start -->
                    <div class="main-toolbar-sorter f-right">
                        <div class="toolbar-sorter">
                            <label>sort by</label>
                            <select class="sorter" name="sorter">
                                <option value="Position" selected="selected">position</option>
                                <option value="Product Name">Product Name</option>
                                <option value="Price">Price</option>
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
                        <div id="grid-view" class="tab-pane ">
                            <div class="row">
                                <!-- Single Product Start -->
                                <div class="col-lg-4 col-sm-6">
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="product.html">
                                                <img class="primary-img" src="img/products/1.jpg" alt="single-product">
                                                <img class="secondary-img" src="img/products/2.jpg" alt="single-product">
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
                                            <h4><a href="product.html">Products Name Here</a></h4>
                                            <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                                            <div class="pro-actions">
                                                <div class="actions-secondary">
                                                    <a href="wishlist.html" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                    <a class="add-cart" href="cart.html" data-toggle="tooltip" title="Add to Cart">Add To Cart</a>
                                                    <a href="compare.html" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Product Content End -->
                                    </div>
                                </div>
                                <!-- Single Product End -->
                                <!-- Single Product Start -->
                                <div class="col-lg-4 col-sm-6">
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="product.html">
                                                <img class="primary-img" src="img/products/3.jpg" alt="single-product">
                                                <img class="secondary-img" src="img/products/4.jpg" alt="single-product">
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
                                            <h4><a href="product.html">Products Name Here</a></h4>
                                            <p><span class="price">$45.00</span><del class="prev-price">$50.00</del></p>
                                            <div class="pro-actions">
                                                <div class="actions-secondary">
                                                    <a href="wishlist.html" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                    <a class="add-cart" href="cart.html" data-toggle="tooltip" title="Add to Cart">Add To Cart</a>
                                                    <a href="compare.html" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Product Content End -->
                                        <span class="sticker-new">-20%</span>
                                    </div>
                                </div>
                                <!-- Single Product End -->
                                <!-- Single Product Start -->
                                <div class="col-lg-4 col-sm-6">
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="product.html">
                                                <img class="primary-img" src="img/products/5.jpg" alt="single-product">
                                                <img class="secondary-img" src="img/products/6.jpg" alt="single-product">
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
                                            <h4><a href="product.html">Products Name Here</a></h4>
                                            <p><span class="price">$68.00</span><del class="prev-price">$70.00</del></p>
                                            <div class="pro-actions">
                                                <div class="actions-secondary">
                                                    <a href="wishlist.html" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                    <a class="add-cart" href="cart.html" data-toggle="tooltip" title="Add to Cart">Add To Cart</a>
                                                    <a href="compare.html" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Product Content End -->
                                    </div>
                                </div>
                                <!-- Single Product End -->
                                <!-- Single Product Start -->
                                <div class="col-lg-4 col-sm-6">
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="product.html">
                                                <img class="primary-img" src="img/products/7.jpg" alt="single-product">
                                                <img class="secondary-img" src="img/products/8.jpg" alt="single-product">
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
                                            <h4><a href="product.html">Products Name Here</a></h4>
                                            <p><span class="price">$25.00</span><del class="prev-price">$30.00</del></p>
                                            <div class="pro-actions">
                                                <div class="actions-secondary">
                                                    <a href="wishlist.html" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                    <a class="add-cart" href="cart.html" data-toggle="tooltip" title="Add to Cart">Add To Cart</a>
                                                    <a href="compare.html" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Product Content End -->
                                        <span class="sticker-new">-10%</span>
                                    </div>
                                </div>
                                <!-- Single Product End -->
                                <!-- Single Product Start -->
                                <div class="col-lg-4 col-sm-6">
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="product.html">
                                                <img class="primary-img" src="img/products/2.jpg" alt="single-product">
                                                <img class="secondary-img" src="img/products/1.jpg" alt="single-product">
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
                                            <h4><a href="product.html">Products Name Here</a></h4>
                                            <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                                            <div class="pro-actions">
                                                <div class="actions-secondary">
                                                    <a href="wishlist.html" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                    <a class="add-cart" href="cart.html" data-toggle="tooltip" title="Add to Cart">Add To Cart</a>
                                                    <a href="compare.html" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Product Content End -->
                                    </div>
                                </div>
                                <!-- Single Product End -->
                                <!-- Single Product Start -->
                                <div class="col-lg-4 col-sm-6">
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="product.html">
                                                <img class="primary-img" src="img/products/4.jpg" alt="single-product">
                                                <img class="secondary-img" src="img/products/3.jpg" alt="single-product">
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
                                            <h4><a href="product.html">Products Name Here</a></h4>
                                            <p><span class="price">$40.00</span><del class="prev-price">$50.00</del></p>
                                            <div class="pro-actions">
                                                <div class="actions-secondary">
                                                    <a href="wishlist.html" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                    <a class="add-cart" href="cart.html" data-toggle="tooltip" title="Add to Cart">Add To Cart</a>
                                                    <a href="compare.html" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Product Content End -->
                                    </div>
                                </div>
                                <!-- Single Product End -->
                                <!-- Single Product Start -->
                                <div class="col-lg-4 col-sm-6">
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="product.html">
                                                <img class="primary-img" src="img/products/6.jpg" alt="single-product">
                                                <img class="secondary-img" src="img/products/5.jpg" alt="single-product">
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
                                            <h4><a href="product.html">Products Name Here</a></h4>
                                            <p><span class="price">$25.00</span><del class="prev-price">$29.00</del></p>
                                            <div class="pro-actions">
                                                <div class="actions-secondary">
                                                    <a href="wishlist.html" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                    <a class="add-cart" href="cart.html" data-toggle="tooltip" title="Add to Cart">Add To Cart</a>
                                                    <a href="compare.html" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Product Content End -->
                                        <span class="sticker-new">-30%</span>
                                    </div>
                                </div>
                                <!-- Single Product End -->
                                <!-- Single Product Start -->
                                <div class="col-lg-4 col-sm-6">
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="product.html">
                                                <img class="primary-img" src="img/products/7.jpg" alt="single-product">
                                                <img class="secondary-img" src="img/products/8.jpg" alt="single-product">
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
                                            <h4><a href="product.html">Products Name Here</a></h4>
                                            <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                                            <div class="pro-actions">
                                                <div class="actions-secondary">
                                                    <a href="wishlist.html" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                    <a class="add-cart" href="cart.html" data-toggle="tooltip" title="Add to Cart">Add To Cart</a>
                                                    <a href="compare.html" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Product Content End -->
                                    </div>
                                </div>
                                <!-- Single Product End -->
                                <!-- Single Product Start -->
                                <div class="col-lg-4 col-sm-6">
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="product.html">
                                                <img class="primary-img" src="img/products/1.jpg" alt="single-product">
                                                <img class="secondary-img" src="img/products/2.jpg" alt="single-product">
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
                                            <h4><a href="product.html">Products Name Here</a></h4>
                                            <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                                            <div class="pro-actions">
                                                <div class="actions-secondary">
                                                    <a href="wishlist.html" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                    <a class="add-cart" href="cart.html" data-toggle="tooltip" title="Add to Cart">Add To Cart</a>
                                                    <a href="compare.html" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Product Content End -->
                                        <span class="sticker-new">-30%</span>
                                    </div>
                                </div>
                                <!-- Single Product End -->
                                <!-- Single Product Start -->
                                <div class="col-lg-4 col-sm-6">
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="product.html">
                                                <img class="primary-img" src="img/products/3.jpg" alt="single-product">
                                                <img class="secondary-img" src="img/products/4.jpg" alt="single-product">
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
                                            <h4><a href="product.html">Products Name Here</a></h4>
                                            <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                                            <div class="pro-actions">
                                                <div class="actions-secondary">
                                                    <a href="wishlist.html" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                    <a class="add-cart" href="cart.html" data-toggle="tooltip" title="Add to Cart">Add To Cart</a>
                                                    <a href="compare.html" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Product Content End -->
                                        <span class="sticker-new">-30%</span>
                                    </div>
                                </div>
                                <!-- Single Product End -->
                                <!-- Single Product Start -->
                                <div class="col-lg-4 col-sm-6">
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="product.html">
                                                <img class="primary-img" src="img/products/5.jpg" alt="single-product">
                                                <img class="secondary-img" src="img/products/6.jpg" alt="single-product">
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
                                            <h4><a href="product.html">Products Name Here</a></h4>
                                            <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                                            <div class="pro-actions">
                                                <div class="actions-secondary">
                                                    <a href="wishlist.html" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                    <a class="add-cart" href="cart.html" data-toggle="tooltip" title="Add to Cart">Add To Cart</a>
                                                    <a href="compare.html" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Product Content End -->
                                    </div>
                                </div>
                                <!-- Single Product End -->
                                <!-- Single Product Start -->
                                <div class="col-lg-4 col-sm-6">
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="product.html">
                                                <img class="primary-img" src="img/products/7.jpg" alt="single-product">
                                                <img class="secondary-img" src="img/products/8.jpg" alt="single-product">
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
                                            <h4><a href="product.html">Products Name Here</a></h4>
                                            <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                                            <div class="pro-actions">
                                                <div class="actions-secondary">
                                                    <a href="wishlist.html" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                    <a class="add-cart" href="cart.html" data-toggle="tooltip" title="Add to Cart">Add To Cart</a>
                                                    <a href="compare.html" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Product Content End -->
                                        <span class="sticker-new">-30%</span>
                                    </div>
                                </div>
                                <!-- Single Product End -->
                                <!-- Single Product Start -->
                                <div class="col-lg-4 col-sm-6">
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="product.html">
                                                <img class="primary-img" src="img/products/5.jpg" alt="single-product">
                                                <img class="secondary-img" src="img/products/4.jpg" alt="single-product">
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
                                            <h4><a href="product.html">Products Name Here</a></h4>
                                            <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                                            <div class="pro-actions">
                                                <div class="actions-secondary">
                                                    <a href="wishlist.html" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                    <a class="add-cart" href="cart.html" data-toggle="tooltip" title="Add to Cart">Add To Cart</a>
                                                    <a href="compare.html" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Product Content End -->
                                        <span class="sticker-new">-32%</span>
                                    </div>
                                </div>
                                <!-- Single Product End -->
                                <!-- Single Product Start -->
                                <div class="col-lg-4 col-sm-6">
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="product.html">
                                                <img class="primary-img" src="img/products/6.jpg" alt="single-product">
                                                <img class="secondary-img" src="img/products/5.jpg" alt="single-product">
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
                                            <h4><a href="product.html">Products Name Here</a></h4>
                                            <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                                            <div class="pro-actions">
                                                <div class="actions-secondary">
                                                    <a href="wishlist.html" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                    <a class="add-cart" href="cart.html" data-toggle="tooltip" title="Add to Cart">Add To Cart</a>
                                                    <a href="compare.html" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Product Content End -->
                                    </div>
                                </div>
                                <!-- Single Product End -->
                                <!-- Single Product Start -->
                                <div class="col-lg-4 col-sm-6">
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="product.html">
                                                <img class="primary-img" src="img/products/4.jpg" alt="single-product">
                                                <img class="secondary-img" src="img/products/3.jpg" alt="single-product">
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
                                            <h4><a href="product.html">Products Name Here</a></h4>
                                            <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                                            <div class="pro-actions">
                                                <div class="actions-secondary">
                                                    <a href="wishlist.html" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                    <a class="add-cart" href="cart.html" data-toggle="tooltip" title="Add to Cart">Add To Cart</a>
                                                    <a href="compare.html" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Product Content End -->
                                        <span class="sticker-new">-30%</span>
                                    </div>
                                </div>
                                <!-- Single Product End -->
                                <!-- Single Product Start -->
                                <div class="col-lg-4 col-sm-6">
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="product.html">
                                                <img class="primary-img" src="img/products/2.jpg" alt="single-product">
                                                <img class="secondary-img" src="img/products/1.jpg" alt="single-product">
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
                                            <h4><a href="product.html">Products Name Here</a></h4>
                                            <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                                            <div class="pro-actions">
                                                <div class="actions-secondary">
                                                    <a href="wishlist.html" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                    <a class="add-cart" href="cart.html" data-toggle="tooltip" title="Add to Cart">Add To Cart</a>
                                                    <a href="compare.html" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Product Content End -->
                                    </div>
                                </div>
                                <!-- Single Product End -->
                                <!-- Single Product Start -->
                                <div class="col-lg-4 col-sm-6">
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="product.html">
                                                <img class="primary-img" src="img/products/3.jpg" alt="single-product">
                                                <img class="secondary-img" src="img/products/2.jpg" alt="single-product">
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
                                            <h4><a href="product.html">Products Name Here</a></h4>
                                            <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                                            <div class="pro-actions">
                                                <div class="actions-secondary">
                                                    <a href="wishlist.html" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                    <a class="add-cart" href="cart.html" data-toggle="tooltip" title="Add to Cart">Add To Cart</a>
                                                    <a href="compare.html" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Product Content End -->
                                        <span class="sticker-new">-32%</span>
                                    </div>
                                </div>
                                <!-- Single Product End -->
                                <!-- Single Product Start -->
                                <div class="col-lg-4 col-sm-6">
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="product.html">
                                                <img class="primary-img" src="img/products/7.jpg" alt="single-product">
                                                <img class="secondary-img" src="img/products/7.jpg" alt="single-product">
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
                                            <h4><a href="product.html">Products Name Here</a></h4>
                                            <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                                            <div class="pro-actions">
                                                <div class="actions-secondary">
                                                    <a href="wishlist.html" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                    <a class="add-cart" href="cart.html" data-toggle="tooltip" title="Add to Cart">Add To Cart</a>
                                                    <a href="compare.html" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Product Content End -->
                                    </div>
                                </div>
                                <!-- Single Product End -->
                                <!-- Single Product Start -->
                                <div class="col-lg-4 col-sm-6">
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="product.html">
                                                <img class="primary-img" src="img/products/6.jpg" alt="single-product">
                                                <img class="secondary-img" src="img/products/5.jpg" alt="single-product">
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
                                            <h4><a href="product.html">Products Name Here</a></h4>
                                            <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                                            <div class="pro-actions">
                                                <div class="actions-secondary">
                                                    <a href="wishlist.html" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                    <a class="add-cart" href="cart.html" data-toggle="tooltip" title="Add to Cart">Add To Cart</a>
                                                    <a href="compare.html" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Product Content End -->
                                        <span class="sticker-new">-30%</span>
                                    </div>
                                </div>
                                <!-- Single Product End -->
                                <!-- Single Product Start -->
                                <div class="col-lg-4 col-sm-6">
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="product.html">
                                                <img class="primary-img" src="img/products/4.jpg" alt="single-product">
                                                <img class="secondary-img" src="img/products/3.jpg" alt="single-product">
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
                                            <h4><a href="product.html">Products Name Here</a></h4>
                                            <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                                            <div class="pro-actions">
                                                <div class="actions-secondary">
                                                    <a href="wishlist.html" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                    <a class="add-cart" href="cart.html" data-toggle="tooltip" title="Add to Cart">Add To Cart</a>
                                                    <a href="compare.html" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Product Content End -->
                                    </div>
                                </div>
                                <!-- Single Product End -->
                                <!-- Single Product Start -->
                                <div class="col-lg-4 col-sm-6">
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="product.html">
                                                <img class="primary-img" src="img/products/2.jpg" alt="single-product">
                                                <img class="secondary-img" src="img/products/1.jpg" alt="single-product">
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
                                            <h4><a href="product.html">Products Name Here</a></h4>
                                            <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                                            <div class="pro-actions">
                                                <div class="actions-secondary">
                                                    <a href="wishlist.html" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                    <a class="add-cart" href="cart.html" data-toggle="tooltip" title="Add to Cart">Add To Cart</a>
                                                    <a href="compare.html" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Product Content End -->
                                        <span class="sticker-new">-32%</span>
                                    </div>
                                </div>
                                <!-- Single Product End -->
                            </div>
                        </div>
                        <!-- #grid view End -->
                        <div id="list-view" class="tab-pane active">
                            <!-- Single Product Start -->
                            <div class="single-product">
                                <!-- Product Image Start -->
                                <div class="pro-img">
                                    <a href="product.html">
                                        <img class="primary-img" src="img/products/1.jpg" alt="single-product">
                                        <img class="secondary-img" src="img/products/2.jpg" alt="single-product">
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
                                    <h4><a href="product.html">Products Name Here</a></h4>
                                    <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati velit,
                                        similique voluptas doloribus assumenda quis libero animi cumque dignissimos
                                        quisquam, quaerat ea laboriosam incidunt ullam.</p>
                                    <div class="pro-actions">
                                        <div class="actions-secondary">
                                            <a href="wishlist.html" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                            <a class="add-cart" href="cart.html" data-toggle="tooltip" title="Add to Cart">Add To Cart</a>
                                            <a href="compare.html" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                            </div>
                            <!-- Single Product Start -->
                            <!-- Single Product Start -->
                            <div class="single-product">
                                <!-- Product Image Start -->
                                <div class="pro-img">
                                    <a href="product.html">
                                        <img class="primary-img" src="img/products/3.jpg" alt="single-product">
                                        <img class="secondary-img" src="img/products/4.jpg" alt="single-product">
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
                                    <h4><a href="product.html">Products Name Here</a></h4>
                                    <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati velit,
                                        similique voluptas doloribus assumenda quis libero animi cumque dignissimos
                                        quisquam, quaerat ea laboriosam incidunt ullam.</p>
                                    <div class="pro-actions">
                                        <div class="actions-secondary">
                                            <a href="wishlist.html" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                            <a class="add-cart" href="cart.html" data-toggle="tooltip" title="Add to Cart">Add To Cart</a>
                                            <a href="compare.html" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                                <span class="sticker-new">-30%</span>
                            </div>
                            <!-- Single Product Start -->
                            <!-- Single Product Start -->
                            <div class="single-product">
                                <!-- Product Image Start -->
                                <div class="pro-img">
                                    <a href="product.html">
                                        <img class="primary-img" src="img/products/5.jpg" alt="single-product">
                                        <img class="secondary-img" src="img/products/6.jpg" alt="single-product">
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
                                    <h4><a href="product.html">Products Name Here</a></h4>
                                    <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati velit,
                                        similique voluptas doloribus assumenda quis libero animi cumque dignissimos
                                        quisquam, quaerat ea laboriosam incidunt ullam.</p>
                                    <div class="pro-actions">
                                        <div class="actions-secondary">
                                            <a href="wishlist.html" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                            <a class="add-cart" href="cart.html" data-toggle="tooltip" title="Add to Cart">Add To Cart</a>
                                            <a href="compare.html" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                            </div>
                            <!-- Single Product Start -->
                            <!-- Single Product Start -->
                            <div class="single-product">
                                <!-- Product Image Start -->
                                <div class="pro-img">
                                    <a href="product.html">
                                        <img class="primary-img" src="img/products/7.jpg" alt="single-product">
                                        <img class="secondary-img" src="img/products/8.jpg" alt="single-product">
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
                                    <h4><a href="product.html">Products Name Here</a></h4>
                                    <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati velit,
                                        similique voluptas doloribus assumenda quis libero animi cumque dignissimos
                                        quisquam, quaerat ea laboriosam incidunt ullam.</p>
                                    <div class="pro-actions">
                                        <div class="actions-secondary">
                                            <a href="wishlist.html" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                            <a class="add-cart" href="cart.html" data-toggle="tooltip" title="Add to Cart">Add To Cart</a>
                                            <a href="compare.html" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                                <span class="sticker-new">-30%</span>
                            </div>
                            <!-- Single Product Start -->
                            <!-- Single Product Start -->
                            <div class="single-product">
                                <!-- Product Image Start -->
                                <div class="pro-img">
                                    <a href="product.html">
                                        <img class="primary-img" src="img/products/8.jpg" alt="single-product">
                                        <img class="secondary-img" src="img/products/7.jpg" alt="single-product">
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
                                    <h4><a href="product.html">Products Name Here</a></h4>
                                    <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati velit,
                                        similique voluptas doloribus assumenda quis libero animi cumque dignissimos
                                        quisquam, quaerat ea laboriosam incidunt ullam.</p>
                                    <div class="pro-actions">
                                        <div class="actions-secondary">
                                            <a href="wishlist.html" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                            <a class="add-cart" href="cart.html" data-toggle="tooltip" title="Add to Cart">Add To Cart</a>
                                            <a href="compare.html" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                            </div>
                            <!-- Single Product Start -->
                            <!-- Single Product Start -->
                            <div class="single-product">
                                <!-- Product Image Start -->
                                <div class="pro-img">
                                    <a href="product.html">
                                        <img class="primary-img" src="img/products/6.jpg" alt="single-product">
                                        <img class="secondary-img" src="img/products/5.jpg" alt="single-product">
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
                                    <h4><a href="product.html">Products Name Here</a></h4>
                                    <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati velit,
                                        similique voluptas doloribus assumenda quis libero animi cumque dignissimos
                                        quisquam, quaerat ea laboriosam incidunt ullam.</p>
                                    <div class="pro-actions">
                                        <div class="actions-secondary">
                                            <a href="wishlist.html" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                            <a class="add-cart" href="cart.html" data-toggle="tooltip" title="Add to Cart">Add To Cart</a>
                                            <a href="compare.html" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                                <span class="sticker-new">-30%</span>
                            </div>
                            <!-- Single Product Start -->
                            <!-- Single Product Start -->
                            <div class="single-product">
                                <!-- Product Image Start -->
                                <div class="pro-img">
                                    <a href="product.html">
                                        <img class="primary-img" src="img/products/4.jpg" alt="single-product">
                                        <img class="secondary-img" src="img/products/3.jpg" alt="single-product">
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
                                    <h4><a href="product.html">Products Name Here</a></h4>
                                    <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati velit,
                                        similique voluptas doloribus assumenda quis libero animi cumque dignissimos
                                        quisquam, quaerat ea laboriosam incidunt ullam.</p>
                                    <div class="pro-actions">
                                        <div class="actions-secondary">
                                            <a href="wishlist.html" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                            <a class="add-cart" href="cart.html" data-toggle="tooltip" title="Add to Cart">Add To Cart</a>
                                            <a href="compare.html" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                            </div>
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
                        <label>show</label>
                        <select class="sorter" name="sorter">
                            <option value="Position" selected="selected">12</option>
                            <option value="Product Name">15</option>
                            <option value="Price">30</option>
                        </select>
                        <span>per page</span>
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