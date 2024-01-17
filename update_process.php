<?php 
include_once('inc/header.php');
if(isset($_POST['update'])){
	//echo "hello";
$sql = $conn->prepare("UPDATE complains SET first_name=? , last_name=? , complain=?, subject=?  WHERE id=?");
		$first_name=$_POST['first_name'];
		$last_name = $_POST['last_name'];
		$complain= $_POST['complain'];
		$subject= $_POST['subject'];
		
		$sql->bind_param("ssssi",$first_name, $last_name, $complain,$subject,$_POST["id"]);	
		if($sql->execute()) {
			//$success_message = "Edited Successfully";
			header("location:index.php");
		} else {
			echo  "Problem in Editing Record";
		}

}


?>
