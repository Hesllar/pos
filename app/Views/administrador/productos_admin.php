                                <div id="productos" class="tab-pane active">
                                    <h3>Productos</h3>
                                    <div class="pull-right">
                                        <button type="button" class="btn-submit" data-toggle="modal" data-target="#exampleModal">
                                            +Agregar
                                        </button>
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Datos del producto</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <form class="form-horizontal" action="#">
                                                                <fieldset>
                                                                    <div class="form-group">
                                                                        <label class="control-label" for="f-name"><span class="require">*</span>Codigo de barra</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" class="form-control" id="f-name" placeholder="Ingrese codigo de barra" require>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label" for="l-name"><span class="require">*</span>Nombre producto</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" class="form-control" id="l-name" placeholder="Ingese nombre producto" require>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label" for="email"><span class="require">*</span>Marca</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="email" class="form-control" id="email" placeholder="Ingrese nombre marca" require>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label" for="number"><span class="require">*</span>Categoria</label require>
                                                                        <div class=" checkbox-form col-sm-10">
                                                                            <select require>
                                                                                <option value="volvo">Selecciones</option>
                                                                                <?php foreach ($categorias as $categoria) { ?>
                                                                                    <option value="<?php echo $categoria['id_categoria']; ?>"><?php echo $categoria['nombre_categoria']; ?></option>
                                                                                <?php } ?>

                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label" for="number"><span class="require">*</span>Precio venta</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="email" class="form-control" id="number" placeholder="Ingreso precio venta" require>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label" for="number"><span class="require">*</span>Prectio costo</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="email" class="form-control" id="number" placeholder="Ingrese precio costo" require>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label" for="number"><span class="require">*</span>Stock</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="email" class="form-control" id="number" placeholder="Ingrese existencia" require>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label" for="number"><span class="require">*</span>Stock critico</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="email" class="form-control" id="number" placeholder="Ingrese existencia criticas" require>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label" for="number"><span class="require">*</span>Descripcion</label>
                                                                        <div class="col-sm-10">
                                                                            <label for="exampleFormControlTextarea1" class="form-label"></label>
                                                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea require>
                                                                        </div>
                                                                    </div>
                                                                </fieldset>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary newsletter-btn" data-dismiss="modal">Cancelar</button>
                                                    <button type="button" class="newsletter-btn">Guardar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>C&oacute;digo de barras</th>
                                                    <th>Nombre</th>
                                                    <th>Precio</th>
                                                    <th>Stock</th>
                                                    <th>Categor&iacute;a</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($datos as $producto) { ?>
                                                    <tr>
                                                        <td><?php echo $producto['id_producto']; ?></td>
                                                        <td><?php echo $producto['nombre']; ?></td>
                                                        <td>$<?php echo $producto['precio_venta']; ?></td>
                                                        <td><?php echo $producto['stock']; ?></td>
                                                        <td><?php echo $producto['detalle_fk']; ?></td>
                                                        <td><a class="view" href="cart.html">
                                                                <i class="fas fa-bars"></i></a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>