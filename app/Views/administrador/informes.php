<div id="layoutSidenav_content">
    <main>

        <div class="container-fluid">
            <div class=row>
                <div class="col-4">
                    <div class="card text-white bg-primary">
                        <div class="card-body">
                            Total de productos
                            <?php echo $productos ?>
                        </div>
                        <a class="card-footer text-white" href="<?php echo base_url() ?>/ProductosAdmin">Ver detalle</a>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card text-white bg-success">
                        <div class="card-body">
                            Ventas del día
                            <?php echo $ventas ?>
                            <br>
                            Total ventas:
                            <?php echo $sumaTotal['total'] ?>
                        </div>
                        <a class="card-footer text-white" href="<?php echo base_url() ?>/Estadistica/pagVentaXEmp">Ver detalle</a>
                        <a class="card-footer text-white" id="btnbuscar" href="#" data-toggle="modal" data-target="#grafico">Ver grafico</a>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card text-white bg-danger">
                        <div class="card-body">
                            Productos con sotck minimo
                            <?php echo $stock_minimo ?>
                        </div>
                        <a class="card-footer text-white" href="<?php echo base_url() ?>/Estadistica/pagStockMin">Ver detalle</a>
                    </div>
                </div>
            </div>
        </div>

    </main>
    <div class="modal fade" id="grafico" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Datos grafico</h5>
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
                            label: 'Total de ventas por cajero',
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