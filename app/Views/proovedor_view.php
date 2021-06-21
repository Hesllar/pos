<div class="container">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Fecha creación</th>
                    <th>Valor total</th>
                    <th>Estado</th>
                    <th>empleado</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datos as $orden) { ?>
                    <tr>
                        <td><?php echo $orden['fecha_emision']; ?></td>
                        <td><?php echo $orden['valor_total']; ?></td>
                        <td><?php echo $orden['estado_orden']; ?></td>
                        <td><?php echo $orden['nombres']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>