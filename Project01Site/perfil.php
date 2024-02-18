<!doctype html>
<html lang="en">

<head>
    <title>User Profile</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

   
    <style>
        body, html {
            height: 100%;
        }

        body {
            background-image: url('caminho/para/sua/imagem.jpg');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            margin: 0;
            padding: 0;
            justify-content: center;
            align-items: center;
        }

        main {
            min-height: calc(100vh - 56px); /* Subtrai a altura da navbar */
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-secondary">
        <?php 
        require 'phpconfig/config.php';
        if (isset($_GET['username'])) {
            if (!$conn) {
                die("Erro ao conectar ao banco de dados: " . mysqli_connect_error());
            }

            $username = mysqli_real_escape_string($conn, $_GET["username"]);
            $query = "SELECT * FROM cliente WHERE username = '$username'";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                $user = mysqli_fetch_assoc($result);
        ?>
                <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="index2.php?username=<?php echo urlencode($_SESSION['username']); ?>">Home</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        </ul>
                        <form class="d-flex">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                                <div class="dropdown">
                                </div>
                            </ul>
                        </form>
                    </div>
                </div>
        <?php
            } else {
                echo "Usuário não encontrado.";
            }
        } else {
            echo "O parâmetro 'username' não foi fornecido na URL.";
        }
        ?>
    </nav>
    </header>
    <main  style="background-image: url(../Project01Site/imagens/R8.jpg);  
                                    background-position: center; 
                                    background-repeat: no-repeat; 
                                    background-size:cover">

        <div class="container h-100" style="padding-top:5%">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-9 col-xl-6">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-8">
                            <div class="row justify-content-center FIT">
                                <div style="padding-left:15% ;padding-right:15%">

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Update Profile</p>

                                    <form class="mx-1 mx-md-4" method="post">

                                        <?php

                                        if (isset($_GET['id'])) {
                                            $user_id = mysqli_real_escape_string($conn, $_GET["id"]);
                                            $query = "SELECT * FROM cliente WHERE id='$user_id'";
                                            $result = mysqli_query($conn, $query);
                                            $row = mysqli_fetch_assoc($result);

                                            if (isset($_POST['submit'])) {
                                                $username = $_POST['username'];
                                                $email = $_POST['email'];
                                                $password = $_POST['password'];

                                                $query2 = "UPDATE cliente SET email='$email', password='$password',username='$username' WHERE id='$user_id'";
                                                $result2 = mysqli_query($conn, $query2);
                                            }

                                        ?>
                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <label for="email">Email</label>
                                                    <input class="form-control" type="text" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : $row['email']; ?>" id="email" required />
                                                </div>
                                            </div>

                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <label for="username">Username</label>
                                                    <input class="form-control" type="text" name="username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : $row['username']; ?>" id="username" required />
                                                </div>
                                            </div>

                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <label for="password">Password</label>
                                                    <input class="form-control" type="password" name="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : $row['password']; ?>" id="password" required />
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                                <button type="submit" name="submit" class="btn btn-dark btn-lg">Update</button>
                                            </div>
                                        <?php

                                        }
                                        ?>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>