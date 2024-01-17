<?php 
include_once('inc/header.php');
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
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="about.php">About Website</a></li>
        <li><a href="complain.php">Check Complain</a></li>
        <li><a href="index.php">User</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="login.php"><span class="glyphicon glyphicon-log-out"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
<!================================End Navbar================================================>
    




<header>
		<h1><?php echo strtoupper('Throw your complain ') ?></h1>
	</header>
	<main class="home_div">
		<section class="hero-image">
			<img src="img/banner.jpg" alt="hero image">
			<div class="description">
				<h2><?php echo strtoupper('JAIN UNIVERSITY ') ?></h2>
				<p> “Learning is not attained by chance; it must be sought for with ardor and attended to with diligence.”</p>
			</div>
		</section>
	</main>






<?php include_once('inc/footer.php'); ?>