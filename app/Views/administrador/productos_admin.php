                                <div id="productos" class="tab-pane active">
                                    <h3>Productos</h3>
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
                                            <?php  foreach ($datos as $producto) { ?>
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