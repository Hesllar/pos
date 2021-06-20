$("#inputTotal").on({
    "focus": function(event) {
        $(event.target).select();
    },
    "keyup": function(event) {
        $(event.target).val(function(index, value) {
            return value.replace(/\D/g, "")
                .replace(/([0-9])([0-9]{3})$/, '$1.$2')
                .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ".");
        });
    }
});
$("#rutCliente").on({
    "focus": function(event) {
        $(event.target).select();
    },
    "keyup": function(event) {
        $(event.target).val(function(index, value) {
            return value.replace(/\D/g, "")
                .replace(/^(\d{1,2})(\d{3})(\d{3})(\w{1})$/, '$1.$2.$3-$4');
        });
    }
});


var datosTabla = new Array();
var rutStatic = "";
var productosObject = {};

listarRegiones();
btnEmpresa();

var tbl = $('#listaProductos').DataTable({
    "searching": false,
    "paging": false,
    "info": false,
    "language": {
        "emptyTable": "Ingrese código de barras o nombre del producto en el cuadro buscador"
    },
    "aaData": datosTabla
});


$.ajax({
    url: "http://localhost/pos/public/Productos/listarBuscador",
    method: "POST",
    dataType: "JSON",
    success: function(data) {
        productosObject = data;
    },
});


//buscador(null);

function buscador(productos) {
    iBuscar = $("#input-buscar");

    if (iBuscar.val() != '') {
        $("#productos-encontrados").removeClass('fade');
        $("#lista-productos-encontrados").empty();
        if (event.keyCode == 8) {
            $("#lista-productos-encontrados").empty();
        }
        var conta = 0;
        productosObject.forEach((product, i) => {
            var nomUpper = product.nombre.toUpperCase();
            if (nomUpper.includes(iBuscar.val().toUpperCase()) ||
                product.id_producto.includes(iBuscar.val())) {
                if (i < 10) {
                    $("#lista-productos-encontrados").append($("<p class='autocompletar-items' id='" + product.id_producto + "' name='" + product.nombre + "'>" + product.id_producto + " - " + product.nombre + "</p>"));
                    conta++;
                }
            }
        });
    } else {
        $("#productos-encontrados").addClass('fade');
        $("#lista-productos-encontrados").empty();
    }

}

$('#lista-productos-encontrados').on('click', 'p', function() {
    var idProd = $(this).attr('id');
    $("#input-buscar").val('');
    $("#productos-encontrados").addClass('fade');
    $("#lista-productos-encontrados").empty();
    $('#listaProductos').DataTable().clear().draw();
    var agregar = 'si';
    productosObject.forEach((product) => {
        if (product.id_producto == idProd) {
            if (datosTabla.length != 0) {
                for (let i = 0; i < datosTabla.length; i++) {
                    if (datosTabla[i][0] === idProd) {
                        datosTabla[i][3] += 1;
                        datosTabla[i][4] = datosTabla[i][4] * datosTabla[i][3];
                        agregar = 'no';
                    }
                }
            }
            if (agregar == 'si') {
                var iconEliminar = "<a href='#'><i id='" + product.id_producto + "' class='delete-prod fas fa-minus-circle'></i></a>";
                var arrProducto = [product.id_producto,
                    product.nombre,
                    product.precio_venta,
                    1,
                    product.precio_venta,
                    iconEliminar
                ];
                datosTabla.push(arrProducto);
            }
        }
    });
    $('#listaProductos').DataTable().rows.add(datosTabla).draw();
    calcularTotal();
});

$('#listaProductos').on('click', 'i', function() {
    borrarProductoArray(datosTabla, $(this).attr('id'));
    $('#listaProductos').DataTable().clear().draw();
    $('#listaProductos').DataTable().rows.add(datosTabla).draw();
    calcularTotal();
});

function borrarProductoArray(arr, item) {
    for (let i = 0; i < arr.length; i++) {
        if (arr[i][0] === item) {
            datosTabla.splice(i, 1);
        }
    }
    datosTabla = arr;
}

function calcularTotal() {
    var valorTotal = 0;
    for (let i = 0; i < datosTabla.length; i++) {
        totalProducto = parseInt(datosTabla[i][4], 10);
        valorTotal += totalProducto;
    }
    $('#totalPagar').val(valorTotal);
}

