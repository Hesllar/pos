<div id="usuarios" class="tab-pane <?php echo $e_usuario; ?>">
    <h3>Control de Usuarios </h3>
    <!-- Botón para agergar usuario-->
    <div class="pull-right">
        <button type="button" class="btn-submit" data-toggle="modal" data-target="#AgregarUsuario">
            +Agregar
        </button>
    </div>

    <!-- Modal ingreso usuario -->
    <div class="modal fade" id="AgregarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Datos Personales</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form-horizontal" method="Post" enctype="multipart/form-data">
                    <?php csrf_field(); ?>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">

                                <fieldset>
                                    <label class="control-label " for="nombre_producto"><span class="require">*</span>Rut</label>
                                    <div class="form-group d-flex">

                                        <div class="col-sm-5">
                                            <input type="number" class="form-control" id="rut" name="rut" placeholder="Ingese rut sin puntos">
                                        </div>
                                        <span>-</span>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="dv" name="dv" placeholder="Ingese identificador unico">
                                        </div>
                                    </div>
                                    <label class="control-label" for="nombre_producto"><span class="require">*</span>Nombres</label>
                                    <div class="form-group d-flex">
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" placeholder="Ingese nombre">
                                        </div>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Ingrese apellidos">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="number"><span class="require">*</span>Celular</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" id="celular" name="celular" placeholder="Ingreso celular">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="number"><span class="require">*</span>Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese email">
                                            <label for="" id="lbStock"></label>
                                        </div>
                                    </div>
                                    <p> ¿Es empresa?</p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="si">
                                        <label class="form-check-label" for="si">
                                            Si
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="no" checked>
                                        <label class="form-check-label" for="no">
                                            No
                                        </label>
                                    </div>
                                    <br>
                                    <h4>Dirección</h4>
                                    <br>
                                    <div class="form-group">
                                        <label class="control-label" for="natural_juridico"><span class="require">*</span>Región</label>
                                        <div class=" checkbox-form col-sm-10">
                                            <select name="region" id="region" require>
                                                <option value="0" required>Seleccione</option>
                                                <?php foreach ($region as $Region) { ?>
                                                    <option value="<?php echo $Region['id_region'] ?>" required><?php echo $Region['nombre_region'] ?> </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="natural_juridico"><span class="require">*</span>Comuna</label>
                                        <div class=" checkbox-form col-sm-10">
                                            <select name="comuna" id="comuna" require>
                                                <option value="0" required>Seleccione</option>
                                                <?php foreach ($region as $Region) { ?>
                                                    <option value="<?php echo $Region['id_region'] ?>" required><?php echo $Region['nombre_region'] ?> </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <label class="control-label" for="number"><span class="require">*</span>Ciudad</label>
                                    <div class="form-group d-flex">
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="Ingrese ciudad">
                                        </div>
                                    </div>
                                    <label class="control-label" for="number"><span class="require">*</span>Calle</label>
                                    <div class="form-group d-flex">
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="calle" name="calle" placeholder="Ingrese calle">
                                        </div>
                                        <div class="col-sm-5">
                                            <input type="number" class="form-control" id="numero" name="numero" placeholder="Ingrese numero">
                                        </div>
                                    </div>
                                    <h4>Datos usuario</h4>
                                    <br>
                                    <label class="control-label" for="number"><span class="require">*</span>Nombre usuario</label>
                                    <div class="form-group d-flex">
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="calle" name="calle" placeholder="Ingrese nombre usuario">
                                        </div>
                                    </div>
                                    <label class="control-label" for="number"><span class="require">*</span>Contraseña</label>
                                    <div class="form-group d-flex">
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="calle" name="calle" placeholder="Ingrese contraseña">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="nivel_acceso"><span class="require">*</span>Nivel de acceso</label>
                                        <div class=" checkbox-form col-sm-10">
                                            <select name="nivel_acceso" required>
                                                <option value="nivel_acceso" required>Selecciones</option>
                                                <?php foreach ($nvl_acceso as $nvl) { ?>
                                                    <option value="<?php echo $nvl['id_nivel']; ?>"><?php echo $nvl['nivel_acceso']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>


                                </fieldset>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary newsletter-btn" id="botton1" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="newsletter-btn" onclick="success_toast()">Guardar</button>
                    </div>
            </div>
            </form>

        </div>

    </div>
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
                        <td><a class="view" href="#"><i class="fa fa-pencil"></i></a></td>
                        <td><a class="view" href="#"><i class="fa fa-trash"></i></a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>