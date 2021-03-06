     <?php
        isset($arrayCompra) ? $arrayProductos = $arrayCompra :  $arrayProductos = null;
        $user_session = session();
        ?>
     <!-- coupon-area start -->

     <div class="coupon-area">
         <div class="container">
             <!-- Section Title Start -->
             <div class="section-title mb-20">
                 <h2>Carrito de Compras
                     <?php

                        ?>
                 </h2>
             </div>
         </div>
     </div>
     </div>
     </div>
     <!-- coupon-area end -->
     <!-- checkout-area start -->
     <div class="checkout-area pt-30  pb-60">
         <div class="container">
             <input type="hidden" id="idUs" name="IdUs" value="<?php echo $user_session->id_usuario ?>">
             <input type="hidden" id="rut_hidden" name="rut_hidden" value="<?php echo $user_session->rut_fk ?>">
             <div class="row">
                 <div class="col-lg-6 col-md-6">
                     <div class="checkbox-form">
                         <div class="btn-group btn-group-toggle" data-toggle="buttons" onclick="retiro(event)">
                             <label class="btn btn-secondary active">
                                 <input type="radio" name="opciones" id="despacho" checked> Despacho a domicilio
                             </label>
                             <label class="btn btn-secondary">
                                 <input type="radio" name="opciones" id="tienda"> Retiro en tienda
                             </label>
                         </div>
                     </div>
                     <div id="despachoDom" class="row">

                         <div class="checkbox-form pt-10">
                             <div class="categorie recent-post same-sidebar pt-30">
                                 <h3 class="sidebar-title">Despacho a domicilio</h3>
                             </div>
                             <div class="row">
                                 <div class="col-md-6">
                                     <div class="checkout-form-list">
                                         <label>Nombre quien recibe <span class="required">*</span></label>
                                         <input id="nombre_recibe" type="text" placeholder="" required />
                                     </div>
                                 </div>
                                 <div class="col-md-5">
                                     <div class="checkout-form-list mb-30">
                                         <label>Tel??fono <span class="required">*</span></label>
                                         <input id="tel_contacto col-md-5" type="text" placeholder="87654321" required />
                                     </div>
                                 </div>
                                 <div class="col-md-11">
                                     <div class="checkout-form-list">
                                         <span id="rNoDisponible" class="require">*Actualmente solo existen
                                             despachos dentro de la regi&oacute;n de Valpara&iacute;so</span>
                                     </div>
                                 </div>
                                 <div class="col-md-11">
                                     <div class="country-select mb-30">
                                         <label>Regi??n<span class="required">*</span></label>
                                         <select id="region" onclick="validadorRegion(event)" required>
                                             <option value="">Seleccione regi??n</option>
                                         </select>
                                     </div>
                                 </div>
                                 <div class="col-md-11">
                                     <div class="country-select mb-30">
                                         <label>Comuna<span class="required">*</span></label>
                                         <select id="comuna" onclick="costoComuna(event)" required>
                                             <option value="">Seleccione comuna</option>
                                         </select>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="row pt-30">
                         <div class="categorie recent-post same-sidebar col-sm-12">
                             <h3 class="sidebar-title">
                                 Datos del comprador
                             </h3>
                             <div class="row pb-30">
                                 <div class="col-sm-12">
                                     <div class="form-check header-top-left">
                                         <div class="col-4">
                                             <label id="labelEsEmp" for="">Comprar con factura </label>
                                         </div>
                                         <div class="col-4">
                                             <input class="form-check-input position-static" type="checkbox" id="esEmpresa" value="0" aria-label="empresa" onclick="datosEmpresa()">
                                         </div>

                                     </div>
                                 </div>
                             </div>
                             <ul id="datosEmpresa" class="categorie-list emp">
                                 <li>
                                     <div class="row">
                                         <div class="col-sm-4">
                                             RUT:
                                         </div>
                                         <div class="col-sm-8">
                                             <span id="rut-emp"></span> - <span id="dv-emp"></span>
                                         </div>
                                     </div>
                                 </li>
                                 <li>
                                     <div class="row">
                                         <div class="col-sm-4">
                                             Raz??n Social:
                                         </div>
                                         <div class="col-sm-8">
                                             <span id="razon"></span>
                                         </div>
                                     </div>
                                 </li>
                                 <li>
                                     <div class="row">
                                         <div class="col-sm-4">
                                             Giro: <span class="policy-desc">
                                         </div>
                                         <div class="col-sm-8">
                                             <span id="giro"></span>
                                         </div>
                                     </div>
                                 </li>
                                 <li>
                                     <div class="row">
                                         <div class="col-sm-4">
                                             Direcci&oacute;n Empresa:
                                         </div>
                                         <div class="col-sm-8">
                                             <span id="direccion-emp"></span> #<span id="numero-direccion-emp"></span>
                                         </div>
                                     </div>
                                 </li>
                                 <li>
                                     <div class="row">
                                         <div class="col-sm-4">
                                             Ciudad:
                                         </div>
                                         <div class="col-sm-8">
                                             <span id="ciudad-emp"></span>
                                         </div>
                                     </div>
                                 </li>
                                 <li></li>
                                 <li></li>
                             </ul>
                             <ul class="categorie-list">
                                 <li>
                                     <div class="row">
                                         <div class="col-sm-4">
                                             RUT:
                                         </div>
                                         <div class="col-sm-8">
                                             <span id="rut-cli"></span>-<span id="dv"></span>
                                         </div>
                                     </div>
                                 </li>
                                 <li>
                                     <div class="row">
                                         <div class="col-sm-4">
                                             Nombre:
                                         </div>
                                         <div class="col-sm-8">
                                             <input id="id_cliente" type="hidden">
                                             <span id="nombre"></span> <span id="apellidos"></span>
                                         </div>
                                     </div>
                                 </li>
                                 <li>
                                     <div class="row">
                                         <div class="col-sm-4">
                                             Celular: <span class="policy-desc">
                                         </div>
                                         <div class="col-sm-8">
                                             +56 (9) <span id="celular"></span>
                                         </div>
                                     </div>
                                 </li>
                                 <li>
                                     <div class="row">
                                         <div class="col-sm-4">
                                             Correo:
                                         </div>
                                         <div class="col-sm-8">
                                             <span id="correo"></span>
                                         </div>
                                     </div>
                                 </li>
                                 <li>
                                     <div class="row">
                                         <div class="col-sm-4">
                                             Direcci&oacute;n:
                                         </div>
                                         <div class="col-sm-8">
                                             <span id="calle_direccion"></span> #<span id="numero_direccion"></span>
                                         </div>
                                     </div>
                                 </li>
                                 <li>
                                     <div class="row">
                                         <div class="col-sm-4">
                                             Ciudad:
                                         </div>
                                         <div class="col-sm-8">
                                             <span id="ciudad"></span>
                                         </div>
                                     </div>
                                 </li>
                             </ul>
                         </div>


                     </div>

                 </div>
                 <div class="col-lg-6 col-md-6">
                     <div class="your-order">
                         <h3>Tu pedido</h3>
                         <div class="your-order-table table-responsive">
                             <table>
                                 <thead>
                                     <tr>
                                         <th class="product-name">Producto</th>
                                         <th class="product-total">Total</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php if (isset($arrayCompra)) {
                                            foreach ($arrayCompra as $producto) {
                                        ?>
                                             <tr class="cart_item">
                                                 <td class="data-product">
                                                     <input id="<?php echo $producto[0]; ?>" class="id_producto" type="hidden">
                                                     <strong class="product-name">
                                                         <?php echo $producto[1]; ?>
                                                     </strong>
                                                     <strong class="product-quantity"> ??
                                                         <span class="qty"><?php echo $producto[2]; ?></span>
                                                     </strong>
                                                 </td>
                                                 <td class="product-total">
                                                     <span class="amount"><?php echo $producto[3]; ?></span>
                                                 </td>
                                             </tr>
                                     <?php
                                            }
                                        }
                                        ?>
                                 </tbody>
                                 <tfoot>
                                     <tr class="cart-subtotal">
                                         <th>Subtotal</th>
                                         <td><span class="amount"><?php echo $totalCompra; ?></span></td>
                                     </tr>
                                     <tr id="cart-despacho" class="cart-subtotal">
                                         <th>Costo despacho</th>
                                         <td><span id="costoDespacho" class="amount">0</span></td>
                                     </tr>
                                     <tr class="order-total">
                                         <th>
                                             Total a pagar
                                             <input id="compraEstatica" type="hidden" value="<?php echo $totalCompra; ?>" />
                                         </th>
                                         <td><strong><span id="totalCompra" class="amount"><?php echo $totalCompra; ?></span></strong>
                                         </td>
                                     </tr>
                                 </tfoot>
                             </table>
                         </div>
                         <div class="order-button-payment">
                             <input id="realizarCompra" type="submit" value="Realizar Compra" onclick="realizarCompraWeb()" />
                         </div>
                         <div class="form-row">
                             <div class="form-group col-md-6">
                                 <label for="comuna">*Tipo de monedas</label>
                                 <select name="valor_moneda" id="valor_moneda" onclick="aplicarMoneda()" required>
                                     <option value="">CLP</option>
                                 </select>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <div class="pull-right ">
         <button type="button" id="btnIniciarSesion" style="display: none;" data-toggle="modal" data-target="#iniciarSesion">
             ++
         </button>
     </div>
     <!-- Modal iniciar sesi??n -->
     <div class="modal fade" id="iniciarSesion" tabindex="-1" role="dialog" aria-labelledby="iniciarSesion" aria-hidden="true">
         <div class="modal-dialog modal-sm" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Iniciar Sesi??n</h5>
                     <a href="<?php echo base_url(); ?>/Productos"><button type="button" class="close">
                             <span aria-hidden="true">&times;</span>
                         </button></a>
                 </div>
                 <div class="row d-flex justify-content-around">
                     <div class="col-7">
                         <div class="modal-footer">
                             <a href="<?php echo base_url(); ?>/Acceder"><button type="button" class="newsletter-btn">Acceder</button></a>
                         </div>
                     </div>
                     <div class="col-7">
                         <div class="modal-footer d-flex justify-content-center">
                             <a href="<?php echo base_url(); ?>/Registro"><button type="button" class="newsletter-btn">Registrarse</button></a>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>

     <!-- Canasta-->
     <script src="<?php echo base_url() ?>/js/canasta.js"></script>

     <?php
        if ($user_session->id_usuario) {
            echo '<script>user_session_js.push(' . $user_session->id_usuario . ');</script>';
            echo '<script>user_session_js.push(' . $user_session->rut_fk . ');</script>';
        }
        ?>
     <script>
         sesionUsuario();
     </script>