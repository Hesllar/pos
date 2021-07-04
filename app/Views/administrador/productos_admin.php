<div id="productos" class="tab-pane active">
    <h3>Productos</h3>
    <div class="d-flex justify-content-between margin-top 15">
        <!-- Botón para agergar productos-->
        <div class="pull-right">
            <button type="button" class="btn-submit" data-toggle="modal" data-target="#AgregarProducto">
                <i class="fa fa-plus"></i>
                Agregar
            </button>
        </div>
        <!-- Botón para agergar categoria-->
        <div class="pull-right ">
            <button type="button" class="btn-submit" data-toggle="modal" data-target="#categoria">
                <i class="fa fa-list-ol"></i>
                Categoria
            </button>
        </div>
        <!-- Botón para ir a la pagina de productos eliminados -->
        <div class="pull-right ">
            <a href="<?php echo base_url(); ?>/productosadmin/pagEliminarPro">
                <button type="button" class="btn-submit">
                    <i class="fa fa-trash"></i>
                    Pro. eliminados
                </button>
            </a>
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
                <form class="form-horizontal" method="Post" action="<?php echo base_url() ?>/productosadmin/NuevaCategoria">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <fieldset>
                                    <div class="form-group">
                                        <label class="control-label" for="nombre_categoria"><span class="require">*</span>Nombre categoria</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="nombre_categoria" name="nombre_categoria" placeholder="Ingrese nombre categoria" required>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="newsletter-btn" data-dismiss="modal">Cancelar</button>
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

                <form class="form-horizontal" id="agregarProductoForm" method="Post" enctype="multipart/form-data" action="<?php echo base_url() ?>/productosadmin/NuevoProducto">
                    <?php csrf_field(); ?>
                    <div class="modal-body">
                        <div class="container">
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <fieldset class="field-config">
                                    <div class="col-sm-4">
                                            <label class="control-label" for="nombre_producto"><span class="require">*</span>Nombre producto</label>
                                            <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" placeholder="Ingese nombre producto">
                                            <label for="" id="lbNomPro"></label>
                                    </div>
                                    <div class="col-sm-4">
                                            <label class="control-label" for="marca"><span class="require">*</span>Marca</label>
                                            <input type="text" class="form-control" id="marca" name="marca" placeholder="Ingrese nombre marca">
                                            <label for="" id="lbMarca"></label>
                                    </div>
                                    <div class="col-sm-4">
                                            <label class="control-label" for="categoria"><span class="require">*</span>Categoria</label>
                                            <div class=" checkbox-form">
                                                <select id="categoria" name="categoria" class="form-control" required>
                                                    <option value="">Seleccione</option>
                                                    <?php foreach ($categorias as $categoria) { ?>
                                                        <option value="<?php echo $categoria['id_categoria']; ?>"><?php echo $categoria['nombre_categoria']; ?></option>
                                                    <?php } ?>

                                                </select>
                                                <label for="" id="lbCategoria"></label>
                                        </div>
                                    </div>

                                    <div class="col-sm-9">
                                            <label class="control-label" for="number"><span class="require">*</span>Im&aacute;gen del producto</label>
                                            <img src="" class="img-responsive" />
                                            <input type="file" class="form-control" id="imagen" name="imagen">
                                            <label for="" id="lbImagen"></label>
                                    </div>
                                    <div class="col-sm-4">
                                            <label class="control-label" for="number"><span class="require">*</span>Precio venta</label>
                                            <input type="number" class="form-control" id="precio_venta" name="precio_venta" placeholder="Ingreso precio venta" min="0" max="9999999">
                                            <label for="" id="lbPreVenta"></label>
                                    </div>
                                    <div class="col-sm-4">
                                            <label class="control-label" for="number"><span class="require">*</span>Prectio costo</label>
                                            <input type="number" class="form-control" id="precio_costo" name="precio_costo" placeholder="Ingrese precio costo" min="0" max="9999999">
                                            <label for="" id="lbPreCosto"></label>
                                    </div>
                                    <div class="col-sm-4">
                                            <label class="control-label" for="number"><span class="require">*</span>Fecha de vencimiento</label>
                                            <input type="date" class="form-control" id="fecha_vencimiento" name="fecha_vencimiento" placeholder="Fecha de vencimiento">
                                            <label for="" id="lbFecNacimiento"></label>
                                    </div>
                                    <div class="col-sm-4">
                                            <label class="control-label" for="number"><span class="require">*</span>Stock</label>
                                            <input type="number" class="form-control" id="stock" name="stock" placeholder="Ingrese existencia" min="1" max="999">
                                            <label for="" id="lbStock"></label>
                                    </div>
                                    <div class="col-sm-4">
                                            <label class="control-label" for="number"><span class="require">*</span>Stock critico</label>
                                            <input type="number" class="form-control" id="stock_critico" name="stock_critico" placeholder="Ingrese existencia criticas"  min="0" max="500">
                                            <label for="" id="lbStockCri"></label>
                                    </div>
                                    <div class="col-sm-12">
                                            <label class="control-label" for="number"><span class="require">*</span>Descripci&oacute;n</label>
                                            <label for="descripcion" class="form-label"></label>
                                            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" maxlength="190"></textarea>
                                            <label for="" id="lbDescri"></label>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="newsletter-btn" data-dismiss="modal">Cancelar</button>
                        <button id="succes_produc" type="submit" class="newsletter-btn" value="enviar datos">Guardar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div id="respuesta"></div>
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
                        <td><?php echo $producto['precio_venta']; ?></td>
                        <td><?php echo $producto['stock']; ?></td>
                        <td><?php echo $producto['categoria']; ?></td>
                        <td>
                            <a class="view" href="<?php echo base_url() . '/productosadmin/editar/' . $producto['id_producto']; ?>">
                                <i class="fa fa-pencil"></i>
                            </a>
                        </td>
                        <td>
                            <a href="#" class="view rojo" data-href="<?php echo base_url() . '/productosadmin/eliminarProducto/' . $producto['id_producto']; ?>" data-toggle="modal" data-target="#Eliminar">
                                <i class="fa fa-trash"></i>
                            </a>
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
<script src="<?php echo base_url(); ?>/js/vendor/jquery-3.6.0.min.js"></script>
<script>
    $("#agregarProductoForm").submit(function(e) {
        var fun = "funregistrar";
        var nomProducto = $("#nombre_producto").val();
        var marca = $("#marca").val();
        var precVenta = $("#precio_venta").val();
        var precCosto = $("#precio_costo").val();
        var stock = $("#stock").val();
        var stockCritico = $("#stock_critico").val();
        var descri = $("#descripcion").val();
        var img = $("#imagen").val();

        if (nomProducto == '') {
            setTimeout(function() {
                $("#lbNomPro").html("<span style='color:red;'> Complete el campo nombre producto </span>").fadeOut(10000);
            }, 0);

            $("#nombre_producto").focus();
            return false;
        } else if (marca == '') {
            setTimeout(function() {
                $("#lbMarca").html("<span style='color:red;'> Complete el campo marca </span>").fadeOut(10000);
            }, 0);

            $("#marca").focus();
            return false;
        } else if (precVenta == '') {
            setTimeout(function() {
                $("#lbPreVenta").html("<span style='color:red;'> Complete el campo precio venta </span>").fadeOut(10000);
            }, 0);

            $("#precio_venta").focus();
            return false;
        } else if (precCosto == '') {
            setTimeout(function() {
                $("#lbPreCosto").html("<span style='color:red;'> complete el campo precio costo </span>").fadeOut(10000);
            }, 0);

            $("#precio_costo").focus();
            return false;
        } else if (stock == '') {
            setTimeout(function() {
                $("#lbStock").html("<span style='color:red;'> complete el campo stock </span>").fadeOut(10000);
            }, 0);

            $("#stock").focus();
            return false;
        } else if (stockCritico == '') {
            setTimeout(function() {
                $("#lbStockCri").html("<span style='color:red;'> complete el campo stock critico </span>").fadeOut(10000);
            }, 0);

            $("#stock_critico").focus();
            return false;
        } else if (img == '') {
            setTimeout(function() {
                $("#lbImagen").html("<span style='color:red;'> complete el campo de imagen </span>").fadeOut(10000);
            }, 0);

            $("#imagen").focus();
            return false;
        } else if (descri == '') {
            setTimeout(function() {
                $("#lbDescri").html("<span style='color:red;'> complete el campo descripción </span>").fadeOut(10000);
            }, 0);

            $("#descripcion").focus();
            return false;
        } else {
            $.ajax({
                url: "<?php echo base_url(); ?>/productosadmin/NuevoProducto",
                method: "POST",
                data: {
                    "funcion": fun,
                    "nombres": nomProducto,
                    "marca": marca,
                    "precVenta": precVenta,
                    "precCosto": precCosto,
                    "stock": stock,
                    "stockCritico": stockCritico,
                    "descri": descri,
                    "imagen": img,
                },
                success: function(data) {
                    console.log(data);
                }
            });
        }
    });
</script>