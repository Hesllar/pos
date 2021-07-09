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
        actualizarTotal();
    }

    function actualizarTotal() {
        var aux = 0;
        $('.sub-total-table').each(function(index, elem) {
            aux = parseInt(aux) + parseInt($(elem).val());
            console.log($(elem).val());
        });
        
        $('#hidden-total').val(aux);
        $('#cantidad-total').text('$ ' + aux);
    }

    function eliminarProducto(id) {
        $('#' + id).remove();
        actualizarTotal();
    }
 
    function generarOrden() {
        var id_user = $('#id_empleado').val();
        var input_prove = document.getElementById('id_prove').value;
        var rut_emp = $('#rut_emp').val();
        var valorTotal = $('#hidden-total').val();
        var neto = (valorTotal - (valorTotal * 0.19));
        var iva = valorTotal * 0.19;
        var id_prov = $('#id_proveedor').val();
        var tabla = document.querySelectorAll('#lista-producto tr');

        //console.log(tabla);
        if (tabla.length > 0 &&  input_prove != ''  && rut_emp != '') {
            $.ajax({
                url: '/pos/public/OrdenesCompra/generarOrden',
                method: "POST",
                data: {
                    valorTotal: valorTotal,
                    neto: neto,
                    iva: iva,
                    id_prov: id_prov,
                    id_user:id_user
                },
                success: function(data) {
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
            Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Debe rellenar los campos solicitados o llenar la tabla de productos',
                    });
        }
    }

    const contenedorProductosOrdenEdit = document.querySelector('#lista-producto');
    const arrayProductosEdit = [];
    function agregarProductoEdit(){
        var id_producto = $('#id_prod').val();
        var id_pro = document.querySelectorAll('#lista-producto tr');
        id_pro.forEach((tr, i) =>{
        arrayProductosEdit.push(tr.id);
    });

    if(arrayProductosEdit.includes(id_producto)){
        console.log('actualiza');
    }else{
        agregarProductotablaEdit(id_producto);
        arrayProductosEdit.push(id_producto);    
        console.log('Agrega');
    }
    }

    function agregarProductotablaEdit()
    {
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
            <th class="precio_costo">
             ${precio_costo}
            </th>
            <th>
                <input class="cambiarCantidad" onchange="cambiar(event)" id="c-${id_producto}" type="number"  value="${cantidad}" min=0>
            </th>
            <th>
                <input class="sub-total-table" type="hidden" value="${subtotal}" id="hidden-sub-total-${id_producto}">
                <span class="produc_id-${id_producto}" id="${subtotal}">${subtotal}</span>

            </th>
            <th>
                <button type="button" class="btn btn-sm btn-danger" onclick="eliminarProdEdit(${id_producto})">
                    <i class="fa fa-trash"></i>
                </button>
            </th> `;
        productoEnFila.innerHTML = contenedor;
        contenedorProductosOrdenEdit.append(productoEnFila);
        arrayProductosEdit.push(id_producto);

        var newTotal = parseInt(hiddenTotal) + parseInt(subtotal);

        $('#hidden-total').val(newTotal);
        $('#cantidad-total').text('$ ' + newTotal);

    }

    function cambiar(event){
            const entrada = event.target;
            console.log(entrada.value, 'entrada' );
            var id_pro = document.querySelectorAll('#lista-producto tr');
             id_pro.forEach((tr, i) =>{
                 var ent = entrada.id.replace('c-', '');
                 var precio = tr.querySelector('.precio_costo').textContent;
                 var suma = precio * entrada.value;
                 if(tr.id == ent){
                    $('.produc_id-' + tr.id).text(suma);
                    $('#hidden-sub-total-' + tr.id).val(suma);        
            }
           
        });
        actualizarTotal();
        //$('#cantidad-total').text(total);
        var ent = entrada.id.replace('c-', '');
        
    }

    if($("#tablaProducto").length > 0){
        
       actualizarTotal();   


    function generarOrdenEdit(){
        var tabla = document.querySelectorAll('#lista-producto tr');
        var id_orden = document.getElementById('id_orden_edit').value;
        var input_prove = document.getElementById('id_prove').value;
        var valorTotal = $('#hidden-total').val();
        var neto = (valorTotal - (valorTotal * 0.19));
        var iva = valorTotal * 0.19;
        if (input_prove != '' && tabla.length > 0) {
            $.ajax({
                url: '/pos/public/OrdenesCompra/actualizarOrden',
                method: "POST",
                data: {
                    valorTotal: valorTotal,
                    neto: neto,
                    iva: iva,
                    id_prov: input_prove,
                    id_orden:id_orden,
                },
                success: function(data) {
                    var listaTr = document.querySelectorAll('#lista-producto tr');
                    var arrayLista = [];
                    listaTr.forEach((tr, i) => {
                        var sacarPeso = tr.querySelector('.precio_costo').textContent.replace('$ ', '');
                       
                        var sacarPesoTotal = tr.querySelector('.produc_id-'+ tr.id).textContent.replace('$ ', '');
                        
                        var arraTemp = [tr.id, tr.querySelector('.cambiarCantidad').value, sacarPeso, sacarPesoTotal];
                        arrayLista.push(arraTemp);
                    });
                    console.log(arrayLista)
                    $.ajax({
                        url: '/pos/public/OrdenesCompra/actualizarDetalleOrden/' + id_orden,
                        method: "POST",
                        dataType: "JSON",
                        data: {
                            lista: arrayLista,
                        },
                        success: function() {
                            
                        }
                    });
                     Swal.fire({
                        text: 'Orden editada correctamente',
                        icon: 'success',
                    }).then((result) => {
                    if (result.isConfirmed) {
                
                         window.location.href = '/pos/public/ordenescompra';
                     
                    }
                });
                   
                }
            });
        } else {
            Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Debe rellenar los campos solicitados o llenar la tabla de productos',
                    });
        }

        
    }


    function eliminarProdEdit(id)
    {
        eliminarProducto(id);
        
        var id_orden = document.getElementById('id_orden_edit').value;

        $.ajax({
            url: '/pos/public/OrdenesCompra/eliminarOrdenDetalle/' + id_orden + '/' + id,
            method: "POST",
            dataType:"JSON",
            success: function(data)
            {
                console.log(data);
            }
        })
    }

    function validarIngresoProducto()
    {
        var nombre = $("#nombre").val();
        var marca = $("#marca").val();
        var precio_costo = $("#precio_costo").val();
        var cantidad = $("#cantidad").val();
        var subtotal = $("#subtotal").val();

        if(nombre == '' || marca == '' || precio_costo == '' || cantidad == '' || subtotal == ''){
            Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Debe rellenar los campos solicitados',
                    });
        }
        else{
            agregarProducto(event);
        }
    }




}

function vistaOrden(id_orden)
{

    $.ajax({
        url: '/pos/public/OrdenesCompra/allDatosProvView/'+ id_orden,
        method: "POST",
        dataType: "JSON",
        success: function(data){
            $('#idOrden').val(data.datos.id_orden);
            $('#fecha_emision').val(data.datos.fecha_emision);
            $('#rubro').val(data.datos.rubro);
            $('#fono').val(data.datos.telefono);
            $('#social').val(data.datos.razon);
            $('#giro').val(data.datos.giro);
            $('#rut_emp').val(data.datos.rut_emp);
            $('#Iva').val(data.datos.valor_iva);
            $('#subtotal').val(data.datos.valor_neto);
            $('#totales').val(data.datos.valor_total);
        } 
    });
    $.ajax({
        url: '/pos/public/OrdenesCompra/dtsSolicitante/'+ id_orden,
        method: "POST",
        dataType: "JSON",
        success: function(data){
            $('#nom_empleado').val(data.datos.solicitante);
        
        } 
    });
    $.ajax({
        url: '/pos/public/OrdenesCompra/dtsDetallePro/'+ id_orden,
        method: "POST",
        dataType: "JSON",
        success: function(data){
            $('.listProduct').html('')
            $.each(data.datos, function (i, value) {
                $('.listProduct').append('<tr>\
                <td>' + value['nombre_pro'] + '</td>\
                <td>' + value['cantidad'] + '</td>\
                <td>' + value['precio_costo'] + '</td>\
                <td>' + value['valor_total'] + '</td>\
                ')
            });
        
        } 
    })
    
}

