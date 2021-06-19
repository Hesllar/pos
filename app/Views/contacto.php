<!-- Header Area End -->
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-area ptb-10 ptb-sm-5">
        </div>
        <!-- Breadcrumb End -->
<!-- Google Map Start -->
<div class="container">
    <div id="map"></div>
</div>
<!-- Google Map End -->
<!-- Contact Email Area Start -->
<div class="contact-email-area ptb-60">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h3>Contactanos</h3>
                <p class="text-capitalize mb-40">Completa el formulario de contacto.</p>
                <form id="contact-form" class="contact-form" action="mail.php" method="post">
                    <div class="address-wrapper">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="address-fname">
                                    <input type="text" name="name" placeholder="Nombre">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="address-email">
                                    <input type="email" name="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="address-subject">
                                    <input type="text" name="subject" placeholder="Asunto">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="address-textarea">
                                    <textarea name="message" placeholder="Escribe tu mensaje"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="form-message ml-15"></p>
                    <div class="col-xs-12 footer-content mail-content">
                        <div class="send-email">
                            <input type="submit" value="Enviar" class="submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- Contact Email Area End -->
<!-- Brand Logo Start -->
<div class="brand-area pb-60">
    <div class="container">
        <!-- Brand Banner Start -->
        <div class="brand-banner owl-carousel">
            <div class="single-brand">
                <a href="#"><img class="img" src="img/brand/1.png" alt="brand-image"></a>
            </div>
            <div class="single-brand">
                <a href="#"><img src="img/brand/2.png" alt="brand-image"></a>
            </div>
            <div class="single-brand">
                <a href="#"><img src="img/brand/3.png" alt="brand-image"></a>
            </div>
            <div class="single-brand">
                <a href="#"><img src="img/brand/4.png" alt="brand-image"></a>
            </div>
            <div class="single-brand">
                <a href="#"><img src="img/brand/5.png" alt="brand-image"></a>
            </div>
            <div class="single-brand">
                <a href="#"><img class="img" src="img/brand/1.png" alt="brand-image"></a>
            </div>
            <div class="single-brand">
                <a href="#"><img src="img/brand/2.png" alt="brand-image"></a>
            </div>
            <div class="single-brand">
                <a href="#"><img src="img/brand/3.png" alt="brand-image"></a>
            </div>
            <div class="single-brand">
                <a href="#"><img src="img/brand/4.png" alt="brand-image"></a>
            </div>
            <div class="single-brand">
                <a href="#"><img src="img/brand/5.png" alt="brand-image"></a>
            </div>
        </div>
        <!-- Brand Banner End -->
    </div>
</div>
<!-- Brand Logo End -->
</div>
<!-- Wrapper End -->

<!-- google map js -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBAqw-3jkKmI1gUPgwC8pyxecBz_B992BE&callback=initMap"
  type="text/javascript"></script>
<script>
    // When the window has finished loading create our google map below
    google.maps.event.addDomListener(window, 'load', init);

    function init() {
        // Basic options for a simple Google Map
        // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
        var mapOptions = {
            // How zoomed in you want the map to start at (always required)
            zoom: 11,

            scrollwheel: false,

            // The latitude and longitude to center the map (always required)
            center: new google.maps.LatLng(-33.0338237, -71.5357057), // New York
            
            // How you would like to style the map. 
            // This is where you would paste any style found on Snazzy Maps.
            styles: [{
                    "featureType": "administrative",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#444444"
                    }]
                },
                {
                    "featureType": "landscape",
                    "elementType": "all",
                    "stylers": [{
                        "color": "#f2f2f2"
                    }]
                },
                {
                    "featureType": "poi",
                    "elementType": "all",
                    "stylers": [{
                        "visibility": "off"
                    }]
                },
                {
                    "featureType": "road",
                    "elementType": "all",
                    "stylers": [{
                            "saturation": -100
                        },
                        {
                            "lightness": 45
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "all",
                    "stylers": [{
                        "visibility": "simplified"
                    }]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "labels.icon",
                    "stylers": [{
                        "visibility": "off"
                    }]
                },
                {
                    "featureType": "transit",
                    "elementType": "all",
                    "stylers": [{
                        "visibility": "off"
                    }]
                },
                {
                    "featureType": "water",
                    "elementType": "all",
                    "stylers": [{
                            "color": "#f1ac06"
                        },
                        {
                            "visibility": "on"
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "geometry.fill",
                    "stylers": [{
                            "lightness": "-12"
                        },
                        {
                            "saturation": "0"
                        },
                        {
                            "color": "#f1ac06"
                        }
                    ]
                }
            ]
        };

        // Get the HTML DOM element that will contain your map 
        // We are using a div with id="map" seen below in the <body>
        var mapElement = document.getElementById('map');

        // Create the Google Map using our element and options defined above
        var map = new google.maps.Map(mapElement, mapOptions);

        // Let's also add a marker while we're at it
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(-33.0338237, -71.5357057),
            map: map,
            title: 'Snazzy!'
        });
    }
</script>
</body>

</html>