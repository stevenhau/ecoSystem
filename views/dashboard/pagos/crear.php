<?php include('../layouts/header.php');

$idEtapa = $_GET['e'];
$idLote = $_GET['l'];
$idCliente = $_GET['c'];
$monto = $_GET['m'];

?>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Pagar</h1>
        <div class="card mb-4">

            <div class="card-body">
                <form action="guardar.php" method="POST">
                    <input type="hidden" name="id_etapa" value="<?= $idEtapa; ?>" />
                    <input type="hidden" name="id_lote" value="<?= $idLote; ?>" />
                    <input type="hidden" name="id_cliente" value="<?= $idCliente; ?>" />
                    <input type="text" name="fecha_pagada" value=""/>
                    <div class="form-floating mb-3">
                        <input class="form-control" type="text" name="monto" value="<?=$monto;?>" />
                        <label>Monto a Pagar:</label>
                    </div>
                    <div class="mt-4 mb-0">
                        <div class="d-grid"><button type="submit" class="btn btn-primary btn-block">Pagar</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<?php include('../layouts/footer.php'); ?>