<?php
require '../../../config/database.php';

$db = new Database();
$con = $db->conectar();

$id_desarrollo = $_POST["id_desarrollo"];
$id_lote = $_POST["id_lote"];

$meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
$hoy = date('d/m/Y');


$hoyParaConvertir = date('Y/m/d');
$fechaComoEntero = strtotime($hoyParaConvertir);

$anio = date("Y", $fechaComoEntero);
$mes =  $meses[date('n') - 1];
$dia = date("d", $fechaComoEntero);


$comando = $con->prepare("SELECT * FROM lotes WHERE id_lote = $id_lote");
$comando->execute();
$resultados = $comando->fetchAll(PDO::FETCH_ASSOC);

$nombreCliente = "";
$cantidadPagada = "";
$totalMensualidades = "";
$numeroLote = "";
$etapa = "";

foreach ($resultados as $resultado) {
    $nombreCliente = $resultado["nombre_cliente"];
    $numeroLote = $resultado["numero_lote"];
    $etapa = $resultado["id_etapa"];
}

$comandoVentas = $con->prepare("SELECT * FROM ventas WHERE id_lote = $id_lote");
$comandoVentas->execute();
$resultadosVentas = $comandoVentas->fetchAll(PDO::FETCH_ASSOC);

foreach ($resultadosVentas as $resultadoVentas) {
    $totalMensualidades = $resultadoVentas["num_mensualidades"];
}


$comandoPagos = $con->prepare("SELECT * FROM pagos WHERE id_lote = $id_lote");
$comandoPagos->execute();
$resultadosPagos = $comandoPagos->fetchAll(PDO::FETCH_ASSOC);

$mensualidadesPagadas = count($resultadosPagos);

foreach ($resultadosPagos as $resultadoPagos) {

    $diaQuePago = strtotime($resultadoPagos["fecha_pago"]);

    $cantidadPagada = $resultadoPagos["monto_pagado"];
}


$nombrePDF = $nombreCliente . $mes . $anio;

ob_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
        body {
            font-size: 17px;
        }

        p {
            margin: 0;
            margin-top: .5rem;
        }

        .titulo {
            font-size: 30px;
            text-align: center;
            margin-top: 5rem;
        }

        .contenedor {
            border: 1px solid;
            border-radius: 30px;
            max-width: 1000px;
            padding: 1.5rem 1.5rem 10rem 1.5rem;
        }

        .encabezado {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .fecha {
            text-align: right;
            margin-top: 2rem;
            margin-bottom: 1rem;
        }

        .concepto {
            display: flex;
        }

        .pie {
            display: flex;
            justify-content: space-around;
            margin-top: 1rem;
        }

        .firmas {
            display: flex;
            justify-content: space-between;
            margin-top: 3rem;
            align-items: flex-end;
        }

        .firmaEmpresa {
            text-align: center;

        }

        .firmaEmpresa p {
            margin-top: 0;
        }

        .firmaCliente {
            text-align: center;
        }

        .firmaCliente p {
            margin-top: 0;
        }

        .numeroRecibo {
            text-align: right;
        }
    </style>
    <title>Comprobante</title>
</head>

<body>
    <div class="contenedor">
        <div class="encabezado">
            <p class="numeroRecibo">
                <img style="position: absolute;" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/ecoSystem/logo-modified.png" alt="" width="90px">
                <span>Recibo N.° <?= $mensualidadesPagadas; ?>
                </span>
            </p>
            <p class="titulo">RECIBO DE PAGO</p>
        </div>
        <div class="fecha">
            <p>Cancun, Quintana Roo a <?= ' ' . $dia . ' del mes de ' . $mes . ' del año ' . $anio . ''; ?> </p>
        </div>

        <div class="persona">
            <p>Recibí de: <span><?= $nombreCliente; ?>.</span></p>
        </div>
        <div class="monto">
            <p>La cantidad de: <span>$ <?= number_format(intval($cantidadPagada), 2); ?> M/N</span></p>
        </div>
        <div class="monto_letras">
            <p>Cantidad en Letras: <span></span></p>
        </div>
        <div class="concepto">
            <p>Concepto de pago: <span>Pago de mensualidad (Mensualidad <?= $mensualidadesPagadas; ?> de <?= $totalMensualidades; ?>)</span> </p>
        </div>

        <div class="pie" style="display: flex;">
            <p>
                <span style="margin-right:100px;"> DESARROLLO: <?= $id_desarrollo == 1 ? '"EL CEDRAL ECO HABITAT I"' : '"EL CEDRAL ECO HABITAT II"'; ?></span>
                <span style="margin-right:100px;"><?= $id_desarrollo == 1 ? "ETAPA:" . $etapa : "MANZANA:" . $etapa; ?></span>
                <span style="margin-right:100px;">LOTE: <?= $numeroLote; ?></span>
            </p>
        </div>

        <div class="firmas">
            <div class="firmaEmpresa" style="position: absolute;">
                <img src="http://<?php echo $_SERVER['HTTP_HOST'];?>/ecoSystem/firma_etapa_1.png" width="90px" alt="">
                <p>Recibí.</p>
                <p>C. SERAFINA CANUL KUMUL.</p>
            </div>
            <div class="firmaCliente" style="position: absolute;right:5%;bottom:22%">
                <p>Recibí.</p>
                <p><?= $nombreCliente; ?>.</p>
            </div>
        </div>
    </div>
</body>

</html>
<?php
$html = ob_get_clean();

require_once '../../../libs/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);

$dompdf->loadHtml($html);

$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream($nombrePDF, array("Attachment" => true));
?>