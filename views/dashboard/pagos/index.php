
<?php include('../layouts/header.php');

$comando = $con->prepare("SELECT * FROM desarrollos");
$comando->execute();
$resultados = $comando->fetchAll(PDO::FETCH_ASSOC);

?>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Listas de Pagos</h1>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Pagos
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Desarrollo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($resultados as $resultado){?>
                        <tr>
                            
                            <td><?=$resultado["nombre_desarrollo"];?></td>
                            <td>
                                <a class="btn btn-warning btn-block" href="../pagos/pagos.php?id=<?php echo $resultado['id_desarrollo']; ?>"><?= $resultado['id_desarrollo'] == 1 ? 'Ver Pagos' : 'Ver Pagos'?></a>
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