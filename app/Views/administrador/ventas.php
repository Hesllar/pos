<div id="ventas" class="tab-pane <?php echo $e_venta; ?>">
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
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                    <label class="control-label" for="number"><span
                                                            class="require">*</span>Tipo Comprobante</label require>
                                                    <div class=" checkbox-form col-sm-10">
                                                        <select require>
                                                            <option value="0">Seleccione comprobante</option>
                                                            <option value="1">Boleta</option>
                                                            <option value="2">Factura</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="l-name"><span
                                                            class="require">*</span>Rut del Cliente</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="l-name"
                                                            placeholder="12345678-9" require>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="f-name"><span
                                                            class="require">*</span>Codigo
                                                        de barras</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="f-name"
                                                            placeholder="Ingrese o escanee codigo de barras" require>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="f-name"><span
                                                            class="require">*</span>Productos</label>
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
                                <button type="button" class="btn-estilo btn-cancelar"
                                    data-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn-estilo btn-aceptar">Generar venta</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Ventana Emergente -->
                <div class="modal" id="detalle" tabindex="-1" role="dialog" aria-labelledby="detalle"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Datos de la venta</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <form class="form-horizontal" action="#">
                                        <fieldset>
                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <label class="control-label" for="l-name">Fecha de Emision</label>
                                                    <div class="col-sm-10">
                                                        <h6>05/05/2021 05:55:55</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <label class="control-label" for="f-name">Nombre del Cliente</label>
                                                    <div class="col-sm-10">
                                                        <h6>Bastian Barraza Diaz</h6>
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label class="control-label" for="l-name">Rut del Cliente</label>
                                                    <div class="col-sm-10">
                                                        <h6>19.168.632-0</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <label class="control-label" for="f-name">Raz&oacute;n
                                                        Social</label>
                                                    <div class="col-sm-10">
                                                        <h6>Bastian Barraza Diaz</h6>
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label class="fuente-titulo" for="l-name">Rut Empresa</label>
                                                    <div class="col-sm-10">
                                                    <p class="fuente-parrafo">79.168.632-0</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <label class="col-sm-5 fuente-titulo" for="f-name">Nombre del
                                                        Empleado</label>
                                                    <div class="col-sm-5">
                                                        <label class="fuente-parrafo">Gino Baez Silva</label>
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
                                                                    <th>Costo unitario</th>
                                                                    <th>Total</th>
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
                                            <div id="accordion">
                                                <div class="card">
                                                    <div class="card-header" id="headingOne">
                                                        <h5 class="mb-0">
                                                            <a href="#despacho" class="middle-menu-list" data-toggle="collapse"
                                                                data-target="#despacho" aria-expanded="true"
                                                                aria-controls="collapseOne">Datos del despacho</a>
                                                        </h5>
                                                    </div>

                                                    <div id="despacho" class="collapse"
                                                        aria-labelledby="headingOne" data-parent="#accordion">
                                                        <div class="card-body">
                                                            Anim pariatur cliche reprehenderit, enim eiusmod high life
                                                            accusamus terry richardson ad squid. 3 wolf moon officia
                                                            aute, non cupidatat skateboard dolor brunch. Food truck
                                                            quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor,
                                                            sunt aliqua put a bird on it squid single-origin coffee
                                                            nulla assumenda shoreditch et. Nihil anim keffiyeh
                                                            helvetica, craft beer labore wes anderson cred nesciunt
                                                            sapiente ea proident. Ad vegan excepteur butcher vice lomo.
                                                            Leggings occaecat craft beer farm-to-table, raw denim
                                                            aesthetic synth nesciunt you probably haven't heard of them
                                                            accusamus labore sustainable VHS.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </fieldset>
                                    </form>


                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn-estilo btn-cancelar"
                                    data-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn-estilo btn-cancelar" data-dismiss="modal">Anular
                                    venta</button>
                                <button type="button" class="btn-estilo btn-aceptar"
                                    data-dismiss="modal">Aceptar</button>
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
                <div id="boletas" class="tab-pane in active">
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
                                <?php foreach ($boletas as $boleta){ ?>
                                <tr>
                                    <td><?php echo $boleta['id_venta']; ?></td>
                                    <td><?php echo $boleta['fecha_venta']; ?></td>
                                    <td><?php echo $configuracion['signo_moneda']; ?><?php echo $boleta['total']; ?>
                                    </td>
                                    <td><?php echo $boleta['despacho']; ?></td>
                                    <td><?php echo $boleta['estado_venta']; ?></td>
                                    <td><a href="#"><?php echo $boleta['empleado_fk']; ?></a></td>
                                    <td>
                                        <a class="view" data-toggle="modal" href="#detalle">
                                            <i class="fa fa-bars"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="facturas" class="tab-pane">
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
                                <?php foreach ($facturas as $factura){ ?>
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