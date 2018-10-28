<?php
	require("../connection/connection.php");
	session_start();

	//l_landingpage.php view apartment_details
	if(isset($_POST['view_apartment_details_data'])){
		$apartment_id = $_POST['apartment_id_data'];
		
		if($apartment_id != NULL){
			$data = "";

			$query_check = "SELECT apartment_id FROM apartment_tbl WHERE apartment_id = :apartment_id";
			$stmt = $con->prepare($query_check);
			$stmt->bindParam(':apartment_id', $apartment_id, PDO::PARAM_INT);
			$stmt->execute();
			$row = $stmt->fetch();
			$rowCount = $stmt->rowCount();
			if($rowCount > 0){
				$query = "SELECT apartment_name, apartment_address, apartment_desc, (SELECT concat(last_name, ', ', first_name, ' ', last_name) FROM host_tbl AS HT WHERE HT.host_id = AT.host_id) AS contact_person, (SELECT contact_no FROM host_tbl AS HT WHERE HT.host_id = AT.host_id) AS contact_no, (SELECT email FROM host_tbl AS HT WHERE HT.host_id = AT.host_id) AS email FROM apartment_tbl AS AT WHERE apartment_id = :apartment_id";
				$stmt = $con->prepare($query);
				$stmt->bindParam(':apartment_id', $apartment_id, PDO::PARAM_INT);
				$stmt->execute();
				$row = $stmt->fetch();

				$data = '<h2 class="text-uppercase" id="v_apartment_name">'.$row['apartment_name'].'</h2>
                  			<p class="item-intro text-muted" id="v_apartment_address">'.$row['apartment_address'].'</p>
                  			<img class="img-fluid d-block mx-auto" src="./img/portfolio/02-full.jpg" alt="">
                  			<p id="v_apartment_desc">'.$row['apartment_desc'].'</p>
                  			<ul class="list-inline" style="text-align:left;">
                    		<li>Host: &emsp; <label style="font-weight:bold;" id="v_name">'.$row['contact_person'].'</label></li>
                    		<li>Contact: &emsp; </li>
                     		<ul class="list" style="text-align:left;">
                        		<li>Mobile: <label style="font-weight:bold;" id="v_contact_no">'.$row['contact_no'].'</label></li>
                        		<li>Email: <label style="font-weight:bold;" id="v_email">'.$row['email'].'</label></li>
                      		</ul>
                    		<li>Price: &emsp; <label style="font-weight:bold;">10000 per month</label></li>
                    		<li>Available Rooms: &emsp; </li>
                    		<ul class="list" style="text-align:left;">';
                $query = "SELECT room_id, room_name, (SELECT count(rental_id) FROM rental_tbl AS RL WHERE RL.room_id = RM.room_id AND status = 1) AS count FROM room_tbl AS RM WHERE apartment_id = :apartment_id AND (SELECT count(rental_id) FROM rental_tbl AS RL WHERE RL.room_id = RM.room_id AND status = 1) < 1";
				$stmt = $con->prepare($query);
				$stmt->bindParam(':apartment_id', $apartment_id, PDO::PARAM_INT);
				$stmt->execute();
				$results = $stmt->fetchAll();

				foreach ($results as $row) {
					$data .= '<li><a class="room_details" href="#roomModal1" data-id="'.$row['room_id'].'" style="font-weight:bold;">'.$row['room_name'].'</a></li>';
				}

                $data .= '</ul></ul>
                  		<button class="btn btn-default" data-dismiss="modal" type="button">Close</button>';
                echo $data;

				// $data = array("success" => "true", "apartment_id" => $apartment_id, "apartment_name" => $row['apartment_name'], "apartment_desc" => $row['apartment_desc'], "apartment_address" => $row['apartment_address'], "name" => $row['contact_person'], "contact_no" => $row['contact_no'], "email" => $row['email']);
				// $results = json_encode($data);
				// echo $results;
			}
			else{
				$data = array("success" => "false", "message" => "Something went wrong. Please try again.");
				$results = json_encode($data);
				echo $results;
			}
		}
		else{
			$data = array("success" => "false", "message" => "Required fields must not be empty.");
			$results = json_encode($data);
			echo $results;
		}
	}

	//l_landingpage.php view apartment_rooms
	if(isset($_POST['view_apartment_room_data'])){
		$apartment_id = $_POST['apartment_id_data'];
		
		if($apartment_id != NULL){
			$query_check = "SELECT apartment_id FROM apartment_tbl WHERE apartment_id = :apartment_id";
			$stmt = $con->prepare($query_check);
			$stmt->bindParam(':apartment_id', $apartment_id, PDO::PARAM_INT);
			$stmt->execute();
			$row = $stmt->fetch();
			$rowCount = $stmt->rowCount();
			if($rowCount > 0){
				$query = "SELECT room_id, room_name FROM room_tbl WHERE apartment_id = :apartment_id";
				$stmt = $con->prepare($query);
				$stmt->bindParam(':apartment_id', $apartment_id, PDO::PARAM_INT);
				$stmt->execute();
				$results = $stmt->fetch();

				$data = array("success" => "true", "message" => "Something went wrong. Please try again.");
				$results = json_encode($data);
				echo $results;
			}
			else{
				$data = array("success" => "false", "message" => "Something went wrong. Please try again.");
				$results = json_encode($data);
				echo $results;
			}
		}
		else{
			$data = array("success" => "false", "message" => "Required fields must not be empty.");
			$results = json_encode($data);
			echo $results;
		}
	}

	//l_landingpage.php view apartment_rooms
	if(isset($_POST['view_room_details_data'])){
		$room_id = $_POST['room_id_data'];
		
		if($room_id != NULL){
			$query_check = "SELECT room_id FROM room_tbl WHERE room_id = :room_id";
			$stmt = $con->prepare($query_check);
			$stmt->bindParam(':room_id', $room_id, PDO::PARAM_INT);
			$stmt->execute();
			$row = $stmt->fetch();
			$rowCount = $stmt->rowCount();
			if($rowCount > 0){
				$query = "SELECT room_id, room_name, (SELECT apartment_address FROM apartment_tbl AS AT WHERE AT.apartment_id = RM.apartment_id) AS address, (SELECT apartment_desc FROM apartment_tbl AS AT WHERE AT.apartment_id = RM.apartment_id) AS description, (SELECT (SELECT concat(last_name, ', ', first_name, ' ', last_name) FROM host_tbl AS HT WHERE HT.host_id = AT.host_id) FROM apartment_tbl AS AT WHERE AT.apartment_id = RM.apartment_id) AS contact_person, (SELECT (SELECT contact_no FROM host_tbl AS HT WHERE HT.host_id = AT.host_id) FROM apartment_tbl AS AT WHERE AT.apartment_id = RM.apartment_id) AS contact_no, (SELECT (SELECT email FROM host_tbl AS HT WHERE HT.host_id = AT.host_id) FROM apartment_tbl AS AT WHERE AT.apartment_id = RM.apartment_id) AS email, rent_rate FROM room_tbl AS RM WHERE room_id = :room_id";
				$stmt = $con->prepare($query);
				$stmt->bindParam(':room_id', $room_id, PDO::PARAM_INT);
				$stmt->execute();
				$row = $stmt->fetch();

				$results = array("success" => "true", "room_id" => $row['room_id'], "room_name" => $row['room_name'], "address" => $row['address'], "description" => $row['description'], "contact_person" => $row['contact_person'], "contact_no" => $row['contact_no'], "email" => $row['email'], "rent_rate" => $row['rent_rate']);
				$results = json_encode($results);
				echo $results;
				
			}
			else{
				$data = array("success" => "false", "message" => "Something went wrong. Please try again.");
				$results = json_encode($data);
				echo $results;
			}
		}
		else{
			$data = array("success" => "false", "message" => "Required fields must not be empty.");
			$results = json_encode($data);
			echo $results;
		}
	}
?>

