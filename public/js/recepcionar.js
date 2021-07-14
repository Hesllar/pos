var tablaRecepcionProductos = $('#tabla-recepcion-productos');
var nOrden = $("#n_orden").val();
var arrayP = null;
var objProductos = null;
cargarDatosTabla();


function inicializarTabla() {
    tablaRecepcionProductos = tablaRecepcionProductos.DataTable({
        "bPaginate": false,
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,
        "searching": false,
        "bAutoWidth": false,
        "columnDefs": [
            { "className": "pro-content align-middle price", "targets": "_all" },
            { "targets": 5, "width": "73px" },
            { "targets": [3, 4, 6], "width": "64px" },
            { "bVisible": false, "aTargets": [0, 7, 8, 9, 10] }
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
        },
        "drawCallback": function (settings) {
            $(".c-recibida").on("change", function () {
                idProducto = $(this).attr("id").replace('cr-', '');
                cantidadRecibida = $(this).val();
                cc = tablaRecepcionProductos.rows().data();

                //console.log(typeof arrayP);
                Object.keys(objProductos).forEach(key => {
                    objProductos[key][0] == idProducto ? console.log('encontrado ', idProducto) : console.log('no');
                    if (objProductos[key][0] == idProducto) {
                        

                        objProductos[key][4] = "<input type='number' id='cr-" + idProducto + "' value= '" + cantidadRecibida + "'" +
                            "class='form-control c-recibida text-center' min='0' max='" + objProductos[key][3] + "'>";
                        objProductos[key][9] = (objProductos[key][7] * cantidadRecibida);
                        let nuevoTotal = formatear(objProductos[key][7] * cantidadRecibida);
                        let antTotal = "<div><span id=va-" + idProducto + " class='prev-valor'>" + formatear(objProductos[key][8]) + "</span></div>";
                        let totalHTML = "<span id=vt-" + idProducto + " >$" + nuevoTotal + "</span>";
                        objProductos[key][3] == cantidadRecibida ? 
                        objProductos[key][6] = totalHTML :
                        objProductos[key][6] = antTotal + totalHTML;

                        tablaRecepcionProductos.clear().draw();
                        tablaRecepcionProductos.rows.add(objProductos).draw();

                    }
                });
                sumarTotal();
            })
        }
    });
}

function formatear(n) {
    var num = String(n).replace(/\./g, '');
    if (!isNaN(num)) {
        num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g, '$1.');
        num = num.split('').reverse().join('').replace(/^[\.]/, '');
        n = num;
    }
    return n;
}

function sumarTotal() {
    let totalSumado = 0;
    Object.keys(objProductos).forEach(key => {
        totalSumado += objProductos[key][9];
    });
    $("#totalPago").text(formatear(totalSumado));


}

function cargarDatosTabla() {
    inicializarTabla();
    $.ajax({
        url: "/pos/public/RecepcionProductos/formatoProductos/" + $("#n_orden").val(),
        method: "POST",
        datatype: "JSON",
        success: function (arraProductos) {
            objProductos = JSON.parse(arraProductos);
            tablaRecepcionProductos.rows.add(JSON.parse(arraProductos)).draw();
        }
    });
}

function actualizarTabla() {
    console.log(arrayP);
}

function confirmarPedido(){
    $.ajax({
        url: "/pos/public/RecepcionProductos/confirmar",
        method: "POST",
        datatype: "JSON",
        data: {
            arrayOrdenDetalle:objProductos,
            orden:nOrden
        },
        success: function () {
            Swal.fire({
                text: 'Recepción de productos registrada.',
                icon: 'success',
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '/pos/public/RecepcionProductos'
            } 
        });
        }
    });
}