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
        <li><a href="complain.php">Check Complain</a></li>
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
<span type="button" class="btn btn-outline-primary" style="color:Black; font-size:25px; border-top: 2px solid black; background-color:transparent;">Complain</span>
<?php

  $select_data = $conn->prepare("SELECT count(*) from complains");
  $select_data->execute();
  $select_data -> bind_result($total);
  $select_data ->fetch();
  $select_data->close(); 
?>
<button type="button" class="btn btn-primary" style="width:200px; height: 50px; background-color: coral;">
  Total Complain <span class="badge badge-warning"><?php echo $total; ?></span>
</button>

  <table class="table">
    <thead>
      <tr>
        <th>Sno</th>
        <th>ID</th>
        <th>complain_date</th>
         <!--<th>View</th>-->
        <th>Complain</th>
      </tr>
    </thead>
   

<?php 
$select_data = $conn->prepare("SELECT id, date, complain,subject FROM complains ORDER BY date DESC");
$select_data->execute();
$select_data -> bind_result($id,$complain_date, $complain,$subject);
$sno='1';
while ($select_data ->fetch()) {
    //echo "$id: $complain_date : $complain <br>";
  ?>
   <tbody>
      <tr>
        <td><?php echo $sno++;?></td>
        <td><?php echo $id?></td>
        <td><?php echo $complain_date; ?></td>
        <td>
            <p style="color: #000000;"><b style="font-size:16px;"><?php echo $subject ?></b></br><?php echo $complain; ?></p>
            <td><a href="delete_complain.php?id=<?php echo $id; ?>">
            <button class="btn btn-danger btn-xs" onclick="return del();">
              <span class="glyphicon glyphicon-trash"></span>
            </button></a>
        </td>

          
          
      </tr>
      

  <?php
  }
?>
</tbody>
  </table>
</div>
<?php include_once('inc/footer.php'); ?>