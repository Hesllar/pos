<div id="layoutSidenav_content">
    <main>

        <div class="container-fluid">
            <div class=row>
                <div class="col-4">
                    <div class="card text-white bg-primary">
                        <div class="card-body">
                            Total de Productos:
                            <?php echo $productos ?>
                        </div>
                        <a class="card-footer text-white" href="<?php echo base_url() ?>/Estadistica/cargarstockTotal">Ver Detalle (PDF)</a>
                        <a class="card-footer text-white" href="<?php echo base_url() ?>/Estadistica/excelTotalProductos">Generar Reporte (Excel)</a>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card text-white bg-success">
                        <div class="card-body">
                            Ventas del Día:
                            <?php echo $ventas ?>
                            <br>
                            Total Ventas:
                            <?php echo $sumaTotal['total'] ?>
                        </div>

                        <a class="card-footer text-white" href="<?php echo base_url() ?>/Estadistica/pagVentaXEmp">Ver Detalle (PDF)</a>
                        <a class="card-footer text-white" id="btnbuscar" href="#" data-toggle="modal" data-target="#grafico">Ver Grafico</a>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card text-white bg-danger">
                        <div class="card-body">
                            Productos con Stock Minimo:
                            <?php echo $stock_minimo ?>
                        </div>
                        <a class="card-footer text-white" href="<?php echo base_url() ?>/Estadistica/pagStockMin">Ver Detalle (PDF)</a>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card text-white bg-info">
                        <div class="card-body">
                            Cantidad de Visitas:
                            <?php echo $contar ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="panel">
                        <h4 class="d-flex justify-content-center">Generar Reportes Ventas por Periodo (PDF y Excel)</h4>
                        <br>
                        <div class="form-row d-flex justify-content-center">
                            <form action="<?php echo base_url() ?>/Estadistica/excelVentas" method="POST">
                                <div class="form-group col-6">
                                    <label for="">Fecha Inicio</label>
                                    <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" required>
                                </div>
                                <div class="form-group col-6">
                                    <label for="">Fecha Termino</label>
                                    <input type="date" class="form-control" id="fecha_termino" name="fecha_termino" required>
                                </div>

                                <div class="form-group col-6 d-flex justify-content-around">
                                    <button type="submit" name="buscar" value="1" class="btn btn-outline-success" target="_blank">Generar PDF</button>
                                    <button type="submit" name="buscar" value="2" class="btn btn-outline-success">Generar Excel</button>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div class="modal fade" id="grafico" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Datos Grafico</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <fieldset>
                                <canvas id="myChart" width="400" height="400"></canvas>
                            </fieldset>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">

                    <button type="submit" class="newsletter-btn" data-dismiss="modal">Aceptar</button>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url(); ?>/js/vendor/jquery-3.6.0.min.js"></script>
    <script>
        var paramTotal = [];
        var paramNombre = [];
        var paraCountVenta = [];

        $('#btnbuscar').click(function() {
            $.post("<?php echo base_url() ?>/Estadistica/datos", function(data) {
                var obj = JSON.parse(data);
                $.each(obj, function(i, item) {
                    paramTotal.push(item.total)
                    paramNombre.push(item.nombre)
                    paraCountVenta.push(item.venta)
                })
                var ctx = document.getElementById('myChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: paramNombre,
                        datasets: [{
                            label: 'Total de Ventas por Cajero',
                            data: paramTotal,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            })
        });
    </script>