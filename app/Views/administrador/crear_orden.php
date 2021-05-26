<div class="container">
    <label class="control-label" for="number"><span class="require">*</span>Id proveedor</label>
    <div class="row">

        <div class="form-group ">
            <div class="row">
                <div class="col-sm-6">
                    <input type="hidden" id="id_proveedor" name="id_proveedor">
                    <input type="number" class="form-control" id="id_prove" name="id_prove" placeholder="Ingrese id proveedor" onkeyup="buscarProveedor(event, this, this.value)" autofocus>
                    <label for="id_prove" id="resultado_error" style="color: red"></label>
                </div>
                <div class="pull-center col-sm-5">
                    <button type="button" class="btn-submit" data-toggle="modal" data-target="#proveedor">
                        +Id_proveedor
                    </button>
                </div>
            </div>
        </div>

        <!-- Modal listado de proveedores -->
        <div class="modal fade" id="proveedor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Datos categoria</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>id_proveedor</th>
                                    <th>Rubro</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($datos as $prove) { ?>
                                    <tr>
                                        <td><?php echo $prove['id_proveedor']; ?></td>
                                        <td><?php echo $prove['rubro']; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 pb-30">
                <h5>Datos empresa</h5>
            </div>
            <div class="form-group col-md-4">
                <label for="rubro">*Rut empresa</label>
                <input type="number" class="form-control" id="rut_emp" name="rut_emp" disabled>
                <label for="" id="lbRutEmp"></label>
            </div>
            <div class="form-group col-md-4">
                <label for="rubro">*Dv</label>
                <input type="text" class="form-control" id="dv_emp" name="dv_emp" disabled>
                <label for="" id="lbDvEmp"></label>
            </div>
            <div class="form-group col-md-4">
                <label for="rubro">*Rubro</label>
                <input type="text" class="form-control" id="rubro" name="rubro" disabled>
                <label for="" id="lbRubroEmp"></label>
            </div>
            <div class="form-group col-md-4">
                <label for="rubro">*Razón social</label>
                <input type="text" class="form-control" id="razon" name="razon" disabled>
                <label for="" id="lbRazonEmp"></label>
            </div>
            <div class="form-group col-md-4">
                <label for="rubro">°Teléfono</label>
                <input type="number" class="form-control" id="telefono" name="telefono" disabled>
            </div>
            <div class="form-group col-md-4">
                <label for="rubro">*Giro</label>
                <input type="text" class="form-control" id="giro" name="giro" disabled>
                <label for="" id="lbGiroEmp"></label>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url() ?>/js/ajax-mail.js">
</script>
<script src="<?php echo base_url(); ?>/js/vendor/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {

    });

    function buscarProveedor(e, tagId, codigo) {

        var enterKey = 13;

        if (codigo != '') {

            if (e.which == enterKey) {
                $.ajax({

                    url: '<?php echo base_url(); ?>/Proveedor/buscarIdProveedor/' + codigo,
                    dataType: 'json',
                    success: function(resultado) {
                        if (resultado == 0) {
                            $(tagId).val('');
                        } else {
                            console.log(resultado);
                            $(tagId).removeClass('has-error');
                            $("#resultado_error").html(resultado.error);

                            if (resultado.existe) {
                                $("#id_proveedor").val(resultado.datos.id_proveedor);
                                $("#rut_emp").val(resultado.datos.rut_emp);
                                $("#dv_emp").val(resultado.datos.dv_empresa);
                                $("#rubro").val(resultado.datos.rubro);
                                $("#razon").val(resultado.datos.razon);
                                $("#telefono").val(resultado.datos.telefono);
                                $("#giro").val(resultado.datos.giro);

                            } else {
                                $("#id_proveedor").val('');
                                $("#rut_emp").val('');
                                $("#dv_emp").val('');
                                $("#rubro").val('');
                                $("#razon").val('');
                                $("#telefono").val('');
                                $("#giro").val('');
                            }
                        }
                    }
                })
            }
        }
    }
</script>