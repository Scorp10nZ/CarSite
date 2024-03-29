<?php
require 'phpconfig/config.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Carros Diesel</title>

    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />

    <link href="css/styles.css" rel="stylesheet" />
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <?php
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
                                    <button class="btn btn-xs btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 0.85rem;">
                                        Welcome , <strong><?php echo $user['username'] ?></strong>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item btn btn-xs text-center" href="logout.php" style="font-size: 0.9rem;">Logout</a></li>
                                    </ul>
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
    <!-- Header-->
    <header class="bg-dark py-5 BMW " style="background-image: url(imagens/BMW-E60-M5-Rear-View.jpg);">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Dream car in your hands</h1>
                <p class="lead fw-normal text-white-40 mb-0">Unleash Your Dreams on Wheels</p>
            </div>
        </div>
    </header>
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php
                $query = "SELECT * FROM carros WHERE combustivel='diesel'";
                $result = mysqli_query($conn, $query);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <div class="col mb-5">
                            <form action="index.php?action=add&id=<?php echo $row["id"] ?>" method="post">
                                <div class="card h-60">
                                    <img class="card-img-top" style="border: 2px solid black" src="imagens/<?php echo $row['imagem']; ?>" width="300px" height="200px" />
                                    <!-- Product details -->
                                    <div class="card-body p-4">
                                        <div class="text-center">
                                            <!-- Product name -->
                                            <h5 class="fw-bolder"><?php echo $row['Modelo']; ?></h5>
                                            <!-- Product price -->
                                            <?php echo $row['Preco']; ?>€
                                        </div>
                                    </div>
                                    <!-- Product actions -->
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                        <div class="text-center">
                                            <a class="btn btn-outline-dark mt-auto" href="details.php?id=<?php echo $row["id"]; ?>&username=<?php echo urlencode($_SESSION['username']); ?>">More details</a>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2024</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>
