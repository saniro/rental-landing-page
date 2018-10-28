<?php
	require("../connection/connection.php");
	session_start();

	if(isset($_POST['room_new_tenant_data'])){
		$roomid = $_POST['room_id_data'];
		$firstname = $_POST['first_data'];
		$middlename = $_POST['middle_data'];
		$lastname = $_POST['last_data'];
		$birthdate = $_POST['birthdate_data'];
		$gender = $_POST['gender_data'];
		$contactno = $_POST['contact_no_data'];
		$email = $_POST['email_data'];

		//$profilepic = $_POST['profilepic_data'];

		if(($firstname != NULL) && ($lastname != NULL) && ($birthdate != NULL) && ($gender != NULL) && ($contactno != NULL) && ($roomid != NULL) && ($email != NULL)){
			$query_check = "SELECT user_id FROM user_tbl WHERE email = :email";
			$stmt = $con->prepare($query_check);
			$stmt->bindParam(':email', $email, PDO::PARAM_STR);
			$stmt->execute();
			$rowCount = $stmt->rowCount();
			if($rowCount < 1){
				//Check if room exist
				$query_check = "SELECT room_id, rent_rate FROM room_tbl WHERE room_id = :room_id AND flag = 1";
				$stmt = $con->prepare($query_check);
				$stmt->bindParam(':room_id', $roomid, PDO::PARAM_INT);
				$stmt->execute();
				$rowCount = $stmt->rowCount();
				if($rowCount < 1){
					$data = array("success" => "false", "message" => "The room doesn't exist.");
					$output = json_encode($data);
					echo $output;
				}
				else{
					$query = "INSERT INTO user_tbl (email, password, last_name, first_name, middle_name, birth_date, gender, contact_no, user_type, flag) VALUES (:email, 1, :last_name, :first_name, :middle_name, :birth_date, :gender, :contact_no, 1, 0)";
					$stmt = $con->prepare($query);
					$stmt->bindParam(':email', $email, PDO::PARAM_STR);
					//$stmt->bindParam(':password', $password, PDO::PARAM_STR);
					$stmt->bindParam(':last_name', $lastname, PDO::PARAM_STR);
					$stmt->bindParam(':first_name', $firstname, PDO::PARAM_STR);
					$stmt->bindParam(':middle_name', $middlename, PDO::PARAM_STR);
					$stmt->bindParam(':birth_date', $birthdate, PDO::PARAM_STR);
					$stmt->bindParam(':gender', $gender, PDO::PARAM_INT);
					$stmt->bindParam(':contact_no', $contactno, PDO::PARAM_STR);
					//$stmt->bindParam(':profile_picture', $profilepic, PDO::PARAM_STR);
					$stmt->execute();
					$last_id = $con->lastInsertId();

					$query = "INSERT INTO rental_tbl (room_id, user_id, status) VALUES (:roomid, :user_id, 2)";
					$stmt = $con->prepare($query);
					$stmt->bindParam(':roomid', $roomid, PDO::PARAM_STR);
					//$stmt->bindParam(':password', $password, PDO::PARAM_STR);
					$stmt->bindParam(':user_id', $last_id, PDO::PARAM_STR);
					//$stmt->bindParam(':profile_picture', $profilepic, PDO::PARAM_STR);
					$stmt->execute();

					$data = array("success" => "true", "message" => "Application has been sent.");
					$output = json_encode($data);
					echo $output;
				}
			}
			else{
				$data = array("success" => "false", "message" => "There is already the email. Please choose another.");
				$output = json_encode($data);
				echo $output;
			}
		}
		else{
			$data = array("success" => "false", "message" => "Some required fields are empty.");
			$output = json_encode($data);
			echo $output;
		}
	}

	//l_landingpage.php insert application
	if(isset($_POST['submit_application_data'])){
		$first_name = $_POST['first_name_data'];
		$middle_name = $_POST['middle_name_data'];
		$last_name = $_POST['last_name_data'];
		$birthdate = $_POST['birth_date_data'];
		$gender = $_POST['gender_data'];
		$contact_no = $_POST['contact_no_data'];
		$email = $_POST['email_data'];
		$password = $_POST['password_data'];

		if(($first_name != NULL) && ($middle_name != NULL) && ($last_name != NULL) && ($birthdate != NULL) && ($gender != NULL) && ($contact_no != NULL) && ($email != NULL) && ($password != NULL)){
			$query_check = "SELECT email FROM host_tbl WHERE email = :email";
			$stmt = $con->prepare($query_check);
			$stmt->bindParam(':email', $email, PDO::PARAM_STR);
			$stmt->execute();
			$rowCount = $stmt->rowCount();
			if($rowCount < 1){
				//Check if apartment exist
				$query_insert = "INSERT INTO host_tbl (first_name, middle_name, last_name, email, status, password, birth_date, gender, contact_no, flag) VALUES (:first, :middle, :last, :email, 2, :password, :birthdate, :gender, :contact_no, 0)";
				$stmt = $con->prepare($query_insert);
				$stmt->bindParam(':first', $first_name, PDO::PARAM_STR);
				//$stmt->bindParam(':password', $password, PDO::PARAM_STR);
				$stmt->bindParam(':middle', $middle_name, PDO::PARAM_STR);
				$stmt->bindParam(':last', $last_name, PDO::PARAM_STR);
				$stmt->bindParam(':email', $email, PDO::PARAM_STR);
				$stmt->bindParam(':password', $password, PDO::PARAM_STR);
				$stmt->bindParam(':birthdate', $birthdate, PDO::PARAM_STR);
				$stmt->bindParam(':gender', $gender, PDO::PARAM_INT);
				$stmt->bindParam(':contact_no', $contact_no, PDO::PARAM_STR);
				//$stmt->bindParam(':profile_picture', $profilepic, PDO::PARAM_STR);
				$stmt->execute();

				$data = array("success" => "true", "message" => "Application has been sent.");
				$output = json_encode($data);
				echo $output;
			}
			else{
				$data = array("success" => "false", "message" => "There is already the email. Please choose another.");
				$output = json_encode($data);
				echo $output;
			}
		}
		else{
			$data = array("success" => "false", "message" => "Some required fields are empty.");
			$output = json_encode($data);
			echo $output;
		}
	}
?>