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
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>