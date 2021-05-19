<div id="usuarios" class="tab-pane <?php echo $e_usuario; ?>">
    <h3>Control de Usuarios </h3>
    <!-- Botón para agergar usuario-->
    <div class="pull-right">
        <a href="<?php echo  base_url() . '/Usuarios/pagNuevoUsuario' ?>">
            <button type="button" class="btn-submit">
                +Agregar
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
                <?php foreach ($usuarios as $usuario) { ?>
                    <tr>
                        <td><?php echo $usuario['nombres']; ?></td>
                        <td><?php echo $usuario['apellidos']; ?></td>
                        <td><?php echo $usuario['rut']; ?></td>
                        <td><?php echo $usuario['correo']; ?></td>
                        <td><?php echo $usuario['nivel_acceso']; ?></td>
                        <td><a class="view" href="<?php echo base_url() . '/Usuarios/editarUsuario/' . $usuario['id_usuario']; ?>"> <i class="fa fa-pencil"></i></a>
                        <td><a class="view" href="#"><i class="fa fa-trash"></i></a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>