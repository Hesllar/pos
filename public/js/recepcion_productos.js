var tablaRecepcion = $('#tabla-recepcion');
cargarDatosTabla();

function inicializarTabla() {
    tablaRecepcion = $('#tabla-recepcion').DataTable({
        "aaSorting": [[0, 'desc']],
        dom: 'Bflrtip',
        buttons: [
            'copy', 'excel', 'csv', 'pdfHtml5'
        ],
        "columnDefs": [
            { "className": "pro-content align-middle price", "targets": "_all" },
            { "targets": [0,4,5], "width": "60px" },
            { "targets": 1, "width": "150px" },
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
    });
}

function cargarDatosTabla() {
    inicializarTabla();
    $.ajax({
        url: "/pos/public/RecepcionProductos/formatoTabla",
        method: "POST",
        datatype: "JSON",
        success: function (arrayOrdenes) {
            tablaRecepcion.rows.add(JSON.parse(arrayOrdenes)).draw();
            icono = document.createElement('i');
            icono.setAttribute('class',  "fas fa-tasks m-top")
            $(".borders-a-s").html(icono);
            console.log(icono);


        }
    });
}