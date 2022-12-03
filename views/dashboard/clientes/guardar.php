<?php
require '../../../config/database.php';

$db = new Database();
$con = $db->conectar();

if (isset($_POST['id'])) {

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];

    $query = $con->prepare("UPDATE clientes SET nombre=?,email=?,telefono=? WHERE id_cliente=?");
    $resultado = $query->execute([$nombre,$email,$telefono, $id]);


}else{
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';

    $query = $con->prepare("INSERT INTO clientes (nombre, email, telefono) VALUES (:nombre, :email, :telefono)");
    $resultado = $query->execute(['nombre' => $nombre, 'email' => $email, 'telefono' => $telefono]);
}



header('Location: index.php');

?>