<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    include_once('conn/connection.php'); 
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($conn, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($conn, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);

        $user_type = $conn->prepare("SELECT user_type FROM users WHERE username='$username' AND password='" . md5($password) . "'");
        $user_type->execute();
        $user_type -> bind_result($user_type);
        $user_type->fetch();

        if ($rows == 1) {
            $_SESSION['username'] = $username;

            $_SESSION['user'] = $user_type;


            // Redirect to user dashboard page
            if($user_type == 1){
                header("Location: complain.php");
            }
            elseif($user_type == 2){
                header("Location: index.php");
            }else{
                header("Location: home.php");
            }

            
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Login</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="Password"/>
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <!-- <p class="link"><a href="registration.php">New Registration</a></p>  -->
  </form>
<?php
    }
?>
</body>
</html>