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

$query = "SELECT * FROM Crew ";

$result = mysqli_query($dbcon, $query)
  or die('Query failed: ' . mysqli_error($dbcon));

print "All Crew are here:<br>";

while($tuple = mysqli_fetch_array($result)){

// Printing attributes in HTML
print '<ul>';  
print '<li> CrewName: '.$tuple['CrewName'];
print '<li> Nationality: '.$tuple['Nationality'];
print '<li> OfficeWeb: '.$tuple['OfficeWeb'];
print '</ul>';
}



// Free result
mysqli_free_result($result);

// Closing connection
mysqli_close($dbcon);
?> 