<?php
require 'phpconfig/config.php';

if (isset($_GET['id']) && isset($_GET['id_vendedor'])) {
    $car_id = $_GET['id'];
    $id_vendedor = $_GET['id_vendedor'];

    $sql = "SELECT * FROM Vendedor WHERE id_vendedor = $id_vendedor";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "Nome do Vendedor: " . $row["nome_vendedor"] . "<br>";
        echo "Email do Vendedor: " . $row["email_vendedor"] . "<br>";
        echo "Telefone do Vendedor: " . $row["telefone"] . "<br>";
        echo "Morada do Vendedor: " . $row["morada"] . "<br>";
    } else {
        echo "Nenhum resultado encontrado para o ID do vendedor fornecido.";
    }
} else {
    echo "ID do carro e/ou ID do vendedor não fornecidos.";
}
