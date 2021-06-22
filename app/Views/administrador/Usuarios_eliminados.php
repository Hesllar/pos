<div id="usuarios" class="tab-pane">
    <h3> Usuarios de Baja </h3>
    <!-- Botón para agergar usuario-->
    <div class="pull-right">
        <a href="<?php echo base_url(); ?>/Usuarios/">
            <button type="button" class="btn-submit">
                Volver
            </button></a>
    </div>

    <!-- Modal ingreso usuario -->
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>RUT</th>
                    <th>Correo</th>
                    <th>Tipo de Usuario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datos as $usuario) { ?>
                    <tr>
                        <td><?php echo $usuario['nombres']; ?></td>
                        <td><?php echo $usuario['apellidos']; ?></td>
                        <td><?php echo $usuario['rut']; ?></td>
                        <td><?php echo $usuario['correo']; ?></td>
                        <td><?php echo $usuario['nivel_acceso']; ?></td>
                        <td><a class="view" href="<?php echo base_url() . '/Usuarios/reingresarUsuario/' . $usuario['id_usuario']; ?>"> <i class="fa fa-upload"></i></i></a>
                        </td>
                        <td><a class="view" href="#"><i class="fa fa-trash"></i></a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>