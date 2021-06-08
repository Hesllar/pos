<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ConfiguracionModel;
use App\Models\ProductosAdminModel;
use App\Models\VentaModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class Estadistica extends BaseController
{
    protected $configuracion;
    protected $productos;
    protected $ventas;
    protected $response;
    protected $request;


    public function __construct()
    {
        $this->ventas = new VentaModel;
        $this->productos = new ProductosAdminModel;
        $this->configuracion = new ConfiguracionModel;
    }

    public function index()
    {
        $totalVentas = $this->ventas->totalVentas();
        $totalProduc = $this->productos->totalProductos();
        $todasLasVentas = $this->ventas->todasLasVentas();
        $stockCritico = $this->productos->StockMinimos();
        $configuracion = $this->configuracion->First();
        $data = [
            'configuracion' => $configuracion, 'productos' => $totalProduc, 'ventas' => $todasLasVentas,
            'sumaTotal' => $totalVentas, 'stock_minimo' => $stockCritico
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

    public function excelVentas()
    {

        $this->request = \Config\Services::request();
        $phpExcel = new Spreadsheet();
        $hoja = $phpExcel->getActiveSheet();
        $hoja->mergeCells('A3:D3');
        $hoja->getStyle('A5:E5')->getAlignment()->setHorizontal
        (\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $hoja->getStyle('A3')->getAlignment()->setHorizontal
        (\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $hoja->getStyle('A3')->getFont()->SetSize(14);
        $hoja->getStyle('A3')->getFont()->setName('Arial');
        $hoja->setCellValue('A3', "Reportes de Ventas");
        $hoja->setCellValue('A5', "Fecha de Compra");
        $hoja->getColumnDimension('A')->setWidth(20);
        $hoja->setCellValue('B5', "Nombres");
        $hoja->getColumnDimension('B')->setWidth(30);
        $hoja->setCellValue('C5', "Tipo de Comprobante");
        $hoja->getColumnDimension('C')->setWidth(25);
        $hoja->setCellValue('D5', "Forma de Pago");
        $hoja->getColumnDimension('D')->setWidth(20);
        $hoja->setCellValue('E5', "Total");
        $hoja->getColumnDimension('E')->setWidth(10);
        $hoja->getStyle('A5:E5')->getFont()->setBold(true);

        $ventaEmp = $this->ventas->datosXPeriodo($this->request->getPost('fecha_inicio'), $this->request->getPost('fecha_termino'));
        $fila = 6;
        foreach ($ventaEmp as $venta) {
            $hoja->setCellValue('A' . $fila, $venta['fecha_venta']);
            $hoja->setCellValue('B' . $fila, $venta['nombres']);
            $hoja->setCellValue('C' . $fila, $venta['tipo_comprobante']);
            $hoja->setCellValue('D' . $fila, $venta['tipo_pago']);
            $hoja->setCellValue('E' . $fila, $venta['total']);
            $fila++;
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

        $hoja->getStyle('A5:E'.$ultimafila)->applyFromArray($styleArray);

        $hoja->setCellValueExplicit('E'.$fila, '=SUM(E5:E'.$ultimafila.')', 
        \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_FORMULA);


        $writer = new Xlsx($phpExcel);
        $writer->save("reporte_ventas.xlsx");
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
}
