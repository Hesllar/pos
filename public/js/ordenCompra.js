//obtDtsProve();

function buscarProveedor(e, tagId) {

        var codigo = $('#id_prove').val();
        $.ajax({
            url: '/pos/public/Proveedor/buscarIdProveedor/' + codigo,
            dataType: 'json',
            success: function(resultado) {
                if (resultado == 0) {
                    $(tagId).val('');
                } else {
                    $(tagId).removeClass('has-error');
                    $("#resultado_error").html(resultado.error);

                    if (resultado.existe) {
                        $("#id_proveedor").val(resultado.datos.id_proveedor);
                        $("#rut_emp").val(resultado.datos.rut_emp);
                        $("#dv_emp").val(resultado.datos.dv_empresa);
                        $("#rubro").val(resultado.datos.rubro);
                        $("#razon").val(resultado.datos.razon);
                        $("#telefono").val(resultado.datos.telefono);
                        $("#giro").val(resultado.datos.giro);

                    } else {
                        $("#id_proveedor").val('');
                        $("#rut_emp").val('');
                        $("#dv_emp").val('');
                        $("#rubro").val('');
                        $("#razon").val('');
                        $("#telefono").val('');
                        $("#giro").val('');
                    }
                }
            }
        })
    }

    function buscarPro(e, tagIdPro, codigo) {
        var codigo = $('#id_prod').val();
        $.ajax({
            url: '/pos/public/Proveedor/buscarProducto/' + codigo,
            dataType: 'json',
            success: function(resultado) {
                if (resultado == 0) {
                    $(tagIdPro).val('');
                } else {
                    $(tagIdPro).removeClass('has-error');
                    $("#resultado_error2").html(resultado.error);

                    if (resultado.existe) {
                        $("#id_producto").val(resultado.datos.id_producto);
                        console.log('ID_PRODUCT: ', resultado.datos.id_producto);
                        $("#nombre").val(resultado.datos.nombre);
                        $("#marca").val(resultado.datos.marca);
                        $("#precio_costo").val(resultado.datos.precio_costo);
                    } else {
                        $("#id_producto").val('');
                        $("#nombre").val('');
                        $("#marca").val('');
                        $("#precio_costo").val('');
                        $("#subtotal").val('');
                    }
                }
            }
        })
    }

    function calcularSubtotal() {
        var subtotal = 0;
        var id_por = $("#id_producto").val();
        var inputPro = $("#id_prod").val();
        if (id_por == inputPro) {
            var precio = Number($("#precio_costo").val().replace('$', ''));
            var cantidad = $("#cantidad").val();
            var subtotal = precio * cantidad;
            $("#subtotal").val(subtotal);
        } else {
            $("#subtotal").val('0');
        }
    }


    const contenedorProductosOrden = document.querySelector('#lista-producto');
    const arrayProductos = [];

    function agregarProducto(event) {
        var id_producto = $("#id_producto").val();
        var listaProductos = document.querySelectorAll('#lista-producto');
        listaProductos.forEach(lp => {
            if (arrayProductos.length === 0) {
                agregarProductotabla();
                //arrayProductos.push(id_producto);
            } else {
                if (arrayProductos.includes(id_producto)) {
                    
                    actualizarProducto(id_producto);
                } else {
                    agregarProductotabla(id_producto);
                     

                }
            }
        });
    }

    function agregarProductotabla() {
        var id_producto = $("#id_producto").val();
        var nombre = $("#nombre").val();
        var marca = $("#marca").val();
        var precio_costo = $("#precio_costo").val().replace('$', '');
        var cantidad = $("#cantidad").val();
        var subtotal = $("#subtotal").val();
        var hiddenTotal = $('#hidden-total').val();
        const productoEnFila = document.createElement('tr');

        productoEnFila.setAttribute('id',  id_producto);
        const contenedor = `
            <th>${nombre}</th>
            <th>${marca}</th>
            <th>
                <span class="cantidad costo" id="${id_producto}" >$ ${precio_costo}</span>
            </th>
            <th>
                <span class="cantidad-${id_producto} base base-${id_producto}" id="${id_producto}" value="${cantidad}">${cantidad}</span>
            </th>
            <th>
                <input class="sub-total-table" type="hidden" value="${subtotal}" id="hidden-sub-total-${id_producto}">
                <span class="cantidad total total-${id_producto}" id="${id_producto}">$ ${subtotal}</span>

            </th>
            <th>
                <button type="button" class="btn btn-sm btn-danger" onclick="eliminarProducto(${id_producto})">
                    <i class="fa fa-trash"></i>
                </button>
            </th> `;
        productoEnFila.innerHTML = contenedor;
        contenedorProductosOrden.append(productoEnFila);
        arrayProductos.push(id_producto);

        var newTotal = parseInt(hiddenTotal) + parseInt(subtotal);

        $('#hidden-total').val(newTotal);
        $('#cantidad-total').text('$ ' + newTotal);
        $('#div-total').show();
    }

    function actualizarProducto() {
        var id_producto = $("#id_producto").val();
        var nombre = $("#nombre").val();
        var marca = $("#marca").val();
        var precio_costo = $("#precio_costo").val();
        var cantidad = $(".base-" + id_producto).text();
        var cantiSoli = Number(cantidad) + Number($("#cantidad").val());
        var subtotal = Number($(".total-" + id_producto).text().replace('$ ', ''));
        var sumarSubtotal = subtotal + Number($('#subtotal').val());

        $('.cantidad-' + id_producto).val(cantiSoli).text(cantiSoli);
        $('.total-' + id_producto).val(sumarSubtotal).text('$ ' + sumarSubtotal);
        $('#hidden-sub-total-' + id_producto).val(sumarSubtotal);
        actualizarTotal();

    }

    function cambiarCantidad(event) {
        const entrada = event.target;
        entrada.value <= 0 ? (entrada.value = 1) : null;
        // actualizarTotal()
    }

    function actualizarTotal() {
        var aux = 0;
        $('.sub-total-table').each(function(index, elem) {
            aux = parseInt(aux) + parseInt($(elem).val());
        });

        $('#hidden-total').val(aux);
        $('#cantidad-total').text('$ ' + aux);
    }

    function eliminarProducto(id) {
        $('#' + id).remove();
        actualizarTotal();
    }

    function generarOrden() {
        var input_prove = document.getElementById('id_prove').value;
        var input_produc = document.getElementById('id_prod').value;
        var valorTotal = $('#hidden-total').val();
        var neto = (valorTotal - (valorTotal * 0.19));
        var iva = valorTotal * 0.19;
        var id_prov = $('#id_proveedor').val();
        if (input_prove != '' && input_produc != '') {
            $.ajax({
                url: '/pos/public/OrdenesCompra/generarOrden',
                method: "POST",
                data: {
                    valorTotal: valorTotal,
                    neto: neto,
                    iva: iva,
                    id_prov: id_prov
                },
                success: function(data) {
                    var lista = document.querySelector('#lista-producto');
                    console.log(lista);
                    var listaTr = document.querySelectorAll('#lista-producto tr');
                    var arrayLista = [];
                    listaTr.forEach((tr, i) => {
                        var sacarPeso = tr.querySelector('.costo').textContent.replace('$ ', '');
                        var sacarPesoTotal = tr.querySelector('.total').textContent.replace('$ ', '');
                        var arraTemp = [tr.querySelector('.base').id, tr.querySelector('.base').textContent, sacarPeso, sacarPesoTotal];
                        arrayLista.push(arraTemp);
                    });

                    $.ajax({
                        url: '/pos/public/OrdenesCompra/generarDetalleOrd',
                        method: "POST",
                        dataType: "JSON",
                        data: {
                            lista: arrayLista
                        },
                        success: function(data) {

                        }
                    });
                    Swal.fire({
                        text: 'Orden generada correctamente',
                        icon: 'success',
                    }).then((result) => {
                    if (result.isConfirmed) {
                        $('#nvl_acces').val() == 10 ? 
                         window.location.href = '/pos/public/ordenescompra':
                         window.location.href = '/pos/public/ordenescompra/traerOrden';
                    } 
                });

                   
                }
            });
        } else {
            alert('Debe completar los campos');
        }
    }

    /*function obtDtsProve(){
        var id_prov = $('#id_prove_edit').val();
        console.log(id_prov);
        //var id_orden = $('#id_orden_edit').val();
        
        $.ajax({
            url: '/pos/public/OrdenesCompra/datosProvEdit',
            method:"POST",
            dataType: "json",
            data:{
                prove:id_prov
            },
            success: function(){

            }
        });
    }*/

    //Zona de edicion


    function actualizarTotalEdit() {
        var aux = 0;
        $('.sub-total-table').each(function(index, elem) {
            aux = parseInt(aux) + parseInt($(elem).val());
           
        });
         console.log(aux);

        $('#hidden-total').val(aux);
        $('#cantidad-total').text('$ ' + aux);
    }

    function agregarProductoEdit(){
        var id_producto = $('#id_prod').val();
        var id_pro = document.querySelectorAll('#lista-producto tr');
        var arrayLista = [];
        id_pro.forEach((tr, i) =>{
        arrayLista.push(tr.id);
    });

    if(arrayLista.includes(id_producto)){
        console.log('actualiza');
    }else{
        arrayLista.push(id_producto);    
    }
}


    if($("#tablaProducto").length > 0){
        
       actualizarTotalEdit();   
        $('.cambiarCantidad').change( function(event){
            var subtotal = $('#hidden-total').val()
            const entrada = event.target;
            var id_pro = document.querySelectorAll('#lista-producto tr');
             id_pro.forEach((tr, i) =>{
                 var ent = entrada.id.replace('c-', '');
                 var precio = tr.querySelector('.precio_costo').textContent;
                 if(tr.id == ent){
                    var suma = precio * entrada.value;
                    $('.produc_id-' + tr.id).text(suma);      
            }
        });
        var ent = entrada.id.replace('c-', '');
        console.log($('.produc_id-' + ent));
    });
    

}