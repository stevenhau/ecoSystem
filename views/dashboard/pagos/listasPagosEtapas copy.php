<?php include('../layouts/header.php');
date_default_timezone_set('America/Cancun');

$hoy = date('d/m/Y');
$hoyParaConvertir = date('Y/m/d');
$fechaComoEntero = strtotime($hoyParaConvertir);

$anio = date("Y", $fechaComoEntero);
$mes = date("m", $fechaComoEntero);
$dia = date("d", $fechaComoEntero);

$id = $_GET['id'];

$comando = $con->prepare("SELECT * FROM lotes WHERE id_desarrollo = $id");
$comando->execute();
$resultados = $comando->fetchAll(PDO::FETCH_ASSOC);

$comandoVentas = $con->prepare("SELECT * FROM ventas WHERE id_desarrollo = $id");
$comandoVentas->execute();
$resultadosVentas = $comandoVentas->fetchAll(PDO::FETCH_ASSOC);



?>
<style>
    .disponible {
        background-color: #fff;
    }

    .vendido {
        background-color: #FFA420;
    }

    .apartado {
        background-color: #ffff00;
    }

    .otro {
        background-color: #90CAF9;
    }
</style>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Lista de Pagos "<?= $id == 1 ? "EL CEDRAL ECO HABITAT I" : " EL CEDRAL ECO HABITAT II"; ?>"
            <select name="" id="">
                <option value="Noviembre">Noviembre - 2022</option>
            </select>
        </h1>
        <div class="table-responsive">
            <table class="table table-bordered">
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
                        <th>PAGO TOTAL MENSUAL</th>
                        <th>FECHA DE COMPRA</th>
                        <th>PRIMER MENSUALIDAD</th>
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
                    <?php
                    $enganche = "";
                    $num_mensualidades = "";
                    $monto_mensual = "";
                    $fecha_compra = "";
                    $primer_mensualidad = "";
                    $dias_pago = "";
                    foreach ($resultados as $resultado) {

                        $idLote = $resultado['id_lote'];

                        $comandoPagos = $con->prepare("SELECT * FROM pagos WHERE id_lote = $idLote");
                        $comandoPagos->execute();
                        $resultadosPagos = $comandoPagos->fetchAll(PDO::FETCH_ASSOC);
                        $mensualidadesPagadas = count($resultadosPagos);

                        /* Validacion para que no se dupliquen los pagos realizados */
                        $yaPago = false;
                        foreach ($resultadosPagos as $resultadoPago) {
                            $fechaExplotada = explode("/", $resultadoPago["fecha_pago"]);
                            if ($fechaExplotada[1] == $mes) {
                                $yaPago = true;
                            } else {
                                $yaPago = false;
                            }
                        }


                        foreach ($resultadosVentas as $resultadoVenta) {
                            if ($resultado["id_desarrollo"] == $resultadoVenta["id_desarrollo"] && $resultado["id_etapa"] == $resultadoVenta["id_etapa"] && $resultado["id_lote"] == $resultadoVenta["id_lote"]) {
                                $enganche = $resultadoVenta["enganche"];
                                $num_mensualidades = $resultadoVenta["num_mensualidades"];
                                $monto_mensual = $resultadoVenta["monto_mensual"];
                                $fecha_compra = $resultadoVenta["fecha_compra"];
                                $primer_mensualidad = $resultadoVenta["primer_mensualidad"];
                                $dias_pago = $resultadoVenta["dias_pago"];
                            } else {
                                $enganche = "";
                                $num_mensualidades = "";
                                $monto_mensual = "";
                                $fecha_compra = "";
                                $primer_mensualidad = "";
                                $dias_pago = "";
                            }

                            $fecha_correspondiente = $dias_pago . '/' . $mes . '/' . $anio;

                    ?>
                            <tr class="<?php if ($resultado["estatus"] == 1) {
                                            echo "disponible";
                                        }
                                        if ($resultado["estatus"] == 2) {
                                            echo "vendido";
                                        }
                                        if ($resultado["estatus"] == 3) {
                                            echo "apartado";
                                        }
                                        if ($resultado["estatus"] == 4) {
                                            echo "otro";
                                        } ?>">
                                <td>L-<?= $resultado["numero_lote"]; ?></td>
                                <td><?= $id == 1 ? "E-" : "MZ-"; ?><?= $resultado["id_etapa"]; ?></td>
                                <td><?= $resultado["medida"]; ?></td>
                                <td>$<?= number_format(intval($resultado["costo"]), 2); ?></td>
                                <td><?= $enganche; ?></td>
                                <td><?= $num_mensualidades; ?></td>
                                <td><?= $mensualidadesPagadas; ?></td>
                                <td><?= "$" . number_format(intval($monto_mensual), 2); ?></td>
                                <td>se calcula</td>
                                <td><?= $yaPago === false ? "Aún No Paga!" : "$" . number_format(intval($resultadoPago["monto_pagado"]), 2); ?></td>
                                <td><?= $fecha_compra; ?></td>
                                <td><?= $primer_mensualidad; ?></td>
                                <td><?= $dias_pago; ?></td>
                                <td><?= $resultado["nombre_cliente"]; ?></td>
                                <td>$<?= number_format(intval($resultado["mantenimiento"]), 2); ?></td>
                                <td style="text-transform: uppercase;"><?php if ($resultado["estatus"] == 1) {
                                                                            echo "disponible";
                                                                        }
                                                                        if ($resultado["estatus"] == 2) {
                                                                            echo "vendido";
                                                                        }
                                                                        if ($resultado["estatus"] == 3) {
                                                                            echo "apartado";
                                                                        }
                                                                        if ($resultado["estatus"] == 4) {
                                                                            echo "Casa Club";
                                                                        } ?></td>
                                <td>

                                    <form action="../../../includes/pagoMensual.php" method="POST">
                                        <input type="hidden" name="id_desarrollo" value="<?= $id; ?>">
                                        <input type="hidden" name="id_lote" value="<?= $resultado["id_lote"]; ?>">
                                        <input type="hidden" name="fecha_pago" value="<?= $hoy; ?>">
                                        <input type="hidden" name="fecha_correspondiente" value="<?= $fecha_correspondiente; ?>">
                                        <input type="hidden" name="monto_pagado" value="<?= $monto_mensual; ?>">
                                        <?php
                                        if ($yaPago === false) {
                                            if ($resultado["estatus"] != 4) {
                                        ?>
                                                <input type="submit" class="btn btn-success btn-block" value="Pagar Mensualidad">
                                            <?php
                                            }
                                        } else {
                                            ?>
                                            <button type="button" class="btn btn-secondary" disabled>Mensualidad Pagada</button>
                                        <?php
                                        }
                                        ?>
                                    </form>

                                </td>
                                <td>
                                    <?php
                                    if ($resultado["estatus"] != 4) {
                                    ?>
                                        <a class="btn btn-info btn-block" href="#">Pago a Capital</a>
                                    <?php
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if ($resultado["estatus"] != 4) {
                                    ?>
                                        <form action="../pagos/comprobante.php" method="POST">
                                            <input type="hidden" name="id_desarrollo" value="<?= $id; ?>">
                                            <input type="hidden" name="id_lote" value="<?= $resultado["id_lote"]; ?>">
                                            <?php
                                            if ($yaPago === false) {
                                                if ($resultado["estatus"] != 4) {
                                            ?>
                                                    <button type="button" class="btn btn-secondary" disabled>Descargar Comprobante</button>
                                                <?php
                                                }
                                            } else {
                                                ?>
                                                <input type="submit" class="btn btn-primary btn-block" value="Descargar Comprobante">

                                            <?php
                                            }
                                            ?>
                                        </form>
                                    <?php
                                    }
                                    ?>

                                </td>
                            </tr>
                    <?php }
                    }

                    ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>MTTO. ANUAL</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>$55555</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</main>

<?php include('../layouts/footer.php'); ?>