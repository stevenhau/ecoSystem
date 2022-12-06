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

$comandoPagos = $con->prepare("SELECT * FROM pagos
                            INNER JOIN lotes
                         ON pagos.id_lote = lotes.id_lote
                         INNER JOIN ventas
                         ON lotes.id_lote = ventas.id_lote");
$comandoPagos->execute();
$resultadosPagos = $comandoPagos->fetchAll(PDO::FETCH_ASSOC);

?>

<table class="table">
    <thead>
        <tr>
            <th>Lote</th>
            <th><?= $id == 1 ? "Etapa" : "Manzana"; ?></th>
            <th>MEDIDA/M2</th>
            <th>COSTO TOTAL</th>
            <th>ENGANCHE</th>
            <th>NO. DE MENSUALIDADES</th>
            <th>PAGO NUMERO</th>
            <th>MENSUALIDAD</th>
            <th>INTERES 5%</th>
            <th>MONTO PAGADO</th>
            <th>FECHA DE COMPRA</th>
            <th>PRIMER MENSUALIDAD</th>
            <th>FECHA CUANDO RALIZO EL PAGO</th>
            <th>DIAS DE PAGO</th>
            <th>NOMBRE</th>
            <th>MTTO.</th>
            <th>Estatus</th>
            <th>Pagar Mensualidad</th>
            <th>Pago a Capital</th>
            <th>Descargar Comprobante</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($resultadosPagos as $pago) {?>
                <tr>
                    <td><?=$pago["numero_lote"];?></td>
                    <td><?=$pago["id_etapa"];?></td>
                    <td><?=$pago["medida"];?></td>
                    <td><?=$pago["costo"];?></td>
                    <td><?=$pago["enganche"];?></td>
                    <td><?=$pago["num_mensualidades"];?></td>
                    <td><?=$pago["pago_numero"];?></td>
                    <td><?=$pago["monto_mensual"];?></td>
                    <td></td>
                    <td><?=$pago["monto_pagado"] != 0 ? $pago["monto_pagado"] : "AUN NO PAGA!";?></td>
                    <td><?=$pago["fecha_compra"];?></td>
                    <td><?=$pago["primer_mensualidad"];?></td>
                    <td><?=$pago["fecha_pago"];?></td>
                    <td><?=$pago["dias_pago"];?></td>
                    <td><?=$pago["nombre_cliente"];?></td>
                    <td><?=$pago["mantenimiento"];?></td>
                    <td><?=$pago["estatus"];?></td>
                    <td>botones</td>
                    <td>botones</td>
                    <td>botones</td>
                </tr>

        <?php } ?>
    </tbody>
</table>

<?php include('../layouts/footer.php'); ?>