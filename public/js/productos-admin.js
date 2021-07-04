
 var tablaProd = $("#tabla-productos").DataTable({
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