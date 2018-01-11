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

$ViewNum = $_REQUEST['ViewNum'];

$query1 = "SELECT * FROM Music WHERE Viewers < $ViewNum";
$result1 = mysqli_query($dbcon, $query1);
if(mysqli_num_rows($result1) <=0){
   echo "NO song viewed less than <b>$ViewNum</b><br>";
}else{  
	echo "All these songs will be deleted:";
	while($tuple = mysqli_fetch_array($result1)){

// Printing attributes in HTML
   print '<ul>';  
   print '<li> MusicID: '.$tuple['MusicID'];
   print '<li> MusicName: '.$tuple['MusicName'];
   print '<li> Releasetime: '.$tuple['Releasetime'];
   print '<li> Viewers: '.$tuple['Viewers'];
   print '<li> URL: '.$tuple['URL'];
   print '</ul>';
} 
   $query = "DELETE FROM Music WHERE Viewers < $ViewNum";
   $result = mysqli_query($dbcon, $query)
     or die('something wrong...: ' . mysqli_error($dbcon));;
    echo "<b>Successfully deleted songs viewed less than $ViewNum</b><br>";
    }
	// Closing connection
	mysqli_close($dbcon);
?> 