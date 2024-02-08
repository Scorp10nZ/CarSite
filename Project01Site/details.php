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
            <title>Detalhes do Carro</title>
        </head>

        <body>
            <div class="container">
                <h1>Detalhes do Carro</h1>
                <div>
                    <h2><?php echo $car['Modelo']; ?></h2>
                    <p>Preço: <?php echo $car['Preco']; ?>€</p>
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