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
     <!-- datatables css -->
     <link rel="stylesheet" href="<?php echo base_url(); ?>/DataTables/datatables.min.css">
     <link rel="stylesheet" href="<?php echo base_url(); ?>/DataTables/DataTables-1.10.25/css/dataTables.bootstrap4.min.css">
     <link rel="stylesheet" href="<?php echo base_url(); ?>/DataTables/Buttons-1.7.1/css/buttons.bootstrap4.min.css">
     <link rel="stylesheet" href="<?php echo base_url(); ?>/DataTables/Buttons-1.7.1/css/buttons.dataTables.min.css">


     <!-- jquery 3.12.4 

     <script src="<?php // echo base_url(); 
                    ?>/js/vendor/jquery-1.12.4.min.js"></script>-->
     <!-- modernizr js -->
     <script src="<?php echo base_url(); ?>/js/vendor/modernizr-2.8.3.min.js"></script>

     <!-- Estadistica-->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.3.1/chart.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.3.1/chart.esm.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.3.1/helpers.esm.min.js"></script>
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
                         <!-- Search Box End -->
                         <!-- Header Top Right Start -->
                         <div class="col-lg-4 col-md-12">
                             <div class="header-top-right">
                                 <?php
                                    if ($user_session->id_usuario != null) {
                                    ?>
                                     <?php
                                        if ($user_session->id_sucursal_fk == 1) {
                                        ?>
                                         <p>Sucursal:1</p>
                                         <p>Dirección: Av.Industrial 1250, Valparaiso</p>
                                     <?php } ?>
                                     <?php
                                        if ($user_session->id_sucursal_fk == 2) {
                                        ?>
                                         <p>Sucursal:2</p>
                                         <p>Dirección: Lomos plateado 321, Viña del mar</p>
                                     <?php } ?>
                                     <?php
                                        if ($user_session->id_sucursal_fk == 3) {
                                        ?>
                                     <?php } ?>
                                 <?php }
                                    ?>
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
                                     <ul class="middle-menu-list d-flex">
                                         <li><a href="<?php echo base_url(); ?>/home">inicio</a>
                                         </li>
                                         <li><a href="<?php echo base_url(); ?>/Productos">Productos</a>

                                         </li>
                                         <li><a href="<?php echo base_url(); ?>/acerca">nosotros</a></li>
                                         <li><a href="<?php echo base_url(); ?>/contacto">contacto</a></li>
                                         <?php

                                            if ($user_session->nvl_acceso_fk == 20) {
                                            ?>
                                             <li><a href="<?php echo base_url(); ?>/Proveedor">Administración</a></li>
                                         <?php } ?>
                                         <?php
                                            if ($user_session->nvl_acceso_fk == 10) {
                                            ?>
                                             <li><a href="<?php echo base_url(); ?>/productosAdmin">Administración</a></li>
                                         <?php } ?>
                                         <?php

                                            if ($user_session->nvl_acceso_fk == 40) {
                                            ?>
                                             <li><a href="<?php echo base_url(); ?>/Ventas/pagMisCompras">Mis compras</a></li>
                                         <?php } ?>
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
                                        if ($user_session->id_usuario != null) {
                                        ?>
                                         <li><a href="#"><?php echo $user_session->nom_usuario; ?>
                                                 <i class="fa fa-user fa-fw"></i>
                                             </a>
                                             <ul class="ht-dropdown">
                                                 <li><a href="<?php echo base_url() ?>" data-toggle="modal" data-target="#perfil" onclick="allFunctionc(<?php echo $user_session->id_usuario ?>)">perfil</a></li>
                                                 <li><a href="<?php echo base_url() ?>">cambiar clave</a></li>
                                                 <li><a href="<?php echo base_url() ?>/Usuarios/logout">Cerrar sesion</a></li>
                                                 <li><a href="<?php echo base_url() ?>/Estadistica/pagManual">Ayuda</a></li>
                                             </ul>
                                         </li>
                                     <?php
                                        } else {
                                        ?>
                                         <li><a href="#"><i class="fa fa-user fa-fw"></i></a>
                                             <ul class="ht-dropdown">
                                                 <li><a href="<?php echo base_url() ?>/acceder">Iniciar sesion</a></li>
                                                 <li><a href="<?php echo base_url() ?>/registro">Registrarme</a></li>
                                                 <li><a href="<?php echo base_url() ?>/Estadistica/pagManual">Ayuda</a></li>
                                             </ul>
                                         </li>
                                     <?php
                                        }
                                        ?>
                                     <li><a href="#"><i class="fa fa-shopping-basket"></i><span class="cart-counter">0</span></a>
                                         <ul class="ht-dropdown main-cart-box">

                                             <!-- <form class="form-horizontal" id="nuevaCompraPost" method="post" enctype="multipart/form-data" action="<?php // echo base_url() 
                                                                                                                                                            ?>/canasta/nuevaCompra">-->
                                             <li class="lista-carrito">
                                                 <!-- Aqui van los productos del carrito por JS -->
                                             </li>
                                             <li class="footer-carrito">
                                                 <div class="cart-footer fix">
                                                     <input id="tt" name="tt" value="50" hidden>
                                                     <h5>total: $<span class="f-right total">0</span></h5>
                                                     <div class="cart-actions">
                                                         <?php
                                                            if ($user_session->id_usuario != null) {
                                                            ?>
                                                             <button type="submit" id="realizar-compra" class="checkout" data-toggle="modal" data-target="#comprarProducto">Ver carrito</a>
                                                             <?php
                                                            } else {
                                                                ?>
                                                                 <button type="submit" id="realizar-compra" class="checkout" data-toggle="modal" data-target="#comprarProducto" hidden>Ver carrito</a>
                                                                 <?php
                                                                } ?>
                                                                 <!--<a href="#" id="realizar-compra" class="checkout">Comprar</a> -->
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
         <!-- Modal ingreso usuarios -->
         <div class="modal fade" id="perfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
             <div class="modal-dialog modal-lg" role="document">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalLabel">Datos del Usuario</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                     </div>

                     <div class="modal-body">
                         <div class="row">
                             <div class="col-sm-12">
                                 <fieldset>
                                     <div class=" form-row">
                                         <div class=" form-group col-md-6">
                                             <label for="rut">*Rut</label>
                                             <input type="number" class="form-control" id="per_rut" name="rut" disabled>

                                         </div>
                                         <div class="form-group col-md-6">
                                             <label for="dv">*Dv</label>
                                             <input type="text" class="form-control" id="per_dv" name="dv" disabled>

                                         </div>
                                     </div>
                                     <div class="form-row">
                                         <div class="form-group col-md-6" id="casilla_nombre">
                                             <label for="nombre">*Nombres</label>
                                             <input type="text" class="form-control" id="per_nombre" name="nombre" disabled>

                                         </div>
                                         <div class="form-group col-md-6" id="cailla_apellido">
                                             <label for="apellidos">*Apellidos</label>
                                             <input type="text" class="form-control" id="per_apellidos" name="apellidos" disabled>

                                         </div>
                                     </div>
                                     <div class="form-row">
                                         <div class="form-group col-md-6" id="casilla_email">
                                             <label for="email">*Email</label>
                                             <input type="email" class="form-control" id="per_email" name="email" disabled>

                                         </div>
                                         <div class="form-group col-md-6" id="casilla_celular">
                                             <label for="celular">*Celular</label>
                                             <input type="number" class="form-control" id="per_celular" name="celular" disabled>

                                         </div>
                                     </div>
                                     <div class="form-group">
                                         <p> ¿Es empresa?</p>
                                         <div class="form-check">
                                         </div>

                                     </div>
                                     <h4 id="per_titulo">Datos empresa</h4>
                                     <br>
                                     <div class="form-row">
                                         <div class="form-group col-md-6">
                                             <input type="number" class="form-control" id="per_rut_emp" name="rut_emp" disabled>
                                         </div>
                                         <div class="form-group col-md-6">
                                             <input type="text" class="form-control" id="per_emp_dv" disabled>
                                         </div>
                                         <div class="form-group col-md-6">
                                             <input type="text" class="form-control" id="per_razon" name="razon" disabled>
                                         </div>
                                         <div class="form-group col-md-6">
                                             <input type="text" class="form-control" id="per_giro" name="giro" disabled>
                                         </div>
                                         <div class="form-group col-md-6">
                                             <input type="text" class="form-control" id="per_telefono" name="telefono" disabled>
                                         </div>
                                     </div>
                                     <h5>Datos Ubicación</h5>
                                     <br>
                                     <div class="form-row">
                                         <div class="form-group col-md-6">
                                             <label for="region">Region</label>
                                             <select name="per_region" id="per_region" disabled>
                                             </select>
                                         </div>
                                     </div>
                                     <div class="form-row">
                                         <div class="form-group col-md-6">
                                             <label for="region">Comuna</label>
                                             <select name="per_comuna" id="per_comuna" disabled>
                                             </select>
                                         </div>
                                     </div>
                                     <div class="form-row">
                                         <div class="form-group col-md-12" id="casilla_ciudad">
                                             <label for="ciudad">*Ciudad</label>
                                             <input type="text" class="form-control" id="per_ciudad" name="ciudad" disabled>

                                         </div>
                                     </div>
                                     <div class="form-row">
                                         <div class="form-group col-md-6" id="casilla_calle">
                                             <label for="calle">*Calle</label>
                                             <input type="text" class="form-control" id="per_calle" name="calle" disabled>

                                         </div>
                                         <div class="form-group col-md-6" id="cailla_numero">
                                             <label for="numero">*Numero</label>
                                             <input type="number" class="form-control" id="per_numero" name="numero" disabled>

                                         </div>
                                     </div>
                                     <h5>Datos Usuarios</h5>
                                     <br>
                                     <div class="form-row">
                                         <div class="form-group col-md-12" id="casilla_nombr_usuario">
                                             <label for="nombre_usuario">*Nombre usuario</label>
                                             <input type="text" class="form-control" id="per_nombre_usuario" name="nombre_usuario" disabled>

                                         </div>
                                     </div>
                                     <h5>Nivel de Acceso</h5>
                                     <br>
                                     <div class="form-row">
                                         <div class="form-group col-md-6">
                                             <select name="per_nvl" id="per_nvl" disabled>
                                             </select>
                                         </div>
                                     </div>
                                 </fieldset>
                             </div>
                         </div>
                     </div>
                     <div class="modal-footer">

                         <button type="submit" class="newsletter-btn" data-dismiss="modal">Aceptar</button>
                     </div>
                 </div>
             </div>

         </div>
         <script>
             function allFunctionc(id_user) {
                 datosUsuario(id_user);
                 datosUsuarioEmp(id_user);
             }

             function datosUsuario(id_user) {
                 console.log(id_user);
                 $.ajax({
                     url: "<?php echo base_url() ?>/Acceder/perfil/" + id_user,
                     dataType: 'json',
                     success: function(resp) {
                         console.log(resp);
                         $("#per_rut").val(resp.datos.rut);
                         $("#per_dv").val(resp.datos.dv);
                         $("#per_nombre").val(resp.datos.nombres);
                         $("#per_apellidos").val(resp.datos.apellidos);
                         $("#per_celular").val(resp.datos.celular);
                         $("#per_email").val(resp.datos.correo);
                         $('.form-check').html('')
                         if (resp.datos.natural_juridico == 1) {
                             $('.form-check').append('<input class="form-check-input" type="radio" checked > SI\
                        <br>\
                        <input class="form-check-input" type="radio"disabled > No')
                         } else {
                             $('.form-check').append('<input class="form-check-input" type="radio"disabled> SI\
                        <br>\
                        <input class="form-check-input" type="radio" checked > No')
                         }
                         $('#per_region').append('<option>' + resp.datos.region + '</option>');
                         $('#per_comuna').append('<option>' + resp.datos.comuna + '</option>');
                         $("#per_ciudad").val(resp.datos.ciudad);
                         $("#per_calle").val(resp.datos.calle);
                         $("#per_numero").val(resp.datos.numero);
                         $("#per_nombre_usuario").val(resp.datos.nom_usuario);
                         $("#per_nvl").append('<option>' + resp.datos.nivel_acceso + '</option>');

                     }
                 });
             }

             function datosUsuarioEmp(id_user) {
                 $.ajax({
                     url: "<?php echo base_url() ?>/Acceder/datosEmp/" + id_user,
                     dataType: 'json',
                     success: function(resp) {
                         if (resp.datos == null) {
                             document.getElementById("per_rut_emp").style.display = "none",
                                 document.getElementById("per_razon").style.display = "none",
                                 document.getElementById("per_giro").style.display = "none",
                                 document.getElementById("per_emp_dv").style.display = "none",
                                 document.getElementById("per_titulo").style.display = "none",
                                 document.getElementById("per_telefono").style.display = "none"

                         } else {
                             $("#per_rut_emp").val(resp.datos.rut_emp)
                             $("#per_razon").val(resp.datos.razon)
                             $("#per_giro").val(resp.datos.giro)
                             $("#per_emp_dv").val(resp.datos.dv_emp)
                             $("#per_telefono").val(resp.datos.fono)
                         }
                     }
                 });
             }
         </script>