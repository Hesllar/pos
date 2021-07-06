var tablaFacturas = $('#tabla-facturas').DataTable({
    "bAutoWidth": false,
    "aaSorting": [ [0,'desc'] ],
    dom: 'Bflrtip',
    buttons: [
        'copy', 'excel', 'csv', 'pdfHtml5'
    ],
    "columnDefs": [
        { "className": "pro-content align-middle", "targets": "_all" },
        { "targets": [1,5], "width": "150px" },
    ],
    "language": {
        "emptyTable": "Sin datos disponibles...",
        "lengthMenu": "Mostrando _MENU_ registros por página",
        "zeroRecords": "Nada encontrado - Lo siento",
        "info": "Mostrando página _PAGE_ de _PAGES_",
        "infoEmpty": "0 registros encontrados",
        "infoFiltered": "(Filtrado de _MAX_ registros totales)",
        "search": "Buscar:",
        "paginate": {
            "first": "Primero",
            "last": "Último",
            "next": "Siguiente",
            "previous": "Anterior"
        },
        "buttons": {
            "copy": 'Copiar'
        }
    }
});

var tablaBoletas = $('#tabla-boletas').DataTable({
    "aaSorting": [ [0,'desc'] ],
    dom: 'Bflrtip',
    buttons: [
        'copy', 'excel', 'csv', 'pdfHtml5'
    ],
    "columnDefs": [
        { "className": "pro-content align-middle", "targets": "_all" },
        { "targets": [1,5], "width": "150px" },
    ],
    "language": {
        "emptyTable": "Sin datos disponibles...",
        "lengthMenu": "Mostrando _MENU_ registros por página",
        "zeroRecords": "Nada encontrado - Lo siento",
        "info": "Mostrando página _PAGE_ de _PAGES_",
        "infoEmpty": "0 registros encontrados",
        "infoFiltered": "(Filtrado de _MAX_ registros totales)",
        "search": "Buscar:",
        "paginate": {
            "first": "Primero",
            "last": "Último",
            "next": "Siguiente",
            "previous": "Anterior"
        },
        "buttons": {
            "copy": 'Copiar'
        }
    }
});

$(document).ready(function () {
    rellenarDT('Boleta');
    rellenarDT('Factura');
    
});

function rellenarDT(tipo_comprobante) {
    $.ajax({
        url: "/pos/public/Ventas/rellenoDatatables/" + tipo_comprobante,
        method: "POST",
        dataType: "JSON",
        success: function (arrayVentas) {
            if (tipo_comprobante === 'Factura') {
                tablaFacturas.clear().draw();
                tablaFacturas.rows.add(arrayVentas).draw();
            } else if (tipo_comprobante === 'Boleta') {
                tablaBoletas.clear().draw();
                tablaBoletas.rows.add(arrayVentas).draw();
            }
        }
    });
}

$('.delete').on('click', function () {
    codigo = $(this).attr("id");
    anularVenta(codigo);
});

$('.btn-anular').on('click', function () {
    codigo = $(this).attr("id");
    anularVenta(codigo);
});

function anulacion(codigo) {
    Swal.fire({
        title: '¿Estás seguro que quieres anular la venta?',
        text: 'Esta opción no se puede deshacer',
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: `Anular venta`,
        denyButtonText: `Cancelar`,
        confirmButtonColor: '#f1ac06'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "/pos/public/Ventas/anularVenta/" + codigo,
                success: function (resultado) {
                    rellenarDT('Factura');
                    rellenarDT('Boleta');
                    notificaciones('Venta anulada', titulo = null, icono = 'success');
                }
            });
        } else if (result.isDenied) {
            Swal.fire('Operación cancelada', '', 'info')
        }
    })
}

function notificaciones(mensaje, titulo = null, icono = 'error') {
    titulo === null ? ventanaS() : ventanaM();
    function ventanaS() {
        Swal.fire({
            icon: icono,
            title: mensaje,
            focusConfirm: false,
            confirmButtonColor: '#f1ac06'
        })
    }
    function ventanaM() {
        Swal.fire({
            icon: icono,
            title: titulo,
            text: mensaje,
            focusConfirm: false,
            confirmButtonColor: '#f1ac06'
        })
    }
}
/*
    $(document).ready(function() {

    });

    function bpp(codigo) {

        alert('Run function bpp');
        $.ajax({
            url: "/ventas/anularventa/" + codigo,
            datatype: 'json',
            success: function(resultado) {
                alert('FInishes');
                alert(resultado.datos.id_venta);
                //$("#resultado").html(resultado.datos.id_venta);
                //$("#IdBoleta").html(resultado.datos.id_venta);
            }
        })
    };
    */

