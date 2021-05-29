<div id="layoutSidenav_content">
    <main>

        <div class="container-fluid">
            <div class=row>
                <div class="col-4">
                    <div class="card text-white bg-primary">
                        <div class="card-body">
                            Total de productos
                            <?php echo $productos ?>
                        </div>
                        <a class="card-footer text-white" href="<?php echo base_url() ?>/ProductosAdmin">Ver detalle</a>
                    </div>
                </div>

                <div class="col-4">
                    <div class="card text-white bg-success">
                        <div class="card-body">
                            Ventas del día
                            <?php echo $ventas ?>
                        </div>
                        <a class="card-footer text-white" href="<?php echo base_url() ?>/ProductosAdmin">Ver detalle</a>
                    </div>
                </div>

                <div class="col-4">
                    <div class="card text-white bg-danger">
                        <div class="card-body">
                            Productos con sotck minimo
                            <?php echo $productos ?>
                        </div>
                        <a class="card-footer text-white" href="<?php echo base_url() ?>/ProductosAdmin">Ver detalle</a>
                    </div>
                </div>
            </div>
        </div>

    </main>