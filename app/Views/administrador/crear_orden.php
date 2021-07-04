<style type="text/css">
    .btn-buscar {
        margin-top: 2px;
        height: 35px;
        border-radius: 5px;
        margin-left: -15px;
    }

    #div-total {
        text-align: right;
        font-size: 20px;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <label class="control-label" for="number"><span class="require">*</span>ID Proveedor</label>
        </div>
        <div class="col-md-2 pull-right" style="text-align-last: end;">
            <a href="#" class="btn" data-toggle="modal" data-target="#proveedor">
                <i class="fa fa-user"></i>&nbsp;Ver Proveedores
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <input type="hidden" id="id_empleado" name="id_empleado">
            <input type="hidden" id="id_proveedor" name="id_proveedor">
            <input type="text" class="form-control" id="id_prove" name="id_prove" placeholder="Ingrese ID de Proveedor" autofocus>
            <label for="id_prove" id="resultado_error" style="color: red"></label>
        </div>
        <div class="col-md-2">
            <button class="btn btn-info btn-buscar" onclick="buscarProveedor(event, this, this.value)">
                <i class="fa fa-search"></i>&nbsp;Buscar
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 pb-30">
            <h5>Datos empresa</h5>
        </div>
        <div class="form-group col-md-4">
            <label for="rubro">*Rut empresa</label>
            <input type="number" class="form-control" id="rut_emp" name="rut_emp" disabled>
            <label for="" id="lbRutEmp"></label>
        </div>
        <div class="form-group col-md-4">
            <label for="rubro">*Dv</label>
            <input type="text" class="form-control" id="dv_emp" name="dv_emp" disabled>
            <label for="" id="lbDvEmp"></label>
        </div>
        <div class="form-group col-md-4">
            <label for="rubro">*Rubro</label>
            <input type="text" class="form-control" id="rubro" name="rubro" disabled>
            <label for="" id="lbRubroEmp"></label>
        </div>
        <div class="form-group col-md-4">
            <label for="rubro">*Razón social</label>
            <input type="text" class="form-control" id="razon" name="razon" disabled>
            <label for="" id="lbRazonEmp"></label>
        </div>
        <div class="form-group col-md-4">
            <label for="rubro">°Teléfono</label>
            <input type="number" class="form-control" id="telefono" name="telefono" disabled>
        </div>
        <div class="form-group col-md-4">
            <label for="rubro">*Giro</label>
            <input type="text" class="form-control" id="giro" name="giro" disabled>
            <label for="" id="lbGiroEmp"></label>
        </div>
    </div>


    <div class="row">
        <div class="col-md-2">
            <label class="control-label" for="number"><span class="require">*</span>ID Producto</label>
        </div>
        <div class="col-md-2 pull-right" style="text-align-last: end;">
            <a href="#" class="btn" data-toggle="modal" data-target="#productos">
                <i class="fa fa-user"></i>&nbsp;Ver Productos
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <input type="hidden" name="id_producto" id="id_producto">
            <input type="number" class="form-control" id="id_prod" name="id_prod" placeholder="Ingrese ID de Producto" autofocus>
            <label for="id_prod" id="resultado_error2" style="color: red"></label>
        </div>
        <div class="col-md-2">
            <button class="btn btn-info btn-buscar" onclick="buscarPro(event, this, this.value)">
                <i class="fa fa-search"></i>&nbsp;Buscar
            </button>
        </div>
    </div>
    <form id="prodoc">
        <div class="row">
            <div class="form-group col-md-4">
                <label for="rubro">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" disabled>
                <label for="" id="lbGiroEmp"></label>
            </div>
            <div class="form-group col-md-4">
                <label for="rubro">Marca</label>
                <input type="text" class="form-control" id="marca" name="marca" disabled>
                <label for="" id="lbGiroEmp"></label>
            </div>
            <div class="form-group col-md-4">
                <label for="rubro">Cantidad a solicitar</label>
                <input type="number" class="form-control" id="cantidad" name="cantidad" onkeyup="calcularSubtotal(event)">
                <label for="" id="lbGiroEmp"></label>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <label for="rubro">precio costo</label>
                <input type="text" class="form-control" id="precio_costo" name="precio_costo" disabled>
                <label for="" id="lbGiroEmp"></label>
            </div>
            <div class="form-group col-md-4">
                <label for="rubro">Subtotal</label>
                <input type="text" class="form-control" id="subtotal" name="subtotal" disabled>
                <label for="" id="lbGiroEmp"></label>
            </div>
            <div class="pull-center col-md-4">
                <button type="button" id="agregarProTabla" class="btn btn-secondary btn-buscar" onclick="agregarProducto()" style="margin-top: 33px;">
                    <i class="fa fa-plus"></i>&nbsp;Agregar
                </button>
            </div>
        </div>
    </form>
    <div class=" row">
        <table id="tablaProducto" class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Marca</th>
                    <th>precio costo</th>
                    <th>C/solicitar</th>
                    <th>Subtotal</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody id="lista-producto">
            </tbody>
        </table>
    </div>

    <div class="row" style="display: none" id="div-total">
        <div class="col-md-12">
            <br>
            <input type="hidden" name="total" id="hidden-total" value="0">
            <span class="span-total">TOTAL: </span><span id="cantidad-total" class="span-total"></span>
            <br>
            <button type="button" onclick="generarOrden()" class="newsletter-btn">Solicitar</button>
        </div>
    </div>
