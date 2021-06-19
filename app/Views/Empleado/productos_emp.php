                                <div id="productos" class="tab-pane active">
                                    <h3>Productos</h3>
                                    <div class="d-flex justify-content-between margin-top 15">
                                        <div class="pull-right">
                                            <button type="button" class="btn-submit" data-toggle="modal" data-target="#AgregarProducto">
                                                +Agregar
                                            </button>
                                        </div>
                                        <div class="pull-right ">
                                            <button type="button" class="btn-submit" data-toggle="modal" data-target="#categoria">
                                                +Categoria
                                            </button>
                                        </div>

                                    </div>


                                    <!-- Modal ingresar categoria -->
                                    <div class="modal fade" id="categoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Datos categoria</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form class="form-horizontal" method="Post" action="<?php echo base_url() ?>/productosadmin/NuevaCategoriaEmp">
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-sm-12">

                                                                <fieldset>
                                                                    <div class="form-group">
                                                                        <label class="control-label" for="nombre_categoria"><span class="require">*</span>Nombre categoria</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" class="form-control" id="nombre_categoria" name="nombre_categoria" placeholder="Ingrese nombre categoria">
                                                                        </div>
                                                                    </div>
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary newsletter-btn" data-dismiss="modal">Cancelar</button>
                                                        <button type="submit" class="newsletter-btn">Guardar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- Modal ingreso producto -->
                                    <div class="modal fade" id="AgregarProducto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Datos del producto</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <?php if (isset($validation)) {   ?>
                                                    <div class="alert alert-danger">
                                                        <?php echo $validation->listErrors(); ?>
                                                    </div>
                                                <?php }
                                                ?>

                                                <form class="form-horizontal" method="Post" enctype="multipart/form-data" action="<?php echo base_url() ?>/productosadmin/NuevoProductoEmp">
                                                    <?php csrf_field(); ?>

                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-sm-12">

                                                                <fieldset>
                                                                    <div class="form-group">
                                                                        <label class="control-label" for="nombre_producto"><span class="require">*</span>Codigo de barra</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" class="form-control" id="Codigo_barra" name="Codigo_barra" placeholder="Ingese nombre producto">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label" for="nombre_producto"><span class="require">*</span>Nombre producto</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" placeholder="Ingese nombre producto" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label" for="marca"><span class="require">*</span>Marca</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" class="form-control" id="marca" name="marca" placeholder="Ingrese nombre marca" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label" for="categoria"><span class="require">*</span>Categoria</label>
                                                                        <div class=" checkbox-form col-sm-10">
                                                                            <select name="categoria" id="categoria" require>
                                                                                <option value="categoria" required>Selecciones</option>
                                                                                <?php foreach ($categorias as $categoria) { ?>
                                                                                    <option value="<?php echo $categoria['id_categoria']; ?>"><?php echo $categoria['nombre_categoria']; ?></option>
                                                                                <?php } ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-sm-10">
                                                                            <img src="" class="img-responsive" />
                                                                            <input type="file" class="form-control" id="imagen" name="imagen" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label" for="number"><span class="require">*</span>Precio venta</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="number" class="form-control" id="precio_venta" name="precio_venta" placeholder="Ingreso precio venta">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label" for="number"><span class="require">*</span>Prectio costo</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="number" class="form-control" id="precio_costo" name="precio_costo" placeholder="Ingrese precio costo" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label" for="number"><span class="require">*</span>Fecha de vencimiento</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="date" class="form-control" id="fecha_vencimiento" name="fecha_vencimiento" placeholder="Fecha de vencimiento" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label" for="number"><span class="require">*</span>Stock</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="number" class="form-control" id="stock" name="stock" placeholder="Ingrese existencia" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label" for="number"><span class="require">*</span>Stock critico</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="number" class="form-control" id="stock_critico" name="stock_critico" placeholder="Ingrese existencia criticas" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label" for="number"><span class="require">*</span>Descripcion</label>
                                                                        <div class="col-sm-10">
                                                                            <label for="descripcion" class="form-label"></label>
                                                                            <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea required>
                                                                        </div>
                                                                    </div>
                                                                </fieldset>
                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary newsletter-btn" id="botton1" data-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="newsletter-btn"  onclick="success_toast()">Guardar</button>
                                                </div>
                                                 </form>
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
                                                        <td><?php echo $producto['categoria']; ?></td>
                                                        <td><a class="view" href="<?php echo base_url() . '/productosadmin/editarEmp/' . $producto['id_producto']; ?>"
                                                         > <i class="fa fa-pencil"></i></a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- Modal -->
<div class="modal fade" id="Eliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>¿Desea dar de baja este producto?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <a class="btn btn-danger btn-ok">Aceptar</a>
      </div>
    </div>
  </div>
</div>