$("#rutCliente").keypress(function(e) {
    if (e.which == 13) {
        var rutString = $("#rutCliente").val();
        var dv = rutString[rutString.length - 1];
        var r = rutString.replace("-", "");
        var ru = r.replace(/\./g, '');
        var rut = ru.substring(0, ru.length - 1);
        rutStatic = rut;
        $.ajax({
            url: "http://localhost/pos/public/DatosPersonales/buscarPorRutDv/" + rut + "/" + dv,
            method: "POST",
            dataType: "JSON",
            success: function(data) {
                $("#textRutCliente").text(rut + "-" + dv);
                $("#textNombreCliente").text(data.nombres + " " + data.apellidos);
                $("#infoCliente").removeClass('d-none');
            },
        });


    }
});

$('#addCli').on('click', function() {
    switch ($("#iconCli").attr('class')) {
        case "fas fa-caret-right":
            $("#iconCli").removeClass('fa-caret-right');
            $("#iconCli").addClass('fa-caret-down');
            break;
        case "fas fa-caret-down":
            $("#iconCli").removeClass('fa-caret-down');
            $("#iconCli").addClass('fa-caret-right');
            break;
    }
});

$('#btnCompra').on('click', function() {
    var boleta_factura = '';
    $('#boleta').prop('checked') ? boleta_factura = 'Factura' : boleta_factura = 'Boleta';

    var fecha = new Date().toISOString().slice(0, 19).replace('T', ' ');
    var total_venta = $("#totalPagar").val();
    var despacho = 0;
    var rutCliente = $("#rutCli").text();
    var idUsuario = buscarUsuario(rutStatic);
    $.ajax({
        url: "http://localhost/pos/public/SistemaVenta/nuevaVenta",
        method: "POST",
        data: {
            tipo_comprobante: boleta_factura,
            fecha_venta: fecha,
            total: total_venta,
            venta_despacho: despacho,
            cliente_fk: 19143313,
        },
        success: function() {
            alert('Venta Realizada -  //TablaVenta');
            guardarDetalle();
        }

    });
});

function buscarUsuario(rut) {
    $.ajax({
        url: "http://localhost/pos/public/Usuarios/buscarPorRutJson/" + rut,
        method: "POST",
        success: function(resp) {
            return resp;
        }
    });
}

function listarRegiones() {
    $.ajax({
        url: "http://localhost/pos/public/Region/listarRegiones",
        method: "GET",
        dataType: "JSON",
        success: function(data) {
            var html = '<option value="">Región</option>';
            for (var count = 0; count < data.length; count++) {
                nomRegion = data[count].nombre_region.replace('Región del', '').replace('Región de', '');

                html += '<option value="' + data[count].id_region + '">' + nomRegion + '</option>';
            }
            $('#region').html(html);
        }
    });
}


function btnEmpresa() {
    $('#asociarEmpresa').prop('checked') ? $('#buscar-rut').show() : $('#buscar-rut').hide();
    $('#asociarEmpresa').prop('checked') ? $('.emp').show() : $('.emp').hide();
}



function listarComunas() {
    var reg_id = $('#region').val();
    var action = 'get_comuna';
    if (reg_id != '') {
        $.ajax({
            url: "http://localhost/pos/public/Comuna/listarComuna",
            method: "POST",
            data: {
                id_region: reg_id,
            },
            dataType: "JSON",
            success: function(data) {
                var html = '<option value="">Comuna</option>';
                for (var count = 0; count < data.length; count++) {
                    html += '<option value="' + data[count].id_comuna + '">' + data[count].nombre_comuna + '</option>';
                }
                $('#comuna').html(html);
            }
        });
    }

}

function guardarDetalle() {
    var arrayProductos = datosTabla;
    var final = [];
    for (i = 0; i < arrayProductos.length; i++) {
        lista = [arrayProductos[i][0], arrayProductos[i][3]];
        final.push(lista);
    }
    $.ajax({
        url: "http://localhost/pos/public/Ventas/agregarDetalleVenta",
        method: "POST",
        data: {
            arrayProductosDetalle: final,
        },
    })
}

