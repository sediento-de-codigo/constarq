<?php
require_once('./src/libraries/mpdf/vendor/autoload.php');

use Mpdf\Mpdf;

class ControllerGeneratePDF extends Controller
{
  function __construct()
  {
    parent::__construct();
  }

  public static function proforma($id)
  {
    ob_start();
    $idProforma = $id;
    $proforma = ControllerProformaCompra::buscarProformaPorId($idProforma)->datos;
    include './src/templatesPDF/proforma.php';
    $css = file_get_contents("./src/templatesPDF/global.css");
    $html = ob_get_clean();
    $mpdf = new Mpdf([
      'orientation' => 'P',
      'margin_top' => 5,
      'margin_bottom' => 5,
      'margin_left' => 2,
      'margin_right' => 2,
    ]);
    $mpdf->WriteHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
    $mpdf->WriteHTML($html);
    $pdfContenido = $mpdf->Output('', 'S');

    return $pdfContenido;
  }
}
