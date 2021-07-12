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
            <a href="<?php echo base_url()?>/Proveedor/pagProveedorDadoBaja"> <button type="button" class="btn-submit">
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

                                    <h5>Datos empresa</h5>
                                    <br>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="rubro">*Rut empresa</label>
                                            <input type="number" class="form-control" id="rut_emp" name="rut_emp" placeholder="Ingrese rut empresa">
                                            <label for="" id="lbRutEmp"></label>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="rubro">*Dv</label>
                                            <input type="text" class="form-control" id="dv_emp" name="dv_emp" placeholder="Ingrese dv">
                                            <label for="" id="lbDvEmp"></label>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="rubro">*Rubro</label>
                                            <input type="text" class="form-control" id="rubro" name="rubro" placeholder="Ingrese rubro">
                                            <label for="" id="lbRubroEmp"></label>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="rubro">*Razón social</label>
                                            <input type="text" class="form-control" id="razon" name="razon" placeholder="Ingrese giro">
                                            <label for="" id="lbRazonEmp"></label>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="rubro">°Teléfono</label>
                                            <input type="number" class="form-control" id="telefono" name="telefono" placeholder="Ingrese teléfono">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="rubro">*Giro</label>
                                            <input type="text" class="form-control" id="giro" name="giro" placeholder="Ingrese giro">
                                            <label for="" id="lbGiroEmp"></label>
                                        </div>
                                    </div>
                                    <h5>Dirección</h5>
                                    <br>
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
                                            <label for="" id="lbValidContraseña"></label>
                                            <label for="" id="lbContraseña2"></label>
                                        </div>
                                    </div>
                                    <div class=" form-row">
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
                    <th>Rut empresa</th>
                    <th>Razón social</th>
                    <th>Giro</th>
                    <th>Rubro</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datos as $proveedor) { ?>
                    <tr>
                        <td><?php echo $proveedor['rut_emp']; ?></td>
                        <td><?php echo $proveedor['razon']; ?></td>
                        <td><?php echo $proveedor['giro']; ?></td>
                        <td><?php echo $proveedor['rubro']; ?></td>
                        <td><a class="view" href="<?php echo base_url().'/Proveedor/pagEditarProveedor/'.$proveedor['id_proveedor']?>"> <i class="fa fa-pencil"></i></a>
                        </td>
                        <td><a class="view" data-href="<?php echo base_url().'/Proveedor/ProveedorDadoBaja/'.$proveedor['id_usuario']?> " data-toggle="modal" data-target="#Eliminar">
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
                <h5 class="modal-title" id="exampleModalLabel">Eliminar proveedor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¿Desea dar de baja este proveedor?</p>
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

<!-- Funcion para validar los campos del formulario registro proveedor-->
<script>
    $("#agregarProveedorForm").submit(function(e) {
        var fun = "funregistrar";
        var rut = $("#rut").val();
        var dv = $("#dv").val();
        var nombres = $("#nombre").val();
        var apellidos = $("#apellidos").val();
        var correo = $("#email").val();
        var celular = $("#celular").val();
        var juridico = $("#juridico").val();
        var ciudad = $("#ciudad").val();
        var calle = $("#calle").val();
        var numero = $("#numero").val();
        var nom_usuario = $("#nombre_usuario").val();
        var contraseña = $("#contraseña").val();
        var contraseña2 = $("#contraseña2").val();
        var avatar = $("#imagen").val();
        var rutEmp = $("#rut_emp").val();
        var dvEmp = $("#dv_emp").val();
        var rubro = $("#rubro").val();
        var razon = $("#razon").val();
        var giro = $("#giro").val();



        if (rut == '') {
            setTimeout(function() {
                $("#lbRut").html("<span style='color:red;'> Complete el campo rut </span>").fadeOut(10000);
            }, 0);

            $("#rut").focus();
            return false;

        } else if (dv == '') {
            setTimeout(function() {
                $("#lbDv").html("<span style='color:red;'> Complete el campo dv </span>").fadeOut(10000);
            }, 0);

            $("#dv").focus();
            return false;
        } else if (nombres == '') {
            setTimeout(function() {
                $("#lbNombre").html("<span style='color:red;'> Complete el campo nombre</span>").fadeOut(10000);
            }, 0);

            $("#nombre").focus();
            return false;
        } else if (apellidos == '') {
            setTimeout(function() {
                $("#lbApellido").html("<span style='color:red;'> Complete el campo apellido </span>").fadeOut(10000);
            }, 0);

            $("#apellidos").focus();
            return false;
        } else if (correo == '') {
            setTimeout(function() {
                $("#lbCorreo").html("<span style='color:red;'> complete el campo correo </span>").fadeOut(10000);
            }, 0);

            $("#email").focus();
            return false;
        } else if (celular == '') {
            setTimeout(function() {
                $("#lbCelular").html("<span style='color:red;'> complete el celular </span>").fadeOut(10000);
            }, 0);

            $("#celular").focus();
            return false;
        } else if (rutEmp == '') {
            setTimeout(function() {
                $("#lbRutEmp").html("<span style='color:red;'> complete el campo rut empresa </span>").fadeOut(10000);
            }, 0);

            $("#rut_emp").focus();
            return false;
        } else if (dvEmp == '') {
            setTimeout(function() {
                $("#lbDvEmp").html("<span style='color:red;'> complete el campo dv empresa </span>").fadeOut(10000);
            }, 0);

            $("#dv_emp").focus();
            return false;
        } else if (rubro == '') {
            setTimeout(function() {
                $("#lbRubroEmp").html("<span style='color:red;'> complete el campo rubro </span>").fadeOut(10000);
            }, 0);

            $("#rubro").focus();
            return false;
        } else if (razon == '') {
            setTimeout(function() {
                $("#lbRazonEmp").html("<span style='color:red;'> complete el campo razón social</span>").fadeOut(10000);
            }, 0);

            $("#razon").focus();
            return false;
        } else if (giro == '') {
            setTimeout(function() {
                $("#lbGiroEmp").html("<span style='color:red;'> complete el campo giro </span>").fadeOut(10000);
            }, 0);

            $("#giro").focus();
            return false;
        } else if (ciudad == '') {
            setTimeout(function() {
                $("#lbCiudad").html("<span style='color:red;'> complete el campo ciudad </span>").fadeOut(10000);
            }, 0);

            $("#ciudad").focus();
            return false;
        } else if (calle == '') {
            setTimeout(function() {
                $("#lbCalle").html("<span style='color:red;'> complete el campo calle </span>").fadeOut(10000);
            }, 0);

            $("#calle").focus();
            return false;
        } else if (numero == '') {
            setTimeout(function() {
                $("#lbNumero").html("<span style='color:red;'> complete el campo numero</span>").fadeOut(10000);
            }, 0);

            $("#numero").focus();
            return false;
        } else if (nom_usuario == '') {
            setTimeout(function() {
                $("#lbNomUsuario").html("<span style='color:red;'> complete el campo nombre usuario </span>").fadeOut(10000);
            }, 0);

            $("#nombre_usuario").focus();
            return false;
        } else if (contraseña == '') {
            setTimeout(function() {
                $("#lbContraseña").html("<span style='color:red;'> complete el campo contraseña </span>").fadeOut(10000);
            }, 0);

            $("#contraseña").focus();
            return false;
        } else if (contraseña2 == '') {
            setTimeout(function() {
                $("#lbContraseña2").html("<span style='color:red;'> complete el campo reingresar contraseña </span>").fadeOut(10000);
            }, 0);

            $("#contraseña2").focus();
            return false;

        } else if (contraseña != contraseña2 || contraseña2 != contraseña) {
            setTimeout(function() {
                $("#lbValidContraseña").html("<span style='color:red;'> Las contraseña no son iguales </span>").fadeOut(10000);
            }, 0);

            $("#contraseña2").focus();
            return false;

        } else if (avatar == '') {
            setTimeout(function() {
                $("#lbAvatar").html("<span style='color:red;'> complete el campo imagen </span>").fadeOut(10000);
            }, 0);

            $("#imagen").focus();
            return false;
        } else {
            $.ajax({
                url: "<?php echo base_url(); ?>/Proveedor/insertarProveedor",
                method: "POST",
                data: {
                    "funcion": fun,
                    "rut": rut,
                    "dv": dv,
                    "nombre": nombres,
                    "apellidos": apellidos,
                    "correo": correo,
                    "celular": celular,
                    "juridico": juridico,
                    "ciudad": ciudad,
                    "calle": calle,
                    "numero": numero,
                    "nom_usuario": nom_usuario,
                    "contraseña": contraseña,
                    "contraseña2": contraseña2,
                    "avatar": avatar,
                    "rut_emp": rutEmp,
                    "dv_emp": dvEmp,
                    "rubro": rubro,
                    "razon": razon,
                    "giro": giro,
                }
            });
        }
    });
</script>
<!-- Fin funcion para validar los campos del formulario registro proveedor-->