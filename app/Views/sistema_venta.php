<?php
$user_session = session();
?>
<!doctype html>
<html class="no-js" lang="es-ES">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Punto de Ventas || Ferme</title>
    <meta name="description" content="Default Description">
    <meta name="keywords" content="E-commerce" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="img/icon/favicon.png">
    <!-- Google Font css -->
    <link href="https://fonts.googleapis.com/css?family=Lily+Script+One" rel="stylesheet">

    <!-- mobile menu css -->
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <!-- animate css -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- nivo slider css -->
    <link rel="stylesheet" href="css/nivo-slider.css">
    <!-- owl carousel css -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- slick css -->
    <link rel="stylesheet" href="css/slick.css">
    <!-- price slider css -->
    <link rel="stylesheet" href="css/jquery-ui.min.css">
    <!-- fontawesome css -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- fancybox css -->
    <link rel="stylesheet" href="css/jquery.fancybox.css">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- default css  -->
    <link rel="stylesheet" href="css/default.css">
    <!-- style css -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive css -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- fontawesome css -->
    <link rel="stylesheet" href="css/all.min.css">
    <!-- Toggle -->
    <link rel="stylesheet" href="css/toggle.min.css">
    <!-- DataTables -->

    <!-- modernizr js -->
    <script src="<?php echo base_url(); ?>/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <!-- Wrapper Start -->
    <div class="wrapper">
        <!-- Header Area Start -->
        <!-- Breadcrumb Start -->

        <div class="breadcrumb-area">
            <div class="container">
                <div class="title-pos breadcrumb">
                    <h2><i class="fas fa-cash-register"></i> Punto de Ventas</h2>
                </div>
                <div class="cart-box text-right">
                    <h3 class="d-flex justify-content-end">Vendedor:
                        <?php echo $user_session->nom_usuario; ?>
                        <i class="fa fa-user fa-fw"></i>
                    </h3>
                </div>
            </div>
            <!-- Container End -->
        </div>
        <!-- Breadcrumb End -->
        <!-- Error 404 Area Start -->
        <div class="error404-area pb-60 pt-20">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <div class="error-wrapper text-center">
                            <div class="search-error">
                                <form id="search-form" autocomplete="off">
                                    <input id="input-buscar" type="text" placeholder="Ingrese código de barras o nombre producto" onkeyup="buscador()">
                                    <button><i class="fa fa-search"></i></button>
                                </form>
                                <div id="productos-encontrados" class="position-absolute autocompletar fade">
                                    <div id="lista-productos-encontrados" class="card autocompletar-bg">
                                    </div>
                                </div>
                            </div>
                            <div>

                                <table id="listaProductos" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th style="width: 10%;">#</th>
                                            <th style="width: 50%;">Nombre</th>
                                            <th style="width: 10px;">Precio</th>
                                            <th style="width: 10px;">Cant</th>
                                            <th style="width: 10px;">Total</th>
                                            <th style="width: 10px;"><i class="fas fa-times"></i></th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="error-wrapper text-center">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="universal-margin">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="far fa-id-card"></i></div>
                                                </div>
                                                <input id="rutCliente" type="text" class="form-control pro-content" placeholder="Ingrese rut cliente" maxlength="12">
                                            </div>
                                        </div>
                                        <button id="addCli" class="btn btn-link btn-block text-center" type="button" data-toggle="collapse" data-target="#agregarCliente" aria-expanded="true" aria-controls="collapseOne">
                                            <i id="iconCli" class="fas fa-caret-right"></i>
                                            Nuevo Cliente
                                        </button>
                                        <div id="infoCliente" class="card d-none">
                                            <div class="card-body">
                                                <div class="row text-center">
                                                    <div class="col-sm-4">
                                                        <span id="textRutCliente"></span>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <span id="textNombreCliente"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="agregarCliente" class="collapse hide" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group form-check pull-right">
                                                        <input type="checkbox" class="form-check-input" id="asociarEmpresa" onclick="btnEmpresa()">
                                                        <label class="form-check-label label-checkbox" for="asociarEmpresa">Asociar empresa</label>
                                                    </div>

                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text"><i class="fas fa-user"></i>
                                                                </div>
                                                            </div>
                                                            <input id="rut_cli" type="text" class="form-control" placeholder="Rut Cliente">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <input id="dv_cli" type="number" class="form-control" placeholder="dv">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 pt-1">
                                                    <button id="btnBuscarCliente" class="blanco btn btn-warning pull-left">
                                                        <i class="fas fa-search"></i>
                                                    </button>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text"><i class="fas fa-address-card"></i>
                                                                </div>
                                                            </div>
                                                            <input id="nombres_cli" type="text" class="form-control" placeholder="Nombre(s)">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text"><i class="far fa-address-card"></i>
                                                                </div>
                                                            </div>
                                                            <input id="apellidos_cli" type="text" class="form-control" placeholder="Apellidos">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text"><i class="fas fa-phone"></i>
                                                                </div>
                                                            </div>
                                                            <input id="celular_cli" type="text" class="form-control" placeholder="Celular">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text"><i class="fas fa-mail-bulk"></i>
                                                                </div>
                                                            </div>
                                                            <input id="correo_cli" type="text" class="form-control" placeholder="Correo">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text"><i class="fas fa-map-marker-alt"></i>
                                                                </div>
                                                            </div>
                                                            <input id="c_direccion" type="text" class="form-control" placeholder="Dirección">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text"><i class="fas fa-hashtag"></i>
                                                                </div>
                                                            </div>
                                                            <input id="n_direccion" type="text" class="form-control" placeholder="Número">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text"><i class="fas fa-map-marked-alt"></i>
                                                                </div>
                                                            </div>
                                                            <input id="ciudad" type="text" class="form-control" placeholder="Ciudad">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-registered"></i>
                                                                </div>
                                                            </div>
                                                            <select class="country-select form-control" id="region" onclick="listarComunas()">
                                                                <option value="">Región</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-copyright"></i>
                                                                </div>
                                                            </div>
                                                            <select class=" country-select form-control" id="comuna">
                                                                <option value="">Comuna</option>
                                                                <option value="">Seleccione región</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="card-body label-campos emp">
                                                <h5>Datos Empresa</h5>
                                            </div>
                                            <div class="row emp">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text"><i class="fas fa-user"></i>
                                                                </div>
                                                            </div>
                                                            <input id="rut_emp" type="text" class="form-control" placeholder="Rut Empresa">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <input id="dv_emp" type="number" class="form-control" placeholder="dv">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text"><i class="fas fa-address-card"></i>
                                                                </div>
                                                            </div>
                                                            <input id="razon_emp" type="text" class="form-control" placeholder="Razón Social">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text"><i class="far fa-address-card"></i>
                                                                </div>
                                                            </div>
                                                            <input id="giro_emp" type="text" class="form-control" placeholder="Giro">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text"><i class="fas fa-phone"></i>
                                                                </div>
                                                            </div>
                                                            <input id="celular_emp" type="text" class="form-control" placeholder="Celular">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text"><i class="fas fa-map-marker-alt"></i>
                                                                </div>
                                                            </div>
                                                            <input id="c_direccion_emp" type="text" class="form-control" placeholder="Dirección">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text"><i class="fas fa-hashtag"></i>
                                                                </div>
                                                            </div>
                                                            <input id="n_direccion_emp" type="text" class="form-control" placeholder="Número">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text"><i class="fas fa-map-marked-alt"></i>
                                                                </div>
                                                            </div>
                                                            <input id="ciudad_emp" type="text" class="form-control" placeholder="Ciudad">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-copyright"></i>
                                                                </div>
                                                            </div>
                                                            <select class=" country-select form-control" id="comuna_emp">
                                                                <option value="">Comuna</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-registered"></i>
                                                                </div>
                                                            </div>
                                                            <select class="country-select form-control" id="region_emp" onclick="listarComunasEmpresa()">
                                                                <option value="">Región</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <p id="boolEmpresa" class="blanco-color">noEmpresa</p>
                                            </div>
                                            <div class="boton-compra cart-box">
                                                <a class="a-guardar" id="btnGuardar" href="#">Guardar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="boleta" name="tipo_comprobante" class="custom-control-input" checked>
                                                <label class="custom-control-label label-campos" for="boleta">Emitir
                                                    Boleta</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="factura" name="tipo_comprobante" class="custom-control-input require-red" disabled>
                                                <label class="custom-control-label label-campos" for="factura">Emitir
                                                    Factura</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="label-campos" for="f-name">Total a pagar</label>
                                            <div class="universal-margin">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><i class="fas fa-dollar-sign"></i>
                                                        </div>
                                                    </div>
                                                    <input id="totalPagar" type="number" class="form-control pro-content" value="0" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="label-campos" for="f-name">Forma de Pago</label>
                                            <div class="universal-margin">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-wallet"></i>
                                                        </div>
                                                    </div>
                                                    <select class=" country-select form-control pro-content" id="f_pago">
                                                        <option value="1">Efectivo</option>
                                                        <option value="2">Debito</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="label-campos" for="f-name">Monto Recibido</label>
                                            <div class="universal-margin">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><i class="fas fa-dollar-sign"></i>
                                                        </div>
                                                    </div>
                                                    <input id="inputTotal" type="text" class="form-control pro-content" placeholder="0" maxlength="8">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <button id="btnCancelar" class="boton-compra btn-cancelar">
                                            <div>
                                                <i class="fas fa-window-close"></i>
                                            </div>
                                            <span>Limpiar Campos</span>
                                        </button>
                                    </div>
                                    <div class="col-sm-6">
                                        <button id="btnCompra" class="boton-compra btn-aceptar">
                                            <div>
                                                <i class="fas fa-vote-yea"></i>
                                            </div>
                                            <span>Realizar Venta</span>
                                        </button>
                                    </div>

                                </div>

                            </div>
                            <div class="text-right">
                                <a href="<?php echo base_url() ?>/Usuarios/logout" class="newsletter-btn">Cerrar Sesión</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalVenta" hidden>
            TestModal
        </button>
        <button id="btnTest" type="button" class="btn btn-primary" hidden>
            Test
        </button>

        <!-- Modal -->
        <div class="modal fade" id="modalNotificacion" tabindex="-1" role="dialog" aria-labelledby="modalNotificacionLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalNotificacionLabel">Titulo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p id="mensaje">...</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="modalVenta" tabindex="-1" role="dialog" aria-labelledby="modalNotificacionLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalNotificacionLabel">Titulo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p id="mensaje">...</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Error 404 Area End -->
    </div>
    <!-- Wrapper End -->
    <!-- jquery 3.12.4 -->
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <!-- mobile menu js  -->
    <script src="js/jquery.meanmenu.min.js"></script>
    <!-- scroll-up js -->
    <script src="js/jquery.scrollUp.js"></script>
    <!-- owl-carousel js -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- slick js -->
    <script src="js/slick.min.js"></script>
    <!-- wow js -->
    <script src="js/wow.min.js"></script>
    <!-- price slider js -->
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <!-- nivo slider js -->
    <script src="js/jquery.nivo.slider.js"></script>
    <!-- fancybox js -->
    <script src="js/jquery.fancybox.min.js"></script>
    <!-- bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- popper -->
    <script src="js/popper.js"></script>
    <!-- plugins -->
    <script src="js/plugins.js"></script>
    <!-- main js -->
    <script src="js/main.js"></script>
    <!-- Toggle js -->
    <script src="js/toggle.min.js"></script>
    <!-- DataTables js -->
    <script src="js/datatables.min.js"></script>

    <script src="js/sistema-venta.js"></script>


</body>

</html>