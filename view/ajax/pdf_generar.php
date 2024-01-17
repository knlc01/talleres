<?php
require_once('../../config/config.php');

$idOrden = isset($_GET['idOrden']) ? $_GET['idOrden'] : null;

$sql = "SELECT * FROM ordenes WHERE id = $idOrden";
$query = mysqli_query($con, $sql);

// Verificar si la consulta se ejecutó correctamente
if ($query) {
    $row = mysqli_fetch_assoc($query);
    $fecha_ingreso = $row['fecha_ingreso'];
    $maquina = $row['maquina'];
    $cliente = $row['cliente'];
} else {
    // Manejar el error de la consulta mysqli
    echo "Error: " . mysqli_error($con);
    exit;
}


//require_once('tcpdf/tcpdf.php');
require_once('../../librerias/TCPDF-main/tcpdf.php');

$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('EL-ROI');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('Helvetica', 'BI', 12);

// add a page
$pdf->AddPage();

$html = '
<div>
    <table>
        <tr>
            <th>Nro de Orden: '.$idOrden.'</th>
            <th>Fecha de Ingreso</th>
        </tr>
        <br>
        <br>
        <tr>
            <td colspan="2" align="center"><b>EL-ROI</b></td>
        </tr>
        <tr>
            <td colspan="2" align="center"><b>Orden de Trabajo</b></td>
        </tr>
        <tr>
            <td>
                <p>Datos del Cliente</p>
                <p>Empresa:</p>
                <p>Cliente: '.$cliente.'</p>
                <p>Teléfono:</p>
                <p>Mail:</p>
                <p>Localidad:</p>
            </td>
            <td>
                <p>Datos del Equipo</p>
                <p>Tipo de Maquina: '.$maquina.'</p>
                <p>Marca:</p>
                <p>Modelo:</p>
                <p>ID:</p>
            </td>
        </tr>
        <br>
        <br>
        <tr>
            <td colspan="2">
                <p>Tipo de Trabajo o Falla:</p>
                <p>Accesorios:<br>Estado en que llego la maquina:</p>
                <p>&nbsp;</p>
            </td>
        </tr>
    </table>
</div>


';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');




// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_002.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
