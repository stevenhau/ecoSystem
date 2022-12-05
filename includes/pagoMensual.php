<?php

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

    $comandoPagos = $con->prepare("SELECT * FROM pagos WHERE id_lote = $id");
    $comandoPagos->execute();
    $resultadosPagos = $comandoPagos->fetchAll(PDO::FETCH_ASSOC);

    /* Validacion para que no se dupliquen los pagos realizados */
    $yaPago = false;
    foreach($resultadosPagos as $resultadoPago){
        $fechaExplotada = explode("/",$resultadoPago["fecha_pago"]);
        if($fechaExplotada[1] == $mes){
            $yaPago = true;
        }else{
            $yaPago = false;
        }
    }

    if($yaPago === false){
        $query = $con->prepare("INSERT INTO pagos (id_lote, fecha_pago, fecha_correspondiente, monto_pagado) VALUES (:id_lote, :fecha_pago , :fecha_correspondiente, :monto_pagado)");
        $resultado = $query->execute(['id_lote' => $id, 'fecha_pago' => $fecha_pago, 'fecha_correspondiente' => $fecha_correspondiente, 'monto_pagado' => $monto_pagado]);
    }

header('Location: ../views/dashboard/pagos/listasPagosEtapas.php?id='.$_POST['id_desarrollo']);
