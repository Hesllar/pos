<div id="ventas" class="tab-pane <?php

                                    use App\Controllers\Ventas;

                                    echo $e_venta; ?>">
    <h3>Ventas diarias</h3>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="pull-right">
                    <button type="button" class="btn-submit" data-toggle="modal" data-target="#exampleModal">
                        <i class="fa fa-plus"></i>
                        <span>Agregar venta</span>
                    </button>
                </div>

                <!-- Ventana Emergente -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Datos de la venta</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <form class="form-horizontal" action="#">
                                            <fieldset>
                                                <div class="form-group">
                                                    <label class="control-label" for="number"><span class="require">*</span>Tipo Comprobante</label require>
                                                    <div class=" checkbox-form col-sm-10">
                                                        <select require>
                                                            <option value="0">Seleccione comprobante</option>
                                                            <option value="1">Boleta</option>
                                                            <option value="2">Factura</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="l-name"><span class="require">*</span>Rut del Cliente</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="l-name" placeholder="12345678-9" require>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="f-name"><span class="require">*</span>Codigo
                                                        de barras</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="f-name" placeholder="Ingrese o escanee codigo de barras" require>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="f-name"><span class="require">*</span>Productos</label>
                                                    <div class="col-sm-10">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Nombre</th>
                                                                        <th>Cantidad</th>
                                                                        <th>Precio</th>
                                                                        <th>Eliminar</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>523</td>
                                                                        <td>29/04/2021 18:03</td>
                                                                        <td>$15.990</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>522</td>
                                                                        <td>29/04/2021 17:53</td>
                                                                        <td>$22.390</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>


                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn-estilo btn-cancelar" data-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn-estilo btn-aceptar">Generar venta</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Ventana Emergente -->
                <div class="modal" id="detalle" tabindex="-1" role="dialog" aria-labelledby="detalle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Datos de la venta N°
                                </h5>
                                <!--onclick=" location.href=' <?php echo base_url() ?>/Ventas'-->
                                <input type="text" id="idBoleta" disabled>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden=" true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <form class="form-horizontal" action="#">
                                        <fieldset>
                                            <div id="accordion">
                                                <div class="card">
                                                    <div class="card-header" id="headingOne">
                                                        <h5 class="mb-0">
                                                            <a href="#" class="middle-menu-list">Detalle de la venta</a>
                                                        </h5>
                                                    </div>

                                                    <div id="venta" class="collapse show">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="form-group col-sm-6">
                                                                    <span class="fuente-titulo">Fecha de Emision</span>
                                                                    <div class="col-sm-12">
                                                                        <span class="fuente-parrafo"><input type="text" id="fecha_emision" disabled></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-sm-4">
                                                                    <span class="fuente-titulo">Rut del Cliente</span>
                                                                    <div class="col-sm-12">
                                                                        <span class="fuente-parrafo"><input type="text" id="rut_user" disabled></span>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-sm-5">
                                                                    <span class="fuente-titulo">Nombre del Cliente</span>
                                                                    <div class="col-sm-12">
                                                                        <span class="fuente-parrafo"><input type="text" id="nombre_cliente" disabled></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row" id="datos_emp">
                                                                <div class="form-group col-sm-4">
                                                                    <span class="fuente-titulo">Rut Empresa</span>
                                                                    <div class="col-sm-12">
                                                                        <span class="fuente-parrafo"><input type="text" id="rut_emp"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-sm-4">
                                                                    <span class="fuente-titulo">Raz&oacute;n
                                                                        Social</span>
                                                                    <div class="col-sm-12">
                                                                        <span class="fuente-parrafo"><input type="text" id="social"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-sm-4">
                                                                    <span class="fuente-titulo">Giro</span>
                                                                    <div class="col-sm-12">
                                                                        <span class="fuente-parrafo"><input type="text" id="giro"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-sm-6">
                                                                    <span class="fuente-titulo">Nombre del Empleado</span>
                                                                    <div class="col-sm-12">
                                                                        <span class="fuente-parrafo">Gino Baez Silva</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label" for="f-name">Productos</label>
                                                                <div class="col-sm-12">
                                                                    <div class="table-responsive">
                                                                        <table class="table">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Nombre</th>
                                                                                    <th>Cantidad</th>
                                                                                    <th>Neto</th>
                                                                                    <th>IVA</th>

                                                                                    <th>Total</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody class="listProduct">

                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="cart_totals h2 col-sm-12">
                                                    <div class="form-group">
                                                        <span class="fuente-parrafo">Sub Total</span>
                                                        <span class="fuente-titulo"><input type="text" id="subtotal" disabled></span>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header" id="headingTwo">
                                                        <h5 class="mb-0">
                                                            <a href="#" class="middle-menu-list collapsed" data-toggle="collapse" data-target="#despacho" aria-expanded="false" aria-controls="despacho">Detalle del despacho</a>
                                                        </h5>
                                                    </div>
                                                    <div id="despacho" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="form-group col-sm-4">
                                                                    <span class="fuente-titulo">Estado del env&iacute;o</span>
                                                                    <div class="col-sm-12">
                                                                        <span class="fuente-parrafo">Recibido</span>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-sm-4">
                                                                    <span class="fuente-titulo">Fecha de entrega</span>
                                                                    <div class="col-sm-12">
                                                                        <span class="fuente-parrafo">00/00/00 00:00:00</span>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-sm-4">
                                                                    <span class="fuente-titulo">Recibido por</span>
                                                                    <div class="col-sm-12">
                                                                        <span class="fuente-parrafo">Ricardo Muñoz Jorquera</span>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-sm-4">
                                                                    <span class="fuente-titulo">Rut quien recibe</span>
                                                                    <div class="col-sm-12">
                                                                        <span class="fuente-parrafo">+56981854566</span>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-sm-4">
                                                                    <span class="fuente-titulo">Peso del paquete</span>
                                                                    <div class="col-sm-12">
                                                                        <span class="fuente-parrafo">20kg</span>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-sm-4">
                                                                    <span class="fuente-titulo">Comuna de env&iacute;o</span>
                                                                    <div class="col-sm-12">
                                                                        <span class="fuente-parrafo">San Antonio</span>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-sm-4">
                                                                    <span class="fuente-titulo">Costo de env&iacute;o</span>
                                                                    <div class="col-sm-12">
                                                                        <span class="fuente-parrafo">$5460</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row pull-right billing-address">
                                                <div class="form-group col-sm-9">
                                                    <span class="fuente-parrafo">Total</span>
                                                    <span class="fuente-titulo">$999.999</span>
                                                </div>
                                            </div>

                                        </fieldset>
                                    </form>


                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn-estilo btn-cancelar" data-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn-estilo btn-cancelar" data-dismiss="modal">Anular
                                    venta</button>
                                <button type="button" class="btn-estilo btn-aceptar" data-dismiss="modal">Aceptar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <ul class="main-thumb-desc nav">
                <li><a class="active" data-toggle="tab" href="#boletas">Boletas</a></li>
                <li><a data-toggle="tab" href="#facturas">Facturas</a></li>
            </ul>
            <!-- Product Thumbnail Tab Content Start -->
            <div class="tab-content thumb-content border-default">
                <div id="boletas" class="tab-pane">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>N° Venta</th>
                                    <th>Fecha</th>
                                    <th>Total</th>
                                    <th>¿Despacho?</th>
                                    <th>Estado</th>
                                    <th>Vendedor</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($boletas as $boleta) { ?>
                                    <tr>
                                        <td><?php echo $boleta['id_venta']; ?></td>
                                        <td><?php echo $boleta['fecha_venta']; ?></td>
                                        <td><?php echo $configuracion['signo_moneda']; ?><?php echo $boleta['total']; ?>
                                        </td>
                                        <td><?php echo $boleta['despacho_str']; ?></td>
                                        <td><?php echo $boleta['estado_str']; ?></td>
                                        <td><a href="#"><?php echo $boleta['nom_empleado']; ?></a></td>
                                        <td>
                                            <a class="view" data-toggle="modal" data-target="#detalle" id="btnbuscar" onclick="todo(<?php echo $boleta['id_venta'] ?>)">
                                            </a>

                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>

                        </table>
                    </div>
                </div>
                <div id="facturas" class="tab-pane in active">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>N° Venta</th>
                                    <th>Fecha</th>
                                    <th>Total</th>
                                    <th>¿Despacho?</th>
                                    <th>Estado</th>
                                    <th>Vendedor</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($facturas as $factura) { ?>
                                    <tr>
                                        <td><?php echo $factura['id_venta']; ?></td>
                                        <td><?php echo $factura['fecha_venta']; ?></td>
                                        <td><?php echo $configuracion['signo_moneda']; ?><?php echo $factura['total']; ?>
                                        </td>
                                        <td><?php echo $factura['despacho']; ?></td>
                                        <td><?php echo $factura['estado_venta']; ?></td>
                                        <td><a href="#"><?php echo $factura['empleado_fk']; ?></a></td>
                                        <td>
                                            <a class="view" data-toggle="modal" href="#detalle">
                                                <i class="fa fa-bars"></i>
                                            </a>
                                            <a class="view-alerta" href="" onclick="anular(<?php echo $factura['id_venta'] ?>)">
                                                <i class="fa fa-bars"></i>
                                            </a>
                                            <a class="view-alerta" href="" onclick="bpp(<?php echo $factura['id_venta'] ?>)">
                                                <i class="fa fa-bars"></i>
                                            </a>
                                            <button id="anular" name="anular" type="button" class="btn btn-danger btn-sm delete" data-id="<?php $factura['id_venta'] ?>">Anular</button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Product Thumbnail Tab Content End -->
        </div>
        <!-- Row End -->
    </div>
    <!-- Container End -->
</div>
<!-- Product Thumbnail Description End -->
</div>
<div id="resultado">Nada</div>

<!-- jquery 3.12.4 -->
<script src="<?php echo base_url(); ?>/js/vendor/jquery-1.12.4.min.js"></script>
<script>
    $(document).ready(function() {

    });

    function bpp(codigo) {

        alert('Run function bpp');
        $.ajax({
            url: "<?php echo base_url() ?>/ventas/anularventa/" + codigo,
            datatype: 'json',
            success: function(resultado) {
                alert('FInishes');
                alert(resultado.datos.id_venta);
                //$("#resultado").html(resultado.datos.id_venta);
                //$("#IdBoleta").html(resultado.datos.id_venta);
            }
        })
    };
</script>


<script>
    //jQuery("#resultado").html('response');
    function anular(id_venta) {
        alert('Si');
        if (id_venta != null) {
            $.ajax({
                url: "<?php echo base_url('/ventas/anularventa/') ?>" + id_venta,
                type: "POST",
                dataType: 'json',
                data: {
                    'id_venta': id_venta
                },
                success: function(respuesta) {
                    alert('FInishes');
                }
            });
        }
    }
</script>


<script>
    function todo(id_venta) {
        obtnDatos(id_venta);
        obtnDatosPro(id_venta);
        obtDatosEmp(id_venta);

    }

    function obtnDatos(id_venta) {
        console.log(id_venta)
        $.ajax({
            url: "<?php echo base_url() ?>/Ventas/datosBoleta/" + id_venta,
            dataType: 'json',
            success: function(respuesta) {
                $("#idBoleta").val(respuesta.datos.id_venta);
                $("#fecha_emision").val(respuesta.datos.fecha_venta);
                $("#rut_user").val(respuesta.datos.rut);
                $("#nombre_cliente").val(respuesta.datos.nombres);
                $("#subtotal").val(respuesta.datos.total);
            }
        });
    }

    function obtnDatosPro(id_venta) {
        $.ajax({
            url: "<?php echo base_url() ?>/Ventas/datosProductoBoleta/" + id_venta,

            dataType: 'json',
            success: function(respuesta) {
                $('.listProduct').html('')
                $.each(respuesta.datos, function(i, value) {
                    $('.listProduct').append('<tr>\
                    <td>' + value['nombre'] + '</td>\
                    <td>' + value['cantidad'] + '</td>\
                    <td>' + value['precio_neto'] + '</td>\
                    <td>' + value['precio_iva'] + '</td>\
                    <td>' + value['precio_venta'] + '</td>\
                    ')
                })
            }
        });
    }

    function obtDatosEmp(id_venta) {
        console.log(id_venta);
        $.ajax({
            url: "<?php echo base_url() ?>/Empresas/datosEmp/" + id_venta,
            dataType: 'json',
            success: function(resp) {
                if (resp.datos != null) {
                    $("#rut_emp").val(resp.datos.rut_emp);
                    $("#social").val(resp.datos.social);
                    $("#giro").val(resp.datos.giro);
                    document.getElementById("datos_emp").style.display = ""

                } else {
                    document.getElementById("datos_emp").style.display = "none"
                }
            }
        })
    }
</script>