//Metodo para listar las regiones vía ajax
listarRegiones();
//Metodo Factura vía ajax
checkboxEmpresa();

cargarValorMoneda();

var user_session_js = new Array(); //Variable ArraySession
let user_data_js = new Array(); //Variable datos del usuario
let venta_despacho = 1;
var ultimaVenta;

//Guardando variables para que se ejecuten cuando se haga click
const selectRegion = document.getElementById('region');
selectRegion.addEventListener('click', listarComunas);
const seccionCostoDespacho = document.getElementById("cart-despacho");
const errorDespacho = document.getElementById("rNoDisponible");
const seccionEmpresa = document.getElementById("datosEmpresa");
      seccionEmpresa.style.display = 'none';


// Formatear moneda.
var formatterCLP = new Intl.NumberFormat('es-CL', {
    style: 'currency',
    currency: 'CLP',
  });

//Función que lista las regiones
function listarRegiones() {
    $.ajax({
        url: "http://localhost/pos/public/Region/listarRegionesDespacho",
        method: "GET",
        dataType: "JSON",
        success: function (data) {
            var html = '<option value="">Seleccione región</option>';
            html += '<option value="' + data.id_region + '">' + data.nombre_region + '</option>';
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
                console.log('listarComuna',data);
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
    $('#rut-cli').html(datos_usuario.rut);
    $('#dv').html(datos_usuario.dv);
    $('#nombre').html(datos_usuario.nombres);
    $('#apellidos').html(datos_usuario.apellidos);
    $('#celular').html(datos_usuario.celular);
    $('#correo').html(datos_usuario.correo);
    $('#calle_direccion').html(datos_usuario.calle);
    $('#numero_direccion').html(datos_usuario.numero);
    $('#ciudad').html(datos_usuario.ciudad);
}

function checkboxEmpresa(){
    const rut_fk = document.getElementById('rut-cli').textContent;
    $.ajax({
        url: "http://localhost/pos/public/Empresas/boolClienteEmpresa/" + rut_fk,
        method: "POST",
            dataType: "JSON",
        success: function (data) {
            console.log(data);
        }
        
    });

}

function aplicarMoneda(){

    var id_moneda = $('#valor_moneda').val();
    var idRegion = $('#region').val();
    var idComuna = $('#comuna').val();
    var total = $("#compraEstatica").val();
    var  sacar$ =  total.replace('$','');
    var  sacarPunto =  sacar$.replace('.','');
    const totalCompra = document.getElementById('totalCompra');
    if($('#despacho').prop('checked')){
        if (idComuna != 0 && idRegion == 6) {
        $.ajax({
            url: "http://localhost/pos/public/Comuna/costoComuna",
            method: "POST",
            data: {
                id_comuna: idComuna,
            },
            dataType: "JSON",
            success: function(data){
                $.ajax({
                    url: "http://localhost/pos/public/Moneda/obtDatosMoneda",
                    method: "POST",
                    data:{
                        id_mone:id_moneda
                        },
                    dataType: "JSON",
                    success: function(respuesta){
                        if(id_moneda !=0){
                            var sumarCostoComuna = (Number(sacarPunto) + Number(data.costo_comuna));
                            var valorDolar = parseFloat(sumarCostoComuna / Number(respuesta.data.valor_moneda)).toFixed(2);
                            totalCompra.innerHTML =  respuesta.data.nombre_moneda +  valorDolar;  
                        }else{
                            var sumarCostoComuna = (Number(sacarPunto) + Number(data.costo_comuna));
                            totalCompra.innerHTML = new Intl.NumberFormat("es-CL",{style: 'currency',currency: 'CLP',}).format(sumarCostoComuna);       
                        }
                    }
                })    
            }
        });
    }else{
         $.ajax({
        url: "http://localhost/pos/public/Moneda/obtDatosMoneda",
        method: "POST",
        data:{
            id_mone:id_moneda
        },
        dataType: "JSON",
        success: function(respuesta){ 
        if(id_moneda == 0){
            totalCompra.innerHTML = total;  
        }else{
            var valorDolar = parseFloat(sacarPunto / Number(respuesta.data.valor_moneda)).toFixed(2);
            totalCompra.innerHTML = respuesta.data.nombre_moneda +  valorDolar;       
        }
        }
    });
    }
    }
    if($('#tienda').prop('checked')){
        $.ajax({
        url: "http://localhost/pos/public/Moneda/obtDatosMoneda",
        method: "POST",
        data:{
            id_mone:id_moneda
        },
        dataType: "JSON",
        success: function(respuesta){ 
        if(id_moneda == 0){
            totalCompra.innerHTML = total;  
        }else{
            var valorDolar = parseFloat(sacarPunto / Number(respuesta.data.valor_moneda)).toFixed(2);
            totalCompra.innerHTML = respuesta.data.nombre_moneda +  valorDolar;       
        }
        }
    });
    }
    
     
}

function datosEmpresa(){
    seccionEmpresa.style.display = 'none';
    while ($('#esEmpresa').prop('checked')) {
        const rut_fk = document.getElementById('rut-cli').textContent;
        $.ajax({
            url: "http://localhost/pos/public/Empresas/buscarPorRutCliente/" + rut_fk,
            method: "POST",
            dataType: "JSON",
            success: function (data) {
                agregarDatosEmpresa(data);
            }
            
        });
        seccionEmpresa.style.display = '';
        break;
    }
}

function agregarDatosEmpresa(datos_empresa){
    $('#rut-emp').html(datos_empresa.rut_empresa);
    $('#dv-emp').html(datos_empresa.dvempresa);
    $('#razon').html(datos_empresa.razon_social);
    $('#giro').html(datos_empresa.giro);
    
    $('#direccion-emp').html(datos_empresa.calle);
    $('#numero-direccion-emp').html(datos_empresa.numero);
    $('#ciudad-emp').html(datos_empresa.ciudad);
    
    
    obid();
    
}

function realizarCompraWeb(){
    //Venta
    var id_moneda = $('#valor_moneda').val();
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
    
    alert('Venta realizada');
    $.ajax({
        url: "http://localhost/pos/public/Ventas/RealizarVentaWeb",
        method: "POST",
        data: {
            id_money:id_moneda,
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
        success: function(data){
            //console.log(ultimaVenta);
            const arrayProductos = document.querySelectorAll('.data-product');
    var lista = new Array();
    arrayProductos.forEach((producto, i) => {
        const prod = producto.querySelector('.id_producto').id;
        const cant = producto.querySelector('.qty').textContent;
        lista.push([prod,cant]);
    });
        idv = data;
            $.ajax({
                url: "http://localhost/pos/public/Ventas/agregarDetalleVenta",
                method: "POST",
                data: {
                    arrayProductosDetalle : lista,
                    ultima_venta : idv,
                },
                dataType: 'JSON',
                success: function(){
                    window.location.href = "http://localhost/pos/public/Ventas/pagComprobante";
                },
            });
        },
    });
    
    
    //setTimeout(detalleVenta(),2000);
    

}

function cargarValorMoneda(){
                $.ajax({
                    url: "http://localhost/pos/public/Moneda/obtValor",
                    dataType: "JSON",
                    success: function(data) {
                    var html = '<option value="0">Seleccione Moneda</option>';
                    for (var count = 0; count < data.length; count++) {
                            html += '<option value="' + data[count].id_moneda+'">' + data[count].nombre_moneda +'</option>';
                        };
                $('#valor_moneda').html(html);
            }
        });
}

/*function detalleVenta(){
    const arrayProductos = document.querySelectorAll('.data-product');
    var lista = new Array();
    arrayProductos.forEach((producto, i) => {
        const prod = producto.querySelector('.id_producto').id;
        const cant = producto.querySelector('.qty').textContent;
        lista.push([prod,cant]);
    });
    //id_mod1 = id_ultima_venta.replace('"', '');
    //v = id_mod1.replace('"', '');

    $.ajax({
        url: "http://localhost/pos/public/Ventas/agregarDetalleVenta",
        method: "POST",
        data: {
            arrayProductosDetalle : lista,
            ultima_venta : ultimaVenta,
        },
        dataType: 'JSON',
        success: function(){
        },
    });
}*/
