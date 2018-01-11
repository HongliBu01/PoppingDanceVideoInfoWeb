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

$Time = $_REQUEST['Time'];

$query1 = "SELECT * FROM Video WHERE PostTime < '$Time' ";
$result1 = mysqli_query($dbcon, $query1);
if(mysqli_num_rows($result1) <=0){
   echo "NO video post earlier than <b>$Time</b><br>";
}else{
	echo "All these video will be deleted:";
	while($tuple = mysqli_fetch_array($result1)){

// Printing attributes in HTML
   print '<ul>';  
   print '<li> VideoID: '.$tuple['VideoID'];
   print '<li> VideoName: '.$tuple['VideoName'];
   print '<li> PostTime: '.$tuple['PostTime'];
   print '<li> Viewers: '.$tuple['Viewers'];
   print '<li> URL: '.$tuple['URL'];
   print '</ul>';
}  
   $query = "DELETE FROM Video WHERE PostTime < '$Time'";
   $result = mysqli_query($dbcon, $query)
     or die('something wrong...: ' . mysqli_error($dbcon));;
    echo "<b>Successfully deleted videos posted earlier than $Time</b><br>";
    }

	// Closing connection
	mysqli_close($dbcon);
?> 