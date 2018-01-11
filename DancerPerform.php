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

$Dancer = $_REQUEST['Dancer'];
$PostTime = $_REQUEST['Time'];

$query = "SELECT DancerName, Perform.VideoID AS VideoID, VideoName, PostTime, Viewers, URL FROM Video, Perform WHERE Video.VideoID = Perform.VideoID AND Perform.DancerName = '$Dancer' AND  PostTime >= '$PostTime'";

$result = mysqli_query($dbcon, $query)
  or die('Query failed: ' . mysqli_error($dbcon));
  
print "<b>$Dancer</b> performed in the following videos since <b>$PostTime</b>:<br>";

if(mysqli_num_rows($result) <= 0) {
	echo "NO RESULTS FOUND!";
} else{
while($tuple = mysqli_fetch_array($result)){

// Printing attributes in HTML
print '<ul>';  
print '<li> Dancer: '.$tuple['DancerName'];
print '<li> VideoID: '.$tuple['VideoID'];
print '<li> VideoName: '.$tuple['VideoName'];
print '<li> PostTime: '.$tuple['PostTime'];
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