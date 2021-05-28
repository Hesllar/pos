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
                <tr>
                    <td>0015236</td>
                    <td>29/04/2021</td>
                    <td>Francisco Diaz Varas</td>
                    <td>Caso & Cia LTDA.</td>
                    <td>$156.693</a></td>
                    <td>Procesada</a></td>
                    <td>
                        <a class="view" href="cart.html">Lupa</a>
                    </td>
                </tr>
                <tr>
                    <td>0015235</td>
                    <td>28/04/2021</td>
                    <td>Francisco Diaz Varas</td>
                    <td>Portal Mayorista</td>
                    <td>$58.795</a></td>
                    <td>Anulada</a></td>
                    <td><a class="view" href="cart.html">view</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>