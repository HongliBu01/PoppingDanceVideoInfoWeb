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

$DancerName = $_REQUEST['DancerName'];
$Style = $_REQUEST['Style'];


$query1 = "SELECT DancerName FROM Dancer WHERE DancerName='$DancerName'";
$result1 = mysqli_query($dbcon, $query1);
if(mysqli_num_rows($result1) <= 0){
   echo "No <b>$DancerName</b> in the Dancer table.<br>";

}else{
	$query = "UPDATE Dancer SET Style = '$Style' WHERE DancerName='$DancerName'";
   $result = mysqli_query($dbcon, $query)
    or die('something wrong...: ' . mysqli_error($dbcon));
    echo "Successfully update the style of <b>$DancerName</b> to <b>$Style</b>.<br>";
}
	// Free result
    mysqli_free_result($result1);
    // Free result
    mysqli_free_result($result);
	// Closing connection
	mysqli_close($dbcon);
?> 