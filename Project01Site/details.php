<?php
require 'phpconfig/config.php';

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
                            <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
                        </ul>
                        <form class="d-flex">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                                <li class="nav-item"><a class="nav-link" href="Register.php">Register</a></li>
                            </ul>
                        </form>
                    </div>
                </div>
            </nav>
            <div class="container ">
                <div class="row">
                    <div class="col-md-6 " style="margin-top: 2%">
                        <h2 style="color: white; padding-left:25%"> <?php echo $car['Marca']; ?> <?php echo $car['Modelo']; ?></h2>
                        <img class="card-img-top IMG rounded" style="margin-top: 2%" src="imagens/<?php echo $car['imagem']; ?>" />
                    </div>
                    <div class="col-md-3" style="margin-top: 13% ;">
                        <div>
                            <div style="margin-top: 30% ;color: white;">
                                <h6><strong>Preço:</strong> <?php echo $car['Preco']; ?>€</h6>
                                <h6><strong>Ano:</strong> <?php echo $car['Ano']; ?> </h6>
                                <h6><strong>Kilometragem:</strong> <?php echo $car['kilometragem']; ?> km</h6>
                                <h6><strong>Combustivel:</strong> <?php echo $car['combustivel']; ?></h6>
                            </div>
                            <div style="margin-top: 25%">
                                <button type="button" class="btn btn-secondary btn-lg">Contatar Vendedor</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3" style="margin-top: 20%">
                        <div style="color: white;">
                            <h6><strong>Cavalagem:</strong> <?php echo $car['cavalagem']; ?>hp</h6>
                            <h6><strong>Cilindragem:</strong> <?php echo $car['cilindrada']; ?>cc</h6>
                            <h6><strong>Tipo de caixa:</strong> <?php echo $car['tipo_de_caixa']; ?></h6>
                            <h6><strong>Tracção:</strong> <?php echo $car['tracção']; ?></h6>
                        </div>
                    </div>
                </div>
            </div>

        </body>
        <footer class="py-3 bg-dark" style="margin-top: 4%" >
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