</div>
<!-- Modal listado de proveedores -->
<div class="modal fade" id="proveedor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Datos proveedores</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>id_proveedor</th>
                            <th>Rubro</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($datos as $prove) { ?>
                            <tr>
                                <td><?php echo $prove['id_proveedor']; ?></td>
                                <td><?php echo $prove['rubro']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal listado de productos-->
<div class="modal fade" id="productos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Datos productos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id_producto</th>
                            <th>Nombre</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($productos as $pro) { ?>
                            <tr>
                                <td><?php echo $pro['id_producto']; ?></td>
                                <td><?php echo $pro['nombre']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url() ?>/js/ajax-mail.js"></script>
<script src="<?php echo base_url(); ?>/js/vendor/jquery-3.6.0.min.js"></script>
<script>
    function buscarProveedor(e, tagId) {
        var codigo = $('#id_prove').val();
        $.ajax({
            url: '<?php echo base_url(); ?>/Proveedor/buscarIdProveedor/' + codigo,
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
            url: '<?php echo base_url(); ?>/Proveedor/buscarProducto/' + codigo,
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
</script>

<script>
    const contenedorProductos = document.querySelector('#lista-producto');
    const arrayProductos = [];

    function agregarProducto(event) {
        var id_producto = $("#id_producto").val();
        var listaProductos = document.querySelectorAll('#lista-producto');
        listaProductos.forEach(lp => {
            if (arrayProductos.length === 0) {
                agregarProductotabla();
                arrayProductos.push(id_producto);
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

        productoEnFila.setAttribute('id', 'producto-' + id_producto);
        const contenedor = `
            <th>${nombre}</th>
            <th>${marca}</th>
            <th>
                <span class="cantidad" id="precio-${id_producto}" >$ ${precio_costo}</span>
            </th>
            <th>
                <span class="cantidad" id="cantidad-${id_producto}" value="${cantidad}">${cantidad}</span>
            </th>
            <th>
                <input class="sub-total-table" type="hidden" value="${subtotal}" id="hidden-sub-total-${id_producto}">
                <span class="cantidad " id="sub-total-${id_producto}">$ ${subtotal}</span>

            </th>
            <th>
                <button type="button" class="btn btn-sm btn-danger" onclick="eliminarProducto(${id_producto})">
                    <i class="fa fa-trash"></i>
                </button>
            </th> `;
        productoEnFila.innerHTML = contenedor;
        contenedorProductos.append(productoEnFila);
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
        var cantidad = $("#cantidad").val();
        var subtotal = $("#subtotal").val();
        $('#cantidad-' + id_producto).val(cantidad).text(cantidad);
        $('#sub-total-' + id_producto).val(subtotal).text('$ ' + subtotal);
        $('#hidden-sub-total-' + id_producto).val(subtotal);
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
        $('#producto-' + id).remove();
        actualizarTotal();
    }

    function generarOrden() {
        var input_prove = document.getElementById('id_prove').value;
        console.log(input_prove)
        var input_produc = document.getElementById('id_prod').value;
        console.log(input_produc)
        var valorTotal = $('#hidden-total').val();
        var neto = (valorTotal - (valorTotal * 0.19));
        var iva = valorTotal * 0.19;
        var id_prov = $('#id_proveedor').val();
        if (input_prove != '' && input_produc != '') {
            $.ajax({
                url: '<?php echo base_url(); ?>/OrdenesCompra/generarOrden',
                method: "POST",
                data: {
                    valorTotal: valorTotal,
                    neto: neto,
                    iva: iva,
                    id_prov: id_prov
                },
                success: function(data) {
                    alert('Orden generada correctamente');

                    window.location.href = '<?php echo base_url(); ?>/ordenescompra'
                }
            });
        } else {
            alert('Debe completar los campos');
        }
    }
</script>