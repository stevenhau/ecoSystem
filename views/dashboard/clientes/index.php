 <?php include('../layouts/header.php');
 $comando = $con->prepare("SELECT * FROM clientes");
 $comando->execute();
 $resultados = $comando->fetchAll(PDO::FETCH_ASSOC);
 ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Lista de Clientes</h1>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Clientes
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Telefono</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($resultados as $resultado){
                        if($resultado["id_cliente"] != 1){
                        ?>
                        <tr>  
                            <td><?=$resultado["nombre"];?></td>
                            <td><?=$resultado["email"];?></td>
                            <td><?=$resultado["telefono"];?></td>
                            <td>
                                <a class="btn btn-primary btn-block" href="editar.php?id=<?php echo $resultado['id_cliente']; ?>">Editar</a>
                            </td>
                        </tr>
                    <?php
                    }
                 }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<?php include('../layouts/footer.php'); ?>