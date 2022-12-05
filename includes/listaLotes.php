<?php
require '../config/database.php';

$desarrollo = $_POST['desarrollo'];
$db = new Database();
$con = $db->conectar();

$comando = $con->prepare("SELECT * FROM lotes WHERE id_desarrollo = '$desarrollo' AND estatus = '1'");
$comando->execute();
$resultados = $comando->fetchAll(PDO::FETCH_ASSOC); 

$etapa = "Etapa";
if($desarrollo == 1){
    $etapa = "Etapa";
}else{
    $etapa = "Manzana";
}
$cadena = ' <select class="form-select " id="selectLotes" aria-label="Floating label select example"><option>ELIGE UN LOTE</option>';
foreach($resultados as $key => $resultado){
    $cadena = $cadena.' <option value='.$resultado["id_lote"].'>Lote: '.$resultado["numero_lote"].' de la '.$etapa.' '.$resultado["id_etapa"].'</option>';
}
echo $cadena.'</select><label for=floatingSelect">Lotes</label>';


?>