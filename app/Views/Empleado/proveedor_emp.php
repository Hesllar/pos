                                <div id="productos" class="tab-pane active">
                                    <h3>Proveedor</h3>
                                    <div class="d-flex justify-content-between margin-top 15">
                                        <div class="pull-right">
                                            <button type="button" class="btn-submit" data-toggle="modal" data-target="#AgregarProducto">
                                                +Agregar
                                            </button>
                                        </div>

                                        <div class="pull-right ">
                                            <a href=""> <button type="button" class="btn-submit">
                                                    Pro. eliminados </button> </a>

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

                                                <form class="form-horizontal" method="Post" enctype="multipart/form-data" action="">
                                                    <?php csrf_field(); ?>

                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-sm-12">

                                                                <fieldset>
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
                                                    <th>Id_proveedor</th>
                                                    <th>Rubro</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($datos as $proveedor) { ?>
                                                    <tr>
                                                        <td><?php echo $proveedor['id_proveedor']; ?></td>
                                                        <td><?php echo $proveedor['rubro']; ?></td>
                                                        <td><a class="view" href=""
                                                         > <i class="fa fa-pencil"></i></a>
                                                        </td>
                                                        <td><a class="view" data-href=""
                                                            data-toggle="modal" data-target="#Eliminar">
                                                                <i class="fa fa-trash"></i></a>
    
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