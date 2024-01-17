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
<span type="button" class="btn btn-outline-primary" style="color:Black; font-size:25px; border-top: 2px solid black; background-color:transparent;">User Details</span>

<?php

  $select_data = $conn->prepare("SELECT count(*) from users where user_type = 2");
  $select_data->execute();
  $select_data -> bind_result($total_users);
  $select_data ->fetch();
  $select_data->close(); 
?>

<?php

  $select_data = $conn->prepare("SELECT count(*) from users where user_type = 1");
  $select_data->execute();
  $select_data -> bind_result($total_admins);
  $select_data ->fetch();
  $select_data->close(); 
?> 
<span style="">
  Total Admins: <i class="badge badge-warning"><?php echo $total_admins; ?></i>
</span>
<span style="">
  Total Users: <i class="badge badge-warning"><?php echo $total_users; ?></i>
</span>
<table class="table align-middle mb-0 bg-white">
  <thead class="bg-light">
    <tr>
      <th>Name</th>
      <th>Title</th>
      <th>Status</th>
      <th>USN/ID</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php 
        $select_data = $conn->prepare("SELECT id, username, email,create_datetime,user_type,usn,department FROM users ");
        $select_data->execute();
        $select_data -> bind_result($id,$username, $email,$create_datetime,$user_type,$usn,$department);
        $sno='1';
        while ($select_data ->fetch()) {
            //echo "$id: $complain_date : $complain <br>";
    ?>
    <tr>
      <td>
        <div class="d-flex align-items-center">
          <img
              src="img/avater.png"
              alt=""
              style="width: 45px; height: 45px"
              class="rounded-circle"
              />
          <div class="ms-3">
            <p class="fw-bold mb-1"><?php echo $username;?></p>
            <p class="text-muted mb-0"><?php echo $email;?></p>
          </div>
        </div>
      </td>
      <td>
        <p class="fw-normal mb-1"><?php echo $department;?></p>
        <p class="text-muted mb-0">Jain University</p>
      </td>
      <td>
        <?php
                if( $user_type == 1){
            ?>
                <span class="badge badge-danger" style="color:#890000;">Admin</span>
            <?php
            }else{
            ?>
            <span class="badge badge-warning">Student</span>

            <?php
            }
            ?>      
            </span>
        </td>

        <td>
        <p class="fw-normal mb-1"><?php echo $usn;?></p>
      </td>


        <td>
            <td><a href="delete_user.php?id=<?php echo $id; ?>">
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