<?php include('../layouts/header.php');
date_default_timezone_set('America/Cancun');

$meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

$hoy = date('d/m/Y');
$hoyParaConvertir = date('Y/m/d');
$fechaComoEntero = strtotime($hoyParaConvertir);

$anio = date("Y", $fechaComoEntero);
$mes = date("m", $fechaComoEntero);
$dia = date("d", $fechaComoEntero);

$mesNombre =  $meses[date('n') - 1];

$id = $_GET['id'];

$comandoLotes = $con->prepare("SELECT * FROM lotes WHERE id_desarrollo = $id");
$comandoLotes->execute();
$resultadosLotes = $comandoLotes->fetchAll(PDO::FETCH_ASSOC);

$mesSeleccionado = 8;
$anioSeleccionado = 2021;

$resultadosArrayLotes = [];
foreach ($resultadosLotes as $lote) {
    $idLote = $lote["id_lote"];
    $comandoPagos = $con->prepare("SELECT * FROM pagos WHERE id_lote = $idLote AND mes = $mesSeleccionado AND anio = $anioSeleccionado");
    $comandoPagos->execute();
    $resultadosPagos = $comandoPagos->fetchAll(PDO::FETCH_ASSOC);
    if (!empty($resultadosPagos)) {
        foreach ($resultadosPagos as $pago) {
            if ($lote["id_lote"] == $pago["id_lote"]) {
                $lotesConPagos = array_merge($lote, $pago);
                array_push($resultadosArrayLotes, $lotesConPagos);
            }
        }
    } else {
        array_push($resultadosArrayLotes, $lote);
    }
}

echo '<pre>';
print_r($resultadosArrayLotes);
echo '</pre>';

?>


<?php include('../layouts/footer.php'); ?>