<?php 
	require_once("db.php");
	if(
		(isset($_POST['your_name'])&& $_POST['your_name'] !='') && 
		(isset($_POST['your_email'])&& $_POST['your_email'] !='')
	){
		$yourEmail = $_POST['your_email'];
		$yourPassword = $_POST['your_password'];
		$yourName = $_POST['your_name'];
		$yourAddress1 = $_POST['your_address_1'];
		$yourAddress2 = $_POST['your_address_2'];
		$yourCountry = $_POST['your_country'];
		$yourEircode = $_POST['your_eircode'];		
		$yourProfilePicture=$_FILES["your_profile_picture"]["name"];	
		
		//add file to folder
		$folder = "../clients/imgs/";
		move_uploaded_file($_FILES["your_profile_picture"]["tmp_name"], "$folder".$_FILES["your_profile_picture"]["name"]);
		
		$file = $folder.$_FILES["your_profile_picture"]["name"];
		
		$img = imagecreatefromjpeg($file);
		$imgResized = imagescale($img, 250, 250);
		imagejpeg($imgResized, $file);
		imagedestroy($imgResized);

		$sql="INSERT INTO profile (email, password, name, address_1, address_2, country, eircode, profile_picture) VALUES ('".$yourEmail."', '".$yourPassword."', '".$yourName."', '".$yourAddress1."', '".$yourAddress2."', '".$yourCountry."', '".$yourEircode."', '".$yourProfilePicture."')";


		if(!$result = $conn->query($sql)){
			die('There was an error running the query [' . $conn->error . ']');
		}else{
			echo "Saved to database.";
		}
	}else{
		echo "Please fill Name and Email";
	};
?>