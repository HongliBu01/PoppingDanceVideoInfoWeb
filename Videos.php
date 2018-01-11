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

$VideoName = $_REQUEST['VideoName'];

$query = "SELECT VideoID, VideoName FROM Video ";

$result = mysqli_query($dbcon, $query)
  or die('Query failed: ' . mysqli_error($dbcon));

print "All Videos are here:<br>";

while($tuple = mysqli_fetch_array($result)){

// Printing attributes in HTML
   	printf("VideoID: [%s] ------ VideoName: %s <br>", $tuple['VideoID'], $tuple['VideoName']);
}


// Free result
mysqli_free_result($result);

// Closing connection
mysqli_close($dbcon);
?> 