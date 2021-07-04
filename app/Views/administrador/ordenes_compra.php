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
                        <td><?php echo $orden['valor_total']; ?></td>
                        <td><?php echo $orden['estado_orden']; ?></td>
                        <td><a class="view" href="<?php echo base_url() . '/OrdenesCompra/editarOrden/' . $orden['id_orden'] ?>"> <i class="fa fa-pencil"></i></a>
                        <td><a class="view" data-href="<?php echo base_url() . '/OrdenesCompra/eliminarOrden/' . $orden['id_orden'] . '/' . $orden['id_orden'];  ?>" data-toggle="modal" data-target="#Eliminar">
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