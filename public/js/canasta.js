//Metodo para listar las regiones vía ajax
listarRegiones();

//Guardando variables para que se ejecuten cuando se haga click
const selectRegion = document.getElementById('region');
selectRegion.addEventListener('click', listarComunas);
const selectComuna = document.getElementById('comuna');
selectComuna.addEventListener('click', costoComuna);

//Función que lista las regiones
function listarRegiones(){
    $.ajax({
        url: "http://fermeapp.com/pos/public/Region/listarRegiones",
        method: "GET",
        dataType: "JSON",
        success: function(data) {
            var html = '<option value="">Seleccione región</option>';
            for (var count = 0; count < data.length; count++) {

                html += '<option value="' + data[count].id_region + '">' + data[count].nombre_region + '</option>';
            }
            $('#region').html(html);
        }
    });
}

//Funcion que lista las comunas dependiendo de la región seleccionada
function listarComunas(){
    var ciudad_id = $('#region').val();

        var action = 'get_comuna';

        if (ciudad_id != '') {

            $.ajax({
                url: "http://fermeapp.com/pos/public/Comuna/listarComuna",
                method: "POST",
                data: {
                    id_region: ciudad_id,
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
}

//Función que establece el costo dependiendo de la comuna elegida
function costoComuna(){
    var formatter = new Intl.NumberFormat('es-CL', {
        style: 'currency',
        currency: 'CLP',
      });

    var idRegion = $('#region').val();
    var idComuna = $('#comuna').val();
    const costoDespacho = document.getElementById('costoDespacho');
    const total = document.getElementById('compraEstatica');
    const totalCompra = document.getElementById('totalCompra');

    const tc = (total.value.replace('$',''));
    const ttc = Number(tc.replace('.',''));
    const cd = Number(costoDespacho.textContent.replace('$',''));
    
        if (idComuna != '' && idRegion == 6) {

            $.ajax({
                url: "http://fermeapp.com/pos/public/Comuna/costoComuna",
                method: "POST",
                data: {
                    id_comuna: idComuna,
                },
                dataType: "JSON",
                success: function(data) {
                    const totalFinal = ttc + cd;
                    costoDespacho.innerHTML=`$${data.costo_comuna}`;
                    totalCompra.innerHTML=`${totalFinal}`;
                }
            });
        }else{
            costoDespacho.innerHTML=`0`;
            totalCompra.innerHTML=`${total}`;
        }
}

//Función que muestra/oculta la opción del despacho
function retiro(event){
    btnRetiro = event.target;
    btnSeleccion = btnRetiro.querySelector('input').id;
    switch (btnSeleccion) {
        case 'tienda':
            $("#despachoDom").hide();
            break;
        case 'despacho':
            $("#despachoDom").show();
            break;
    }

}
