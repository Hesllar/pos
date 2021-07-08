<?php
$session = session();
?>
<div id="ventas" class="tab-pane <?php

                                    use App\Controllers\Ventas;

                                    echo $e_venta; ?>">
    <h3>Ventas diarias</h3>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <!--<div class="pull-right">
                    <button type="button" class="btn-submit" data-toggle="modal" data-target="#exampleModal">
                        <i class="fa fa-plus"></i>
                        <span>Agregar venta</span>
                    </button>
                </div>-->

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
                                                                        <span class="fuente-parrafo"><input type="text" id="rut_emp" disabled></span>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-sm-4">
                                                                    <span class="fuente-titulo">Raz&oacute;n
                                                                        Social</span>
                                                                    <div class="col-sm-12">
                                                                        <span class="fuente-parrafo"><input type="text" id="social" disabled></span>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-sm-4">
                                                                    <span class="fuente-titulo">Giro</span>
                                                                    <div class="col-sm-12">
                                                                        <span class="fuente-parrafo"><input type="text" id="giro" disabled></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-sm-6">
                                                                    <span class="fuente-titulo">Nombre del Empleado</span>
                                                                    <div class="col-sm-12">
                                                                        <span class="fuente-parrafo"><input type="text" id="nom_empleado" disabled></span>
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
                                                                        <span class="fuente-parrafo"><input type="text" id="est_despacho" disabled></span>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-sm-4">
                                                                    <span class="fuente-titulo">Fecha de entrega</span>
                                                                    <div class="col-sm-12">
                                                                        <span class="fuente-parrafo"><input type="text" id="fecha_entrega" disabled></span>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-sm-4">
                                                                    <span class="fuente-titulo">Recibido por</span>
                                                                    <div class="col-sm-12">
                                                                        <span class="fuente-parrafo"><input type="text" id="nom_recibe" disabled></span>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-sm-4">
                                                                    <span class="fuente-titulo">Comuna de env&iacute;o</span>
                                                                    <div class="col-sm-12">
                                                                        <span class="fuente-parrafo"><input type="text" id="nom_comuna" disabled></span>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-sm-4">
                                                                    <span class="fuente-titulo">Costo de env&iacute;o</span>
                                                                    <div class="col-sm-12">
                                                                        <span class="fuente-parrafo"><input type="text" id="costo_envio" disabled></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row pull-right billing-address" id="total-des">
                                                <div class="form-group col-sm-9">
                                                    <span class="fuente-parrafo">Total</span>
                                                    <span class="fuente-titulo"><input type="text" id="totales" disabled></span>
                                                </div>
                                            </div>

                                        </fieldset>
                                    </form>


                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn-estilo btn-cancelar" data-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn-estilo btn-cancelar btn-anular" data-dismiss="modal">Anular
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
                <li><a id="btnBoletas" class="active" data-toggle="tab" href="#boletas">Boletas</a></li>
                <li><a id="btnFacturas" data-toggle="tab" href="#facturas">Facturas</a></li>
            </ul>
            <!-- Product Thumbnail Tab Content Start -->
            <div class="tab-content thumb-content border-default">
                <div id="boletas" class="tab-pane in active">
                        <table id="tabla-boletas" class="table table-striped table-bordered">
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
                        </table>
                </div>

                <div id="facturas" class="tab-pane">
                        <table id="tabla-facturas" class="table table-striped table-bordered">
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
                        </table>
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

