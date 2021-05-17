        <!-- Header Area End -->
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-area ptb-10 ptb-sm-2">
            <!-- Container End -->
        </div>
        <!-- Breadcrumb End -->
        <!-- My Account Page Start Here -->
        <div class="my-account white-bg pb-60">
            <div class="container">
                <div class="account-dashboard">
                    <div class="row">
                        <div class="col-lg-2">
                            <!-- Nav tabs -->
                            <ul class="nav flex-column dashboard-list" role="tablist">
                                <li><a data-toggle="tab" href="#dashboard">Tablero</a></li>
                                <li><a class="<?php echo $e_producto; ?>" href="<?php echo base_url() ?>/Productos/productoEmp">Productos</a></li>
                                <li><a class="<?php echo $e_proveedor; ?>" href="<?php echo base_url() ?>/Proveedor">Proveedores</a></li>
                                <li><a class="<?php echo $e_ordencompra; ?>" href="<?php echo base_url() ?>/ordenescompra/traerOrden">Ordenes de compra</a></li>
                                <li><a href="<?php echo base_url() ?>/CerrarSesion">Cerrar Sesión</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-10">
                            <!-- Tab panes -->
                            <div class="tab-content dashboard-content mt-all-40">