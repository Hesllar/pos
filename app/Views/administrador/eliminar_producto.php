 <div id="productos" class="tab-pane active ">
     <h3>Productos Eliminados</h3>
     <br>
     <div class="pull-mediun ">
         <a href="<?php echo base_url(); ?>/productosadmin/"> <button type="button" class="btn-submit">
                 Volver
             </button>
         </a>
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
                         <td><?php echo $producto['precio_venta']; ?></td>
                         <td><?php echo $producto['stock']; ?></td>
                         <td><?php echo $producto['categoria']; ?></td>
                         <td><a class="view" href="<?php echo base_url() . '/productosadmin/reingresarProd/' . $producto['id_producto']; ?>"> <i class="fa fa-upload"></i></i></a>
                         </td>
                         <td><a class="view" data-href="<?php echo base_url() . '/productosadmin/eliminar/' . $producto['id_producto']; ?>" data-toggle="modal" data-target="#Eliminar" data-placement="top">
                                 <i class="fa fa-trash"></i></a>
                         </td>
                     </tr>
                 <?php } ?>
             </tbody>
         </table>
     </div>
 </div>
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