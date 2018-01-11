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


$VideoID = $_REQUEST['VideoID'];

$query = "SELECT UserID FROM ViewCollectVideo WHERE VideoID = '$VideoID'";

$result = mysqli_query($dbcon, $query)
  or die('Query failed: ' . mysqli_error($dbcon));

print "Users who collected <b>$VideoID</b>:<br>";

if(mysqli_num_rows($result) <= 0) {
	echo "Correct Your Input Please!";
} else{
while($tuple = mysqli_fetch_array($result)){

// Printing attributes in HTML
print '<ul>';  
print '<li> UserID: '.$tuple['UserID'];
print '</ul>';
}
}
// Free result
mysqli_free_result($result);

// Closing connection
mysqli_close($dbcon);
?> 