//jQuery("#resultado").html('response');
/*
function anular(id_venta) {
    alert('Si');
    if (id_venta != null) {
        $.ajax({
            url: "" + id_venta,
            type: "POST",
            dataType: 'json',
            data: {
                'id_venta': id_venta
            },
            success: function(respuesta) {
                alert('FInishes');
            }
        });
    }
}
*/
function todo(id_venta) {
    obtnDatos(id_venta);
    obtnDatosPro(id_venta);
    obtDatosEmp(id_venta);
    obtDatosEmpleado(id_venta);
    obtDatosDespacho(id_venta);

}

function obtnDatos(id_venta) {
    //$.noConflict();
    $.ajax({
        url: "/pos/public/Ventas/datosBoleta/" + id_venta,
        dataType: 'json',
        success: function (respuesta) {
            $('.btn-anular').attr('id', respuesta.datos.id_venta);
            $("#idBoleta").val(respuesta.datos.id_venta);
            $("#fecha_emision").val(respuesta.datos.fecha_venta);
            $("#rut_user").val(respuesta.datos.rut);
            $("#nombre_cliente").val(respuesta.datos.nombres);
            $("#subtotal").val(respuesta.datos.total);
        }
    });
}

function obtnDatosPro(id_venta) {
    $.ajax({
        url: "/pos/public/Ventas/datosProductoBoleta/" + id_venta,

        dataType: 'json',
        success: function (respuesta) {
            $('.listProduct').html('')
            $.each(respuesta.datos, function (i, value) {
                $('.listProduct').append('<tr>\
                <td>' + value['nombre'] + '</td>\
                <td>' + value['cantidad'] + '</td>\
                <td>' + value['precio_neto'] + '</td>\
                <td>' + value['precio_iva'] + '</td>\
                <td>' + value['precio_venta'] + '</td>\
                ')
            })
        }
    });
}

function obtDatosEmp(id_venta) {
    $.ajax({
        url: "/pos/public/Empresas/datosEmp/" + id_venta,
        dataType: 'json',
        success: function (resp) {
            if (resp.datos != null) {
                $("#rut_emp").val(resp.datos.rut_emp);
                $("#social").val(resp.datos.social);
                $("#giro").val(resp.datos.giro);
                document.getElementById("datos_emp").style.display = ""

            } else {
                document.getElementById("datos_emp").style.display = "none"
            }
        }
    });
}

function obtDatosEmpleado(id_venta) {
    console.log(id_venta);
    $.ajax({
        url: "/pos/public/Ventas/datosEmpleado/" + id_venta,
        dataType: 'json',
        success: function (resp) {
            console.log(resp);
            if (resp.datos != null) {
                $("#nom_empleado").val(resp.datos.nom_empleado);
            }
        }
    });
}

function obtDatosDespacho(id_venta) {
    $.ajax({
        url: "/pos/public/Ventas/datosDespacho/" + id_venta,
        dataType: 'json',
        success: function (resp) {

            if (resp.datos != null) {
                if (resp.datos.est_desp == 1) {
                    $("#est_despacho").val('Entregado')
                } else {
                    $("#est_despacho").val('No entregado')
                }
                $("#nom_recibe").val(resp.datos.nom_recibe);
                $("#nom_comuna").val(resp.datos.nombre_comuna);
                $("#costo_envio").val(resp.datos.costo_comuna);
                $("#fecha_entrega").val(resp.datos.fecha_entrega);
                $("#fecha_entrega").val(resp.datos.fecha_entrega);
                $("#totales").val(resp.datos.totales);
                document.getElementById("despacho").style.display = ""
                document.getElementById("total-des").style.display = ""
            } else {
                document.getElementById("despacho").style.display = "none"
                document.getElementById("total-des").style.display = "none"
            }
        }
    });
}