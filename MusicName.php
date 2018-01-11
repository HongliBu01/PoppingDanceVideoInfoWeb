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

$query = "SELECT MusicID, MusicName, URL FROM Music WHERE MusicName LIKE '%$MusicName%'";

$result = mysqli_query($dbcon, $query)
  or die('Query failed: ' . mysqli_error($dbcon));

print "Songs include <b>$MusicName</b>:<br>";

if(mysqli_num_rows($result) <= 0) {
	echo "NO RESULTS FOUND!";
} else{
while($tuple = mysqli_fetch_array($result)){

// Printing attributes in HTML
print '<ul>';  
print '<li> MusicID: '.$tuple['MusicID'];
print '<li> MusicName: '.$tuple['MusicName'];
print '<li> URL: '.$tuple['URL'];
print '</ul>';
}
}

// Free result
mysqli_free_result($result);

// Closing connection
mysqli_close($dbcon);
?> 