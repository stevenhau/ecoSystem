<?php include('../layouts/header.php');

$comando = $con->prepare("SELECT * FROM ventas
                         INNER JOIN clientes
                          ON ventas.id_cliente = clientes.id_cliente 
                          INNER JOIN etapas 
                          ON ventas.id_etapa = etapas.id_etapa
                          INNER JOIN lotes 
                          ON ventas.id_lote = lotes.id_lote
                        ");
$comando->execute();
$resultados = $comando->fetchAll(PDO::FETCH_ASSOC);


?>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Lista de Ventas</h1>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Ventas
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Nombre del Cliente</th>
                            <th>Etapa</th>
                            <th>Lote</th>
                            <th>Enganche</th>
                            <th>Numero de Meses</th>
                            <th>Fecha de Compra</th>
                            <th>Asesor</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($resultados as $resultado) { ?>
                            <tr>

                                <td><?= $resultado["nombre"]; ?></td>
                                <td><?= $resultado["nombre_etapa"]; ?></td>
                                <td><?= $resultado["numero_lote"]; ?></td>
                                <td><?= $resultado["enganche"] == "0" ? 'SIN ENGANCHE' : $resultado["enganche"]; ?></td>
                                <td><?= $resultado["num_mensualidades"]; ?></td>
                                <td><?= $resultado["fecha_compra"]; ?></td>
                                <td><?= $resultado["asesor"]; ?></td>
                                <td>
                                    <a class="btn btn-primary btn-block" href="editar.php?id=<?php echo $resultado['id_venta']; ?>">Editar</a>
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