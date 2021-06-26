<div id="layoutSidenav_content">
    <main>

        <div class="container-fluid">
            <div class=row>
                <form action="<?php echo base_url() ?>/Moneda/actuaMoneda" method="POST">
                    <div class="form-row">
                        <input type="hidden" id="id_moneda" value="<?php echo $datos['id_moneda']; ?>" name="id_moneda">
                        <div class="form-group col-md-6">
                            <label for="inputCity">*Nombre moneda</label>
                            <input type="text" class="form-control" id="nom_moneda" value="<?php echo $datos['nombre_moneda']; ?>" name="nom_moneda" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputState">*Valor moneda</label>
                            <input type="number" class="form-control" step="0.01" id="val_moneda" value="<?php echo $datos['valor_moneda']; ?>" name="val_moneda" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <a href="<?php echo base_url() ?>/Moneda"><button type="button" class="btn btn-secondary newsletter-btn">Cancelar</button></a>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="newsletter-btn">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
</div>