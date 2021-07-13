<div id="usuarios" class="tab-pane">
    <h3> Proveedores Dados de Baja </h3>
    <!-- Botón para agergar usuario-->
    <div class="pull-right">
        <a href="<?php echo base_url(); ?>/Proveedor">
            <button type="button" class="btn-submit">
                Volver
            </button></a>
    </div>

    <!-- Modal ingreso usuario -->
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Nombre de Usuario</th>
                    <th>Rut Empresa</th>
                    <th>DV Empresa</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datos as $usuario) { ?>
                    <tr>
                        <td><?php echo $usuario['Nombre']; ?></td>
                        <td><?php echo $usuario['Apellido']; ?></td>
                        <td><?php echo $usuario['Nombre_Usuario']; ?></td>
                        <td><?php echo $usuario['Rut_Empresa']; ?></td>
                        <td><?php echo $usuario['DV_Empresa']; ?></td>
                        <td><a class="view" href="<?php echo base_url() . '/Usuarios/reingresarUsuario/' . $usuario['id_usuario']; ?>"> <i class="fa fa-upload"></i></i></a>
                        </td>
                        <td><a class="view" href="#"><i class="fa fa-trash"></i></a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>