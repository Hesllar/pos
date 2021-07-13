<div id="recepcion" class="tab-pane active">
    <h3>Recepci&oacute;n de Productos</h3>
    <div class="row">
        <div class="col-sm-12">
            <label class="control-label pull-right product-header">N° ORDEN: #<span><?php echo $orden['id_orden']; ?></span></label>
        </div>
        <div class="col-sm-12">
            <div class="col-sm-12 b-bottom">
                <label class="control-label"><span class="titulo-recepcion">Fecha de Emisi&oacute;n:</span> <span><?php echo $orden['fecha_emision']; ?></span></label>
            </div>
            <div class="field-config mt-10 b-bottom">
                <div class="col-sm-12 field-config b-bottom">
                    <div class="col-sm-4">
                        <label class="control-label"><span class="titulo-recepcion">Rut Proveedor: </span><span><?php echo $orden['proveedor_fk']['rut'] . "-" . $orden['proveedor_fk']['dv']; ?></span></label>
                    </div>
                    <div class="col-sm-5">
                        <label class="control-label"><span class="titulo-recepcion">Nombre Proveedor:</span> <span><?php echo $orden['proveedor_fk']['nombre']; ?></span></label>
                    </div>
                    <div class="col-sm-3">
                        <label class="control-label"><span class="titulo-recepcion">Giro:</span> <span><?php echo $orden['proveedor_fk']['rubro']; ?></span></label>
                    </div>
                </div>
                <div class="col-sm-12 b-bottom">
                    <label class="control-label mtb-10"><span class="titulo-recepcion">Orden de compra creada por:</span> <span><?php echo $orden['empleado_fk']; ?></span></label>
                </div>
                <div class="col-sm-4">
                    <label class="control-label mt-10"><span class="titulo-recepcion">Total Neto:</span> <span><?php echo $orden['valor_neto']; ?></span></label>
                </div>
                <div class="col-sm-4">
                    <label class="control-label mt-10"><span class="titulo-recepcion">Total IVA:</span> <span><?php echo $orden['valor_iva']; ?></span></label>
                </div>
                <div class="col-sm-4">
                    <label class="control-label mt-10"><span class="titulo-recepcion">Total a pagar:</span> <span><?php echo $orden['valor_total']; ?></span></label>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-20">
        <input id="n_orden" type="hidden" value="<?php echo $orden['id_orden']; ?>">

        <table id="tabla-recepcion-productos" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>N° Registro</th>
                    <th>Producto</th>
                    <th>Marca</th>
                    <th>Cantidad</th>
                    <th>Cantidad recibida</th>
                    <th>Precio unidad</th>
                    <th>Total</th>
                </tr>
            </thead>
        </table>
        <div class="row mt-20">
            <div class="col-sm-12">
                <div class="pull-right">
                <h3>Total: $<span id="totalPago">0</span></h3>
                </div>
            </div>
            <div class="col-sm-12">
            <button type="button" onclick="confirmarPedido()" class="newsletter-btn pull-right">Confirmar pedido</button>
            </div>
        </div>
    </div>
</div>