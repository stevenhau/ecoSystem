<?php
date_default_timezone_set('America/Cancun');

include('../layouts/header.php');

$comando = $con->prepare("SELECT * FROM lotes");
$comando->execute();
$resultados = $comando->fetchAll(PDO::FETCH_ASSOC);
$hoy = date('d/m/Y');
$hoyParaConvertir = date('Y/m/d');
$fechaComoEntero = strtotime($hoyParaConvertir);

$anio = date("Y", $fechaComoEntero);
$mes = date("m", $fechaComoEntero) + 1;
$dia = date("d", $fechaComoEntero);

if($mes > 12){
    $mes = 1;
}

if ($dia >= 16 &&  $dia <= 31) {
    $dia = 01;
} elseif ($dia >= 01 &&  $dia <= 14) {
    $dia = 15;
}

$primerMes = $dia . '/' . $mes . '/' . $anio;
?>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Vender Lotes</h1>
        <div class="card mb-4 formularioMax">

            <div class="card-body">
                <form action="guardar.php" method="POST">
                    <input type="hidden">
                    <div class="form-floating mb-3">
                        <select class="form-select " id="selectDesarrollos" aria-label="Floating label select example">
                            <option selected>ELIGE UN DESARROLLO</option>
                            <option value="1">EL CEDRAL ECO HABITAT I</option>
                            <option value="2">EL CEDRAL ECO HABITAT II</option>
                        </select>
                        <label for="floatingSelect">Desarrollo</label>
                    </div>
                    <div class="form-floating mb-3" id="selectLotes">
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" type="text">
                        <label>Precio del Lote:</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" type="text">
                        <label>Nombre del Cliente</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" type="text" value="0">
                        <label>Enganche Minimo</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" type="text" value="120">
                        <label>Numero de Meses</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control bg-white" type="text" value="<?= $hoy; ?>" readonly>
                        <label>Fecha de Compra</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control bg-white" type="text" value="<?= $primerMes; ?>" readonly>
                        <label>Primer Mensualidad</label>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Comprobante de Pago:</label>
                        <input class="form-control" type="file" id="formFile">
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" type="text">
                        <label>Asesor</label>
                    </div>
                    <div class="mt-4 mb-0">
                        <div class="d-grid"><a class="btn btn-primary btn-block" href="login.html">Vender</a></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<script type="text/javascript">
    $(document).ready(function() {
        recargarLista();

        $('#selectDesarrollos').change(function() {
            recargarLista();
        });
    });
</script>
<script type="text/javascript">
    function recargarLista() {
        $.ajax({
            type: "POST",
            url: "../../../includes/listaLotes.php",
            data: "desarrollo=" + $('#selectDesarrollos').val(),
            success: function(r) {
                $('#selectLotes').html(r);
            }
        });
    }
</script>

<?php include('../layouts/footer.php'); ?>