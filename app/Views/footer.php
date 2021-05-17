 <footer class="off-white-bg">
     <!-- Footer Top Start -->
     <div class="footer-top pt-50 pb-60">
         <div class="container">

             <div class="row">
                 <!-- Single Footer Start -->
                 <div class="col-lg-4  col-md-7 col-sm-6">
                     <div class="single-footer">
                         <h3>Contacto</h3>
                         <div class="footer-content">
                             <div class="loc-address">
                                 <span><i class="fa fa-map-marker"></i><?php echo $configuracion['direccion'] ?></span>
                                 <span><i class="fa fa-envelope-o"></i><?php echo $configuracion['correo_principal'] ?></span>
                                 <span><i class="fa fa-phone"></i>Tel&eacute;fono : +56 (9)<?php echo $configuracion['telefono'] ?></span>
                             </div>
                             <div class="payment-mth"><a href="#"><img class="img" src="img/footer/1.png" alt="payment-image"></a></div>
                         </div>
                     </div>
                 </div>
                 <!-- Single Footer Start -->
                 <!-- Single Footer Start -->
                 <div class="col-lg-2  col-md-5 col-sm-6 footer-full">
                     <div class="single-footer">
                         <h3 class="footer-title">Información</h3>
                         <div class="footer-content">
                             <ul class="footer-list">
                                 <li><a href="<?php echo base_url() ?>/home">Inicio</a></li>
                                 <li><a href="<?php echo base_url() ?>/productos">Productos</a></li>
                                 <li><a href="<?php echo base_url() ?>/acerca">Acerca de nosotros</a></li>
                                 <li><a href="<?php echo base_url() ?>/contacto">Contacto</a></li>
                                 <li><a href="#">Seguimiento</a></li>
                             </ul>
                         </div>
                     </div>
                 </div>

                 <!-- Single Footer Start -->
             </div>
             <!-- Row End -->
         </div>
         <!-- Container End -->
     </div>
     <!-- Footer Top End -->
     <!-- Footer Bottom Start -->
     <div class="footer-bottom off-white-bg2">
         <div class="container">
             <div class="footer-bottom-content">
                 <p class="copy-right-text">Copyright © <a href="<?php echo base_url() ?>/home">Ferme</a> Todos los derechos reservados.</p>
                 <div class="footer-social-content">
                     <ul class="social-content-list">
                         <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                         <li><a href="#"><i class="fa fa-wifi"></i></a></li>
                         <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                         <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                         <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                     </ul>
                 </div>
             </div>
         </div>
         <!-- Container End -->
     </div>
     <!-- Footer Bottom End -->
 </footer>
 <!-- Footer End -->
 </div>
 <!-- Wrapper End -->
 <!-- jquery 3.12.4 -->
 <script src="<?php echo base_url(); ?>/js/vendor/jquery-1.12.4.min.js"></script>
 <!-- mobile menu js  -->
 <script src="<?php echo base_url(); ?>/js/jquery.meanmenu.min.js"></script>
 <!-- scroll-up js -->
 <script src="<?php echo base_url(); ?>/js/jquery.scrollUp.js"></script>
 <!-- owl-carousel js -->
 <script src="<?php echo base_url(); ?>/js/owl.carousel.min.js"></script>
 <!-- slick js -->
 <script src="<?php echo base_url(); ?>/js/slick.min.js"></script>
 <!-- wow js -->
 <script src="<?php echo base_url(); ?>/js/wow.min.js"></script>
 <!-- price slider js -->
 <script src="<?php echo base_url(); ?>/js/jquery-ui.min.js"></script>
 <script src="<?php echo base_url(); ?>/js/jquery.countdown.min.js"></script>
 <!-- nivo slider js -->
 <script src="<?php echo base_url(); ?>/js/jquery.nivo.slider.js"></script>
 <!-- fancybox js -->
 <script src="<?php echo base_url(); ?>/js/jquery.fancybox.min.js"></script>
 <!-- bootstrap -->
 <script src="<?php echo base_url(); ?>/js/bootstrap.min.js"></script>
 <!-- popper -->
 <script src="<?php echo base_url(); ?>/js/popper.js"></script>
 <!-- plugins -->
 <script src="<?php echo base_url(); ?>/js/plugins.js"></script>
 <!-- main js -->
 <script src="<?php echo base_url(); ?>/js/main.js"></script>
 <!-- mensajes flash-->
 <script src="<?php echo base_url(); ?>/js/toastr.min.js"></script>
 <!-- Modal de alerta-->
 <!-- ajax-->
 <script src="<?php echo base_url() ?>/js/ajax-mail.js"></script>
 <script>
     $('#Eliminar').on('show.bs.modal', function(e) {
         $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'))
     });
 </script>
 <!-- codigo mensajes flash-->
 <script>
     toastr.options = {
         "closeButton": false,
         "debug": false,
         "newestOnTop": false,
         "progressBar": false,
         "positionClass": "toast-top-center",
         "preventDuplicates": false,
         "onclick": null,
         "showDuration": "300",
         "hideDuration": "1000",
         "timeOut": "2000",
         "extendedTimeOut": "1000",
         "showEasing": "swing",
         "hideEasing": "linear",
         "showMethod": "fadeIn",
         "hideMethod": "fadeOut"
     }

     function success_toast() {
         toastr.success("Producto agregado correctamente")
     }
 </script>
 </body>

 </html>