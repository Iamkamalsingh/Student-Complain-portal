<?php 
include_once('user_authentication.php');
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
        <li><a href="user_profile.php">User</a></li>
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
<div class="row">

<h2>Users Complain</h2>
 <a href="add_complain.php" class="btn btn-primary pull-right">Add Complain</a>
  <table class="table">
    <thead>
      <tr>
        <th>Sno</th>
        <th>ID</th>
        <th>Firstname</th>
        <th>Date</th>
        <th>Complain</th>
      
         <!--<th>View</th>-->
        <th>Update</th>
          <th>Delete</th>
      </tr>
    </thead>
   

<?php 
$user_nam = $_SESSION['username'];
//$select_data = $conn->prepare("SELECT id, first_name, last_name,date, complain FROM complains  WHERE username=$user_nam ");
$select_data = $conn->prepare("SELECT id, first_name, last_name,date, complain,subject FROM complains  WHERE username='".$user_nam."' ");
$select_data->execute();
$select_data -> bind_result($id,$first_name, $last_name, $date, $complain,$subject);
$sno='1';
while ($select_data ->fetch()) {
    //echo "$first_name ,$last_name , $user_nam<br>";
  ?>
   <tbody>
      <tr>
        <td><?php echo $sno++;?></td>
        <td><?php echo $id?></td>
        <td><?php echo $first_name; ?> <?php echo $last_name;?></td>
        <td><?php echo $date;?></td>
         <td><b style="font-size:16px;"><?php echo $subject ?></br></b><?php echo $complain;?></td>
       <td><a href="update_data.php?id=<?php echo $id; ?>"><button class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span></button></a></td>
          <td><a href="delete_data.php?id=<?php echo $id; ?>"><button class="btn btn-danger btn-xs" onclick="return del();"><span class="glyphicon glyphicon-trash"></span></button></a></td>
          
      </tr>
      

  <?php
  }

 

?>
</tbody>
  </table>
</div>
<?php include_once('inc/footer.php'); ?>