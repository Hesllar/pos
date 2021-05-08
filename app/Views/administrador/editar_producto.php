<form class="form-horizontal" method="Post" enctype="multipart/form-data" action="<?php echo base_url() ?>/productosadmin/editar">
    <div class="modal-body">
        <div class="row">
            <div class="col-sm-12">

                <fieldset>
                    <div class="form-group">
                        <label class="control-label" for="nombre_producto"><span class="require">*</span>Nombre producto</label>
                        <div class="col-sm-5">
                            <input type="text" value="<?php echo $info['nombre']; ?>" class="form-control" id="nombre_producto" name="nombre_producto" placeholder="Ingese nombre producto" require>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="marca"><span class="require">*</span>Marca</label>
                        <div class="col-sm-5">
                            <input type="text" value="<?php echo $info['marca']; ?>" class="form-control" id="marca" name="marca" placeholder="Ingrese nombre marca" require>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="categoria"><span class="require">*</span>Categoria</label require>
                        <div class=" checkbox-form col-sm-5">
                            <select name="categoria" require>
                                <option value="">Selecciones</option>
                                <?php foreach ($categorias as $categoria) { ?>
                                    <option value="<?php echo $categoria['id_categoria']; ?>"><?php echo $categoria['nombre_categoria']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-5">
                            <img src="" class="img-responsive" />
                            <input type="file" value="<?php echo $info['imagen']; ?>" class="form-control" id="imagen" name="imagen" accept="image/png" require>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="number"><span class="require">*</span>Precio venta</label>
                        <div class="col-sm-5">
                            <input type="number" value="<?php echo $info['precio_venta']; ?>" class="form-control" id="precio_venta" name="precio_venta" placeholder="Ingreso precio venta" require>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="number"><span class="require">*</span>Prectio costo</label>
                        <div class="col-sm-5">
                            <input type="number" value="<?php echo $info['precio_costo']; ?>" class="form-control" id="precio_costo" name="precio_costo" placeholder="Ingrese precio costo" require>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="number"><span class="require">*</span>Fecha de vencimiento</label>
                        <div class="col-sm-5">
                            <input type="date" class="form-control" id="fecha_vencimiento" name="fecha_vencimiento" placeholder="Fecha de vencimiento" require>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="number"><span class="require">*</span>Stock</label>
                        <div class="col-sm-5">
                            <input type="number" value="<?php echo $info['stock']; ?>" class="form-control" id="stock" name="stock" placeholder="Ingrese existencia" require>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="number"><span class="require">*</span>Stock critico</label>
                        <div class="col-sm-5">
                            <input type="number" value="<?php echo $info['stock_critico']; ?>" class="form-control" id="stock_critico" name="stock_critico" placeholder="Ingrese existencia criticas" require>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="number"><span class="require">*</span>Descripcion</label>
                        <div class="col-sm-5">
                            <label for="descripcion" class="form-label"></label>
                            <textarea value="<?php echo $info['descripcion']; ?>" class="form-control" id="descripcion" name="descripcion" rows="3"></textarea require>
                                                                        </div>
                                                                    </div>
                                                                </fieldset>
                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="<?php echo base_url() ?>/productosadmin"><button type="button" class="btn btn-secondary newsletter-btn" data-dismiss="modal">Cancelar</button></a>
                                                    <button type="submit" class="newsletter-btn">Guardar</button>
                                                </div>
                                                 </form>