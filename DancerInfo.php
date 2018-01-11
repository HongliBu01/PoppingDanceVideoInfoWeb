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

// Getting the input parameter (Dancer):
$Dancer = $_REQUEST['Dancer'];

// Get the attributes of the Dancer
$query = "SELECT DancerName, Gender, Nationality, DateofBirth, Style, Title, Crew FROM Dancer WHERE DancerName LIKE '%$Dancer%'";
$result = mysqli_query($dbcon, $query)
  or die('Query failed: ' . mysqli_error($dbcon));
  

// Can also check that there is only one tuple in the result
print "<b>$Dancer</b> results in following Dancers:<br>";

if(mysqli_num_rows($result) <= 0) {
	echo "NO Dancer Name <b>$Dancer</b> !";
} else{
while($tuple = mysqli_fetch_array($result)){

// Printing user attributes in HTML
print '<ul>';  
print '<li> Dancer: '.$tuple['DancerName'];
print '<li> Gender: '.$tuple['Gender'];
print '<li> Nationality: '.$tuple['Nationality'];
print '<li> DateofBirth: '.$tuple['DateofBirth'];
print '<li> Style: '.$tuple['Style'];
print '<li> Crew: '.$tuple['Crew'];
print '<li> Title: '.$tuple['Title'];
print '</ul>';
}
}
// Free result
mysqli_free_result($result);

// Closing connection
mysqli_close($dbcon);
?> 