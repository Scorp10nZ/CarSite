<?php
    require 'config.php';

    if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $confirmpassword=$_POST['password'];
    $duplicate= mysqli_query($conn,"SELECT * FROM cliente WHERE username = '$username' OR email = '$email'");
    if(mysqli_num_rows($duplicate)>0){
         echo
         "<script> alert('Username or Email já estoa a ser usados'); </script>";
    }
    else{
        if($password==$confirmpassword){
            $query="INSERT INTO cliente VALUES('','$username','$email','$password')";
            mysqli_query($conn,$query);
            echo 
            "<script> alert('Registo com sucesso'); </script>";
        }
        else{
            echo 
            "<script> alert('Password não é igual a inserida anterioirmente'); </script>";
        }
    }
       
    }
?>


<!doctype html>
<html lang="en">
    <head>
        <title>Register</title>
        
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
            
        />

        <link href="css/login.css" rel="stylesheet" type="text/css" />
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">CarDreamer</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.html">Home</a></li>
                    </ul>
                </div>
            </div>
        </nav>
                    <section>
                        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
                            <div class="container h-100">
                            <div class="row d-flex justify-content-center align-items-center h-100">
                                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                                <div class="card" style="border-radius: 15px; background-color:dimgrey">
                                    <div class="card-body p-5">
                                    <h2 class="text-uppercase text-center mb-5">Create an account</h2>
                                    <form method="post">

                                        <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example1cg" >Your Name</label>
                                        <input type="text" id="username" class="form-control form-control-lg"name="username" />
                                        </div>

                                        <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example3cg">Your Email</label>
                                        <input type="email" id="email" class="form-control form-control-lg"name="email" />  
                                        </div>

                                        <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example4cg" >Password</label>
                                        <input type="password" id="password" class="form-control form-control-lg" name="password">
                                        </div>

                                        <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example4cdg">Repeat your password</label>
                                        <input type="password" id="confirmpassword" class="form-control form-control-lg" name="confirmpassword" />
                                        </div>

                                        <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-dark" name="submit">Register</button>
                                        </div>

                                        <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="#!"
                                            class="fw-bold text-body"><u>Login here</u></a></p>

                                    </form>

                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>