<?php
include("partials/_dbConnect.php");
$success = false;
$failed = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
   
   
    // Check if passwords match
    if(($password == $cpassword)){
        $sql = "INSERT INTO `users` ( `email`, `password`, `time`) VALUES ('$email', '$password', current_timestamp())";

        $result = mysqli_query($conn, $sql);
        if ($result){
            $success = true;
        }
    }
    else{
        $failed = "Passwords do not match";
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
    <?php require "./partials/_nav.php" ?>
    <?php
    if ($success) {
        echo '
     <div class="alert alert-success alert-dismissible fade show" role="alert">
     <strong>Successfully Registered</strong> Now you can login Thank You!.
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }

    if ($failed) {
        echo '
     <div class="alert alert-danger alert-dismissible fade show" role="alert">
     <strong>Error!</strong> ' . $failed . '.
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>

    <div class="container my-4 ">
        <h1 class="text-center">Register here</h1>
        <form action="signup.php" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">

            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="password" name="cpassword">
            </div>
            <div id="emailHelp" class="form-text my-2">Please enter both passwords same</div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>