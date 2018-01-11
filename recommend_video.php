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
$UserID = $_REQUEST['UserID'];

$query1 = "SELECT * FROM VideoRecommendedTo WHERE VideoID='$VideoID' AND UserID='$UserID'";
$result1 = mysqli_query($dbcon, $query1);

$query2 = "SELECT * FROM Video WHERE VideoID='$VideoID'";
$result2 = mysqli_query($dbcon, $query2);

$query3 = "SELECT * FROM Administrator WHERE UserID='$UserID'";
$result3 = mysqli_query($dbcon, $query3);

if (mysqli_num_rows($result2) <= 0){
	echo "<b>$VideoID</b> does not exist!";
} elseif (mysqli_num_rows($result3) <= 0){
	echo "<b>$UserID</b> does not exist!";
} elseif (mysqli_num_rows($result1) > 0){
   echo "No <b>repeat</b> is allowed! <b>$VideoID</b> has been  recommended to <b>$UserID</b> <br>";
}else{
	$query = "INSERT INTO VideoRecommendedTo(VideoID,UserID) VALUES ('$VideoID','$UserID') ";
    $result = mysqli_query($dbcon, $query)
    or die('something wrong...: ' . mysqli_error($dbcon));
	echo "<b>$VideoID</b> is now recommended to <b>$UserID</b> <br>";
}    
    // Free result
    mysqli_free_result($result1);
    // Free result
    mysqli_free_result($result2);
    // Free result
    mysqli_free_result($result3);
    // Free result
    mysqli_free_result($result);
	// Closing connection
	mysqli_close($dbcon);

?>