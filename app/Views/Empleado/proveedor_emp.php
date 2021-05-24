<div id="productos" class="tab-pane active">
    <h3>Proveedor</h3>
    <div class="d-flex justify-content-between margin-top 15">
        <!-- Botón para agregar proveedor-->
        <div class="pull-right">
            <button type="button" class="btn-submit" data-toggle="modal" data-target="#AgregarProveedor">
                +Agregar
            </button>
        </div>

        <div class="pull-right ">
            <a href=""> <button type="button" class="btn-submit">
                    Pro. eliminados </button> </a>

        </div>
    </div>


    <!-- Modal ingreso proveedor -->
    <div class="modal fade" id="AgregarProveedor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Datos del proveedor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form class="form-horizontal" id="agregarProveedorForm" method="Post" enctype="multipart/form-data" action="<?php echo base_url() ?>/Proveedor/insertarProveedor">
                    <?php csrf_field(); ?>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <fieldset>
                                    <div class=" form-row">
                                        <div class=" form-group col-md-6">
                                            <label for="rut">*Rut</label>
                                            <input type="number" class="form-control" id="rut" name="rut" placeholder="Ingese rut sin puntos">
                                            <label for="" id="lbRut"></label>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="dv">*Dv</label>
                                            <input type="text" class="form-control" id="dv" name="dv" placeholder="Ingese identificador unico">
                                            <label for="" id="lbDv"></label>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6" id="casilla_nombre">
                                            <label for="nombre">*Nombres</label>
                                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingese nombre">
                                            <label for="" id="lbNombre"></label>
                                        </div>
                                        <div class="form-group col-md-6" id="cailla_apellido">
                                            <label for="apellidos">*Apellidos</label>
                                            <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Ingrese apellidos">
                                            <label for="" id="lbApellido"></label>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="rubro">*Rubro Empresa</label>
                                            <input type="text" class="form-control" id="rubro" name="rubro" placeholder="Ingrese rubro">
                                            <label for="" id="lbCiudad"></label>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6" id="casilla_email">
                                            <label for="email">*Email</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="ejemplo@gmail.com">
                                            <label for="" id="lbCorreo"></label>
                                        </div>
                                        <div class="form-group col-md-6" id="casilla_celular">
                                            <label for="celular">*Celular</label>
                                            <input type="number" class="form-control" id="celular" name="celular" placeholder="Ingrese celular">
                                            <label for="" id="lbCelular"></label>
                                        </div>
                                    </div>
        
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="region">*Region</label>
                                            <select name="region" id="region" required>
                                                <option value="">Seleccione</option>
                                                <?php foreach ($region as $Region) { ?>
                                                    <option value="<?php echo $Region['id_region'] ?>"><?php echo $Region['nombre_region'] ?> </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="comuna">*Comuna</label>
                                            <select name="comuna" id="comuna" required>
                                                <option value="">Seleccione</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12" id="casilla_ciudad">
                                            <label for="ciudad">*Ciudad</label>
                                            <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="Ingrese ciudad">
                                            <label for="" id="lbCiudad"></label>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6" id="casilla_calle">
                                            <label for="calle">*Calle</label>
                                            <input type="text" class="form-control" id="calle" name="calle" placeholder="Ingrese calle">
                                            <label for="" id="lbCalle"></label>
                                        </div>
                                        <div class="form-group col-md-6" id="cailla_numero">
                                            <label for="numero">*Numero</label>
                                            <input type="number" class="form-control" id="numero" name="numero" placeholder="Ingrese numero">
                                            <label for="" id="lbNumero"></label>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12" id="casilla_nombr_usuario">
                                            <label for="nombre_usuario">*Nombre usuario</label>
                                            <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" placeholder="Ingrese nombre usuario">
                                            <label for="" id="lbNomUsuario"></label>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6" id="casilla_contraseña1">
                                            <label for="contraseña">*Contraseña</label>
                                            <input type="password" class="form-control" id="contraseña" name="contraseña" placeholder="Ingrese contraseña">
                                            <label for="" id="lbContraseña"></label>
                                        </div>
                                        <div class="form-group col-md-6" id="casilla_contraseña2">
                                            <label for="contraseña2">*Confirmar contraseña</label>
                                            <input type="password" class="form-control" id="contraseña2" name="contraseña2" placeholder="Ingrese contraseña">
                                            <label for="" id="lbContraseña2"></label>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="imagen">*Imagen Corporativa</label>
                                            <input type="file" class="form-control" id="imagen" name="imagen">
                                            <label for="" id="lbAvatar"></label>
                                        </div>
                                    </div>
                                    
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary newsletter-btn" id="botton1" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="newsletter-btn" value="enviar datos" onclick="success_toast()">Guardar</button>
                    </div>
                </form>

            </div>
        </div>

    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Id_proveedor</th>
                    <th>Rubro</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datos as $proveedor) { ?>
                    <tr>
                        <td><?php echo $proveedor['id_proveedor']; ?></td>
                        <td><?php echo $proveedor['rubro']; ?></td>
                        <td><a class="view" href=""> <i class="fa fa-pencil"></i></a>
                        </td>
                        <td><a class="view" data-href="" data-toggle="modal" data-target="#Eliminar">
                                <i class="fa fa-trash"></i></a>

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

<script src="<?php echo base_url() ?>/js/ajax-mail.js"></script>
<script src="<?php echo base_url(); ?>/js/vendor/jquery-3.6.0.min.js"></script>
<!-- Funcion que carga las comunas asignadas a cada region-->
<script>
    $(document).ready(function() {
        $('#region').change(function() {
            var ciudad_id = $('#region').val();

            var action = 'get_comuna';

            if (ciudad_id != '') {

                $.ajax({
                    url: "<?php echo base_url('/Comuna/action'); ?>",
                    method: "POST",
                    data: {
                        id_region: ciudad_id,
                        action: action
                    },
                    dataType: "JSON",
                    success: function(data) {
                        var html = '<option value="">Seleccione comuna</option>';
                        for (var count = 0; count < data.length; count++) {

                            html += '<option value="' + data[count].id_comuna + '">' + data[count].nombre_comuna + '</option>';
                        }
                        $('#comuna').html(html);
                    }
                });
            }

        });
    });
</script>
<!-- Fin Funcion que carga las comunas asignadas a cada region-->