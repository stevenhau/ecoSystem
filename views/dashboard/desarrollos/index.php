
<?php include('../layouts/header.php');

$comando = $con->prepare("SELECT * FROM desarrollos");
$comando->execute();
$resultados = $comando->fetchAll(PDO::FETCH_ASSOC);

?>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Lista de Desarrollos</h1>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Desarrollos
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($resultados as $resultado){?>
                        <tr>
                            
                            <td><?=$resultado["nombre_desarrollo"];?></td>
                            <td>
                                <a class="btn btn-warning btn-block" href="../etapas/index.php?id=<?php echo $resultado['id_desarrollo']; ?>"><?= $resultado['id_desarrollo'] == 1 ? 'Ver Etapas' : 'Ver Manzanas'?></a>
                                <a class="btn btn-primary btn-block" href="editar.php?id=<?php echo $resultado['id_desarrollo']; ?>">Editar</a>
                                <!-- <a class="btn btn-success btn-block" href="/lotes">Ver Pagos</a> -->
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