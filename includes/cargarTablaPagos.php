<?php
require '../config/database.php';


$db = new Database();
$con = $db->conectar();
date_default_timezone_set('America/Cancun');

$meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

$hoy = date('d/m/Y');
$hoyParaConvertir = date('Y/m/d');
$fechaComoEntero = strtotime($hoyParaConvertir);

$anio = date("Y", $fechaComoEntero);
$mes = date("m", $fechaComoEntero);
$dia = date("d", $fechaComoEntero);


$mesSeleccionado = isset($_POST['mes']) ? $_POST['mes'] : $mes;
$anioSeleccionado = isset($_POST['anio']) ? $_POST['anio'] : $anio;

$mesNombre =  $meses[date('n') - 1];

$id = $_POST['desarrollo'];

$comandoLotes = $con->prepare("SELECT * FROM lotes WHERE id_desarrollo = $id");
$comandoLotes->execute();
$resultadosLotes = $comandoLotes->fetchAll(PDO::FETCH_ASSOC);

$resultadosArrayLotes = [];
foreach ($resultadosLotes as $lote) {
    $idLote = $lote["id_lote"];
    /** Consulta para agregar la ventas primero hacemos las ventas porque sin ventas no puede existir pagos */
    $comandoVentas = $con->prepare("SELECT nombre_cliente, id_lote, enganche, num_mensualidades, fecha_compra, primer_mensualidad, dias_pago, monto_mensual FROM ventas WHERE id_lote = $idLote");
    $comandoVentas->execute();
    $resultadosVentas = $comandoVentas->fetchAll(PDO::FETCH_ASSOC);
    if (!empty($resultadosVentas)) { //Si resultado no esta vacio es que existen ventas
        foreach ($resultadosVentas as $venta) {
            if ($lote["id_lote"] == $venta["id_lote"]) {
                /** Consulta para agregar los pagos */
                $comandoPagos = $con->prepare("SELECT * FROM pagos WHERE id_lote = $idLote AND mes = $mesSeleccionado AND anio = $anioSeleccionado");
                $comandoPagos->execute();
                $resultadosPagos = $comandoPagos->fetchAll(PDO::FETCH_ASSOC);
                if (!empty($resultadosPagos)) { //Si resultado no esta vacio es que existen pagos
                    foreach ($resultadosPagos as $pago) {
                        if ($lote["id_lote"] == $pago["id_lote"]) {
                            $lotesConPagos = array_merge($lote, $venta, $pago);
                            array_push($resultadosArrayLotes, $lotesConPagos);
                        }
                    }
                } else {
                    $lotesVendidos = array_merge($lote, $venta);
                    array_push($resultadosArrayLotes, $lotesVendidos);
                }
            }
        }
    } else {
        array_push($resultadosArrayLotes, $lote);
    }
}

foreach ($resultadosArrayLotes as $resultado) {
    $colorFila = "";
    $status = "";
    if ($resultado["estatus"] == 1) {
        $colorFila = "disponible";
        $status = "disponible";
    }
    if ($resultado["estatus"] == 2) {
        $colorFila = "vendido";
        $status = "vendido";
    }
    if ($resultado["estatus"] == 3) {
        $colorFila = "apartado";
        $status = "apartado";
    }
    if ($resultado["estatus"] == 4) {
        $colorFila = "otro";
        $status = "Casa Club";
    }
?>
    <tr class="<?= $colorFila; ?>">
        <td>L-<?= isset($resultado["numero_lote"]) ? $resultado["numero_lote"] : ""; ?></td>
        <td><?= $id == 1 ? "E-" . $resultado["id_etapa"] : "MZA-" . $resultado["id_etapa"]; ?></td>
        <td><?= isset($resultado["medida"]) ? $resultado["medida"] : ""; ?></td>
        <td><?= isset($resultado["costo"]) ? $resultado["costo"] : ""; ?></td>
        <td><?= isset($resultado["enganche"]) ? $resultado["enganche"] : ""; ?></td>
        <td><?= isset($resultado["num_mensualidades"]) ? $resultado["num_mensualidades"] : ""; ?></td>
        <td><?= isset($resultado["pago_numero"]) ? $resultado["pago_numero"] : ""; ?></td>
        <td><?= isset($resultado["monto_mensual"]) ? $resultado["monto_mensual"] : ""; ?></td>
        <td></td>
        <td><?= isset($resultado["monto_pagado"]) &&  $resultado["monto_pagado"] != 0 ? $resultado["monto_pagado"] : "AUN NO PAGA!"; ?></td>
        <td><?= isset($resultado["fecha_compra"]) ? $resultado["fecha_compra"] : ""; ?></td>
        <td><?= isset($resultado["primer_mensualidad"]) ? $resultado["primer_mensualidad"] : ""; ?></td>
        <td><?= isset($resultado["fecha_pago"]) ? $resultado["fecha_pago"] : ""; ?></td>
        <td><?= isset($resultado["dias_pago"]) ? $resultado["dias_pago"] : ""; ?></td>
        <td><?= isset($resultado["nombre_cliente"]) ? $resultado["nombre_cliente"] : ""; ?></td>
        <td><?= isset($resultado["mantenimiento"]) ? $resultado["mantenimiento"] : ""; ?></td>
        <td><?= isset($resultado["estatus"]) ? $status : ""; ?></td>
        <td>botones</td>
        <td>botones</td>
        <td>botones</td>
    </tr>

<?php } ?>