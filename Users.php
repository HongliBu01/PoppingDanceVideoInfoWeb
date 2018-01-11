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

$User = $_REQUEST['User'];

$query = "SELECT DISTINCT UserID, FavouriteVideoID, FavouriteMusicID FROM Users WHERE UserID LIKE '%$User%'";

$result = mysqli_query($dbcon, $query)
  or die('Query failed: ' . mysqli_error($dbcon));

print "<b>$User</b>'s Favourite Video and Song:<br>";

if(mysqli_num_rows($result) <= 0) {
	echo "No Such User!";
} else{
while($tuple = mysqli_fetch_array($result)){

// Printing attributes in HTML

	printf("UserID: [%s]  Video: [%s]  Music: [%s] <br>", $tuple['UserID'], $tuple['FavouriteVideoID'], $tuple['FavouriteMusicID']);
}
}
// Free result
mysqli_free_result($result);

// Closing connection
mysqli_close($dbcon);
?> 