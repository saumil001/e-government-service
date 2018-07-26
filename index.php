<html>
<head>
	<title>User information</title>
<?php include("functions.php"); ?>
<link rel="stylesheet" href="BS/css/bootstrap.css">
<link rel="stylesheet" href="BS/css/bootstrap.min.css">
<link rel="stylesheet" href="BS/css/bootstrap-grid.css">
<link rel="stylesheet" href="BS/css/bootstrap-grid.min.css">
<link rel="stylesheet" href="BS/css/bootstrap-reboot.css">
<link rel="stylesheet" href="BS/css/bootstrap-reboot.min.css">
<script src="bootstrap.bundle.js"></script>
<script src="bootstrap.bundle.min.js"></script>
<script src="bootstrap.min.js"></script>
<script src="bootstrap.js"></script>
<script src="BS/jquery/jquery.js"></script>
<script src="chain.js"></script>
</head> 
<body>
	<div class="container">
	<?php include("navigation.php"); ?>
	
	<div class="row">
	<div class="col-md-12">
  <h2>Registration form</h2>
  <form class="form-horizontal" action="index.php" method="POST">
    <div class="form-group">
      <hr>
      <div class="row">
      <label class="control-label col-md-2" for="name">First Name:</label>
      <div class="col-md-5">
        <input type="text" class="form-control" id="name" placeholder="Enter Firstname" name="first_name">
      </div>
  </div>
</div>

  <div class="form-group">
  <div class="row">
      <label class="control-label col-md-2" for="name">Middle Name:</label>
      <div class="col-md-5">
        <input type="text" class="form-control" id="name" placeholder="Enter Middlename" name="middle_name">
      </div>
  </div>
</div>

  <div class="form-group">
  <div class="row">
      <label class="control-label col-md-2" for="name">Last Name:</label>
      <div class="col-md-5">
        <input type="text" class="form-control" id="name" placeholder="Enter lastname" name="last_name">
      </div>
  </div>
</div>
    
    
    <div class="form-group">
	  <div class="row">
      <label class="control-label col-md-2" for="Age">Username:</label>
      <div class="col-md-5">
        <input type="text" class="form-control" id="age" placeholder="Enter username" name="user_name">
      </div>
  </div>
</div>
</br>
   
    
<div class="row">
      <label class="control-label col-md-2" for="gender">Gender:</label>
      <div class="col-md-5">
        <input type="radio"  id="male"  name="gender" value="male">Male &nbsp;&nbsp;
        <input type="radio"  id="female" name="gender" value="female">Female
      </div>
  </div>

  <div class="form-group">
	  <div class="row">
      <label class="control-label col-md-2" for="Age">Address:</label>
      <div class="col-md-5">
        <textarea rows="5" cols="49" name="address"></textarea>
      </div>
  </div>
</div>

<div class="form-group">
	  <div class="row">
      <label class="control-label col-md-2" for="Age">E-mail:</label>
      <div class="col-md-5">
        <input type="text" class="form-control" id="age" placeholder="Enter E-mail" name="email">
      </div>
  </div>
</div>

<div class="form-group">
	  <div class="row">
      <label class="control-label col-md-2" for="Age">Password:</label>
      <div class="col-md-5">
        <input type="Password" class="form-control" id="age" placeholder="Enter Password" name="password">
      </div>
  </div>
</div>

<div class="form-group">
	  <div class="row">
      <label class="control-label col-md-2" for="Age">Confirm Password:</label>
      <div class="col-md-5">
        <input type="Password" class="form-control" id="age" placeholder="Confirm your password" name="confirm_password">
      </div>
  </div>
</div>

<div class="form-group">
	  <div class="row">
      <label class="control-label col-md-2" for="Age">Date_of_birth:</label>
      <div class="col-md-5">
        <input type="date" class="form-control" id="age" placeholder="Confirm your password" name="Date_of_birth">
      </div>
  </div>
</div>

  <div class="row">
  	
  	<div class="col-md-2">
  	</div>
  	
  	
  	<div class="col-md-5">
  	<input type="Submit" class="btn btn-block btn-success" value="Register">
  	</div>
  </div>

</form>
</div>
</div>
</div> 
<a href=""></a>
</body>
</html> 

<?php
{
	session_start();
	$_SESSION['message']='';
	
	if($_SERVER['REQUEST_METHOD']=='POST')	
{
$mysqli = new mysqli('localhost', 'root', 'usbw', 'hackathon');
$user_name=$mysqli->real_escape_string($_POST['user_name']);
$first_name=$mysqli->real_escape_string($_POST['first_name']);
$last_name=$mysqli->real_escape_string($_POST['last_name']);
$middle_name=$mysqli->real_escape_string($_POST['middle_name']);
$email=$mysqli->real_escape_string($POST['email']);
$gender=$mysqli->real_escape_string($_POST['gender']);
$address=$mysqli->real_escape_string($_POST['address']);
$password=$mysqli->real_escape_string($_POST['password']);
$confirm_password=$mysqli->real_escape_string($_POST['confirm_password']);
$Date_of_birth=$mysqli->real_escape_string($_POST['Date_of_birth']);

$bool=true;
echo "Username entered is:". $user_name . "<br>";

$query1="Select * from registration";
$query2=$mysqli->query($query1); 
while($row=mysqli_fetch_array($query2))
{
$table_users=$row['user_name'];
	if($user_name==$table_users)
	{
		$bool=false;
	
		print '<script>alert("Username has been taken");</script>';
		print '<script>window.location.assign("index.php");</script>';
		//print();
	}
}
if($bool)
{
$query="INSERT INTO registration(first_name,middle_name,last_name,user_name,gender,address,email,password,confirm_password,Date_of_birth)  VALUES ('$first_name','$middle_name','$last_name','$user_name','$gender','$address','$email','$password','$confirm_password','$Date_of_birth')";
	if($mysqli->query($query)===true)
	{
	 Print '<script>alert("Successfully Registered!");</script>';
	// $_SESSION['message']="user could not be added";
	}

}
}
}
?>