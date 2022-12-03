<?php include('../layouts/header.php');

$id = $_GET['id'];
$activo = 1;

$query = $con->prepare("SELECT * FROM clientes WHERE id_cliente = :id_cliente");
$query->execute(['id_cliente' => $id]);
$num = $query->rowCount();
if ($num > 0) {
    $row = $query->fetch(PDO::FETCH_ASSOC);
} else {
    header("Location: index.php");
}

?>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Modificar Cliente</h1>
        <div class="card mb-4">

            <div class="card-body">
                <form action="guardar.php" method="POST">
                <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
                    <div class="form-floating mb-3">
                        <input class="form-control" type="text" name="nombre"  value="<?php echo $row['nombre']; ?>" />
                        <label>Nombre del Cliente</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" type="text" name="email"  value="<?php echo $row['email']; ?>" />
                        <label>Correo del Cliente</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" type="text" name="telefono"  value="<?php echo $row['telefono']; ?>" />
                        <label>Telefono del Cliente</label>
                    </div>
                    <div class="mt-4 mb-0">
                        <div class="d-grid"><button type="submit" class="btn btn-primary btn-block">Guardar</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<?php include('../layouts/footer.php'); ?>