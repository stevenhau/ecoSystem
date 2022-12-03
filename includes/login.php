<?php
if (isset($_POST["btnAction"]) && $_POST["btnAction"] == "entrar") {
require 'config/database.php';

$db = new Database();
$con = $db->conectar();
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
$pass = isset($_POST['password']) ? $_POST['password'] : '';
$passMD5 = md5($pass);
    $comando = $con->prepare("SELECT * FROM usuarios WHERE nombre_usuario = '$nombre' AND password = '$passMD5'");
    $comando->execute();
    $resultados = $comando->fetchAll(PDO::FETCH_ASSOC);
    if (empty($resultados)) {
        echo '<script>alert("Usuario o Constraseña incorrectos");</script>';
    } else {
        session_start();
        $_SESSION['login'] = "logeado";
        $_SESSION['nombre'] = $nombre;
        header('Location: views/dashboard/index.php');
    }
}
