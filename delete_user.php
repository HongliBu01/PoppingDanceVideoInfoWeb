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


$query1 = "SELECT UserID FROM Administrator WHERE UserID='$UserID'";
$result1 = mysqli_query($dbcon, $query1);
$query2 = "SELECT * FROM Administrator";
$result2 = mysqli_query($dbcon, $query2);
if(mysqli_num_rows($result1) <=0){
   echo "NO administrator Named <b>$UserID</b><br>";
}elseif(mysqli_num_rows($result2) <=1) {
	echo "No!!!Only one Administrator left!!! ";
}else{
	$query = "DELETE FROM Administrator WHERE UserID = '$UserID'";
   $result = mysqli_query($dbcon, $query)
     or die('something wrong...: ' . mysqli_error($dbcon));;
    echo "Successfully deleted user $UserID <br>";
    }
    // Free result
    mysqli_free_result($result1);
    mysqli_free_result($result2);
    // Free result
    mysqli_free_result($result);
	// Closing connection
	mysqli_close($dbcon);
?> 