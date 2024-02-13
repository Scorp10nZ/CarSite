<?php
require 'phpconfig/config.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link href="css/styles.css" rel="stylesheet" />
    <title>Detalhes do Carro</title>
</head>

<body style="background-color:lightslategray">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#!">CarDreamer</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <?php if (isset($_GET['username'])) { ?>
                        <a class="nav-link active" aria-current="page" href="index2.php?username=<?php echo urlencode($_SESSION['username']); ?>">Home</a>
                    <?php } else { ?>
                        <a class="nav-link active" aria-current="page" href="index2.php">Home</a>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container ">
        <?php
        if (isset($_GET['id'])) {
            if (!$conn) {
                die("Erro ao conectar ao banco de dados: " . mysqli_connect_error());
            }

            $car_id = $_GET['id'];
            $query = "SELECT * FROM carros WHERE id = $car_id";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                $car = mysqli_fetch_assoc($result);
        ?>
                <div class="row">
                    <div class="col-md-6" style="margin-top: 2%;">
                        <h2 style="color: white; padding-left:25%"> <?php echo $car['Marca']; ?> <?php echo $car['Modelo']; ?></h2>
                        <img class="rounded" style="margin-top: 2% ; width:90% ;border: 5px groove black" height="90%" src="imagens/<?php echo $car['imagem']; ?>" />
                    </div>
                    <div class="col-md-3" style="margin-top: 5% ;">
                        <div>
                            <div style="margin-top: 30% ;color: white;">
                                <h5><strong>Preço:</strong> <?php echo $car['Preco']; ?>€</h5>
                                <h5><strong>Ano:</strong> <?php echo $car['Ano']; ?> </h5>
                                <h5><strong>Kilometragem:</strong> <?php echo $car['kilometragem']; ?> km</h5>
                                <h5><strong>Combustivel:</strong> <?php echo $car['combustivel']; ?></h5>
                                <h5><strong>Estado:</strong> <?php echo $car['Estado']; ?></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3" style="margin-top: 12%">
                        <div style="color: white;">
                            <h5><strong>Cavalagem:</strong> <?php echo $car['cavalagem']; ?>hp</h5>
                            <h5><strong>Cilindragem:</strong> <?php echo $car['cilindrada']; ?>cc</h5>
                            <h5><strong>Tipo de caixa:</strong> <?php echo $car['tipo_de_caixa']; ?></h5>
                            <h5><strong>Tracção:</strong> <?php echo $car['tracção']; ?></h5>
                            <h5><strong>Motor:</strong> <?php echo $car['Motor']; ?></h5>
                        </div>
                    </div>
                </div>
    </div>
    <div style="margin-left: 60%; margin: botton 10%;">
        <button type="button" class="btn btn-secondary btn-lg">Contatar Vendedor</button>
    </div>
    <div class="py-3 bg-dark" style="margin-top: 10% ;color:white">
        <h3 class="m-0 text-center">Mais Anuncios</h3>
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <?php
                    $query = "SELECT * FROM carros WHERE id!=$car_id ORDER BY RAND()";
                    $result = mysqli_query($conn, $query);
                    $count = 0;
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            if ($count >= 4) {
                                break;
                            }
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
                                            <div class="text-center"> <a class="btn btn-outline-dark mt-auto" href="details.php?id=<?php echo $row["id"]; ?><?php if (isset($_GET['username'])) echo '&username=' . urlencode($_GET['username']); ?>">More details</a></div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                    <?php
                            $count++;
                        }
                    }
                    ?>
                </div>
            </div>
        </section>
    </div>
</body>
<footer class="py-3 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p>
    </div>
</footer>

</html>



<?php
            } else {
                echo "Carro não encontrado.";
            }
        } else {
            echo "ID do carro não especificado.";
        }
?>