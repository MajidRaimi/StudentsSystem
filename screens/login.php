<?php

    define('DB_HOST' , "badyklc310erjvtfmxyn-mysql.services.clever-cloud.com") ; 
    define('DB_USER' , "ugtetnjyimvbutuk") ; 
    define('DB_PASS' , "iGk6bEUp6lFKGAdelmGZ") ; 
    define('DB_NAME' , "badyklc310erjvtfmxyn") ; 


$connection = new mysqli(
    DB_HOST,
    DB_USER,
    DB_PASS,
    DB_NAME
);

if ($connection->connect_error) {
    die("Connection Error : " . $connection->connect_error);
}



session_start();

$pass = $email = "";
$passErr = $emailErr = "";



if (isset($_POST["submit"])) {

    if (empty($_POST["pass"])) {
        $passErr = "Password Is Required";
    } else {
        $pass = $_POST["pass"];
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email Is Required";
    } else {
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    }


    if (empty($passErr) && empty($emailErr)) {

        $sql = "SELECT password FROM Users WHERE email = '$email'";

        if ($result = mysqli_query($connection, $sql)) {
            $realPass;
            foreach ($result as $row) {
                $realPass =  $row['password'];
            }
        }


        if ($pass == $realPass) {

            $_POST["email"] = $email;
            $_POST["pass"] = $pass;
            setcookie('email', $email, time() + 86400 * 30); // 86400 = 1 day
            $_SESSION["email"] = $email;
            header("Location:index.php");
        }
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <title>Login</title>
</head>

<body class="bg-dark">

    <!-- Login Section -->
    <section class=" bg-light login">
        <form action=" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="p-5" method="POST">

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control <?php echo ($emailErr == "") ? null : 'is-invalid' ?>" id="email" name="email" placeholder="Enter your email">
            </div>

            <div class="mb-3">
                <label for="pass" class="form-label">Password</label>
                <input type="password" class="form-control <?php echo ($passErr == "") ? null : 'is-invalid' ?>" id="pass" name="pass" placeholder="Enter your password">
            </div>

            <div class="mb-3 justify-content-center">
                <input type="submit" name="submit" value="Login" class="btn btn-dark w-100 btn-primary">
            </div>
        </form>
    </section>

</body>

</html>