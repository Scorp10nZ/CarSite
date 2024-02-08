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

        <body style="background-color:#f1f1f1;">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
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
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <img class="card-img-top IMG" src="imagens/<?php echo $car['imagem']; ?>" />
                    </div>
                    <div class="col-md-6">
                        <h1>Detalhes do Carro</h1>
                        <div>
                            <h1><?php echo $car['Marca']; ?></h1>
                            <h2><?php echo $car['Modelo']; ?></h2>
                            <p>Preço: <?php echo $car['Preco']; ?>€</p>
                            <p>Ano: <?php echo $car['Ano']; ?> </p>
                            <p>Kilometragem: <?php echo $car['kilometragem']; ?> </p>
                            <p>Combustivel: <?php echo $car['combustivel']; ?></p>
                            <p>Cavalagem: <?php echo $car['cavalagem']; ?></p>
                            <p>Cilindrada: <?php echo $car['cilindrada']; ?></p>
                            <p>Tipo de caixa: <?php echo $car['tipo_de_caixa']; ?></p>
                            <p>Tracção: <?php echo $car['tracção']; ?></p>
                        </div>
                    </div>
                </div>
            </div>

        </body>

        </html>



<?php
    } else {
        echo "Carro não encontrado.";
    }
} else {
    echo "ID do carro não especificado.";
}
?>