<?php
session_start();


if (isset ($_SESSION["login"])){

    header("Location: index.php");
    exit; 
}


require 'function.php';

if(isset($_POST["login"])){


    $Username = $_POST["username"];
    $Password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM siswa WHERE username = '$Username'");


    if(mysqli_num_rows($result)===1){


        $row = mysqli_fetch_assoc($result);
        if (password_verify($Password, $row["password"])){

            //set section
            $_SESSION["login"] = true;



            header("Location:index.php");
            exit;
        }
    }

    $error = true;

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>LOGIN</title>
</head>
<body>

    <h1>HALAMAN LOGIN</h1>

    <?php if (isset ($error)) : ?>
        <p style ="color:red; font-style : italic;">wrong!</p>

    <?php endif; ?>    



    <form action="" method="post">

    <ul>
        <li>
            <label for="username"> Username : </label>
            <input type="text" name= "username" id="username">
        </li>
            
        <li>
            <label for="password"> Password : </label>
            <input type="text" name= "password" id="password">
        </li>

        <li>
                <button name= "login">Login</button>
            </li>

    </ul>


    </form>

    <p>belum punya akun?</p>

    <button><a href="tambah.php">Register</a></button>

</body>
</html>