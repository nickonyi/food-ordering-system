<?php include ("../config/dbh.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <title>Login - Food Ordering system</title>
</head>
<body>
    <div class="login">
        <h1 class="text-center">Login</h1> <br> <br>
        <?php
        if(isset($_SESSION["login"])){
            echo $_SESSION['login'];
            unset($_SESSION["login"]);
        }
        if(isset($_SESSION["no-login-message"])){
            echo $_SESSION["no-login-message"];
            unset($_SESSION["no-login-message"]);
        }
        ?>
        <!-------Login form starts here--------->
        <form action="" method="post" class="text-center">
            Username:<br>
            <input type="text" name="username" placeholder="Username"> <br><br>
            Password: <br>
            <input type="password" name="password" placeholder="Password">
            <br><br>
           <input  colspan="2" type="submit" name="submit" value="Login" class="btn-primary">
        </form>
<br>
        <!-------Login form ends here--------->
        <p class="text-center">Made by <a href="#">Nickleyde Onyango</a></p>
    </div>
    
</body>
</html>
<?php
//check whether the submit button has been clicked or not
if(isset($_POST['submit'])){
    //process for login
    //get the values from the form
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    //create sql to check whether the username with the password exists or not
    $sql = "SELECT * from tbl_admin WHERE username = '$username' AND password = '$password'";
    //execute the query
    $res = mysqli_query($conn,$sql);
    //count rows to determine whether the user exists or not
    $count = mysqli_num_rows($res);

    if($count == 1){
        //user exists and display the Login success message
        $_SESSION['login'] = "<div class='success'>Login successfull!</div>";
        $_SESSION['user'] = $username; //to check whether the user is logged in or not and the logout will unset it
        header("Location: ".SITEURL."admin/" );
    } else {
        //user does not exists and display the failure message
        $_SESSION['login'] = "<div class='error'>Username or password did not match!</div>";
        header("Location: ".SITEURL."admin/login.php" );
    }
}
?>