<?php
require 'phpconfig/config.php';
if(isset($_POST["submit"])){
    $username=$_POST["username"];
    $password=$_POST["password"];
    $result=mysqli_query($conn,"SELECT * FROM cliente WHERE username='$username'");
    $row=mysqli_fetch_array($result);
    if(mysqli_num_rows($result)> 0){
        if($password==$row["password"]){
            $_SESSION["login"]=true;
            $_SESSION["id"]=$row["id"];
            $_SESSION["username"] = $username;
            header("Location: index2.php?username=$username");
        }
        else{
            echo
            "<script> alert('Palavra passe errada'); </script>";
        }
    }else{
        echo
        "<script> alert('Usuario não Registado'); </script>";
    }
}

function logout(){
    session_start();
    session_unset();
    session_destroy();
    header("location:Register.php");
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link href="css/Register.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <section class="vh-100" style="background-image: url(../Project01Site/imagens/W.jpg);  
                                    background-position: center; 
                                    background-repeat: no-repeat; 
                                    background-size:cover">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-9 col-xl-6">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-8">
                            <div class="row justify-content-center FIT">
                                <div style="padding-left:15% ;padding-right:15%">

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Login</p>

                                    <form class="mx-1 mx-md-4" method="post">

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label for="username">Username</label>
                                                <input class="form-control" type="text" name="username" id="username" required />
                                            </div>
                                        </div>


                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">

                                                <label for="password">Password</label>
                                                <input class="form-control" type="password" name="password" id="password" required />
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="submit" name="submit" class="btn btn-dark btn-lg">Login</button>
                                        </div>

                                        <hr class="LR">
                                        <button type="button" name="" id="" class="btn tpl"><img src="imagens/googleIcon.png" class="iconLR">Google</button>
                                        <button type="button" name="" id="" class="btn tpl"><img src="imagens/fbIcon.png" class="iconLR">Facebook</button>
                                        <div style="height: 10%;"></div>


                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>