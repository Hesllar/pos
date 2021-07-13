<?php if (isset($validation)) {   ?>
    <div class="alert alert-danger">
        <?php echo $validation->listErrors(); ?>
    </div>
<?php }
?>

<form class="form-horizontal " d-flex justify-content-center method="Post" action="<?php echo base_url() ?>/Proveedor/actualizarProveedor">
    <div class="modal-body d-flex justify-content-center">
        <div class="row  ">
            <div class="col-sm-12  ">

                <fieldset class="border border-dark universal-padding-border-edit">

                <h5>Datos Empresa</h5>
                    <div class=" form-group">
                        <label class="control-label" for="nombre_producto"><span class="require">*</span>Razon Social</label>
                        <input type="hidden" name="id_proveedor" value="<?php echo $datos['id_proveedor']; ?>">
                        <input type="hidden" name="id_usuario" value="<?php echo $datos['id_usuario']; ?>">
                        <input type="hidden" name="rut_usuario" value="<?php echo $datos['rut_usuario']; ?>">
                        <div class="col-sm-10">
                            <input type="text" value="<?php echo $datos['razon_social']; ?>" class="form-control" id="razon" name="razon" placeholder="Ingese razon social">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="marca"><span class="require">*</span>Rubro</label>
                        <div class="col-sm-10">
                            <input type="text" value="<?php echo $datos['rubro']; ?>" class="form-control" id="rubro" name="rubro" placeholder="Ingrese rubro">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="marca"><span class="require">*</span>Giro</label>
                        <div class="col-sm-10">
                            <input type="text" value="<?php echo $datos['giro']; ?>" class="form-control" id="giro" name="giro" placeholder="Ingrese giro">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label" for="number"><span class="require">*</span>Telefono</label>
                        <div class="col-sm-10">
                            <input type="number" value="<?php echo $datos['telefono']; ?>" class="form-control" id="telefono" name="telefono" placeholder="Ingreso telefono">
                        </div>
                    </div>
                    <h5>Datos Usuario</h5>
                    <div class="form-group">
                        <label class="control-label" for="number"><span class="require">*</span>Nombre de Usuario</label>
                        <div class="col-sm-10">
                            <input type="text" value="<?php echo $datos['nom_usuario']; ?>" class="form-control" id="nom_usuario" name="nom_usuario" placeholder="Ingrese nombre usuario">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="number"><span class="require">*</span>Email</label>
                        <div class="col-sm-10">
                            <input type="email" value="<?php echo $datos['email']; ?>" class="form-control" id="email" name="email" placeholder="Ingrese email">
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="control-label" for="number"><span class="require">*</span>Celular</label>
                        <div class="col-sm-10">
                            <input type="number" value="<?php echo $datos['celular']; ?>" class="form-control" id="celular" name="celular" placeholder="Ingrese celular">
                        </div>
                    </div>
 
                </fieldset>
                <div class="modal-footer d-flex justify-content-center">
                    <a href="<?php echo base_url() ?>/Proveedor"><button type="button" class="btn btn-secondary newsletter-btn" data-dismiss="modal">Cancelar</button></a>
                    </a><button type="submit" class="newsletter-btn">Guardar</button>
                </div>

            </div>

        </div>

    </div>

</form>