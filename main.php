<?php
include 'insertmain.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
      body{
    background-color: rgba(255, 255,0,0.2);
}

form {
				width: 50%;
				margin: 40px auto;
        
			}
input,
label{
		display: block;
		width: 80%;
		margin-left: 20px;
		padding: 10px 0;
}
input[type="submit"] {
				margin: 20px;
				color: white;
				background-color: dodgerblue;
				font-weight: bold;
				border-radius: 10px;
			}
.success {
				color: green;
				font-weight: bold;
			}
.error {
				margin-left: 20px;
				color: red;
				font-weight: bold;
			}
    </style>
  </head>
  <body>
   <h1>Enter Your details.</h1>
   <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
    <h4>Employees Registration Form </h4>
     <?php echo $formMsg ?>
     <div>
     <label for="phone">Phone Number:</label><br>
     <input type="number" id="pnumber" name="pnumber" class="input-text">
     <span class="error"> <?php echo $pnumberError ?> </span>
     </div>
    <div>
     <label for="fname">First Name:<span class="error">*</span></label><br>
     <input type="text" id="fname" name="fname" class="input-text">
     <span class="error"><?php echo $fnameError ?> </span>
     
     <span class="error"><?php echo $fError ?></span>
    </div>
    <div>
     <label for="lname">Second Name:<span class="error">*</span></label><br>
     <input type="text" id="lname" name="lname"class="input-text">
     <span class="error"><?php echo $lnameError ?> </span>
     <span class="error"><?php echo $lError ?></span>
    </div>
    <div>
     <label for="email">Email:<span class="error">*</span></label><br>
     <input type="email" id="email" name="email" class="input-text">
     <span class="error"><?php echo $emailError ?> </span>
     <span class="error"><?php echo $eError ?></span>
    </div>
    <div>
      <label for="Gender">Gender:<span class="error">*</span></label><br>
      <input type="radio" name="gender" value="male"> Male
      <input type="radio" name="gender" value="female">Female
      <input type="radio" name="gender" value="other">Other
      <span><?php echo $genderError ?>
    </div>  
     <input type="submit" value="Submit">

   </form>

  </body>
</html>