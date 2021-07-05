<?php if (isset($validation)) {   ?>
    <div class="alert alert-danger">
        <?php echo $validation->listErrors(); ?>
    </div>
<?php }
?>
<div id="productos" class="tab-pane active">
    <h3>Productos > Editar Producto</h3>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <form class="form-horizontal " method="Post" enctype="multipart/form-data" action="<?php echo base_url() ?>/productosadmin/actualizar">
                    <fieldset class="field-config">
                        <div class="col-sm-12">
                            <input type="hidden" value="<?php echo $datos['id_producto']; ?> " name="id_producto">
                            <input type="hidden" value="<?php echo $datos['categoria']; ?> " name="id_categoria">
                            <input type="hidden" value="<?php echo $datos['detalle_fk']; ?> " name="id_detalle">
                        </div>
                        <div class="col-sm-4 align-items-center">
                            <div class="align-items-center">
                                <img class="primary-img policy-desc" src="<?php echo base_url() . '/img/productos/' . $datos['imagen']; ?>" height="145px" alt="imagen">
                            </div>
                        </div>
                        <div class="col-sm-8">
                                <label class="control-label" for="nombre_producto">Cambiar im&aacute;gen:</label>
                                <input type="file" value="<?php echo  $datos['imagen']; ?>" class="form-control" id="imagen" name="imagen" required>
                        </div>
                        <div class="col-sm-12 pb-10">-<?php echo  $datos['imagen']; ?></div>
                        <div class="col-sm-4">
                            <label class="control-label" for="nombre_producto">Nombre producto:</label>
                            <input type="text" value="<?php echo $datos['nombre']; ?>" class="form-control" id="nombre_producto" name="nombre_producto" placeholder="Ingese nombre producto">
                        </div>
                        <div class="col-sm-4">
                            <label class="control-label" for="marca">Marca:</label>
                            <input type="text" value="<?php echo $datos['marca']; ?>" class="form-control" id="marca" name="marca" placeholder="Ingrese nombre marca">
                        </div>
                        <div class="col-sm-4">
                            <label class="control-label" for="categoria">Categor&iacute;a:</label>
                            <div class=" checkbox-form">
                                <select name="categoria" class="form-control">
                                    <?php foreach ($categorias as $categoria) {
                                        if ($categoria['id_categoria'] == $cat['id_categoria']) {
                                            echo "<option value='"
                                                . $categoria['id_categoria'] . "' selected >" . $categoria['nombre_categoria'] . "</option>";
                                        } else {
                                            echo "<option value='"
                                                . $categoria['id_categoria'] . "'>" . $categoria['nombre_categoria'] . "</option>";
                                        } ?>

                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3 pt-15">
                            <label class="control-label" for="number">Precio venta:</label>
                            <input type="number" value="<?php echo $datos['precio_venta']; ?>" class="form-control" id="precio_venta" name="precio_venta" placeholder="Ingreso precio venta">

                        </div>
                        <div class="col-sm-3 pt-15">
                            <label class="control-label" for="number">Precio costo:</label>
                            <input type="number" value="<?php echo $datos['precio_costo']; ?>" class="form-control" id="precio_costo" name="precio_costo" placeholder="Ingrese precio costo">

                        </div>
                        <div class="col-sm-3 pt-15">
                            <label class="control-label" for="number">Fecha de vencimiento</label>
                            <input type="date" value="<?php echo $fecha_venci['fecha_vencimiento']; ?>" class="form-control" id="fecha_vencimiento" name="fecha_vencimiento" placeholder="Fecha de vencimiento">

                        </div>
                        <div class="col-sm-3 pt-15">
                            <label class="control-label" for="number">Stock cr&iacute;tico:</label>
                            <input type="number" value="<?php echo $datos['stock_critico']; ?>" class="form-control" id="stock_critico" name="stock_critico" placeholder="Ingrese existencia criticas">
                        </div>
                        <div class="col-sm-12 pt-15">
                            <label class="control-label" for="number">Descripci&oacute;n:</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="2">
                            <?php echo $datos['descripcion']; ?>
                            </textarea>
                        </div>
                            <div class="col-sm-6">
                            <a href="<?php echo base_url() ?>/productosadmin"><button type="button" class="newsletter-btn" data-dismiss="modal">Volver</button></a>
                             
                            </div>
                            <div class="col-sm-6">
                            <div class="pull-right">
                                <button type="submit" class="newsletter-btn">Guardar</button>
                            </div>
                            </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>