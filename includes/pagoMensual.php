<?php
date_default_timezone_set('America/Cancun');
require '../config/database.php';

$db = new Database();
$con = $db->conectar();

$hoyParaConvertir = date('Y/m/d');
$fechaComoEntero = strtotime($hoyParaConvertir);

$anio = date("Y", $fechaComoEntero);
$mes = date("m", $fechaComoEntero);
$dia = date("d", $fechaComoEntero);

$id = $_POST['id_lote'];
$fecha_pago = $_POST['fecha_pago'];
$fecha_correspondiente = $_POST['fecha_correspondiente'];
$monto_pagado = $_POST['monto_pagado'];

$mesSeleccionado = $_POST['mes'];
$anioSeleccionado = $_POST['anio'];

$comandoVentas = $con->prepare("SELECT primer_mensualidad FROM ventas WHERE id_lote = $id");
$comandoVentas->execute();
$resultadosVentas = $comandoVentas->fetchAll(PDO::FETCH_ASSOC);

$primer_mensualidad = $resultadosVentas[0]["primer_mensualidad"];

$primer_mensualidadConvertida = str_replace("/", "-", $primer_mensualidad);
$fecha_correspondienteConvertida = str_replace("/", "-", $fecha_correspondiente);

$inicio=$primer_mensualidadConvertida;
$fin=$fecha_correspondienteConvertida;

$datetime1=new DateTime($inicio);
$datetime2=new DateTime($fin);
 
# obtenemos la diferencia entre las dos fechas
$interval=$datetime2->diff($datetime1);
 
# obtenemos la diferencia en meses
$intervalMeses=$interval->format("%m");
# obtenemos la diferencia en años y la multiplicamos por 12 para tener los meses
$intervalAnos = $interval->format("%y")*12;

$pagoNumero = $intervalMeses+$intervalAnos + 1;
 

$comandoPagos = $con->prepare("SELECT * FROM pagos WHERE id_lote = $id AND mes = $mesSeleccionado AND anio = $anioSeleccionado");
$comandoPagos->execute();
$resultadosPagos = $comandoPagos->fetchAll(PDO::FETCH_ASSOC);

if (empty($resultadosPagos)) {
    $query = $con->prepare("INSERT INTO pagos (id_lote, fecha_pago, fecha_correspondiente, monto_pagado, mes, anio, pago_numero) VALUES (:id_lote, :fecha_pago , :fecha_correspondiente, :monto_pagado, :mes, :anio, :pago_numero)");
    $resultado = $query->execute(['id_lote' => $id, 'fecha_pago' => $fecha_pago, 'fecha_correspondiente' => $fecha_correspondiente, 'monto_pagado' => $monto_pagado, 'mes' => $mesSeleccionado, 'anio' => $anioSeleccionado, 'pago_numero' => $pagoNumero]);
}



header('Location: ../views/dashboard/pagos/listasPagosEtapas.php?id='.$_POST['id_desarrollo']);
