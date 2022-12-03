<?php include('../layouts/header.php');
$id = $_GET['id'];
$comando = $con->prepare("SELECT * FROM pagos
                            INNER JOIN etapas
                            ON etapas.id_etapa = pagos.id_etapa
                            INNER JOIN lotes
                            ON lotes.id_lote = pagos.id_lote
                            INNER JOIN clientes
                            ON clientes.id_cliente = pagos.id_cliente
                            WHERE pagos.id_cliente = $id;
");
$comando->execute();
$resultados = $comando->fetchAll(PDO::FETCH_ASSOC);
if($resultados != NULL){
?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Historial de pago de <?=$resultados[0]["nombre"];?></h1>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Historial de pago de <?=$resultados[0]["nombre"];?>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Mensualidad</th>
                            <th>Etapa</th>
                            <th>Lote</th>  
                            <th>Fecha que Pago</th>
                            <th>Monto</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $pagoNum = 1;
                        foreach($resultados as $resultado){?>
                        <tr>
                            <td><?= $pagoNum++;?></td>
                            <td><?=$resultado["nombre_etapa"];?></td>
                            <td><?=$resultado["numero_lote"];?></td>
                            <td><?=$resultado["fecha_pago"];?></td>
                            <td>$<?=number_format($resultado['monto_pagado'], 2);?></td>
                            <td>
                                
                                <a class="btn btn-warning btn-block" href="#">Descargar Comprobante</a>
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

<?php 
}else{
?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">¡Este Cliente aun no tiene pagos!</h1>
        <a class="btn btn-primary" href="index.php" role="button">Regresar a la lista de pagos</a>
    </div>
</main>

<?php
}

include('../layouts/footer.php'); ?>