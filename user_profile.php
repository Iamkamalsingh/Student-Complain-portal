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
          <li class="active"><a href="index.php">Complain</a></li>
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
    <h1 style="text-align: center;"> JAIN UNIVERSITY</h1>
<!-- <h2 style="text-align:center">User Profile Card</h2> -->
<?php   $username =$_SESSION['username'];
        $select_data = $conn->prepare("SELECT id, username, email,create_datetime,user_type,usn,department FROM users where username='".$username."'");
        $select_data->execute();
        $select_data -> bind_result($id,$username, $email,$create_datetime,$user_type,$usn,$department);
        
        
        while ($select_data ->fetch()) {
            //echo "$count: $username : $create_datetime <br>";
    ?>
<div class="card">
        <div class=""><img src="img/jain_bg.png" alt="Girl in a jacket" class="card_background_img"></div>
        
        <div ><img src="img/avater.png" alt="Girl in a jacket" class="card_profile_img"></div>
        <div class="user_details">
            <h3 style="text-align:center"><?php echo strtoupper($username); ?></h3>
            <p style="text-align:center"><?php echo strtoupper($department); ?></p>
            <p style="text-align:center"><?php echo strtoupper($email); ?></p>
        </div>
        <div class="card_count">
            <div class="count">
                <div class="fans">
                    <h3>Create Profile</h3>
                    <p><?php 
                        $arr = explode(' ', trim($create_datetime));
                        echo $arr[0];
                    ?></p>
                
                </div>
                <div class="following">
                    <h3>Status</h3>
                    <p>
                    <?php
                        if( $user_type == 1){
                        ?>
                            <span class="">Admin</span>
                        <?php
                        }else{
                        ?>
                        <span class="">Student</span>

                        <?php
                        }
                        ?>
                    </p>
                </div>
                <div class="post">
                    <h3>USN/ID</h3>
                    <p><?php echo $usn ?></p>
                </div>
            </div>
             <div class="btn"><a href="index.php"><span ></span> Back</a></div>
        </div>
    </div>

    <?php
        }
        ?>
</div>
<?php include_once('inc/footer.php'); ?>