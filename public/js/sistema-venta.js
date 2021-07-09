$("#inputTotal").on({
    "focus": function (event) {
        $(event.target).select();
    },
    "keyup": function (event) {
        $(event.target).val(function (index, value) {
            return value.replace(/\D/g, "")
                .replace(/([0-9])([0-9]{3})$/, '$1.$2')
                .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ".");
        });
    }
});
$("#rutCliente").on({
    "focus": function (event) {
        $(event.target).select();
    },
    "keyup": function (event) {
        $(event.target).val(function (index, value) {
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
    success: function (data) {
        productosObject = data;
    },
});


//buscador(null);

function buscadorOnBlur(){
    $("#productos-encontrados").addClass('fade');
    $("#lista-productos-encontrados").empty();
    $("#input-buscar").val('');
}

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

$('#lista-productos-encontrados').on('click', 'p', function () {
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

$('#listaProductos').on('click', 'i', function () {
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

$("#rutCliente").keypress(function (e) {
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
            success: function (data) {
                if (data != null) {
                    $("#textRutCliente").text(rut + "-" + dv);
                    $("#textNombreCliente").text(data.nombres + " " + data.apellidos);
                    $("#infoCliente").removeClass('d-none');
                    $("#agregarCliente").collapse('hide');
                    $("#iconCli").removeClass('fa-caret-down');
                    $("#iconCli").addClass('fa-caret-right');
                    $.ajax({
                        url: "http://localhost/pos/public/Empresas/boolClienteEmpresa/" + rut,
                        method: "POST",
                        dataType: "JSON",
                        success: function (resp) {
                            resp == true ?
                                $('#factura').prop('disabled', false) :
                                $('#factura').prop('disabled', true);
                        }
                    });
                    $.ajax({
                        url: "http://localhost/pos/public/Usuarios/buscarPorRutJson/" + rut,
                        method: "POST",
                        dataType: "JSON",
                        success: function (idUsuario) {
                            $("#textIdCliente").text(idUsuario);
                        }
                    });
                } else {
                    $.ajax({
                        url: "http://localhost/pos/public/Empresas/buscarPorRutEmpresa/" + rut,
                        method: "POST",
                        dataType: "JSON",
                        success: function (resp) {
                            if (resp != null) {
                                $('#factura').prop('disabled', false);
                                $("#textRutCliente").text(resp.rut_empresa + "-" + resp.dvempresa);
                                $("#textNombreCliente").text(resp.razon_social);
                                $("#infoCliente").removeClass('d-none');
                                $("#agregarCliente").collapse('hide');
                                $("#iconCli").removeClass('fa-caret-down');
                                $("#iconCli").addClass('fa-caret-right');
                            } else {
                                $('#factura').prop('disabled', true);
                                ventanaNotificacion('[404] - No encontrado', "El rut ingresado no está registrado en el sistema.");
                                $("#infoCliente").addClass('d-none');
                            }

                        }
                    });
                }
            },
        });

    }
});

function buscarRut(rut, dv) {
    return $.ajax({
        url: "http://localhost/pos/public/DatosPersonales/buscarPorRutDv/" + rut + "/" + dv,
        method: "POST",
        dataType: "JSON",
        success: function (data) {
            return data;
        },
    });

}

$('#addCli').on('click', function () {
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
idEmpleado();
function idEmpleado(){
    $.ajax({
        url: "http://localhost/pos/public/Empleados/buscarPorIdUsuario/" + $("#id_usuario").val(),
        method: "POST",
        success: function(empleadoId){
            empleadoId != "" ? $("#id_empleado").val(empleadoId) : null ;
        }
    });
}

$('#btnCompra').on('click', function () {
    var monto_recibido = parseInt($("#inputTotal").val().replace(".", ""));
    var costo_total = parseInt($("#totalPagar").val().replace(".", ""));
    if (monto_recibido < costo_total || $("#inputTotal").val() == "") {
        ventanaNotificacion("Error al realizar venta","El monto recibido no puede ser menor al total a pagar.");
    } else {
        var boleta_factura = '';
        $('#boleta').prop('checked') ? boleta_factura = 'Boleta' : boleta_factura = 'Factura';
        var fecha = new Date().toISOString().slice(0, 19).replace('T', ' ');
        var total_venta = $("#totalPagar").val();
        var pago = $("#f_pago option:selected").val();
        var despacho = 0;
        var cli = parseInt($("#textIdCliente").text());
        var user_id =  $("#id_empleado").val();
        $("#rutCliente").val() != '' ? rut = $("#rutCliente").val() : null;
        $.ajax({
            url: "http://localhost/pos/public/SistemaVenta/nuevaVenta",
            method: "POST",
            data: {
                tipo_comprobante: boleta_factura,
                fecha_venta: fecha,
                total: total_venta,
                f_pago: pago,
                venta_despacho: despacho,
                cliente_fk: cli,
                id_usuario: user_id
            },
            success: function () {
                ventanaNotificacion("Venta Correcta", "La venta ha sido realizada correctamente.");
                $.ajax({
                    url: "http://localhost/pos/public/SistemaVenta/nuevoDetalleVenta",
                    method: "POST",
                    data: {
                        arrayProductosDetalle: datatableToArray(datosTabla),
                    }
                });
            }
        });
    }
});

function datatableToArray(arr) {
    arraySalida = [];
    arr.forEach(function (p, i) {
        arrayTemp = [p[0], p[3]];
        arraySalida.push(arrayTemp);
    });
    return arraySalida;
}

function buscarUsuario(rut) {
    $.ajax({
        url: "http://localhost/pos/public/Usuarios/buscarPorRutJson/" + rut,
        method: "POST",
        success: function (resp) {
            return resp;
        }
    });
}

function listarRegiones() {
    $.ajax({
        url: "http://localhost/pos/public/Region/listarRegiones",
        method: "GET",
        dataType: "JSON",
        success: function (data) {
            var html = '<option value="">Región</option>';
            for (var count = 0; count < data.length; count++) {
                nomRegion = data[count].nombre_region.replace('Región del', '').replace('Región de', '');

                html += '<option value="' + data[count].id_region + '">' + nomRegion + '</option>';
            }
            $('#region').html(html);
            $('#region_emp').html(html);

        }
    });
}


function btnEmpresa() {
    $('#asociarEmpresa').prop('checked') ? $('#buscar-rut').show() : $('#buscar-rut').hide();
    $('#asociarEmpresa').prop('checked') ? $('.emp').show() : $('.emp').hide();
    $('#asociarEmpresa').prop('checked') ? camposCliente(true) : camposCliente(false);
    limpiarCampos();
}

function camposCliente(estado) {
    $('#nombres_cli').prop('disabled', estado);
    $('#apellidos_cli').prop('disabled', estado);
    $('#celular_cli').prop('disabled', estado);
    $('#correo_cli').prop('disabled', estado);
    $('#c_direccion').prop('disabled', estado);
    $('#n_direccion').prop('disabled', estado);
    $('#ciudad').prop('disabled', estado);
    $('#region').prop('disabled', estado);
    $('#comuna').prop('disabled', estado);
    estado ?
        $('#btnBuscarCliente').show() :
        $('#btnBuscarCliente').hide();
}

function limpiarCampos() {
    $('#boleta').prop('checked', true);
    $('#inputTotal').val('');
    $('#nombres_cli').val('');
    $('#apellidos_cli').val('');
    $('#celular_cli').val('');
    $('#correo_cli').val('');
    $('#c_direccion').val('');
    $('#n_direccion').val('');
    $('#ciudad').val('');
    $('#region').val('');
    $('#comuna').val('');
}



function listarComunas() {
    var reg_id = $('#region').val();
    if (reg_id != '') {
        $.ajax({
            url: "http://localhost/pos/public/Comuna/listarComuna",
            method: "POST",
            data: {
                id_region: reg_id,
            },
            dataType: "JSON",
            success: function (data) {
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

function listarComunasEmpresa() {
    var reg_id = $('#region_emp').val();
    if (reg_id != '') {
        $.ajax({
            url: "http://localhost/pos/public/Comuna/listarComuna",
            method: "POST",
            data: {
                id_region: reg_id,
            },
            dataType: "JSON",
            success: function (data) {
                var html = '<option value="">Comuna</option>';
                for (var count = 0; count < data.length; count++) {
                    html += '<option value="' + data[count].id_comuna + '">' + data[count].nombre_comuna + '</option>';
                }
                $('#comuna_emp').html(html);
            }
        });
    }
}


function agregarDireccion(tipo) {
    var rutNuevoCli = $("#rut_cli").val();
    var dvNuevoCli = $("#dv_cli").val();
    var nombreNuevoCli = document.getElementById('nombres_cli').value;
    var apellidosNuevoCli = $("#apellidos_cli").val();
    var celularNuevoCli = $("#celular_cli").val();
    var correoNuevoCli = $("#correo_cli").val();
    var textCalle = '';
    var textNumero = '';
    var nCiudad = '';
    var idComuna = '';
    var idDire = null;
    switch (tipo) {
        case 'c':
            textCalle = $("#c_direccion").val();
            textNumero = $("#n_direccion").val();
            nCiudad = $("#ciudad").val();
            idComuna = $("#comuna option:selected").val();
            break;
        case 'e':
            textCalle = $("#c_direccion_emp").val();
            textNumero = $("#n_direccion_emp").val();
            nCiudad = $("#ciudad_emp").val();
            idComuna = $("#comuna_emp option:selected").val();
            break;
    }
    $.ajax({
        url: "http://localhost/pos/public/Direcciones/agregarDireccion",
        method: "POST",
        data: {
            d_calle: textCalle,
            d_numero: textNumero,
            d_ciudad: nCiudad,
            d_comuna_id: idComuna,
        },
        dataType: "JSON",
        success: function (id_direccion) {

            
            $.ajax({
                url: "http://localhost/pos/public/DatosPersonales/insertarDatosAjax",
                method: "POST",
                data: {
                    c_rut: rutNuevoCli,
                    c_dv: dvNuevoCli,
                    c_nombre: nombreNuevoCli,
                    c_apellidos: apellidosNuevoCli,
                    c_celular: celularNuevoCli,
                    c_correo: correoNuevoCli,
                    c_direccion_id: id_direccion
                },
                dataType: "JSON"
            });
            crearUsuario(rutNuevoCli,nombreNuevoCli,apellidosNuevoCli);
            $msje = "El cliente " +
                nombreNuevoCli +
                " " +
                apellidosNuevoCli +
                " (" + rutNuevoCli + "-" + dvNuevoCli + ")" +
                " ha sido registrado exitosamente en el sistema. \n" +
                "¡Ahora puedes asociar el rut en sus ventas!";
            ventanaNotificacion("Registro Existoso", $msje);
        }

    });

}

$('#btnGuardar').on('click', function () {
    var esCliente = true;
    $('#asociarEmpresa').prop('checked') ? esCliente = false : null;
    if (esCliente) {
        agregarDireccion('c'); //agregarDireccion y cliente
    } else {
        agregarEmpresa();
    }
    datosTabla = [];
    $('#listaProductos').DataTable().clear().draw();
    $('#factura').prop('disabled', true);
    $("#textRutCliente").text("-");
    $("#textNombreCliente").text("");
    $("#infoCliente").addClass('d-none');
    $("#agregarCliente").collapse('hide');
    $('#rutCliente').val("");
    limpiarCampos();
});

$('#btnCancelar').on('click', function () {
    datosTabla = [];
    $('#listaProductos').DataTable().clear().draw();
    $('#factura').prop('disabled', true);
    $("#textRutCliente").text("-");
    $("#textNombreCliente").text("");
    $("#infoCliente").addClass('d-none');
    $("#agregarCliente").collapse('hide');
    $('#rutCliente').val("");
    limpiarCampos();
    ventanaNotificacion("Vaciar Productos", "Carrito de ventas ha sido limpiado.");
});

$('#btnBuscarCliente').on('click', function () {
    $.ajax({
        url: "http://localhost/pos/public/Empresas/boolClienteEmpresa/" + $("#rut_cli").val(),
        method: "POST",
        dataType: "JSON",
        success: function (data) {
            data == false ?
                agregarCamposCliente() :
                ventanaNotificacion("[ERROR] - Clientes con factura", "El rut ingresado ya tiene asociada una empresa.");
        }
    });
    //El cliente ya tiene una empresa 
});


function clienteEsEmpresa(rutCli) {
    $.ajax({
        url: "http://localhost/pos/public/Empresas/boolClienteEmpresa/" + rutCli,
        method: "POST",
        dataType: "JSON",
        success: function (data) {
            return data;
        }
    });
    return false;
}

function agregarCamposCliente() {
    $.ajax({
        url: "http://localhost/pos/public/DatosPersonales/buscarPorRut/" + $('#rut_cli').val(),
        method: "POST",
        dataType: "JSON",
        success: function (data) {
            $('#nombres_cli').val(data.nombres);
            $('#apellidos_cli').val(data.apellidos);
            $('#celular_cli').val(data.celular);
            $('#correo_cli').val(data.correo);
            $('#c_direccion').val(data.calle);
            $('#n_direccion').val(data.numero);
            $('#ciudad').val(data.ciudad);
            //$('#comuna').val(data.comuna_fk);
        }
    });
}

function clienteExiste(rut, dv) {
    var ce = false;
    buscarRut(rut, dv) != null ? ce = true : ventanaNotificacion('[404] - No encontrado', "El rut ingresado no está registrado en el sistema.");
    return ce;
}

function agregarEmpresa() {
    $.ajax({
        url: "http://localhost/pos/public/Direcciones/agregarDireccion",
        method: "POST",
        data: {
            d_calle: $("#c_direccion_emp").val(),
            d_numero: $("#n_direccion_emp").val(),
            d_ciudad: $("#ciudad_emp").val(),
            d_comuna_id: $("#comuna_emp option:selected").val(),
        },
        dataType: "JSON",
        success: function (id_direccion) {
            $.ajax({
                url: "http://localhost/pos/public/Empresas/agregarEmpresa",
                method: "POST",
                data: {
                    rut_c: $('#rut_cli').val(),
                    rut_e: $('#rut_emp').val(),
                    dv_e: $('#dv_emp').val(),
                    r_e: $('#razon_emp').val(),
                    g_e: $('#giro_emp').val(),
                    t_e: $('#celular_emp').val()
                },
                success: function (data) {
                    rutNJ = $('#rut_cli').val();
                    $.ajax({
                        url: "http://localhost/pos/public/DatosPersonales/naturalJuridico" +
                            rutNJ +
                            1,
                        method: "POST"
                    });
                    $msje = "La empresa " +
                        $('#razon_emp').val() +
                        " (" + $('#rut_emp').val() + "-" + $('#dv_emp').val() + ")" +
                        " ha sido registrado exitosamente en el sistema. \n" +
                        "¡Ahora puedes asociar el rut en sus ventas con boleta o factura!";
                    ventanaNotificacion("Registro Existoso", $msje);
                }
            });
        }
    });
}

function crearUsuario(r,nom,ape) {
    var r_c = $('#rut_cli').val();
    var d_c = $('#dv_cli').val();
    var n_c = $('#nombres_cli').val();
    var a_c = $('#apellidos_cli').val();
    console.log(r_c ,d_c,n_c,a_c);
    $.ajax({
        url: "http://localhost/pos/public/Usuarios/crearUsuarioVenta/" +
        r+ "/" +
        nom + "/" +
        ape ,
        method: "POST",
    });
}
$('#btnTest').on('click', function () {
    //ventanaNotificacion('tester', 'prueba 1');
    console.log('testeer');
    datatableToArray(datosTabla);
});

function ventanaNotificacion(titulo, mensaje) {
    $('#modalNotificacionLabel').text(titulo);
    $('#mensaje').text(mensaje);
    $('#modalNotificacion').modal('show');
}
