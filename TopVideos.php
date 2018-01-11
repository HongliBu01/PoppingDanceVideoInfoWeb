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

$Count = $_REQUEST['Num'];

$query = "SELECT @a := @a + 1 AS SerialCount, VideoID , VideoName, PostTime, Viewers, URL FROM Video, (SELECT @a := 0) AS a ORDER BY Viewers DESC LIMIT $Count";


$result = mysqli_query($dbcon, $query)
  or die('Query failed: ' . mysqli_error($dbcon));

print "Top Videos:";

while($tuple = mysqli_fetch_array($result)){

// Printing attributes in HTML
print '<ul>';  
print '<li> '.$tuple['SerialCount'];
print '<li> VideoID: '.$tuple['VideoID'];
print '<li> VideoName: '.$tuple['VideoName'];
print '<li> PostTime: '.$tuple['PostTime'];
print '<li> Viewers: '.$tuple['Viewers'];
print '<li> URL: '.$tuple['URL'];
print '</ul>';
}

// Free result
mysqli_free_result($result);

// Closing connection
mysqli_close($dbcon);
?> 