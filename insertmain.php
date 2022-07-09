<?php
	include __DIR__ .'/pdo_connection.php';
	$pnumber = $fname = $lname = $email='';
	$pnumberError = $fnameError = $lnameError = $emailError = $formMsg ='';
	$gotError = false;
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		//$sex = $_POST["sex"];
		//Ensure fields are not empty
		if(empty($_POST["pnumber"])){
			$gotError = true;
			$pnumberError = "pnumber is required";
		}else{
			$pnumber = test_input($_POST["pnumber"]);
		}
		if(empty($_POST["fname"])){
			$gotError = true;
			$fnameError = "fname is required";
			
		}else{
			$fname = test_input($_POST["fname"]);
		}
        if(empty($_POST["lname"])){
			$gotError = true;
			$fnameError = "lname is required";
		}else{
			$lname = test_input($_POST["lname"]);
		}
		if(empty($_POST["email"])){
			$gotError = true;
			$emailError = "Email is required";
		}else{
			$email = test_input($_POST["email"]); 
		}
		if(!$gotError){
			try{
				//Prepare statement query
				$query = "INSERT INTO `details`(phone_no, first_name, second_name, email) 
						VALUES(:pnumber, :fname, :lname, :email)";
				$stmt = $conn->prepare($query);
				//Bind parameters
				$stmt->bindParam(':pnumber', $pnumber);
				$stmt->bindParam(':fname', $fname);
                $stmt->bindParam(':lname', $lname);
				$stmt->bindParam(':email', $email);
				//Insert the record by executing the query
				$stmt->execute();
				$formMsg = '<div class="success">'.$fname.' '.$lname.': Record inserted successfully.</div>';
			}catch(PDOException $e){
				$formMsg = '<div class="error"> Could not insert record" ' . $e->getMessage().'</div>';
			}
		}	
	}
	function test_input($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		
		return $data;

	}
?>

