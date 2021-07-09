<div class="tab-pane active">
    <h3>Moneda</h3>
    <div class="d-flex justify-content-between margin-top 15">
        <!-- Botón para agergar productos-->
        <div class="pull-right">
            <button type="button" class="btn-submit" data-toggle="modal" data-target="#AgregarMoneda">
                +Agregar
            </button>
        </div>
    </div>


    <!-- Modal ingreso producto -->
    <div class="modal fade" id="AgregarMoneda" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tipo de moneda</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form class="form-horizontal" method="Post" action="<?php echo base_url() ?>/Moneda/crearMoneda">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <fieldset>
                                    <div class="form-group">
                                        <label class="control-label" for="nombre_moneda"><span class="require">*</span>Nombre moneda</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="nombre_moneda" name="nombre_moneda" placeholder="Ingese nombre moneda">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="valor"><span class="require">*</span>Valor</label>
                                        <div class="col-sm-10">
                                            <input type="number" step="0.0001" class="form-control" id="valor" name="valor" placeholder="Ingrese valor de la moneda">
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary newsletter-btn" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="newsletter-btn" value="enviar datos">Guardar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre moneda</th>
                    <th>Valor moneda</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($moneda as $dtsMoneda) { ?>
                    <tr>
                        <td><?php echo $dtsMoneda['nombre_moneda']; ?></td>
                        <td><?php echo $dtsMoneda['valor_moneda']; ?></td>
                        <td><a class="view" href="<?php echo base_url() . '/Moneda/editarMoneda/' . $dtsMoneda['id_moneda']; ?>"> <i class="fa fa-pencil"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>