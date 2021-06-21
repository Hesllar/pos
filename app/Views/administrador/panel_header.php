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
                                <li><a data-toggle="tab">
                                        <h4>Categoria</h4>
                                    </a></li>
                                <li><a class="<?php echo $e_producto; ?>" href="<?php echo base_url() ?>/productosadmin">Productos</a></li>
                                <li><a class="<?php echo $e_venta; ?>" href="<?php echo base_url() ?>/ventas">Ventas</a></li>
                                <li><a class="<?php echo $e_ordencompra; ?>" href="<?php echo base_url() ?>/ordenescompra">Ordenes de compra</a></li>
                                <li><a class="<?php echo $e_usuario; ?>" href="<?php echo base_url() ?>/usuarios">Usuarios</a></li>
                                <li><a class="<?php echo $e_notacredito; ?>" href="<?php echo base_url() ?>/notascredito" hidden>Notas de cr&eacute;dito</a></li>
                                <li><a class="<?php echo $e_estadistica; ?>" href="<?php echo base_url() ?>/Estadistica">Reportes</a></li>

                                <li><a href="<?php echo base_url() ?>/Usuarios/logout">Cerrar Sesión</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-10">
                            <!-- Tab panes -->
                            <div class="tab-content dashboard-content mt-all-40">