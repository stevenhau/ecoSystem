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

$comando = $con->prepare("SELECT * FROM lotes WHERE id_desarrollo = $id");
$comando->execute();
$resultados = $comando->fetchAll(PDO::FETCH_ASSOC);

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

    .pagado {
        background-color: green !important;
    }

    .sinPago {
        background-color: #fff !important;
    }
</style>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Lista de Pagos "<?= $id == 1 ? "EL CEDRAL ECO HABITAT I" : " EL CEDRAL ECO HABITAT II"; ?>"
            <select name="" id="">
                <option value="1">ENERO</option>
                <option value="2">FEBRERO</option>
                <option value="3">MARZO</option>
                <option value="4">ABRIL</option>
                <option value="5">MAYO</option>
                <option value="6">JUNIO</option>
                <option value="7">JULIO</option>
                <option value="8">AGOSTO</option>
                <option value="9">SEPTIEMBRE</option>
                <option value="10">OCTUBRE</option>
                <option value="11">NOVIEMBRE</option>
                <option selected value="12">DICIEMBRE</option>
            </select>
            <select name="" id="">
                <option value="2022">2022</option>
                <option value="2021">2021</option>
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
                        <th>FECHA CUANDO REALIZO EL PAGO</th>
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


                    /* Consulta para devolver los pagos */
                    $comandoPagos = $con->prepare("SELECT * FROM pagos WHERE mes = '10' AND anio = '2022'");
                    $comandoPagos->execute();
                    $resultadosPagos = $comandoPagos->fetchAll(PDO::FETCH_ASSOC);
                    

                    /* Validacion para que no se dupliquen los pagos realizados */
                    $yaPago = false;
                    foreach ($resultadosPagos as $resultadoPago) {
                        $mensualidadesPagadas = $resultadoPago["pago_numero"];
                        $fechaEnQuePaago = strtotime($resultadoPago["fecha_pago"]);
                        if($fechaEnQuePaago <= $fechaComoEntero){
                            $yaPago = true;
                        }else{
                            $yaPago = false;
                        }
                        
                       
                        foreach ($resultados as $resultado) {
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
                            /* Devolver Venta correspondiente al lote */
                            $idLote = $resultado["id_lote"];
                            $comandoVentas = $con->prepare("SELECT * FROM ventas WHERE id_lote = $idLote");
                            $comandoVentas->execute();
                            $resultadosVentas = $comandoVentas->fetchAll(PDO::FETCH_ASSOC);

                            /* Variables para los campos correspondiente a la tabla de ventas */
                            $enganche = "";
                            $num_mensualidades = "";
                            $monto_mensual = "";
                            $fecha_compra = "";
                            $primer_mensualidad = "";
                            $dias_pago = "";
                            $cliente = "";
                            foreach ($resultadosVentas as $resultadoVenta) {
                                $enganche = $resultadoVenta["enganche"];
                                $num_mensualidades = $resultadoVenta["num_mensualidades"];
                                $monto_mensual = $resultadoVenta["monto_mensual"];
                                $fecha_compra = $resultadoVenta["fecha_compra"];
                                $primer_mensualidad = $resultadoVenta["primer_mensualidad"];
                                $dias_pago = $resultadoVenta["dias_pago"];
                                $cliente = $resultadoVenta["nombre_cliente"];
                            }



                            $fecha_correspondiente = $dias_pago . '/' . $mes . '/' . $anio;

                    ?>
                            <tr class="<?= $colorFila; ?>">
                                <td>L-<?= $resultado["numero_lote"]; ?></td>
                                <td><?= $id == 1 ? "E-" . $resultado["id_etapa"] : "MZA-" . $resultado["id_etapa"]; ?></td>
                                <td><?= $resultado["medida"]; ?></td>
                                <td>$<?= number_format(intval($resultado["costo"]), 2); ?></td>
                                <td><?= $enganche; ?></td>
                                <td><?= $num_mensualidades; ?></td>
                                <td><?= $mensualidadesPagadas; ?></td>
                                <td><?= "$" . number_format(intval($monto_mensual), 2); ?></td>
                                <td></td>
                                <td class="<?= $yaPago === false ? "sinPago" : "pagado"; ?>"><?= $yaPago === false ? "Aún No Paga!" : "$" . number_format(intval($resultadoPago["monto_pagado"]), 2); ?></td>
                                <td><?= $fecha_compra; ?></td>
                                <td><?= $primer_mensualidad; ?></td>
                                <td><?=$resultadoPago["fecha_pago"];?></td>
                                <td><?= $dias_pago; ?></td>
                                <td><?= $cliente; ?></td>
                                <td><?= "$" . number_format(intval($resultado["mantenimiento"]), 2); ?></td>
                                <td style="text-transform: uppercase;"><?= $status; ?></td>
                                <td>

                                    <form action="../../../includes/pagoMensual.php" method="POST">
                                        <input type="hidden" name="id_desarrollo" value="<?= $id; ?>">
                                        <input type="hidden" name="id_lote" value="<?= $resultado["id_lote"]; ?>">
                                        <input type="hidden" name="fecha_pago" value="<?= $hoy; ?>">
                                        <input type="hidden" name="fecha_correspondiente" value="<?= $fecha_correspondiente; ?>">
                                        <input type="hidden" name="monto_pagado" value="<?= $monto_mensual; ?>">
                                        <?php
                                        if ($resultado["estatus"] == 4 || $resultado["estatus"] == 3 || $resultado["estatus"] == 1) {
                                        } else {
                                            if ($yaPago === false) {

                                        ?>
                                                <input type="submit" class="btn btn-success btn-block" value="Pagar Mensualidad">
                                            <?php
                                            } else {
                                            ?>
                                                <button type="button" class="btn btn-secondary" disabled>Mensualidad Pagada</button>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </form>
                                </td>
                                <td>


                                    <form>
                                        <?php
                                        if ($resultado["estatus"] == 4 || $resultado["estatus"] == 3 || $resultado["estatus"] == 1) {
                                        } else {

                                            if ($yaPago === false) {

                                        ?>
                                                <a class="btn btn-info btn-block" href="#">Pago a Capital</a>
                                            <?php
                                            } else {
                                            ?>

                                                <button type="button" class="btn btn-secondary" disabled>Pago a Capital</button>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </form>
                                </td>
                                <td>
                                    <?php
                                    if ($resultado["estatus"] == 4 || $resultado["estatus"] == 3 || $resultado["estatus"] == 1) {
                                    } else {
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
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<?php include('../layouts/footer.php'); ?>