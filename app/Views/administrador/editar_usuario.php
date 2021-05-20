<?php if (isset($validation)) {   ?>
    <div class="alert alert-danger">
        <?php echo $validation->listErrors(); ?>
    </div>
<?php }
?>

<div class="d-flex justify-content-center ">
    <form class="border border-dark universal-padding-border-edit" method="POST" enctype="multipart/form-data" action="<?php echo base_url() ?>/Usuarios/actualizarUsuario">
        <input type="hidden" value="<?php echo $datos['id_usuario']; ?> " name="id_usuario">
        <input type="hidden" value="<?php echo $datos['rut_fk']; ?> " name="rut_fk">
        <!--<div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputAddress">*Nombres</label>
                <input type="text" class="form-control" id="nombre" value="<?php echo $dtsPerso['nombres']; ?>" name="nombre" placeholder="Ingese nombre">
            </div>
            <div class="form-group col-md-6">
                <label for="inputAddress2">*Apellidos</label>
                <input type="text" class="form-control" id="apellidos" value="<?php echo $dtsPerso['apellidos']; ?>" name="apellidos" placeholder="Ingrese apellidos">
            </div>
        </div>-->
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">*Email</label>
                <input type="email" class="form-control" id="email" value="<?php echo $dtsPerso['correo']; ?>" name="email" placeholder="Ingrese email">
            </div>
            <div class="form-group col-md-6">
                <label for="inputState">*Celular</label>
                <input type="number" class="form-control" id="celular" value="<?php echo $dtsPerso['celular']; ?>" name="celular" placeholder="Ingreso celular">
            </div>
        </div>

        <!--<div class="form-group">
            <p> ¿Es empresa?</p>
            <div class="form-check">
                <?php if ($dtsPerso['juridico'] == 1) { ?>
                    <input class="form-check-input" type="radio" name="juridico" id="juridico" value="1" checked>
                    Si
                    <br>
                    <input class="form-check-input" type="radio" name="juridico" id="juridico" value="0">
                    No
                <?php } else { ?>
                    <input class="form-check-input" type="radio" name="juridico" id="juridico" value="1">
                    Si
                    <br>
                    <input class="form-check-input" type="radio" name="juridico" id="juridico" value="0" checked>
                    No


                <?php }
                ?>
            </div>
            <div class="form-check">
            </div>
        </div>-->
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputState">*Nombre usuario</label>
                <input type="text" class="form-control" id="nombre_usuario" value="<?php echo $datos['nom_usuario']; ?>" name="nombre_usuario" placeholder="Ingrese nombre usuario">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputState">*Contraseña</label>
                <input type="password" class="form-control" id="contraseña" value="<?php echo $datos['contrasena']; ?>" name="contraseña" placeholder="Ingrese contraseña">
            </div>
            <div class="form-group col-md-6">
                <label for="inputState">*Confirmar contraseña</label>
                <input type="password" class="form-control" id="contraseña2" value="<?php echo $datos['contrasena']; ?>" name="contraseña2" placeholder="Ingrese contraseña">
            </div>
        </div>
        <!--<div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputState">*Imagen</label>
                <input type="file" class="form-control" value="<?php echo $datos['avatar']; ?>" id="imagen" name="imagen">
                <img class="primary-img" src="<?php echo base_url() . '/img/Usuarios/' . $datos['avatar']; ?>" alt="imagen">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputState">*Region</label>
                <select name="region" id="region" require>
                    <option value="0" required>Seleccione</option>
                    <?php foreach ($region as $Region) {
                        if ($Region['id_region'] == $dtsPerso['region']) {
                            echo "<option value='"
                                . $Region['id_region'] . "' selected >" . $Region['nombre_region'] . "</option>";
                        } else {
                            echo "<option value='"
                                . $Region['id_region'] . "'>" . $Region['nombre_region'] . "</option>";
                        } ?>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputState">*Comuna</label>
                <select name="comuna" id="comuna" require>
                    <option value="0" required>Seleccione</option>
                    <?php foreach ($comunaAll as $comunas) {
                        if ($comunas['id_comuna'] == $dtsPerso['comuna']) {
                            echo "<option value='"
                                . $comunas['id_comuna'] . "' selected >" . $comunas['nombre_comuna'] . "</option>";
                        } else {
                            echo "<option value='"
                                . $comunas['id_comuna'] . "'>" . $comunas['nombre_comuna'] . "</option>";
                        } ?>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputState">*Ciudad</label>
                <input type="text" class="form-control" id="ciudad" value="<?php echo $dtsPerso['ciudad']; ?>" name="ciudad" placeholder="Ingrese ciudad">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputState">*Calle</label>
                <input type="text" class="form-control" id="calle" name="calle" value="<?php echo $dtsPerso['calle']; ?>" placeholder="Ingrese calle">
            </div>
            <div class="form-group col-md-6">
                <label for="inputState">*Numero</label>
                <input type="number" class="form-control" id="numero" value="<?php echo $dtsPerso['numero']; ?>" name="numero" placeholder="Ingrese numero">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="nivel_acceso">*Nivel de acceso</label>
                <select name="nivel_acceso" id="nivel_acceso" required>
                    <option value="0" required>Selecciones</option>
                    <?php foreach ($nivel_all as $nvl) {
                        if ($nvl['id_nivel'] == $nivel_fk['id_nivel']) {
                            echo "<option value='"
                                . $nvl['id_nivel'] . "' selected >" . $nvl['nivel_acceso'] . "</option>";
                        } else {
                            echo "<option value='"
                                . $nvl['id_nivel'] . "'>" . $nvl['nivel_acceso'] . "</option>";
                        } ?>

                    <?php } ?>
                </select>
            </div>
        </div>-->
        <a href="<?php echo base_url() ?>/Usuarios"><button type="button" class="btn btn-secondary newsletter-btn" data-dismiss="modal">Cancelar</button></a>
        <button type="submit" class="newsletter-btn" onclick="success_toast()">Guardar</button>
    </form>
</div>