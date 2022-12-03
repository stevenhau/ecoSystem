<?php include('../layouts/header.php'); ?>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Agregar Nuevo Lote de "EL CEDRAL ECO HÁBITAT I"</h1>
        <div class="card mb-4">

            <div class="card-body">
                <form>
                    <input type="hidden" value="EL CEDRAL ECO HÁBITAT I" />
                    <input type="hidden" value="Disponible" />
                    <div class="form-floating mb-3">
                        <input class="form-control" id="etapa" type="text" />
                        <label for="etapa">Medidas / M2:</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="etapa" type="text" />
                        <label for="etapa">Costo Total:</label>
                    </div>
                    <div class="mt-4 mb-0">
                        <div class="d-grid"><a class="btn btn-primary btn-block" href="#">Guardar</a></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<?php include('../layouts/footer.php'); ?>