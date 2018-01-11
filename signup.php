<?php

// Connection parameters 
$host = 'mpcs53001.cs.uchicago.edu';
$username = 'honglibu';
$password = 'uRuchi7i';
$database = 'honglibuDB';

// Attempting to connect 
$dbcon = mysqli_connect($host, $username, $password, $database)
   or die('Could not connect: ' . mysqli_connect_error());
print 'Connected successfully!<br>';

$UserID = $_REQUEST['UserID'];
$Email = $_REQUEST['Email'];
$Password = $_REQUEST['Password'];

$error = false;

if (strlen($UserID) < 3 or strlen($UserID) > 20) {
   $error = true;
   echo "UserID must have at least 3 characters and at most 20 characters!<br>";
  } else if (!preg_match("/^[a-zA-Z0-9]+$/",$UserID)) {
   $error = true;
   echo "Name can only contain alphabets and numbers!<br>";
  } else {
  	$query1 = "SELECT UserID FROM Administrator WHERE UserID='$UserID'";
    $result1 = mysqli_query($dbcon, $query1);
    $count1 = mysqli_num_rows($result1);
   if($count1!=0){
    $error = true;
    echo "Provided UserID is already in use!<br>";
   }
  }

// Free result
mysqli_free_result($result1);

if ( !filter_var($Email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   echo "Please enter valid email address.<br>";
  } else {
   // check email exist or not
   $query2 = "SELECT Email FROM Administrator WHERE Email='$Email'";
   $result2 = mysqli_query($dbcon, $query2);
   $count2 = mysqli_num_rows($result2);
   if($count2!=0){
    $error = true;
    echo "Provided Email is already in use.<br>";
   }
  }

  // password validation
if(strlen($Password) < 6 or strlen($Password) > 20) {
   $error = true;
   echo "Password must have at least 6 characters and at most 20 characters.<br>";
  }


   if( !$error ) {  
   $query = "INSERT INTO Administrator(UserID,Email,Passwords) VALUES('$UserID','$Email','$Password')";
	 $result = mysqli_query($dbcon, $query);
    echo "Successfully registered, you may login now!<br>";
    echo "Please wait 3 seconds.....";
    header("Refresh:3; url= login.html");
    } else{
    echo "Please wait 5 seconds.....";
    header("Refresh:5; url=signup.html");
   }
 
	// Closing connection
	mysqli_close($dbcon);
?> 
  