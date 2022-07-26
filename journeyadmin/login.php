<?php
    session_start();
    require "../koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylelogin.css">
    <title>login admin</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="main-login">
    <div class="left-login">
        <h1>Admin Login<br>journey_store Admin</h1>
        <img src="../image/adminpanel.svg" alt="freepik_stories-process">
 
    </div>
    <form action="" method="post">
    <div class="right-login">
        <div class="card-login">
            <h1>LOGIN</h1>
            <div class="textfield">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" id="username">
            </div>
            <div class="textfield">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
                <button class="btn-login" type="submit" name="loginbtn">Login</button>
                <?php
        if(isset($_POST['loginbtn'])){
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);

            $query = mysqli_query($mysqli, "SELECT * FROM users WHERE username='$username'");
            $countdata = mysqli_num_rows($query);
            $data = mysqli_fetch_array($query);



            if($countdata>0){
                if (password_verify($password, $data['password'])){
                    $_SESSION['username'] = $data['username'];
                    $_SESSION['login'] = true;
                    header('location: ../journeyadmin');
                }
                else{
                    ?>
                        <div class="alert alert-warning" role="alert">
                            password salah
                        </div>
                    <?php
                }
            }
            else{
                ?>
                    <div class="alert alert-warning" role="alert">
                        Username atau Katasandi mungkin salah
                    </div>
                <?php
            }
        }
    ?>
        </div>   
    </div>
    </form> 
</div>
    
</body>
</html>