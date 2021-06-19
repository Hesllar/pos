        <div class="slider-area slider-style-three">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <!-- Breadcrumb Start -->

                        <dsmasiv class="breadcrumb-area ptb-60 ptb-sm-30">
                            <div class="container">
                                <div class="breadcrumb">
                                    <ul>
                                        <li><a href="<?php echo base_url() ?>/home">Inicio</a></li>
                                        <li class="active"><a href="<?php echo base_url() ?>/acceder">Login</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Container End -->
                    </div>
                    <!-- Breadcrumb End -->
                    <!-- LogIn Page Start -->
                    <div class="log-in pb-60">
                        <div class="container">
                            <div class="row">
                                <!-- New Customer Start -->
                                <div class="col-sm-6">
                                    <div class="well">
                                        <div class="new-customer">
                                            <h3>¿Eres Nuevo ?</h3>
                                            <p class="mtb-10"><strong>¡Registrate!</strong></p>
                                            <p>Al crear una cuenta, podrás comprar, estar actualizado sobre el estado de un pedido y realizar un seguimiento de los pedidos que haya realizado anteriormente.</p>
                                            <a class="customer-btn" href="<?php echo base_url() ?>/registro">Registrarme</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- New Customer End -->
                                <!-- Returning Customer Start -->
                                <div class="col-sm-6">
                                    <div class="well">
                                        <div class="return-customer">
                                            <h3 class="mb-10">Iniciar Sesion</h3>
                                            <form method="POST" action="<?php echo base_url(); ?>/Acceder/valida">
                                                <div class="form-group">
                                                    <label for="nom_usuario">Nombre de usuario</label>
                                                    <input required type="text" name="nom_usuario" id="nom_usuario" placeholder="Escribe tu nombre de usuario..." class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="contrasena">contraseña</label>
                                                    <input required type="password" name="contrasena" id="contrasena" placeholder="Escribe tu contraseña..." class="form-control">
                                                </div>
                                                <p class="lost-password"><a href="<?php echo base_url(); ?>/Acceder/olvide_contrasena">¿Olvidaste tu Contraseña?</a></p>
                                                <button class="return-customer-btn" type="submit">ACCEDER</button>


                                                <?php if (isset($validation)) { ?>
                                                    <div class="alert alert-danger">
                                                        <?php echo $validation->listErrors(); ?>
                                                    </div>
                                                <?php } ?>
                                                <?php if (isset($error)) { ?>
                                                    <div class="alert alert-danger">
                                                        <?php echo $error; ?>
                                                    </div>
                                                <?php } ?>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Returning Customer End -->
                            </div>
                            <!-- Row End -->
                        </div>
                        <!-- Container End -->
                    </div>

                </div>
            </div>
        </div>
        </div>