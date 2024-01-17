<?php 
include_once('user_authentication.php');
include_once('inc/header.php');

$view_users_data= $conn->prepare("SELECT id,first_name, last_name, complain,subject FROM complains WHERE id = ?");
$view_users_data->bind_param("i",$_GET["id"]);

$view_users_data->execute();
$view_users_data -> bind_result($id,$first_name, $last_name,$complain,$subject);
$view_users_data ->fetch();
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
<div class="col-md-2"></div>
<div class="col-md-8">


	<h1>Update Complain</h1>
<form action="update_process.php" method="POST" >
    <div class="form-group">
      <label for="first_name">First Name:</label>
      <input type="text" class="form-control" id="first_name" placeholder="Enter First Name" name="first_name" value="<?php echo $first_name;  ?>" required>
    </div>
    <div class="form-group">
      <label for="last_name">Last Name:</label>
      <input type="text" class="form-control" id="last_name" placeholder="Enter Last Name" name="last_name" value="<?php echo $last_name;  ?>" required>
    </div>

    <div class="form-group">
      <label for="mobile">Subject:</label>
      <input type="text" class="form-control" id="mobile" placeholder="Enter complain subject " name="subject" value="<?php echo $subject;  ?>" required>
    </div>

     <div class="form-group">
      <label for="mobile">Complain:</label>
      <input type="text" class="form-control" id="mobile" placeholder="Enter complain " name="complain" value="<?php echo $complain;  ?>" required>
    </div>
    
    <input type="hidden" name="id" value="<?php echo $id;?>">
    <input type="submit" class="btn btn-default" name="update" value="update">
  </form>
</div>
<div class="col-md-2"></div>

