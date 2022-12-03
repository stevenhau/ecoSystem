<?php
require '../../../config/database.php';

$db = new Database();
$con = $db->conectar();

if (isset($_POST['id'])) {

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];

    $query = $con->prepare("UPDATE etapas SET nombre_etapa=? WHERE id_etapa=?");
    $resultado = $query->execute([$nombre, $id]);


}else{
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';

    $query = $con->prepare("INSERT INTO etapas (nombre_etapa) VALUES (:nombre_etapa)");
    $resultado = $query->execute(['nombre_etapa' => $nombre]);
}



header('Location: index.php');

?>