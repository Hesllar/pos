<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ConfiguracionModel;
use App\Models\ProductosAdminModel;
use App\Models\VentaModel;
use App\Models\SesionModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class Estadistica extends BaseController
{
    protected $configuracion;
    protected $productos;
    protected $ventas;
    protected $response;
    protected $request;
    protected $session;


    public function __construct()
    {
        $this->session = new SesionModel;
        $this->ventas = new VentaModel;
        $this->productos = new ProductosAdminModel;
        $this->configuracion = new ConfiguracionModel;
    }

    public function index()
    {
        $contarVisitas = $this->session->contarVisitas();
        $totalVentas = $this->ventas->totalVentas();
        $totalProduc = $this->productos->totalProductos();
        $todasLasVentas = $this->ventas->todasLasVentas();
        $stockCritico = $this->productos->StockMinimos();
        $configuracion = $this->configuracion->First();
        $data = [
            'configuracion' => $configuracion, 'productos' => $totalProduc, 'ventas' => $todasLasVentas,
            'sumaTotal' => $totalVentas, 'stock_minimo' => $stockCritico, 'contar' => $contarVisitas
        ];
        $estados = [
            'e_venta' => '',
            'e_producto' => 'active',
            'e_ordencompra' => '',
            'e_usuario' => '',
            'e_notacredito' => '',
            'e_config' => '',
            'e_estadistica' => ''
        ];

        echo view('header', $data);
        echo view('administrador/panel_header', $estados);
        echo view('administrador/informes');
        echo view('administrador/panel_footer');
        echo view('footer');
    }


    public function traerStockProduc()
    {

        $this->productos->select('nombre,stock');
        $resultado = $this->productos->findAll();

        echo json_encode($resultado);
    }

    public function pagStockMin()
    {

        $configuracion = $this->configuracion->First();
        $data = [
            'configuracion' => $configuracion
        ];
        $estados = [
            'e_venta' => '',
            'e_producto' => 'active',
            'e_ordencompra' => '',
            'e_usuario' => '',
            'e_notacredito' => '',
            'e_config' => '',
            'e_estadistica' => ''
        ];

        echo view('header', $data);
        echo view('administrador/panel_header', $estados);
        echo view('administrador/ver_stock_minimos');
        echo view('administrador/panel_footer');
        echo view('footer');
    }

    public function cargartockMin()
    {
        $this->response = \Config\Services::response();

        $pdf = new \FPDF('P', 'mm', 'letter');
        $pdf->AddPage();
        $pdf->SetMargins(10, 10, 10);
        $pdf->SetTitle("Stock criticos");
        $pdf->SetFont("Arial", 'B', 10);
        $pdf->Image("img/logo/logo1.png", 10, 7);
        $pdf->Cell(0, 5, utf8_decode("Reporte de Producto con Stock Critico"), 0, 1, 'C');
        $pdf->Ln(10);
        $pdf->Cell(40, 5, utf8_decode("Código Producto"), 1, 0, "C");
        $pdf->Cell(80, 5, "Nombre Producto", 1, 0, "C");
        $pdf->Cell(40, 5, "Marca", 1, 0, "C");
        $pdf->Cell(25, 5, "Stock Critico", 1, 0, "C");
        $pdf->Cell(12, 5, "Stock", 1, 0, "C");

        $datosProductos = $this->productos->productosStockCriti();

        foreach ($datosProductos as $p) {
            $pdf->Ln();
            $pdf->Cell(40, 5, $p['id_producto'], 1, 0, "C");
            $pdf->Cell(80, 5, $p['nombre'], 1, 0, "C");
            $pdf->Cell(40, 5, $p['marca'], 1, 0, "C");
            $pdf->Cell(25, 5, $p['stock_critico'], 1, 0, "C");
            $pdf->Cell(12, 5, $p['stock'], 1, 0, "C");
        }

        $this->response->setHeader('Content-Type', 'application/pdf');

        $pdf->Output('productoMinimo.pdf', 'I');
    }




    public function cargarstockTotal()
    {
        $this->response = \Config\Services::response();

        $pdf = new \FPDF('P', 'mm', 'letter');
        $pdf->AddPage();
        $pdf->SetMargins(10, 10, 10);
        $pdf->SetTitle("Productos en Stock");
        $pdf->SetFont("Arial", 'B', 10);
        $pdf->Image("img/logo/logo1.png", 10, 7);
        $pdf->Cell(0, 5, utf8_decode("Reporte de Stock Total de Producto"), 0, 1, 'C');
        $pdf->Ln(10);
        $pdf->Cell(40, 5, utf8_decode("Código Producto"), 1, 0, "C");
        $pdf->Cell(80, 5, "Nombre Producto", 1, 0, "C");
        $pdf->Cell(40, 5, "Marca", 1, 0, "C");
        $pdf->Cell(25, 5, "Stock Critico", 1, 0, "C");
        $pdf->Cell(12, 5, "Stock", 1, 0, "C");

        $datosProductos = $this->productos->productosTotales();

        foreach ($datosProductos as $p) {
            $pdf->Ln();
            $pdf->Cell(40, 5, $p['id_producto'], 1, 0, "C");
            $pdf->Cell(80, 5, $p['nombre'], 1, 0, "C");
            $pdf->Cell(40, 5, $p['marca'], 1, 0, "C");
            $pdf->Cell(25, 5, $p['stock_critico'], 1, 0, "C");
            $pdf->Cell(12, 5, $p['stock'], 1, 0, "C");
        }

        $this->response->setHeader('Content-Type', 'application/pdf');

        $pdf->Output('productoTotal.pdf', 'I');
    }

    public function pagVentaXEmp()
    {

        $configuracion = $this->configuracion->First();
        $data = [
            'configuracion' => $configuracion
        ];
        $estados = [
            'e_venta' => '',
            'e_producto' => 'active',
            'e_ordencompra' => '',
            'e_usuario' => '',
            'e_notacredito' => '',
            'e_config' => '',
            'e_estadistica' => ''
        ];

        echo view('header', $data);
        echo view('administrador/panel_header', $estados);
        echo view('administrador/ver_venta_x_empleado');
        echo view('administrador/panel_footer');
        echo view('footer');
    }

    public function cargarVentaEmp()
    {

        $this->response = \Config\Services::response();

        $pdf = new \FPDF('P', 'mm', 'letter');
        $pdf->AddPage();
        $pdf->SetMargins(30, 10, 10);
        $pdf->SetTitle("Stock criticos");
        $pdf->SetFont("Arial", 'B', 10);
        $pdf->Image("img/logo/logo1.png", 10, 7);
        $pdf->Cell(0, 5, utf8_decode("Reporte Ventas de Empleado"), 0, 1, 'C');
        $pdf->Ln(10);
        $pdf->Cell(50, 5, utf8_decode("Código Empleado"), 1, 0, "C");
        $pdf->Cell(30, 5, utf8_decode("Rut"), 1, 0, "C");
        $pdf->Cell(42, 5, utf8_decode("Nombre"), 1, 0, "C");
        $pdf->Cell(20, 5, "Ventas", 1, 0, "C");
        $pdf->Cell(22, 5, "Total Venta", 1, 0, "C");
        $ventaEmp = $this->ventas->ventasXEmpleado();
        foreach ($ventaEmp as $venta) {
            $pdf->Ln();
            $pdf->Cell(50, 5, $venta['empleado'], 1, 0, "C");
            $pdf->Cell(30, 5, $venta['rut'], 1, 0, "C");
            $pdf->Cell(42, 5, $venta['nombre'], 1, 0, "C");
            $pdf->Cell(20, 5, $venta['venta'], 1, 0, "C");
            $pdf->Cell(22, 5, $venta['total'], 1, 0, "C");
        }
        //$pdf->Ln();
        //$pdf->Cell(20, 5, $venta['total'], 1, 3, 'C', false, 'C');
        $this->response->setHeader('Content-Type', 'application/pdf');
        $pdf->Output('ventasXEmpleado.pdf', 'I');
    }
    /*public function ejem()
    {
        $this->request = \Config\Services::request();
        if ($this->request->getPost('buscar') == 1) {
            $this->excelVentas();
            return redirect()->to(base_url() . '/Estadistica');
        } else {
            $this->pagVentaPeriodo();
        }
    }*/
    public function cargarVentaPeriodo()
    {

        $this->response = \Config\Services::response();
        $this->request = \Config\Services::request();
        $ventaEmp = $this->ventas->datosXPeriodo(
            $this->request->getPost('fecha_inicio'),
            $this->request->getPost('fecha_termino')
        );
        $pdf = new \FPDF('P', 'mm', 'letter');
        $pdf->AddPage();
        $pdf->SetMargins(5, 10, 10);
        $pdf->SetFont("Helvetica", 'B', 10);
        $pdf->Image("img/logo/logo1.png", 10, 7);
        $pdf->Cell(0, 5, utf8_decode("Reporte Ventas"), 0, 1, 'C');
        $pdf->Ln(10);
        $pdf->Cell(20, 5, utf8_decode("Id venta"), 1, 0, "C");
        $pdf->Cell(50, 5, utf8_decode("Fecha compra"), 1, 0, "C");
        $pdf->Cell(50, 5, utf8_decode("Nombres"), 1, 0, "C");
        $pdf->Cell(30, 5, utf8_decode("Comprobante"), 1, 0, "C");
        $pdf->Cell(10, 5, utf8_decode("C/p"), 1, 0, "C");
        $pdf->Cell(30, 5, utf8_decode("Forma pago"), 1, 0, "C");
        $pdf->Cell(20, 5, utf8_decode("total"), 1, 0, "C");
        foreach ($ventaEmp as $venta) {
            $pdf->Ln();
            $pdf->Cell(20, 5, $venta['id_venta'], 1, 0, "C");
            $pdf->Cell(50, 5, $venta['fecha_venta'], 1, 0, "C");
            $pdf->Cell(50, 5, $venta['nombres'], 1, 0, "C");
            $pdf->Cell(30, 5, $venta['tipo_comprobante'], 1, 0, "C");
            $pdf->Cell(10, 5, $venta['cantidad'], 1, 0, "C");
            $pdf->Cell(30, 5, $venta['tipo_pago'], 1, 0, "C");
            $pdf->Cell(20, 5, $venta['total'], 1, 0, "C");
        }
        //$pdf->Ln();
        //$pdf->Cell(20, 5, $venta['total'], 1, 3, 'C', false, 'C');
        $this->response->setHeader('Content-Type', 'application/pdf');
        $pdf->Output('ventasPeriodo.pdf', 'I');
    }
    public function pagVentaPeriodo()
    {

        $configuracion = $this->configuracion->First();
        $data = [
            'configuracion' => $configuracion
        ];
        $estados = [
            'e_venta' => '',
            'e_producto' => 'active',
            'e_ordencompra' => '',
            'e_usuario' => '',
            'e_notacredito' => '',
            'e_config' => '',
            'e_estadistica' => ''
        ];

        echo view('header', $data);
        echo view('administrador/panel_header', $estados);
        echo view('administrador/ventasPeriodoPdf');
        echo view('administrador/panel_footer');
        echo view('footer');
    }


    public function excelVentas()
    {
        $this->response = \Config\Services::response();
        $this->request = \Config\Services::request();

        $ventaEmp = $this->ventas->datosXPeriodo($this->request->getPost('fecha_inicio'), $this->request->getPost('fecha_termino'));
        $ventaProduct = $this->ventas->datosProducXPeriodo($this->request->getPost('fecha_inicio'), $this->request->getPost('fecha_termino'));
        if ($this->request->getPost('buscar') == 1) {
            $this->cargarVentaPeriodo();
        } else {
            $phpExcel = new Spreadsheet();
            $hoja = $phpExcel->getActiveSheet();

            $hoja->mergeCells('C3:E3');
            $hoja->getStyle('C5:H5')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $hoja->getStyle('C3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $hoja->getStyle('C3')->getFont()->SetSize(14);
            $hoja->getStyle('C3')->getFont()->setName('Arial');
            $hoja->setCellValue('C3', "Reportes de Ventas");

            $hoja->setCellValue('B5', "ID Venta");
            $hoja->getColumnDimension('B')->setWidth(12);
            $hoja->setCellValue('C5', "Fecha de Compra");
            $hoja->getColumnDimension('C')->setWidth(20);
            $hoja->setCellValue('D5', "Nombres");
            $hoja->getColumnDimension('D')->setWidth(30);
            $hoja->setCellValue('E5', "Tipo de Comprobante");
            $hoja->getColumnDimension('E')->setWidth(25);
            $hoja->setCellValue('F5', "Cantidad de Producto");
            $hoja->getColumnDimension('F')->setWidth(25);
            $hoja->setCellValue('G5', "Forma de Pago");
            $hoja->getColumnDimension('G')->setWidth(20);
            $hoja->setCellValue('H5', "Total");
            $hoja->getColumnDimension('H')->setWidth(10);

            $hoja->getStyle('B5:H5')->getFont()->setBold(true);



            $fila = 6;
            foreach ($ventaEmp as $venta) {
                $hoja->setCellValue('B' . $fila, $venta['id_venta']);
                $hoja->setCellValue('C' . $fila, $venta['fecha_venta']);
                $hoja->setCellValue('D' . $fila, $venta['nombres']);
                $hoja->setCellValue('E' . $fila, $venta['tipo_comprobante']);
                $hoja->setCellValue('F' . $fila, $venta['cantidad']);
                $hoja->setCellValue('G' . $fila, $venta['tipo_pago']);
                $hoja->setCellValue('H' . $fila, $venta['total']);
                $fila++;
            }
            $hoja->mergeCells("J3:L3");

            $hoja->getStyle('J5:L5')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $hoja->getStyle('J3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $hoja->getStyle('J3')->getFont()->SetSize(14);
            $hoja->getStyle('J3')->getFont()->setName('Arial');
            $hoja->setCellValue("J3", "Reportes de Ventas");
            $hoja->setCellValue('J5', "Id Venta");
            $hoja->getColumnDimension('J')->setWidth(12);
            $hoja->setCellValue('K5', "Nombre Producto");
            $hoja->getColumnDimension('K')->setWidth(40);
            $hoja->setCellValue('L5', "Precio Producto");
            $hoja->getColumnDimension('L')->setWidth(30);

            $hoja->getStyle('J5:L5')->getFont()->setBold(true);

            $fila1 = 6;

            foreach ($ventaProduct as $venta) {
                $hoja->setCellValue('J' . $fila1, $venta['id_venta']);
                $hoja->setCellValue('K' . $fila1, $venta['nombre']);
                $hoja->setCellValue('L' . $fila1, $venta['precio']);
                $fila1++;
            }


            $ultimafila = $fila - 1;

            $styleArray = [

                'borders' => [

                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => ['rgb' => '000000'],
                    ]
                ]

            ];

            $hoja->getStyle('B5:H' . $ultimafila)->applyFromArray($styleArray);


            $ultimafila1 = $fila1 - 1;

            $styleArray1 = [

                'borders' => [

                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => ['rgb' => '000000'],
                    ]
                ]

            ];

            $hoja->getStyle('J5:L' . $ultimafila1)->applyFromArray($styleArray);

            $hoja->setCellValueExplicit(
                'H' . $fila,
                '=SUM(H5:H' . $ultimafila . ')',
                \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_FORMULA
            );


            $writer = new Xlsx($phpExcel);
            $writer->save('C:\Users\hesll\Desktop/' . 'reporte_ventas.xls');
            return redirect()->to(base_url() . '/Estadistica');
        }
    }


    public function excelTotalProductos()
    {

        $this->request = \Config\Services::request();
        $phpExcel = new Spreadsheet();
        $hoja = $phpExcel->getActiveSheet();
        $hoja->mergeCells('B3:D3');
        $hoja->getStyle('B5:F5')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $hoja->getStyle('B3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $hoja->getStyle('B3')->getFont()->SetSize(14);
        $hoja->getStyle('B3')->getFont()->setName('Arial');
        $hoja->setCellValue('B3', "Reporte de Stock Total de Producto");
        $hoja->setCellValue('B5', "Codigo Producto");
        $hoja->getColumnDimension('B')->setWidth(30);
        $hoja->setCellValue('C5', "Nombre Producto");
        $hoja->getColumnDimension('C')->setWidth(30);
        $hoja->setCellValue('D5', "Marca");
        $hoja->getColumnDimension('D')->setWidth(30);
        $hoja->setCellValue('E5', "Stock Critico");
        $hoja->getColumnDimension('E')->setWidth(30);
        $hoja->setCellValue('F5', "Stock");
        $hoja->getColumnDimension('F')->setWidth(30);

        $hoja->getStyle('B5:F5')->getFont()->setBold(true);


        $datosProductos = $this->productos->productosTotales();

        $fila2 = 6;
        foreach ($datosProductos as $p) {

            $hoja->setCellValue('B' . $fila2, " " . $p['id_producto']);
            $hoja->setCellValue('C' . $fila2, $p['nombre']);
            $hoja->setCellValue('D' . $fila2, $p['marca']);
            $hoja->setCellValue('E' . $fila2, $p['stock_critico']);
            $hoja->setCellValue('F' . $fila2, $p['stock']);

            $fila2++;
        }

        $ultimafila2 = $fila2 - 1;

        $styleArray = [

            'borders' => [

                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'],
                ]
            ]

        ];

        $hoja->getStyle('B5:F' . $ultimafila2)->applyFromArray($styleArray);

        $hoja->setCellValueExplicit(
            'F' . $fila2,
            '=SUM(F5:F' . $ultimafila2 . ')',
            \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_FORMULA
        );

        $writer = new Xlsx($phpExcel);
        $writer->save("reporte_stock_productos.xlsx");
        return redirect()->to(base_url() . '/Estadistica');
    }

    public function datos()
    {
        $this->ventas->select('CONCAT(d.nombres," ",d.apellidos) AS nombre,CONCAT(d.rut, "-",d.dv) AS rut,empleado_fk AS empleado,sum(total) AS total, count(id_venta) AS venta');
        $this->ventas->join('empleado as e', 'venta.empleado_fk=e.id_empleado');
        $this->ventas->join('usuario as u', 'e.usuario_fk=u.id_usuario');
        $this->ventas->join('datos_personales as d', 'u.rut_fk=d.rut');
        $this->ventas->groupBy('empleado');
        $datos =  $this->ventas->findAll();

        echo json_encode($datos);
    }

    public function pagManual()
    {
        $configuracion = $this->configuracion->First();
        $data = [
            'configuracion' => $configuracion
        ];
        echo view('header', $data);
        echo view('administrador/manual');
        echo view('footer');
    }
    public function cargarManual()
    {
        $this->response = \Config\Services::response();
        $this->response->setHeader('Content-Type', 'application/pdf');
        readfile('C:\xampp\htdocs\pos\public\Manual/' . 'Manual_Usuario.pdf');
    }
}
