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
                <div class="container row">
                    <div class="col-md-4 offset-md-3" style="padding-bottom:5%">
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
                                <img class="rounded" style="margin-top: 2% ; width:90% ;border: 5px groove black" height="90%" src="imagens/<?php echo $car['imagem']; ?>" />
 
                    </div>
                    <div class="col-md-3 offset-md-1" style="padding-bottom:5%">
                            <h4><?php echo $car['Marca']; ?> <?php echo $car['Modelo']; ?></h4>
                            <br>
                            <br>
                            <h5><strong>Preço:</strong> <?php echo $car['Preco']; ?>€</h5>
                            <br>
                            <br>
                            <h5><strong>Ano:</strong> <?php echo $car['Ano']; ?> </h5>
                    </div>
                    <?php
                            }
                        }
                        ?>
                </div>


                <div class="py-3 bg-secondary " style="color:white;">
                    <h3 class="m-0 text-center">Mais Anuncios deste Vendedor</h3>
                    <section class="py-5">
                        <div class="container px-4 px-lg-5 mt-5">
                            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                                <?php
                                $query = "SELECT * FROM carros WHERE id!=$car_id AND id_vendedor = (SELECT id_vendedor FROM carros WHERE id = $car_id) order by rand()";
                                $result = mysqli_query($conn, $query);
                                $count = 0;
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        if ($count >= 3) {
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