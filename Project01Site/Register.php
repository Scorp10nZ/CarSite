<?php
require 'phpconfig/config.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['password'];
    $duplicate = mysqli_query($conn, "SELECT * FROM cliente WHERE username = '$username' OR email = '$email'");
    if (mysqli_num_rows($duplicate) > 0) {
        echo
        "<script> alert('Username or Email já estoa a ser usados'); </script>";
    } else {
        if ($password == $confirmpassword) {
            $query = "INSERT INTO cliente VALUES('','$username','$email','$password')";
            mysqli_query($conn, $query);
            echo
            "<script> alert('Registo com sucesso'); </script>";
        } else {
            echo
            "<script> alert('Password não é igual a inserida anterioirmente'); </script>";
        }
    }
}
?>


<!doctype html>
<html lang="en">

<head>
    <title>Register</title>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

    <link href="css/Register.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <section class="vh-100" style="background-color:gray;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-11 col-xl-9">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <p class="text-center h1 fw-bold mb-2 mx-1 mx-md-3 ">Sign up</p>

                                    <form class="mx-1 mx-md-4">

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label for="username">Username</label>
                                                <input class="form-control" type="text" name="username" id="username" required />
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label for="email">Email</label>
                                                <input class="form-control" type="text" name="email" id="email" required />
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">

                                                <label for="password">Password</label>
                                                <input class="form-control" type="password" name="password" id="password" required />
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label for="passwordRepeat">Repeat Password</label>
                                                <input class="form-control" type="password" name="confirmpassword" id="confirmpassword" required />
                                            </div>
                                        </div>
                                        <div class="form-check d-flex justify-content-center mb-3">
                                                 <a href="Login.php">Já tem uma conta</a>
                                        </div>

                                        <div class="mx-4 mb-4 mb-lg-1" style="padding-left:30%">
                                            <button type="submit" class="btn btn-dark btn-lg">Register</button>
                                        </div>

                                    </form>

                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                                    <img src="imagens/wp10500951.webp" alt="" class="FIT" width="600" height="600">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>