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

$Releasetime = $_REQUEST['Time'];
$Views = $_REQUEST['ViewNum'];

$query = "SELECT MusicID, MusicName, Releasetime, Viewers, URL FROM Music WHERE Releasetime >= '$Releasetime' AND Viewers >= '$Views'";

$result = mysqli_query($dbcon, $query)
  or die('Query failed: ' . mysqli_error($dbcon));

print "Popping music heard by more than <b>$Views</b> times since <b>$Releasetime</b>:";

if(mysqli_num_rows($result) <= 0) {
	echo "NO RESULTS FOUND!";
} else{
while($tuple = mysqli_fetch_array($result)){

// Printing attributes in HTML
print '<ul>';  
print '<li> MusicID: '.$tuple['MusicID'];
print '<li> MusicName: '.$tuple['MusicName'];
print '<li> Releasetime: '.$tuple['Releasetime'];
print '<li> Viewers: '.$tuple['Viewers'];
print '<li> URL: '.$tuple['URL'];
print '</ul>';
}
}

// Free result
mysqli_free_result($result);

// Closing connection
mysqli_close($dbcon);
?> 