<?php
include("partials/_dbConnect.php");
$login = false;
$showError = false;


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "select * from users where email='$email' AND password = '$password'";
    $result = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);
    if($num == 1){
        $login = true;
    }
    else {
        $showError= ("Invalid Credentials");
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <!-- Navabar -->
<?php require "./partials/_nav.php" ?>

    <!-- Alert -->
    <?php 
    if($login){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Login Successfully!</strong> Now you are logged in.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>';
    }

   else if($showError){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Fill properly!</strong> ' . $showError . '.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>';
    }

    ?>

<div class="container my-4 ">
        <h1 class="text-center">Login here</h1>
        <form action="signup.php" method="post">
            <div class="row d-flex justify-content-around">
                <div class="col-6">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div id="emailHelp" class="form-text my-2">Please enter both passwords same</div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <!-- <div> <img class="img-fluid col-6" src="./images/image.jpg" alt="sign-up image" srcset="" height="400px" width = "500px"></div> -->
                </div>
                
            </div>
        </form>
    </div>
</body>
</html>