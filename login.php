<?php
session_start();
include "includes/login.php";
if (isset($_SESSION['login']) && $_SESSION['login'] == "logeado") {
    header('Location: views/dashboard/index.php');
} else {
?>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bootstrap v5.2 Design Login Forms</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    </head>

    <body>
        <div class="vh-100 d-flex justify-content-center align-items-center ">
            <div class="col-md-5 p-5 shadow-sm border rounded-5 border-primary bg-white">
                <h2 class="text-center mb-4 text-primary">Acceso</h2>
                <form action="login.php" method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Usuario</label>
                        <input type="text" name="nombre" class="form-control border border-primary" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                        <input type="password" name="password" class="form-control border border-primary" id="exampleInputPassword1">
                    </div>
                    <!--  <p class="small"><a class="text-primary" href="forget-password.html">Forgot password?</a></p> -->
                    <div class="d-grid">
                        <input class="btn btn-primary" type="submit" value="entrar" name="btnAction">
                    </div>
                </form>
                <!-- <div class="mt-3">
                <p class="mb-0  text-center">Don't have an account? <a href="signup.html" class="text-primary fw-bold">Sign
                        Up</a></p>
            </div> -->
            </div>
        </div>
    </body>

    </html>

<?php } ?>