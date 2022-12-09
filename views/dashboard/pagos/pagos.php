<?php
include('../layouts/header.php');
$id = $_GET['id'];
$hoyParaConvertir = date('Y/m/d');
$fechaComoEntero = strtotime($hoyParaConvertir);
$anio = date("Y", $fechaComoEntero);
$mes = date("m", $fechaComoEntero);
$dia = date("d", $fechaComoEntero);
?>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Lista de Pagos "<?= $id == 1 ? "EL CEDRAL ECO HABITAT I" : " EL CEDRAL ECO HABITAT II"; ?>"
            <select id="selectMes">
                <option value="1" <?= $mes == 1 ? 'selected' : '';?>>ENERO</option>
                <option value="2" <?= $mes == 2 ? 'selected' : '';?>>FEBRERO</option>
                <option value="3" <?= $mes == 3 ? 'selected' : '';?>>MARZO</option>
                <option value="4" <?= $mes == 4 ? 'selected' : '';?>>ABRIL</option>
                <option value="5" <?= $mes == 5 ? 'selected' : '';?>>MAYO</option>
                <option value="6" <?= $mes == 6 ? 'selected' : '';?>>JUNIO</option>
                <option value="7" <?= $mes == 7 ? 'selected' : '';?>>JULIO</option>
                <option value="8" <?= $mes == 8 ? 'selected' : '';?>>AGOSTO</option>
                <option value="9" <?= $mes == 9 ? 'selected' : '';?>>SEPTIEMBRE</option>
                <option value="10" <?= $mes == 10 ? 'selected' : '';?>>OCTUBRE</option>
                <option value="11" <?= $mes == 11 ? 'selected' : '';?>>NOVIEMBRE</option>
                <option value="12" <?= $mes == 12 ? 'selected' : '';?>>DICIEMBRE</option>
            </select>
            <select id="selectAnio">
                <option value="2021">2021</option>
                <option value="2022" selected>2022</option>
            </select>
        </h1>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Lote</th>
                        <th><?= $id == 1 ? "Etapa" : "Manzana"; ?></th>
                        <th>MEDIDA/M2</th>
                        <th>COSTO TOTAL</th>
                        <th>ENGANCHE</th>
                        <th>NO. DE MENSUALIDADES</th>
                        <th>PAGO NUMERO</th>
                        <th>MENSUALIDAD</th>
                        <th>INTERES 5%</th>
                        <th>PAGO TOTAL MENSUAL</th>
                        <th>FECHA DE COMPRA</th>
                        <th>PRIMER MENSUALIDAD</th>
                        <th>FECHA CUANDO RALIZO EL PAGO</th>
                        <th>DIAS DE PAGO</th>
                        <th>NOMBRE</th>
                        <th>MTTO.</th>
                        <th>Estatus</th>
                        <th>Pagar Mensualidad</th>
                        <th>Pago a Capital</th>
                        <th>Descargar Comprobante</th>
                    </tr>
                </thead>
                <tbody id="tablaGenerada">

                </tbody>
            </table>
        </div>
    </div>
</main>

<input id="desarrollo" type="hidden" value="<?=$id;?>">
<script type="text/javascript">
    $(document).ready(function() {
        recargarTablaPagos();

        $('#selectAnio').change(function() {
            recargarTablaPagos();
        });
        $('#selectMes').change(function() {
            recargarTablaPagos();
        });
    });
</script>
<script type="text/javascript">
    function recargarTablaPagos() {
       /*  let anio = "anio=" + $('#selectAnio').val();
        let mes = "mes=" + $('#selectMes').val(); */
        $.ajax({
            type: "POST",
            url: "../../../includes/cargarTablaPagos.php",
            data: {
                desarrollo: $('#desarrollo').val(),
                anio: $('#selectAnio').val(),
                mes: $('#selectMes').val()
            },
            success: function(r) {
                $('#tablaGenerada').html(r);
            }
        });
    }
</script>


<?php include('../layouts/footer.php'); ?>