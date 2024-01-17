
<?php 
include_once('admin_authentication.php');
include_once('inc/header.php');
include_once('conn/connection.php'); ?>
<!================================Start Navbar================================================>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><img src="img/logo.png" alt="Girl in a jacket" style="width:40px;height:40px;align: center;"></a>
      <a class="navbar-brand" href="home.php">Home</a>
      <a class="navbar-brand" href="about.php">About Website</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        
        <?php if($_SESSION["user"] == 2){ ?>
          <li class="active"><a href="add_complain.php">Add Complain</a></li>
        <li><a href="index.php">User</a></li>
        <?php }else{ ?>
        <li><a href="complain.php">Complain</a></li>
        <li><a href="user_details.php">User Details</a></li>
        <?php } ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><?php echo $_SESSION['username']; ?>  </a></li>
        <?php if($_SESSION["user"] == 1){ ?>
        <li><a href="registration.php"><span class="glyphicon glyphicon-log-out"></span> Regestration</a></li>
        <?php } ?>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<!================================End Navbar================================================>
<div class="row">
<div class=" justify-content-center">
    <h1 style="text-align: center;"> JAIN UNIVERSITY</h1>
   
</div>
<?php
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($conn, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($conn, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);

        $usn = stripslashes($_REQUEST['usn']);
        $usn = strtoupper($usn);
        $usn = mysqli_real_escape_string($conn, $usn);

        $department = stripslashes($_REQUEST['department']);
        //$department = mysqli_real_escape_string($department);

        $create_datetime = date("Y-m-d H:i:s");
        $user_type = stripslashes($_REQUEST['user_type']);
        $user_type = mysqli_real_escape_string($conn, $user_type);
        $query    = "INSERT into `users` (username, password, email, create_datetime,user_type,usn,department)
                     VALUES ('$username', '" . md5($password) . "', '$email', '$create_datetime','$user_type','$usn','$department')";
        $result   = mysqli_query($conn, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" required />
        <input type="text" class="login-input" name="email" placeholder="Email Adress">
        <input type="text" class="login-input" name="usn" placeholder="USN Number">
        <input type="password" class="login-input" name="password" placeholder="Password">
    
            <label for="inputState">User Type</label>
            <select name="user_type" id="user_type" class="form-control" required>
                <option selected>Choose...</option>
                <option value="1" >Admin</option>
                <option value="2" >Normal User</option>
            </select></br>

            <label for="inputState">Department</label>
            <select name="department" id="department" class="form-control" required>
                <option selected>Choose...</option>
                <option value="Computer Science and Engineering" >Computer Science and Engineering</option>
                <option value="Software Engineering" >Software Engineering</option>
                <option value="Information Science Engineering" >Information Science Engineering</option>
                <option value="Information Science Engineering" >Biotech Science Engineering</option>
                <option value="Civil Information Science Engineering" >Civil Information Science Engineering</option>
            </select></br>


    
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link"><a href="login.php">Click to Login</a></p>
    </form>
<?php
    }
?>
<?php include_once('inc/footer.php'); ?>