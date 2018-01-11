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

$CrewName = $_REQUEST['CrewName'];
$OfficeWeb = $_REQUEST['OfficeWeb'];

$query1 = "SELECT CrewName FROM Crew WHERE CrewName ='$CrewName'";
$result1 = mysqli_query($dbcon, $query1);
if(mysqli_num_rows($result1) <= 0){
   echo "No <b>$CrewName</b> in the Crew table.<br>";
}else{
	$query = "UPDATE Crew SET OfficeWeb= '$OfficeWeb' WHERE CrewName='$CrewName'";
   $result = mysqli_query($dbcon, $query)
    or die('something wrong...: ' . mysqli_error($dbcon));
    echo "Successfully update officeweb of <b>$CrewName</b> to <b>$OfficeWeb</b>.<br>";
}
	// Free result
    mysqli_free_result($result1);
    // Free result
    mysqli_free_result($result);
	// Closing connection
	mysqli_close($dbcon);
?> 