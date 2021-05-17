<?php if (isset($validation)) {   ?>
    <div class="alert alert-danger">
        <?php echo $validation->listErrors(); ?>
    </div>
<?php }
?>

<form class="form-horizontal " method="Post" enctype="multipart/form-data" action="<?php echo base_url() ?>/productosadmin/actualizar">
    <div class="modal-body d-flex justify-content-center">
        <div class="row  ">
            <div class="col-sm-12 ">

                <fieldset class="border border-dark universal-padding-border-edit">
                    <input type="hidden" value="<?php echo $datos['id_producto']; ?> " name="id_producto">
                    <input type="hidden" value="<?php echo $datos['categoria']; ?> " name="id_categoria">
                    <input type="hidden" value="<?php echo $datos['detalle_fk']; ?> " name="id_detalle">
                    <div class=" form-group">
                        <label class="control-label" for="nombre_producto"><span class="require">*</span>Nombre producto</label>
                        <div class="col-sm-10">
                            <input type="text" value="<?php echo $datos['nombre']; ?>" class="form-control" id="nombre_producto" name="nombre_producto" placeholder="Ingese nombre producto">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="marca"><span class="require">*</span>Marca</label>
                        <div class="col-sm-10">
                            <input type="text" value="<?php echo $datos['marca']; ?>" class="form-control" id="marca" name="marca" placeholder="Ingrese nombre marca">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="categoria"><span class="require">*</span>Categoria</label>
                        <div class=" checkbox-form col-sm-10">
                            <select name="categoria">
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
                    <div class="form-group">
                        <div class="col-sm-10">
                            <input type="file" value="<?php echo  $datos['imagen']; ?>" class="form-control" id="imagen" name="imagen">
                            <img class="primary-img" src="<?php echo base_url() . '/img/productos/' . $datos['imagen']; ?>" alt="imagen">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="number"><span class="require">*</span>Precio venta</label>
                        <div class="col-sm-10">
                            <input type="number" value="<?php echo $datos['precio_venta']; ?>" class="form-control" id="precio_venta" name="precio_venta" placeholder="Ingreso precio venta">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="number"><span class="require">*</span>Prectio costo</label>
                        <div class="col-sm-10">
                            <input type="number" value="<?php echo $datos['precio_costo']; ?>" class="form-control" id="precio_costo" name="precio_costo" placeholder="Ingrese precio costo">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="number"><span class="require">*</span>Fecha de vencimiento</label>
                        <div class="col-sm-10">
                            <input type="date" value="<?php echo $fecha_venci['fecha_vencimiento']; ?>" class="form-control" id="fecha_vencimiento" name="fecha_vencimiento" placeholder="Fecha de vencimiento">
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="control-label" for="number"><span class="require">*</span>Stock</label>
                        <div class="col-sm-10">
                            <input type="number" value="<?php echo $datos['stock']; ?>" class="form-control" id="stock" name="stock" placeholder="Ingrese existencia">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="number"><span class="require">*</span>Stock critico</label>
                        <div class="col-sm-10">
                            <input type="number" value="<?php echo $datos['stock_critico']; ?>" class="form-control" id="stock_critico" name="stock_critico" placeholder="Ingrese existencia criticas">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="number"><span class="require">*</span>Descripcion</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="3">
                            <?php echo $datos['descripcion']; ?>
                            </textarea>
                        </div>
                    </div>

                </fieldset>
                <div class="modal-footer d-flex justify-content-center">
                    <a href="<?php echo base_url() ?>/productosadmin"><button type="button" class="btn btn-secondary newsletter-btn" data-dismiss="modal">Cancelar</button></a>
                    </a><button type="submit" class="newsletter-btn">Guardar</button>
                </div>

            </div>

        </div>

    </div>

</form>