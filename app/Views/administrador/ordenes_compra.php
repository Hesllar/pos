<div id="ordenescompra" class="tab-pane active">
    <h3>Ordenes de compra</h3>
    <div class="pull-left">
        <a href="<?php echo base_url() . '/Proveedor/pagOrden/' ?>">
            <button type="button" class="btn-submit">
                Generar orden
            </button>
        </a>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>N° Orden</th>
                    <th>Fecha</th>
                    <th>Empleado</th>
                    <th>Proveedor</th>
                    <th>Total</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ordenCompra as $orden) { ?>
                    <tr>
                        <td><?php echo $orden['id_orden']; ?></td>
                        <td><?php echo $orden['fecha_emision']; ?></td>
                        <td><?php echo $orden['empleado_fk']; ?></td>
                        <td><?php echo $orden['proveedor_fk']; ?></td>
                        <td><?php echo "$" . number_format($orden['valor_total'], 0)  ?></td>
                        <?php if ($orden['estado_orden'] == 0) {
                        ?>
                            <td>En proceso</td>
                        <?php
                        } else {
                        ?>
                            <td>Enviada</td>
                        <?php
                        }
                        ?>
                        <td><a class="view" data-toggle="modal" href="#detalleOrden" onclick="vistaOrden(<?php echo $orden['id_orden'] ?>)"><i class="fa fa-eye"></i></a></td>
                        <td><a class="view" href="<?php echo base_url() . '/OrdenesCompra/editarOrden/' . $orden['id_orden'] ?>"> <i class="fa fa-pencil"></i></a></td>
                        <td><a class="view" href="#" data-href="<?php echo base_url() . '/OrdenesCompra/eliminarOrden/' . $orden['id_orden'] . '/' . $orden['id_orden'];  ?>" data-toggle="modal" data-target="#Eliminar">
                                <i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<div class="modal fade" id="Eliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar orden compra</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¿Desea eliminar esta orden de compra?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-danger btn-ok">Aceptar</a>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="detalleOrden" tabindex="-1" role="dialog" aria-labelledby="detallOrden" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Datos de la orden N°
                </h5>
                <!--onclick=" location.href=' <?php echo base_url() ?>/Ventas'-->
                <input type="text" id="idOrden" disabled>
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
                                            <a href="#" class="middle-menu-list">Detalle de la orden</a>
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
                                                    <span class="fuente-titulo">Rut Empresa</span>
                                                    <div class="col-sm-12">
                                                        <span class="fuente-parrafo"><input type="text" id="rut_emp" disabled></span>
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-5">
                                                    <span class="fuente-titulo">Rubro</span>
                                                    <div class="col-sm-12">
                                                        <span class="fuente-parrafo"><input type="text" id="rubro" disabled></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" id="datos_emp">
                                                <div class="form-group col-sm-4">
                                                    <span class="fuente-titulo">Teléfono</span>
                                                    <div class="col-sm-12">
                                                        <span class="fuente-parrafo"><input type="text" id="fono" disabled></span>
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
                                                    <span class="fuente-titulo">Solicitante</span>
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
                                                                    <th>Precio costo</th>
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
                                        <span class="fuente-parrafo">Iva</span>
                                        <span class="fuente-titulo"><input type="text" id="Iva" disabled></span>
                                    </div>
                                </div>
                                <div class="cart_totals h2 col-sm-12">
                                    <div class="form-group">
                                        <span class="fuente-parrafo">Sub Total</span>
                                        <span class="fuente-titulo"><input type="text" id="subtotal" disabled></span>
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
                <button type="button" class="btn-estilo btn-aceptar" data-dismiss="modal">Aceptar</button>
            </div>
        </div>
    </div>
</div>