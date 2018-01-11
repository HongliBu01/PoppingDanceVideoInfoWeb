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

$CrewName = $_REQUEST['CrewName'];
$Nationality = $_REQUEST['Nationality'];
$OfficeWeb = $_REQUEST['OfficeWeb'];



$query1 = "SELECT * FROM Crew WHERE CrewName='$CrewName'";
$result1 = mysqli_query($dbcon, $query1);
if(mysqli_num_rows($result1) > 0){
   echo "<b>$CrewName</b> has already existed.<br>";
}else{  
   $query = "INSERT INTO Crew(CrewName,Nationality,OfficeWeb) VALUES('$CrewName','$Nationality','$OfficeWeb')";
   $result = mysqli_query($dbcon, $query)
     or die('something wrong...: ' . mysqli_error($dbcon));


    echo "Successfully inserted $CrewName.<br>";
    $query2 = "SELECT CrewName, Nationality, OfficeWeb FROM Crew WHERE CrewName='$CrewName'";
    $result2 = mysqli_query($dbcon, $query2);
    $tuple = mysqli_fetch_array($result2);
    echo "Newly added crew is:<br>";
    print '<ul>';  
    print '<li> CrewName: '.$tuple['CrewName'];
    print '<li> Nationality: '.$tuple['Nationality'];
    print '<li> OfficeWeb: '.$tuple['OfficeWeb'];
    print '</ul>';

    }
    // Free result
    mysqli_free_result($result1);
    // Free result
    mysqli_free_result($result);
     mysqli_free_result($result2);   
	// Closing connection
	mysqli_close($dbcon);
?> 