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

$MusicName = $_REQUEST['MusicName'];

$query = "SELECT MusicID, MusicName FROM Music ";

$result = mysqli_query($dbcon, $query)
  or die('Query failed: ' . mysqli_error($dbcon));

print "All Songs are here:<br>";

while($tuple = mysqli_fetch_array($result)){

// Printing attributes in HTML
   	printf("MusicID: [%s] ------ MusicName: %s <br>", $tuple['MusicID'], $tuple['MusicName']);
}


// Free result
mysqli_free_result($result);

// Closing connection
mysqli_close($dbcon);
?> 