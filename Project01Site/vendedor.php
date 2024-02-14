<?php
require 'phpconfig/config.php';

?>


<!doctype html>
<html lang="en">

<head>
    <title>Detalhes Vendedor</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />


    <style>
        .table th,
        .table td {
            text-align: center;
        }
    </style>

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container px-4 px-lg-5">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <?php if (isset($_GET['username'])) { ?>
                        <a class="navbar-brand" aria-current="page" href="index2.php?username=<?php echo urlencode($_SESSION['username']); ?>">Home</a>
                    <?php } else { ?>
                        <a class="navbar-brand" aria-current="page" href="index2.php">Home</a>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
    <main>
        <?php
        if (isset($_GET['id']) && isset($_GET['id_vendedor'])) {
            $car_id = $_GET['id'];
            $id_vendedor = $_GET['id_vendedor'];

            $sql = "SELECT * FROM Vendedor WHERE id_vendedor = $id_vendedor";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
        ?>
                <div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nome </th>
                                <th scope="col">Email </th>
                                <th scope="col">Telefone</th>
                                <th scope="col">Morada</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $row['nome_vendedor'] ?></td>
                                <td><?php echo $row['email_vendedor'] ?></td>
                                <td><?php echo $row['telefone'] ?></td>
                                <td><?php echo $row['morada'] ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

<?php
            } else {
                echo "Nenhum resultado encontrado para o ID do vendedor fornecido.";
            }
        } else {
            echo "ID do carro e/ou ID do vendedor não fornecidos.";
        }
?>

</html>