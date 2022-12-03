<?php include('../layouts/header.php');

$comando = $con->prepare("SELECT * FROM usuarios");
$comando->execute();
$resultados = $comando->fetchAll(PDO::FETCH_ASSOC);

?>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Lista de usuairos</h1>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Etapas
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
                        <?php foreach ($resultados as $resultado) { ?>
                            <tr>

                                <td><?= $resultado["nombre_usuario"]; ?></td>
                                <td>
                                    <!-- <a class="btn btn-warning btn-block" href="../lotes/index.php?id=<?php echo $resultado['id_etapa']; ?>">Ver Lotes</a>-->
                                    <a class="btn btn-primary btn-block" href="editar.php?id=<?php echo $resultado['id_usuario']; ?>">Editar</a>
                                    <!-- <a class="btn btn-success btn-block" href="/lotes">Ver Pagos</a> -->
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<?php include('../layouts/footer.php'); ?>