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
        $pdf->Cell(0, 5, utf8_decode("Reporte de producto con stock critico"), 0, 1, 'C');
        $pdf->Ln(10);
        $pdf->Cell(40, 5, utf8_decode("código producto"), 1, 0, "C");
        $pdf->Cell(80, 5, "Nombre producto", 1, 0, "C");
        $pdf->Cell(40, 5, "Marca", 1, 0, "C");
        $pdf->Cell(25, 5, "stock critico", 1, 0, "C");
        $pdf->Cell(10, 5, "Stock", 1, 0, "C");

        $datosProductos = $this->productos->productosStockCriti();

        foreach ($datosProductos as $p) {
            $pdf->Ln();
            $pdf->Cell(40, 5, $p['id_producto'], 1, 0, "C");
            $pdf->Cell(80, 5, $p['nombre'], 1, 0, "C");
            $pdf->Cell(40, 5, $p['marca'], 1, 0, "C");
            $pdf->Cell(25, 5, $p['stock_critico'], 1, 0, "C");
            $pdf->Cell(10, 5, $p['stock'], 1, 0, "C");
        }

        $this->response->setHeader('Content-Type', 'application/pdf');

        $pdf->Output('productoMinimo.pdf', 'I');
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
        $pdf->Cell(0, 5, utf8_decode("Reporte ventas de empleado"), 0, 1, 'C');
        $pdf->Ln(10);
        $pdf->Cell(50, 5, utf8_decode("código empleado"), 1, 0, "C");
        $pdf->Cell(30, 5, utf8_decode("rut"), 1, 0, "C");
        $pdf->Cell(40, 5, utf8_decode("nombre"), 1, 0, "C");
        $pdf->Cell(20, 5, "ventas", 1, 0, "C");
        $pdf->Cell(20, 5, "total venta", 1, 0, "C");
        $ventaEmp = $this->ventas->ventasXEmpleado();
        foreach ($ventaEmp as $venta) {
            $pdf->Ln();
            $pdf->Cell(50, 5, $venta['empleado'], 1, 0, "C");
            $pdf->Cell(30, 5, $venta['rut'], 1, 0, "C");
            $pdf->Cell(40, 5, $venta['nombre'], 1, 0, "C");
            $pdf->Cell(20, 5, $venta['venta'], 1, 0, "C");
            $pdf->Cell(20, 5, $venta['total'], 1, 0, "C");
        }
        //$pdf->Ln();
        //$pdf->Cell(20, 5, $venta['total'], 1, 3, 'C', false, 'C');
        $this->response->setHeader('Content-Type', 'application/pdf');

        $pdf->Output('ventasXEmpleado.pdf', 'I');
    }

    public function excel()
    {


        $this->request = \Config\Services::request();
        $phpExcel = new Spreadsheet();
        $hoja = $phpExcel->getActiveSheet();
        $hoja->mergeCells("A3:D3");
        $hoja->setCellValue("A3", "Reportes de ventas");
        $hoja->setCellValue('A5', "id_venta");
        $hoja->setCellValue('B5', "Fecha de compra");
        $hoja->setCellValue('C5', "Nombres");
        $hoja->setCellValue('D5', "Tipo de comprobante");
        $hoja->setCellValue('E5', "Forma de pago");
        $hoja->setCellValue('F5', "Total");
        $ventaEmp = $this->ventas->datosXPeriodo($this->request->getPost('fecha_inicio'), $this->request->getPost('fecha_termino'));
        $ventaProduct = $this->ventas->datosProducXPeriodo($this->request->getPost('fecha_inicio'), $this->request->getPost('fecha_termino'));
        $fila = 6;
        foreach ($ventaEmp as $venta) {
            $hoja->setCellValue('A' . $fila, $venta['id_venta']);
            $hoja->setCellValue('B' . $fila, $venta['fecha_venta']);
            $hoja->setCellValue('C' . $fila, $venta['nombres']);
            $hoja->setCellValue('D' . $fila, $venta['tipo_comprobante']);
            $hoja->setCellValue('E' . $fila, $venta['tipo_pago']);
            $hoja->setCellValue('F' . $fila, $venta['total']);
            $fila++;
        }
        $hoja->mergeCells("A16:D16");
        $hoja->setCellValue("A16", "Reportes de ventas");
        $hoja->setCellValue('A19', "Id Venta");
        $hoja->setCellValue('B19', "Nombre producto");
        $hoja->setCellValue('C19', "Precio producto");

        $fila1 = 20;
        foreach ($ventaProduct as $venta) {
            $hoja->setCellValue('A' . $fila1, $venta['id_venta']);
            $hoja->setCellValue('B' . $fila1, $venta['nombre']);
            $hoja->setCellValue('C' . $fila1, $venta['precio']);
            $fila1++;
        }


        $writer = new Xlsx($phpExcel);
        $writer->save("hola.xlsx");

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
