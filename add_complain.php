<?php 
include_once('user_authentication.php');
include('inc/header.php'); 
include_once('conn/connection.php');
?>
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
          <li class="active"><a href="index.php">Complain</a></li>
          <li class="active"><a href="add_complain.php">Add Complain</a></li>
        <li><a href="index.php">User</a></li>
        <?php }else{ ?>
        <li><a href="complain.php">Admin</a></li>
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
<div class="container">
  <br><br>
  <body class="box">
  <h2>New Complain</h2>

  
  <form action="insert_data.php" method="POST" >
    <div class="form-group">
      <label for="first_name">First Name:</label>
      <input type="text" class="form-control" id="first_name" placeholder="Enter First Name" name="first_name" pattern="^[a-zA-Z\s]*$" title="Only letters are required" autocomplete="on" minlength="3">
    </div>
    <div class="form-group">
      <label for="last_name">Last Name:</label>
      <input type="text" class="form-control" id="last_name" placeholder="Enter Last Name" name="last_name" pattern="^[a-zA-Z\s]*$" title="Only letters are required" autocomplete="on" minlength="3">
    </div>

    <div class="form-group">
      <label for="date">Date:</label>
      <input type="date" class="form-control" id="date" placeholder="Enter date" name="date"  title="Only Date  YYYY-MM-DD" autocomplete="on">
    </div>

    <div class="form-group">
      <label for="complain">Subject:</label>
      <input type="text" class="form-control" id="subject" placeholder="Enter complain subject " name="subject" autocomplete="on" minlength="3">
    </div>

    <div class="form-group">
      <label for="complain">Your Complain:</label>
      <input type="text" class="form-control" id="complain" placeholder="Enter complain" name="complain" autocomplete="on" minlength="3">
    </div>
        
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
  </form>

 <?php include('inc/footer.php'); ?>
