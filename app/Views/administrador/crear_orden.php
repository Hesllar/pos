<div class="container">
    <label class="control-label" for="number"><span class="require">*</span>Id proveedor</label>
    <div class="row">
        <div class="form-group">
            <div class="row">
                <div class="col-md-10">
                    <input type="hidden" id="id_empleado" name="id_empleado">
                    <input type="hidden" id="id_proveedor" name="id_proveedor">
                    <input type="number" class="form-control" id="id_prove" name="id_prove" placeholder="Luego de ingresar el id presione Enter" onkeyup="buscarProveedor(event, this, this.value)" autofocus>
                    <label for="id_prove" id="resultado_error" style="color: red"></label>
                </div>
                <div class="pull-center col-md-2">
                    <button type="button" class="btn-submit" data-toggle="modal" data-target="#proveedor">
                        Ver_id_proveedor
                    </button>
                </div>
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
            <div class="col-md-10">
                <input type="hidden" name="id_producto" id="id_producto">
                <input type="number" class="form-control" id="id_prod" name="id_prod" placeholder="Luego de ingresar el id presione Enter" onkeyup="buscarPro(event, this, this.value)" autofocus>
                <label for="id_prod" id="resultado_error2" style="color: red"></label>
            </div>
            <div class="pull-center col-md-2">
                <button type="button" class="btn-submit" data-toggle="modal" data-target="#productos">
                    Ver_id_productos
                </button>
            </div>
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
                <button type="button" id="agregarProTabla" class="btn-submit">
                    Agregar
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
</div>
<!-- Modal listado de proveedores -->
<div class="modal fade" id="proveedor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Datos categoria</h5>
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
                <h5 class="modal-title" id="exampleModalLabel">Datos categoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id_producto</th>
                            <th>Marca</th>
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
<!--<script>
    function buscarEmp(id_emp) {
        $.ajax({
            url: '<?php echo base_url(); ?>/Proveedor/buscarIdProveedor/' + id_emp,
            dataType: 'json',
            success: function(resultado) {
                $('#id_empleado').val(resultado.datos.id_empleado)
            }
        })
    }
</script>-->

<script>
    function buscarProveedor(e, tagId, codigo) {

        var enterKey = 13;

        if (codigo != '') {

            if (e.which == enterKey) {
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
        }
    }

    function buscarPro(e, tagIdPro, codigo) {
        var enterKey = 13;
        if (codigo != '') {
            if (e.which == enterKey) {
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
        }
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
    const btnAgregar = document.getElementById('agregarProTabla');
    btnAgregar.addEventListener('click', agregarProducto);

    function agregarProducto(event) {
        var id_producto = $("#id_producto").val();
        var listaProductos = document.querySelectorAll('#lista-producto');
        listaProductos.forEach(lp => {
            if (lp.querySelector('#id_pro') != null) {
                var idPro = lp.querySelector('#id_pro');
                if (idPro.value == id_producto) {
                    alert('El producto ya existe en la orden');
                } else {

                }

            } else {
                alert('nulo');
            }
            var id_producto = $("#id_producto").val();
            var nombre = $("#nombre").val();
            var marca = $("#marca").val();
            var precio_costo = $("#precio_costo").val();
            var cantidad = $("#cantidad").val();
            var subtotal = $("#subtotal").val();
            agregarProductotabla(id_producto, nombre, marca, precio_costo, cantidad, subtotal);
        });

    }

    function agregarProductotabla(id_producto, nombre, marca, precio_costo, cantidad, subtotal) {
        const productoEnFila = document.createElement('tr');
        const contenedor = `
                    <th>
                        <input id="id_pro" name="id_pro" type="hidden" value="${id_producto}" disabled>
                        ${nombre}
                    </th>
                    <th>
                        ${marca}
                    </th>
                    <th>
                        <input id="precio_costo" name="precio_costo" type="text" class="cantidad" value="${precio_costo}" disabled>
                    </th>
                    <th>
                        <input id="cantidadComprar" name="cantidadComprar" class="cantidad" type="number" value="${cantidad}" onclick="actualizarTotal(event)">
                    </th>
                    <th>
                        <input id="cantidadSub" name="cantidadSub" class="cantidad" type="text" value="${subtotal}" disabled>
                    </th>
                    <th>
                        <button type="button" class="btn-submit">
                         <i class="fa fa-trash"></i>
                        </button>
                    </th> `;
        productoEnFila.innerHTML = contenedor;
        contenedorProductos.append(productoEnFila);
        if (productoEnFila) {
            productoEnFila
                .querySelector('.fa-trash')
                .addEventListener('click', eliminarProducto);

            productoEnFila
                .querySelector('#cantidadComprar')
                .addEventListener('change', cambiarCantidad);
        }
        actualizarTotal()
    }

    function cambiarCantidad(event) {
        const entrada = event.target;
        entrada.value <= 0 ? (entrada.value = 1) : null;
        actualizarTotal()
    }

    function actualizarTotal() {
        let total = 0;
        //const totalCarrito = document.querySelector('#subtotal');

        const itemsTotal = contenedorProductos.querySelectorAll('tr');
        console.log(itemsTotal);
        itemsTotal.forEach(itemTotal => {
            const itemPrecio = itemTotal.querySelector('#precio_costo').value;
            const precioProducto = Number(itemPrecio.replace('$', ''));

            const itemCantidad = itemTotal.querySelector('#cantidadComprar').value;
            const cantidadProducto = Number(itemCantidad);
            const subTotal = itemTotal.querySelector('#cantidadSub');
            var total = precioProducto * cantidadProducto;
            var totalFinal = $("#cantidadSub").val(total);
        });
    }
</script>