<?php
include_once('user_authentication.php');
include_once('inc/header.php');

include_once('conn/connection.php'); 
$id = hexdec( uniqid() ); 

if(isset($_POST['submit'])){

	$id = hexdec( uniqid() ); 

	$fnUC = ucfirst($_POST['first_name']);
	$first_name = mysqli_real_escape_string($conn,$fnUC);

	$lastnamecaps = ucfirst($_POST['last_name']);
 	$last_name = mysqli_real_escape_string($conn,$lastnamecaps);

	$complain = ucfirst($_POST['complain']);
	$complain = mysqli_real_escape_string($conn,$complain);

	$subject = ucfirst($_POST['subject']);
	$subject = mysqli_real_escape_string($conn,$subject);


	$date = ucfirst($_POST['date']);
	$date = mysqli_real_escape_string($conn,$date);
	
	$username = $_SESSION['username'];

if($first_name == "" || $last_name == ""){

 		//echo "all fields req";
	//$_SESSION['all_req'] = "All fields are required";
	$_SESSION['all_req'] ='<div class="col-md-6"><div class="alert alert-danger">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Error!</strong> All fields are required!!!.
</div></div>';
	header('location:index.php');

 	}else if(!preg_match("/^[a-zA-Z ]*$/", $first_name)){
 		
 		$_SESSION['letters_req']="Only letters are allowed";
 		header('location:index.php');

	}else if(!preg_match("/^[a-zA-Z ]*$/", $last_name)){
		$_SESSION['letters_req']="Only letters are allowed";
		header('location:index.php');

 	}
		
	else{

 $insert_data = $conn->prepare("INSERT INTO  complains(id, first_name, last_name,complain,date,username, subject) VALUES (?,?,?,?,?,?,?)");
 	$insert_data->bind_param("sssssss",$id, $first_name, $last_name, $complain, $date,$username,$subject);
	
	if($insert_data->execute()){
 		//$_SESSION['register_done']="Registration Done!!!";
	//echo "New records created successfully";

 $_SESSION['register_done'] ='<div class="alert alert-success">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success!</strong> Registration Done Check your registered complain for password !!!.
</div>';
 		header("location:index.php");
 //echo "Insert";

 	}
	else{
		echo "Something went wrong";
 	}

$insert_data->close();
$conn->close();

 }
}
?>
