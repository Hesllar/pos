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
                        <table>
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">Image</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="product-thumbnail">
                                        <a href="#"><img src="img/products/1.jpg" alt="cart-image" /></a>
                                    </td>
                                    <td class="product-name"><a href="#">Products Name Here</a></td>
                                    <td class="product-price">165.000</td>
                                    <td class="product-quantity"><input type="number" name="cantidad" value="1" /></td>
                                    <td class="product-subtotal">165.000</td>
                                    <td class="product-remove"> <button id="btn-delete"><i class="fa fa-times"></i></button> </td>
                                </tr>
                                <tr>
                                    <td class="product-thumbnail">
                                        <a href="#"><img src="img/products/2.jpg" alt="cart-image" /></a>
                                    </td>
                                    <td class="product-name"><a href="#">Products Name Here</a></td>
                                    <td class="product-price">500.000</td>
                                    <td class="product-quantity"><input type="number" name="cantidad" value="1" /></td>
                                    <td class="product-subtotal">500.000</td>
                                    <td class="product-remove"> <button id="btn-delete"> <i class="fa fa-times"></i></button></td>
                                </tr>
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
                                        <tr class="cart-subtotal">
                                            <th>Subtotal</th>
                                            <td><span class="amount">$215.00</span></td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>Total</th>
                                            <td>
                                                <strong><span class="amount">$215.00</span></strong>
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