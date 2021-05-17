<!-- Cart Main Area Start -->
<div class="cart-main-area pb-80 pb-sm-50">
    <div class="container">
        <h2 class="text-capitalize sub-heading">cart</h2>
        <div class="row">
            <div class="col-md-12">
                <!-- Form Start -->
                <form action="#">
                    <!-- Table Content Start -->
                    <div class="table-content table-responsive mb-50">
                        <table id="table-carritos">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">Imagen</th>
                                    <th class="product-name">Producto</th>
                                    <th class="product-price">Precio</th>
                                    <th class="product-quantity">Cantidad</th>
                                    <th class="product-subtotal">Total</th>
                                    <th class="product-remove">Remover</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($this->session->userdata() as $producto) : ?>
                                    <?php if (is_object($producto)) : ?>
                                        <tr>
                                            <td><img class="primary-img" src="<?php echo base_url() . '/img/productos/' . $producto->id; ?>" alt="imagen"></td>
                                            <td><?php echo $producto['nombre']; ?></td>
                                            <td class="product-price"><?php echo $producto->precio_venta; ?></td>
                                            <td class="product-quantity"><input id="<?php echo $producto->id; ?>" type="number" name="cantidad" value="<?php echo $producto->cantidad; ?>" /></td>
                                            <td class="product-subtotal"><?php echo is_numeric($producto->cantidad * $producto->precio_venta); ?> ?></td>
                                            <td class="product-remove"><button id="<?php echo $producto->id; ?>"> <i class="fa fa-times btn-eliminar" aria-hidden="true"></i></button> </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- Table Content Start -->
                    <div class="row">
                        <!-- Cart Button Start -->
                        <div class="col-lg-8 col-md-7">
                            <div class="buttons-cart">
                                <input type="submit" value="Update Cart" />
                                <a href="#">Continue Shopping</a>
                            </div>
                        </div>
                        <!-- Cart Button Start -->
                        <!-- Cart Totals Start -->
                        <div class="col-lg-4 col-md-12">
                            <div class="cart_totals">
                                <h2>Cart Totals</h2>
                                <br />
                                <table>
                                    <tbody>
                                        <tr class="order-total">
                                            <th>Total</th>
                                            <td>
                                                <span id="total" name="total" class="amount">0</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="wc-proceed-to-checkout">
                                    <a href="#">Proceed to Checkout</a>
                                </div>
                            </div>
                        </div>
                        <!-- Cart Totals End -->
                    </div>
                    <!-- Row End -->
                </form>
                <!-- Form End -->
            </div>
        </div>
        <!-- Row End -->
    </div>
</div>
<!-- Cart Main Area End -->