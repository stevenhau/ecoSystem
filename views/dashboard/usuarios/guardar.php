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
    $pass = isset($_POST['password']) ? $_POST['password'] : '';
    $passMD5 = md5($pass);

    $query = $con->prepare("INSERT INTO usuarios (nombre_usuario, password) VALUES (:nombre_usuario, :password)");
    $resultado = $query->execute(['nombre_usuario' => $nombre, 'password' => $passMD5]);
}



header('Location: index.php');

?>