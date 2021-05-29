     <?php
        isset($arrayCompra) ? $arrayProductos = $arrayCompra :  $arrayProductos = null;
        $user_session = session();
        
        ?>
     <!-- Breadcrumb Start -->
     <div class="breadcrumb-area pt-60 pb-55 pt-sm-30 pb-sm-20">
         <div class="container">
             <div class="breadcrumb">
                 <ul>
                     <li><a href="index.html">Inicio</a></li>
                     <li class="active"><a href="checkout.html">Confirmar Compra</a></li>
                 </ul>
             </div>
         </div>
         <!-- Container End -->
     </div>
     <!-- Breadcrumb End -->
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
             <form action="#">
                 <div class="row">
                     <div class="col-lg-6 col-md-6">
                         <div class="row">
                             <div class="col-sm-12">
                                 <div class="categorie recent-post same-sidebar">
                                     <h3 class="sidebar-title">Datos del comprador</h3>
                                     <ul class="categorie-list">
                                         <li>
                                             <div class="row">
                                                 <div class="col-sm-2">
                                                     Nombre:
                                                 </div>
                                                 <div class="col-sm-5">
                                                     <span id="nombre">Bastian </span> <span id="apellidos">Barraza Díaz</span>
                                                 </div>
                                             </div>
                                         </li>
                                         <li>
                                             <div class="row">
                                                 <div class="col-sm-2">
                                                     Celular: <span class="policy-desc">
                                                 </div>
                                                 <div class="col-sm-5">
                                                     +56 (9) <span id="celular">81783155</span>
                                                 </div>
                                             </div>
                                         </li>
                                         <li>
                                             <div class="row">
                                                 <div class="col-sm-2">
                                                     Correo:
                                                 </div>
                                                 <div class="col-sm-5">
                                                    <span id="correo"> bastian_b_d@hotmail.com </span>
                                                 </div>
                                             </div>
                                         </li>
                                         <li>
                                             <div class="row">
                                                 <div class="col-sm-2">
                                                     Direcci&oacute;n:
                                                 </div>
                                                 <div class="col-sm-5">
                                                    <span id="calle_direccion">Lago Villarrica </span> <span id="numero_direccion">#1256</span>
                                                 </div>
                                             </div>
                                         </li>
                                         <li>
                                             <div class="row">
                                                 <div class="col-sm-2">
                                                     Ciudad:
                                                 </div>
                                                 <div class="col-sm-8">
                                                    <span id="ciudad"> San Antonio</span>
                                                 </div>
                                             </div>
                                         </li>
                                     </ul>
                                 </div>

                                 <div class="btn-group btn-group-toggle pt-30" data-toggle="buttons" onclick="retiro(event)">
                                     <label class="btn btn-secondary active">
                                         <input type="radio" name="opciones" id="despacho"> Despacho a domicilio
                                     </label>
                                     <label class="btn btn-secondary">
                                         <input type="radio" name="opciones" id="tienda"> Retiro en tienda
                                     </label>
                                 </div>
                             </div>
                         </div>
                         <div id="despachoDom" class="row">
                             <div class="checkbox-form pt-30">
                                 <div class="categorie recent-post same-sidebar pt-30">
                                     <h3 class="sidebar-title">Despacho a domicilio</h3>
                                 </div>
                                 <div class="row">
                                     <div class="col-md-6">
                                         <div class="checkout-form-list">
                                             <label>Nombre quien recibe <span class="required">*</span></label>
                                             <input type="text" placeholder="" />
                                         </div>
                                     </div>
                                     <div class="col-md-5">
                                         <div class="checkout-form-list mb-30">
                                             <label>Teléfono <span class="required">*</span></label>
                                             <input type="text" placeholder="" />
                                         </div>
                                     </div>
                                     <div class="col-md-11">
                                         <div class="country-select mb-30">
                                             <label>Región<span class="required">*</span></label>
                                             <select id="region" onclick="validadorRegion(event)" required>
                                                 <option value="">Seleccione región</option>
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
                                     <div class="col-md-12">
                                         <span id="rNoDisponible" class="require">*Actualmente solo existen despachos dentro de la regi&oacute;n de Valpara&iacute;so</span>
                                     </div>
                                 </div>
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
                                                     <td class="product-name">
                                                         <?php echo $producto[1]; ?><strong class="product-quantity"> × <?php echo $producto[2]; ?></strong>
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
                                                 <input id="compraEstatica" value="<?php echo $totalCompra; ?>" hidden />
                                             </th>
                                             <td><strong><span id="totalCompra" class="amount"><?php echo $totalCompra; ?></span></strong>

                                             </td>
                                         </tr>
                                     </tfoot>
                                 </table>
                             </div>
                             <div class="order-button-payment">
                                 <input id="realizarCompra" type="submit" value="Realizar Compra" />
                             </div>

                         </div>
                     </div>
                 </div>
             </form>
         </div>
     </div>

     <div class="pull-right ">
         <button type="button" id="btnIniciarSesion" style="display: none;" data-toggle="modal" data-target="#iniciarSesion">
             ++
         </button>
     </div>
     <!-- Modal iniciar sesión -->
     <div class="modal fade" id="iniciarSesion" tabindex="-1" role="dialog" aria-labelledby="iniciarSesion" aria-hidden="true">
         <div class="modal-dialog modal-sm" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Iniciar Sesión</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <div class="row">
                         <div class="col-sm-12">
                             <p class="pro-img">Inicie sesión para continuar la compra, si no está registrado
                                 <a href="#">¡Registrese Aqu&iacute;!</a>
                             </p>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-sm-12">
                             <fieldset>
                                 <div class="form-group">
                                     <label class="control-label" for="nombre_usuario">Nombre de usuario</label>
                                     <div class="col-sm-10 pro-img">
                                         <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" placeholder="Nombre de usuario" required>
                                     </div>
                                     <label class="control-label" for="nombre_usuario">Contrase&ntilde;a</label>
                                     <div class="col-sm-10">
                                         <input type="text" class="form-control" id="clave" name="clave" placeholder="Contraseña" required>
                                     </div>
                                 </div>
                             </fieldset>
                         </div>
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="submit" class="newsletter-btn">Acceder</button>
                 </div>
             </div>
         </div>
     </div>

    


     <!-- Canasta-->
     <script src="<?php echo base_url() ?>/js/canasta.js"></script>

     <?php
if($user_session->id_usuario){
    echo '<script>user_session_js.push('.$user_session->id_usuario.');</script>';
    echo '<script>user_session_js.push('.$user_session->rut_fk.');</script>';

}
?>
<script>sesionUsuario();</script>

