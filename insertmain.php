<?php
	include __DIR__ .'/pdo_connection.php';
	$pnumber = $fname = $lname = $email= $gender='';
	$pnumberError = $fnameError = $lnameError = $emailError = $genderError = $formMsg ='';
	$fError = $lError = $eError = '';
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
			//check if fname only contains letters and whitespace
			if(!preg_match("/^[a-zA-Z-']*$/",$fname)){
				$gotError = true;
				$fError = "Only letters and white space allowed";
			}
		}
        if(empty($_POST["lname"])){
			$gotError = true;
			$fnameError = "lname is required";
		}else{
			$lname = test_input($_POST["lname"]);
			//check if lname only contains letters and whitespace
			if(!preg_match("/^[a-zA-Z-']*$/",$lname)){
				$gotError = true;
				$lError = "Only letters and white space allowed";
			}
		}
		if(empty($_POST["email"])){
			$gotError = true;
			$emailError = "Email is required";
		}else{
			$email = test_input($_POST["email"]); 
			//check if email address is well-formed
			if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
				$gotError = true;
				$eError = "Invalid email format";
			}
		}
		if(empty($_POST["gender"])){
			$gotError = true;
			$genderError = "Gender is required";
		}else{
			$gender = test_input($_POST["gender"]);
		}
		if(!$gotError){
			try{
				//Prepare statement query
				$query = "INSERT INTO `details`(phone_no, first_name, second_name, email, gender) 
						VALUES(:pnumber, :fname, :lname, :email, :gender)";
				$stmt = $conn->prepare($query);
				//Bind parameters
				$stmt->bindParam(':pnumber', $pnumber);
				$stmt->bindParam(':fname', $fname);
                $stmt->bindParam(':lname', $lname);
				$stmt->bindParam(':email', $email);
				$stmt->bindParam(':gender', $gender);
				//Insert the record by executing the query
				$stmt->execute();
				$formMsg = '<div class="success">'.$fname.' '.$lname.': Record inserted successfully.</div>';
			}catch(PDOException $e){
				$formMsg = '<div class="error"> Could not insert record. Try again." ' . $e->getMessage().'</div>';
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

