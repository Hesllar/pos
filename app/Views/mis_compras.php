<div class="row d-flex justify-content-center ">
    <div class="col-sm-8 ">
        <table class="table">
            <thead>
                <tr>
                    <th>Id venta</th>
                    <th>Cliente</th>
                    <th>Número de productos</th>
                    <th>Tipo de comprobante</th>
                    <th>Total</th>
                    <th>Fecha de compra</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($compras != null) {
                ?>
                    <?php foreach ($compras as $compra) { ?>
                        <tr>
                            <td><?php echo $compra['id_venta']; ?></td>
                            <td><?php echo $compra['nombre']; ?></td>
                            <td><?php echo $compra['cantidad']; ?></td>
                            <td><?php echo $compra['tipo_comprobante']; ?></td>
                            <td><?php echo $compra['total']; ?></td>
                            <td><?php echo $compra['fecha_venta']; ?></td>
                            <td><a class="view" data-toggle="modal" href="#detalle" onclick="todo(<?php echo $compra['id_venta']; ?>)"><i class="fa fa-eye"></i></a>
                        </tr>
                    <?php } ?>
                <?php
                } else {
                ?>
                    <h2 class="d-flex justify-content-center">No hay compras</h2>
                    <br>
                <?php

                } ?>


            </tbody>
        </table>
    </div>
</div>
<div class="modal" id="detalle" tabindex="-1" role="dialog" aria-labelledby="detalle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Datos de la venta N°
                </h5>
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
                                        <input type="hidden" id="id_despacho">
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
                <button type="button" class="btn-estilo btn-aceptar" data-dismiss="modal">Aceptar</button>
            </div>
        </div>
    </div>
</div>