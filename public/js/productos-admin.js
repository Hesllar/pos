$("#agregarProductoForm").submit(function(e) {
    var fun = "funregistrar";
    var nomProducto = $("#nombre_producto").val();
    var marca = $("#marca").val();
    var precVenta = $("#precio_venta").val();
    var precCosto = $("#precio_costo").val();
    var stock = $("#stock").val();
    var stockCritico = $("#stock_critico").val();
    var descri = $("#descripcion").val();
    var img = $("#imagen").val();

    if (nomProducto == '') {
        setTimeout(function() {
            $("#lbNomPro").html("<span style='color:red;'> Complete el campo nombre producto </span>").fadeOut(10000);
        }, 0);

        $("#nombre_producto").focus();
        return false;
    } else if (marca == '') {
        setTimeout(function() {
            $("#lbMarca").html("<span style='color:red;'> Complete el campo marca </span>").fadeOut(10000);
        }, 0);

        $("#marca").focus();
        return false;
    } else if (precVenta == '') {
        setTimeout(function() {
            $("#lbPreVenta").html("<span style='color:red;'> Complete el campo precio venta </span>").fadeOut(10000);
        }, 0);

        $("#precio_venta").focus();
        return false;
    } else if (precCosto == '') {
        setTimeout(function() {
            $("#lbPreCosto").html("<span style='color:red;'> complete el campo precio costo </span>").fadeOut(10000);
        }, 0);

        $("#precio_costo").focus();
        return false;
    } else if (stock == '') {
        setTimeout(function() {
            $("#lbStock").html("<span style='color:red;'> complete el campo stock </span>").fadeOut(10000);
        }, 0);

        $("#stock").focus();
        return false;
    } else if (stockCritico == '') {
        setTimeout(function() {
            $("#lbStockCri").html("<span style='color:red;'> complete el campo stock critico </span>").fadeOut(10000);
        }, 0);

        $("#stock_critico").focus();
        return false;
    } else if (img == '') {
        setTimeout(function() {
            $("#lbImagen").html("<span style='color:red;'> complete el campo de imagen </span>").fadeOut(10000);
        }, 0);

        $("#imagen").focus();
        return false;
    } else if (descri == '') {
        setTimeout(function() {
            $("#lbDescri").html("<span style='color:red;'> complete el campo descripción </span>").fadeOut(10000);
        }, 0);

        $("#descripcion").focus();
        return false;
    } else {
        $.ajax({
            url: "<?php echo base_url(); ?>/productosadmin/NuevoProducto",
            method: "POST",
            data: {
                "funcion": fun,
                "nombres": nomProducto,
                "marca": marca,
                "precVenta": precVenta,
                "precCosto": precCosto,
                "stock": stock,
                "stockCritico": stockCritico,
                "descri": descri,
                "imagen": img,
            },
            success: function(data) {
                console.log(data);
            }
        });
    }
});	

 var tablaProd = $("#tabla-productos").DataTable({
    "aaSorting": [ [0,'desc'] ],
    "columnDefs": [{ "width": "30%", "targets": 1 },
    { "width": "20%", "targets": 2 },
    { "width": "10%", "targets": 3 },
    { "width": "10%", "targets": 4 },
    { "className": "dt-center", "targets": "_all" }],
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
        }
    }
 });

 function alt(){
     alert('funciona');
     console.log('yyy');
 }

 function actualizarTabla(arr){
    arraySeteado = [];
    for(var i = 0; i < arr.length; i++){
    
        var temp = [arr[i]['n_registro'],
        arr[i]['nombre'],
        '$'+(arr[i]['precio_venta']).replace(/\B(?=(\d{3})+(?!\d))/g, "."),
        arr[i]['stock'],
        arr[i]['categoria'],
        arr[i]['btn_accion']];
        arraySeteado.push(temp);
    }
    tablaProd.rows.add(arraySeteado).draw();
    console.log(arraySeteado);
 }

 