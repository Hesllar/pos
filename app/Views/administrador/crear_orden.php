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
<?php $user = session() ?>
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
            <input type="hidden" id="nvl_acces" value="<?php echo $user->nvl_acceso_fk; ?>">
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