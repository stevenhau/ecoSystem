<?php include('../layouts/header.php');?>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Agregar nuevo Usuario</h1>
        <div class="card mb-4">

            <div class="card-body">
                <form action="guardar.php" method="POST">
                    <div class="form-floating mb-3">
                        <input class="form-control" type="text" name="nombre"  />
                        <label>Nombre del usuario</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" type="text" name="password"  />
                        <label>password</label>
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