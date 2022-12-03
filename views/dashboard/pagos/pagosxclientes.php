<?php include('../layouts/header.php');
$comando = $con->prepare("SELECT * FROM lotes
                            INNER JOIN etapas
                            ON etapas.id_etapa = lotes.id_etapa
                            INNER JOIN clientes
                            ON clientes.id_cliente = lotes.id_cliente
                            INNER JOIN ventas
                            ON lotes.id_lote = ventas.id_lote
");
$comando->execute();
$resultados = $comando->fetchAll(PDO::FETCH_ASSOC);

$consulta = $con->prepare("SELECT * FROM pagos");
$consulta->execute();
$pagos = $consulta->fetchAll(PDO::FETCH_ASSOC);
/* var_dump($pagos); */
?>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Lista de Pagos por clientes</h1>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Pagos por Cliente
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Nombre del Cliente</th>
                            <th>Etapa</th>
                            <th>Lote</th>
                            <th>Proximo Pago</th>
                            <th>Monto</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($resultados as $resultado){
                                $precio_lote = $resultado["costo"];
                                $numMensualidades = $resultado["num_mensualidades"];
                                $enganche = $resultado["enganche"];
                                $resta = $precio_lote - $enganche;
                                $monto_mensual = $resta / $numMensualidades;
                                $params_get = "?e=".$resultado['id_etapa']."&l=".$resultado['id_lote']."&c=".$resultado['id_cliente']."&m=".$monto_mensual;
                                
                             ?>
                        <tr>
                            <td><?=$resultado["nombre"];?></td>
                            <td><?=$resultado["nombre_etapa"];?></td>
                            <td><?=$resultado["numero_lote"];?></td>
                            <td>16/08/2021</td>
                            <td>$<?=number_format($monto_mensual, 2);?></td>
                            <td>
                                <a class="btn btn-success btn-block" href="crear.php<?=$params_get;?>">Pagar</a>
                                <a class="btn btn-warning btn-block" href="historial_pagos.php?id=<?=$resultado["id_lote"];?>">Historial de Pagos</a>
                               <!--  <a class="btn btn-primary btn-block" href="#">Editar</a> -->
                            </td>
                        </tr>
                        <?php }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<?php include('../layouts/footer.php'); ?>