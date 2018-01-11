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
$Password = $_REQUEST['Password'];

$query = "SELECT * FROM Administrator WHERE UserID = '$UserID' and Passwords = '$Password'";

$result = mysqli_query($dbcon, $query)
  or die('Query failed: ' . mysqli_error($dbcon));

if(mysqli_num_rows($result) <= 0) {
	echo "Invaild Input, please correct them! <br>";
	echo "Please wait 3 seconds.....";
	header("Refresh:3; url=login.html");
} else{

     print "Administrator <b>$UserID</b> logs in successfully!<br>";

         echo "Please wait 3 seconds.....";
    header("Refresh:3; url= final_admin.html");
}
// Free result
mysqli_free_result($result);

// Closing connection
mysqli_close($dbcon);
?> 