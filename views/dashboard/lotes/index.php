<?php include('../layouts/header.php');

$id = $_GET['id'];

$comando = $con->prepare("SELECT * FROM lotes
                         INNER JOIN etapas
                         ON etapas.id_etapa = etapas.id_etapa
                        WHERE lotes.id_etapa = $id and etapas.id_etapa = $id");
$comando->execute();
$resultados = $comando->fetchAll(PDO::FETCH_ASSOC);

?>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Lista de lotes de "<?= $resultados[0]["nombre_etapa"];?>"</h1>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Lotes de <?= $resultados[0]["nombre_etapa"];?>
            </div>
            
            <div class="card-body">
            <a class="btn btn-primary btn-block mb-3" href="crear.php">Agregar un Lote</a>
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Numero de Lote</th>
                            <th>Medidas / M2</th>
                            <th>Costo Total</th>
                            <th>Estatus</th>
                            <th>Modificaciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($resultados as $resultado){
                        ?>
                        <tr>
                            <td><?=$resultado['numero_lote'];?></td>
                            <td><?=$resultado['medida'];?></td>
                            <td><?= $resultado['costo'] == "CASA CLUB " ? $resultado['costo']: '$'. number_format($resultado['costo'], 2);?></td>
                            <td><?=$resultado['etatus'];?></td>
                            <td>
                               <!--  <a class="btn btn-success btn-block" href="#">Vender</a>
                                <a class="btn btn-warning btn-block" href="#">Apartar</a> -->
                                <a class="btn btn-primary btn-block" href="#">Editar</a>
                            </td>
                        </tr>
                    <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<?php include('../layouts/footer.php'); ?>