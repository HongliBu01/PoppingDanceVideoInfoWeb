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
$ViewNum = $_REQUEST['ViewNum'];


$query1 = "SELECT VideoID, Viewers FROM Video WHERE VideoID='$VideoID'";
$result1 = mysqli_query($dbcon, $query1);
if(mysqli_num_rows($result1) <= 0){
   echo "No <b>$VideoID</b> in the video table.<br>";

}elseif($ViewNum < 0){
   echo "No negative number is allowed.<br>";
}else{
	$query = "UPDATE Video SET Viewers = $ViewNum WHERE VideoID='$VideoID' ";
   $result = mysqli_query($dbcon, $query)
    or die('something wrong...: ' . mysqli_error($dbcon));
    echo "Successfully update the view number of <b>$VideoID</b> to <b>$ViewNum</b>.<br>";
}
	// Free result
    mysqli_free_result($result1);
    // Free result
    mysqli_free_result($result);
	// Closing connection
	mysqli_close($dbcon);
?> 