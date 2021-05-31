//Metodo para listar las regiones vía ajax
listarRegiones();

var user_session_js = new Array(); //Variable ArraySession
let user_data_js = new Array(); //Variable datos del usuario
let venta_despacho = 1;

//Guardando variables para que se ejecuten cuando se haga click
const selectRegion = document.getElementById('region');
selectRegion.addEventListener('click', listarComunas);
const seccionCostoDespacho = document.getElementById("cart-despacho");
const errorDespacho = document.getElementById("rNoDisponible");


// Formatear moneda.
var formatterCLP = new Intl.NumberFormat('es-CL', {
    style: 'currency',
    currency: 'CLP',
  });

//Función que lista las regiones
function listarRegiones() {
    $.ajax({
        url: "http://localhost/pos/public/Region/listarRegiones",
        method: "GET",
        dataType: "JSON",
        success: function (data) {
            var html = '<option value="">Seleccione región</option>';
            for (var count = 0; count < data.length; count++) {

                html += '<option value="' + data[count].id_region + '">' + data[count].nombre_region + '</option>';
            }
            $('#region').html(html);
        }
    });
}

function validadorRegion() {
    var tRegion = $('#region').val();
    tRegion == 6 || tRegion == '' ? errorDespacho.style.display = 'none' : errorDespacho.style.display = '';

}

//Funcion que lista las comunas dependiendo de la región seleccionada
function listarComunas() {
    var ciudad_id = $('#region').val();

    var action = 'get_comuna';

    if (ciudad_id != '') {

        $.ajax({
            url: "http://localhost/pos/public/Comuna/listarComuna",
            method: "POST",
            data: {
                id_region: ciudad_id,
            },
            dataType: "JSON",
            success: function (data) {
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
function costoComuna(event) {
    selectComuna = event.target;
    var formatter = new Intl.NumberFormat('es-CL', {
        style: 'currency',
        currency: 'CLP',
    });

    var idRegion = $('#region').val();
    var idComuna = $('#comuna').val();
    const costoDespacho = document.getElementById('costoDespacho');
    const total = document.getElementById('compraEstatica');
    const totalCompra = document.getElementById('totalCompra');

    const tc = (total.value.replace('$', ''));
    const ttc = Number(tc.replace('.', ''));
    const cd = Number(costoDespacho.textContent.replace('$', ''));

    if (idComuna != 0 && idRegion == 6) {

        $.ajax({
            url: "http://localhost/pos/public/Comuna/costoComuna",
            method: "POST",
            data: {
                id_comuna: idComuna,
            },
            dataType: "JSON",
            success: function (data) {
                trDespacho(true);
                const totalFinal = ttc + Number(data.costo_comuna);
                costoDespacho.innerHTML = `$${data.costo_comuna}`;
                totalCompra.innerHTML = `$${totalFinal}`;
            }
        });
    } else {
        costoDespacho.innerHTML = `0`;
        trDespacho(false);
        totalCompra.innerHTML = `${tc}`;
    }
}

//Función que muestra/oculta la opción del despacho
function retiro(event) {
    console.log(document.getElementById('compraEstatica').value);
    const total = document.getElementById('compraEstatica');
    const tc = (total.value.replace('$', ''));
    const ttc = Number(tc.replace('.', ''));

    btnRetiro = event.target;
    btnSeleccion = btnRetiro.querySelector('input').id;
    switch (btnSeleccion) {
        case 'tienda':
            $("#despachoDom").hide();
            trDespacho(false);
            totalCompra.innerHTML = `${ttc}`;
            limpiarDespacho();
            venta_despacho = 0;
            break;
        case 'despacho':
            $("#despachoDom").show();
            trDespacho(true);
            venta_despacho = 1;
            break;
    }


}

function trDespacho(vista) {
    vista ? seccionCostoDespacho.style.display = '' : seccionCostoDespacho.style.display = 'none';
    //$('#realizarCompra');
}

function limpiarDespacho(){
    const costoDespacho = document.getElementById('costoDespacho');
    var zero = 0;
    costoDespacho.innerHTML = `${zero}`
    $('#region').val(0);
    $('#comuna').val(0);
}

function sesionUsuario(){
    if(user_session_js[1] != null){
        $.ajax({
            url: "http://localhost/pos/public/DatosPersonales/buscarPorRut/" + user_session_js[1],
            method: "POST",
            dataType: "JSON",
            success: function (data) {
                user_data_js = data;
                agregarDatosCliente(data);
            }
        });
    }else{
        $('#btnIniciarSesion').click();
    }
}

function agregarDatosCliente(datos_usuario){
    $('#nombre').html(datos_usuario.nombres);
    $('#apellidos').html(datos_usuario.apellidos);
    $('#celular').html(datos_usuario.celular);
    $('#correo').html(datos_usuario.correo);
    $('#calle_direccion').html(datos_usuario.calle);
    $('#numero_direccion').html(datos_usuario.numero);
    $('#ciudad').html(datos_usuario.ciudad);
}

function realizarCompraWeb(){
    //Venta
    var boleta_factura = '';
    $('#esEmpresa').prop('checked') ? boleta_factura = 'Factura' : boleta_factura = 'Boleta';
    
    //Fecha venta -->
    var fecha = new Date().toISOString().slice(0, 19).replace('T', ' ');
    var total_venta = document.getElementById('compraEstatica').value;
    var estado_venta = 'Procesada';
    var despacho = 0;
    $('#despacho') ? despacho = 1 : null;
    //Recibir datos de despacho
    var nombre_recibe = $('#nombre_recibe').val();
    var tel_contacto = $('#tel_contacto').val();
    var costo_despacho =  document.getElementById('costoDespacho').textContent;
    var estado_despacho = 'En Tienda';
    //formatter.format(total.toFixed(0));
    //Venta ID
    var fk_comuna = $('#comuna').val();
    

    //Recibir cliente


    //Productos
    
    alert(venta_despacho);
    $.ajax({
        url: "http://localhost/pos/public/Ventas/RealizarVentaWeb",
        method: "POST",
        data: {
            tipo_comprobante : boleta_factura,
            fecha_venta : fecha,
            total_venta_web : total_venta,
            despacho : venta_despacho,
            cliente_fk : user_session_js[0],
            nom_recibe : nombre_recibe,
            telefono : tel_contacto,
            costo : costo_despacho,
            comuna_fk : fk_comuna,
        },
        success: function(){
        },
    });
}
