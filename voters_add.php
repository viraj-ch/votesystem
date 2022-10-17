<?php
	include 'admin/includes/conn.php';
	if(isset($_POST['add'])){
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$password = $_POST['password'];
		$filename = $_FILES['photo']['name'];
		if(!empty($filename)){
			move_uploaded_file($_FILES['photo']['tmp_name'], 'images/'.$filename);	
		}
		//generate voters id
		$voter = $firstname."_".$lastname;

	
			$sql = "INSERT INTO voters (voters_id, password, firstname, lastname, photo) VALUES ('$voter', '$password', '$firstname', '$lastname', '$filename')";
			if($conn->query($sql))
			{
				$_SESSION['success'] = 'Voter added successfully';
				if(isset($_SESSION['success']))
				{
					header("Location: index.php?voterid=" . "$voter");
				}
			
			}
			else
			{
			$_SESSION['error'] = $conn->error;
			}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	echo "<script>" . 'alert("Account Created Successfully");' . "</script>";
?>