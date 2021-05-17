<?php if (isset($validation)) {   ?>
    <div class="alert alert-danger">
        <?php echo $validation->listErrors(); ?>
    </div>
<?php }
?>
<input type="hidden" value="<?php echo $datos['id_usuario']; ?> " name="id_producto">
<div class="d-flex justify-content-center ">
    <form class="border border-dark universal-padding-border-edit" method="POST" enctype="multipart/form-data" action="<?php echo base_url() ?>/Usuarios/insertar">
        <div class=" form-row ">
            <div class=" form-group col-md-6">
                <label for="inputEmail4">*Rut</label>
                <input type="number" class="form-control" id="rut" name="rut" placeholder="Ingese rut sin puntos">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">*Dv</label>
                <input type="text" class="form-control" id="dv" name="dv" placeholder="Ingese identificador unico">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputAddress">*Nombres</label>
                <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" placeholder="Ingese nombre">
            </div>
            <div class="form-group col-md-6">
                <label for="inputAddress2">*Apellidos</label>
                <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Ingrese apellidos">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">*Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese email">
            </div>
            <div class="form-group col-md-6">
                <label for="inputState">*Celular</label>
                <input type="number" class="form-control" id="celular" name="celular" placeholder="Ingreso celular">
            </div>
        </div>
        <div class="form-group">
            <p> ¿Es empresa?</p>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="juridico" id="juridico" value="1">
                Si
                <br>
                <input class="form-check-input" type="radio" name="juridico" id="juridico" value="0">
                No
            </div>
            <div class="form-check">
            </div>
        </div>
        <div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputState">*Region</label>
                <select name="region" id="region" require>
                    <option value="0" required>Seleccione</option>
                    <?php foreach ($region as $Region) { ?>
                        <option value="<?php $Region['id_region'] ?>" required><?php echo $Region['nombre_region'] ?> </option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputState">*Comuna</label>
                <select name="comuna" id="comuna" require>
                    <option value="0" required>Seleccione</option>
                    <?php foreach ($comuna as $comunas) { ?>
                        <option value="<?php echo $comunas['id_comuna'] ?>" required><?php echo $comunas['nombre_comuna'] ?> </option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputState">*Ciudad</label>
                <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="Ingrese ciudad">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputState">*Calle</label>
                <input type="text" class="form-control" id="calle" name="calle" placeholder="Ingrese calle">
            </div>
            <div class="form-group col-md-6">
                <label for="inputState">*Numero</label>
                <input type="number" class="form-control" id="numero" name="numero" placeholder="Ingrese numero">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputState">*Nombre usuario</label>
                <input type="text" class="form-control" id="nom_usuario" name="nom_usuario" placeholder="Ingrese nombre usuario">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputState">*Contraseña</label>
                <input type="text" class="form-control" id="contraseña" name="contraseña" placeholder="Ingrese contraseña">
            </div>
            <div class="form-group col-md-6">
                <label for="inputState">*Confirmar contraseña</label>
                <input type="text" class="form-control" id="contraseña2" name="contraseña2" placeholder="Ingrese contraseña">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputState">*Imagen</label>
                <input type="file" class="form-control" id="imagen" name="imagen">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="nivel_acceso">*Nivel de acceso</label>
                <select name="nivel_acceso" id="nivel_acceso" required>
                    <option value="0" required>Selecciones</option>
                    <?php foreach ($nvl_acceso as $nvl) { ?>
                        <option value="<?php echo $nvl['id_nivel']; ?>"><?php echo $nvl['nivel_acceso']; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <a href="<?php echo base_url() ?>/Usuarios"><button type="button" class="btn btn-secondary newsletter-btn" data-dismiss="modal">Cancelar</button></a>
        <button type="submit" class="newsletter-btn" onclick="success_toast()">Guardar</button>
    </form>
</div>