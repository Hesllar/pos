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
    <!-- fontawesome css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/all.min.css">
    <!-- Toggle -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/toggle.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/datatables.min.css">
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
                                        <p class="autocompletar-items">Lista busqueda productos</p>
                                        <p class="autocompletar-items">277722293571 - Spray pro imprimante
                                            fondo blanco</p>
                                        <p class="autocompletar-items">277722293571 - Spray pro imprimante
                                            fondo blanco fondo blanco fondo blanco</p>

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
                                        <!--
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control pro-content" id="f-name"
                                                placeholder="Ingrese rut cliente">
                                        </div>
                                        -->
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
                                                        <input type="checkbox" class="form-check-input" id="asociarEmpresa" onclick="btnEmpresa()" on="btnEmpresa()">
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
                                                            <input id="rut-cli" type="text" class="form-control" placeholder="Rut Cliente">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <input type="number" class="form-control" placeholder="dv">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 pt-1">
                                                    <button id="buscar-rut" class="blanco btn btn-warning pull-left">
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
                                                            <input type="text" class="form-control" placeholder="Nombre(s)">
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
                                                            <input type="text" class="form-control" placeholder="Apellidos">
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
                                                            <input type="text" class="form-control" placeholder="Celular">
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
                                                            <input type="text" class="form-control" placeholder="Correo electrónico">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text"><i class="fas fa-map-marker-alt"></i>
                                                                </div>
                                                            </div>
                                                            <input type="text" class="form-control" placeholder="Dirección">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text"><i class="fas fa-map-marked-alt"></i>
                                                                </div>
                                                            </div>
                                                            <input type="text" class="form-control" placeholder="Ciudad">
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
                                                            <select class=" country-select form-control" id="region" onclick="listarComunas()">
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
                                                            <input type="text" class="form-control" placeholder="Rut Empresa">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <input type="number" class="form-control" placeholder="dv">
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
                                                            <input type="text" class="form-control" placeholder="Razón Social">
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
                                                            <input type="text" class="form-control" placeholder="Giro">
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
                                                            <input type="text" class="form-control" placeholder="Celular">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text"><i class="fas fa-map-marker-alt"></i>
                                                                </div>
                                                            </div>
                                                            <input type="text" class="form-control" placeholder="Dirección">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text"><i class="fas fa-map-marked-alt"></i>
                                                                </div>
                                                            </div>
                                                            <input type="text" class="form-control" placeholder="Ciudad">
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
                                                            <select class=" country-select form-control" id="region">
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
                                                            <select class=" country-select form-control" id="region">
                                                                <option value="">Región</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="boton-compra">
                                                <a href="#">Guardar</a>
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
                                                    <select class=" country-select form-control pro-content" id="region">
                                                        <option value="">Efectivo</option>
                                                        <option value="">Debito</option>
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
                                        <button class="boton-compra btn-cancelar">
                                            <div>
                                                <i class="fas fa-window-close"></i>
                                            </div>
                                            <span>Cancelar Venta</span>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Error 404 Area End -->
    </div>
    <!-- Wrapper End -->
    <!-- jquery 3.12.4 -->
    <script src="<?php echo base_url(); ?>/js/vendor/jquery-3.6.0.min.js"></script>
    <!-- mobile menu js  -->
    <script src="<?php echo base_url(); ?>/js/jquery.meanmenu.min.js"></script>
    <!-- scroll-up js -->
    <script src="<?php echo base_url(); ?>/js/jquery.scrollUp.js"></script>
    <!-- owl-carousel js -->
    <script src="<?php echo base_url(); ?>/js/owl.carousel.min.js"></script>
    <!-- slick js -->
    <script src="<?php echo base_url(); ?>/js/slick.min.js"></script>
    <!-- wow js -->
    <script src="<?php echo base_url(); ?>/js/wow.min.js"></script>
    <!-- price slider js -->
    <script src="<?php echo base_url(); ?>/js/jquery-ui.min.js"></script>
    <script src="<?php echo base_url(); ?>/js/jquery.countdown.min.js"></script>
    <!-- nivo slider js -->
    <script src="<?php echo base_url(); ?>/js/jquery.nivo.slider.js"></script>
    <!-- fancybox js -->
    <script src="<?php echo base_url(); ?>/js/jquery.fancybox.min.js"></script>
    <!-- bootstrap -->
    <script src="<?php echo base_url(); ?>/js/bootstrap.min.js"></script>
    <!-- popper -->
    <script src="<?php echo base_url(); ?>/js/popper.js"></script>
    <!-- plugins -->
    <script src="<?php echo base_url(); ?>/js/plugins.js"></script>
    <!-- main js -->
    <script src="<?php echo base_url(); ?>/js/main.js"></script>
    <!-- Toggle js -->
    <script src="<?php echo base_url(); ?>/js/toggle.min.js"></script>
    <!-- DataTables js -->
    <script src="<?php echo base_url(); ?>/js/datatables.min.js"></script>

    <script>
        $("#inputTotal").on({
            "focus": function(event) {
                $(event.target).select();
            },
            "keyup": function(event) {
                $(event.target).val(function(index, value) {
                    return value.replace(/\D/g, "")
                        .replace(/([0-9])([0-9]{3})$/, '$1.$2')
                        .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ".");
                });
            }
        });
        $("#rutCliente").on({
            "focus": function(event) {
                $(event.target).select();
            },
            "keyup": function(event) {
                $(event.target).val(function(index, value) {
                    return value.replace(/\D/g, "")
                        .replace(/^(\d{1,2})(\d{3})(\d{3})(\w{1})$/, '$1.$2.$3-$4');
                });
            }
        });

        datosTablaObj = new Object();
        var datosTabla = new Array();
        var rutStatic = "";
        var productosObject = {};
        listarRegiones();
        btnEmpresa();

        var tbl = $('#listaProductos').DataTable({
            "searching": false,
            "paging": false,
            "info": false,
            "language": {
                "emptyTable": "Ingrese código de barras o nombre del producto en el cuadro buscador"
            },
            "aaData": datosTabla
        });


        $.ajax({
            url: "http://localhost/pos/public/Productos/listarBuscador",
            method: "POST",
            dataType: "JSON",
            success: function(data) {
                productosObject = data;
            },
        });


        //buscador(null);

        function buscador(productos) {
            iBuscar = $("#input-buscar");

            if (iBuscar.val() != '') {
                $("#productos-encontrados").removeClass('fade');
                $("#lista-productos-encontrados").empty();
                if (event.keyCode == 8) {
                    $("#lista-productos-encontrados").empty();
                }
                var conta = 0;
                productosObject.forEach((product, i) => {
                    var nomUpper = product.nombre.toUpperCase();
                    if (nomUpper.includes(iBuscar.val().toUpperCase()) ||
                        product.id_producto.includes(iBuscar.val())) {
                        if (i < 10) {
                            $("#lista-productos-encontrados").append($("<p class='autocompletar-items' id='" + product.id_producto + "' name='" + product.nombre + "'>" + product.id_producto + " - " + product.nombre + "</p>"));
                            conta++;
                        }
                    }
                });
            } else {
                $("#productos-encontrados").addClass('fade');
                $("#lista-productos-encontrados").empty();
            }

        }

        $('#lista-productos-encontrados').on('click', 'p', function() {
            var idProd = $(this).attr('id');
            $("#input-buscar").val('');
            $("#productos-encontrados").addClass('fade');
            $("#lista-productos-encontrados").empty();
            $('#listaProductos').DataTable().clear().draw();
            var agregar = 'si';
            productosObject.forEach((product) => {
                if (product.id_producto == idProd) {
                    if (datosTabla.length != 0) {
                        for (let i = 0; i < datosTabla.length; i++) {
                            if (datosTabla[i][0] === idProd) {
                                datosTabla[i][3] += 1;
                                datosTabla[i][4] = datosTabla[i][4] * datosTabla[i][3];
                                agregar = 'no';
                            }
                        }
                    }
                    if (agregar == 'si') {
                        var iconEliminar = "<a href='#'><i id='" + product.id_producto + "' class='delete-prod fas fa-minus-circle'></i></a>";
                        var arrProducto = [product.id_producto,
                            product.nombre,
                            product.precio_venta,
                            1,
                            product.precio_venta,
                            iconEliminar
                        ];
                        datosTabla.push(arrProducto);
                    }
                }
            });
            $('#listaProductos').DataTable().rows.add(datosTabla).draw();
            calcularTotal();
        });

        $('#listaProductos').on('click', 'i', function() {
            borrarProductoArray(datosTabla, $(this).attr('id'));
            $('#listaProductos').DataTable().clear().draw();
            $('#listaProductos').DataTable().rows.add(datosTabla).draw();
            calcularTotal();
        });

        function borrarProductoArray(arr, item) {
            for (let i = 0; i < arr.length; i++) {
                if (arr[i][0] === item) {
                    datosTabla.splice(i, 1);
                }
            }
            datosTabla = arr;
        }

        function calcularTotal() {
            var valorTotal = 0;
            for (let i = 0; i < datosTabla.length; i++) {
                totalProducto = parseInt(datosTabla[i][4], 10);
                valorTotal += totalProducto;
            }
            $('#totalPagar').val(valorTotal);
        }

        $("#rutCliente").keypress(function(e) {
            if (e.which == 13) {
                var rutString = $("#rutCliente").val();
                var dv = rutString[rutString.length - 1];
                var r = rutString.replace("-", "");
                var ru = r.replace(/\./g, '');
                var rut = ru.substring(0, ru.length - 1);
                rutStatic = rut;
                $.ajax({
                    url: "http://localhost/pos/public/DatosPersonales/buscarPorRutDv/" + rut + "/" + dv,
                    method: "POST",
                    dataType: "JSON",
                    success: function(data) {
                        $("#textRutCliente").text(rut + "-" + dv);
                        $("#textNombreCliente").text(data.nombres + " " + data.apellidos);
                        $("#infoCliente").removeClass('d-none');
                    },
                });


            }
        });

        $('#addCli').on('click', function() {
            switch ($("#iconCli").attr('class')) {
                case "fas fa-caret-right":
                    $("#iconCli").removeClass('fa-caret-right');
                    $("#iconCli").addClass('fa-caret-down');
                    break;
                case "fas fa-caret-down":
                    $("#iconCli").removeClass('fa-caret-down');
                    $("#iconCli").addClass('fa-caret-right');
                    break;
            }
        });

        $('#btnCompra').on('click', function() {
            var boleta_factura = '';
            $('#boleta').prop('checked') ? boleta_factura = 'Factura' : boleta_factura = 'Boleta';
            
            var fecha = new Date().toISOString().slice(0, 19).replace('T', ' ');
            var total_venta = $("#totalPagar").val();
            var despacho = 0;
            var rutCliente = $("#rutCli").text();
            var idUsuario = buscarUsuario(rutStatic);
            $.ajax({
                url: "http://localhost/pos/public/SistemaVenta/nuevaVenta",
                method: "POST",
                data: {
                    tipo_comprobante: boleta_factura,
                    fecha_venta: fecha,
                    total: total_venta,
                    venta_despacho: despacho,
                    cliente_fk: 19143313,
                },
                success: function() {
                    alert('Venta Realizada -  //TablaVenta');
                }

            });
        });

        function buscarUsuario(rut) {
            $.ajax({
                url: "http://localhost/pos/public/Usuarios/buscarPorRutJson/" + rut,
                method: "POST",
                success: function(resp) {
                    return resp;
                }
            });
        }

        function listarRegiones() {
            $.ajax({
                url: "http://localhost/pos/public/Region/listarRegiones",
                method: "GET",
                dataType: "JSON",
                success: function(data) {
                    var html = '<option value="">Región</option>';
                    for (var count = 0; count < data.length; count++) {
                        nomRegion = data[count].nombre_region.replace('Región del', '').replace('Región de', '');

                        html += '<option value="' + data[count].id_region + '">' + nomRegion + '</option>';
                    }
                    $('#region').html(html);
                }
            });
        }


        function btnEmpresa() {
            $('#asociarEmpresa').prop('checked') ? $('#buscar-rut').show() : $('#buscar-rut').hide();
            $('#asociarEmpresa').prop('checked') ? $('.emp').show() : $('.emp').hide();
        }

        function listarComunas() {
            var reg_id = $('#region').val();
            var action = 'get_comuna';
            if (reg_id != '') {
                $.ajax({
                    url: "http://localhost/pos/public/Comuna/listarComuna",
                    method: "POST",
                    data: {
                        id_region: reg_id,
                    },
                    dataType: "JSON",
                    success: function(data) {
                        var html = '<option value="">Comuna</option>';
                        for (var count = 0; count < data.length; count++) {
                            html += '<option value="' + data[count].id_comuna + '">' + data[count].nombre_comuna + '</option>';
                        }
                        $('#comuna').html(html);
                    }
                });
            }
        }
    </script>
</body>

</html>