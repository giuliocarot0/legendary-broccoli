<?php 

if(!$_GET["sub"]) {
    http_response_code(400);
    die("Bad Request"); 
    }
else 
    $cid = $_GET["sub"]; 
include "db_config.php";
$conn = OpenCon();

//first thing first: fetch infos about courses

$q1 = "SELECT WeekDay, StartTime, Duration, GymRoom, Name, Surname FROM Trainer as T, Schedule as S  WHERE CId = '$cid' AND T.SSN = S.SSN;";
$q1Res = mysqli_query($conn, $q1);

// checks if query returns not null tuple
if(mysqli_num_rows($q1Res) < 1) die("No data found");


CloseCon($conn);

?>


<!DOCTYPE HTML>
<html>
<head>
<title>Search Course Infos</title>
</head>

<body>

<table border=true>
  <tr>
    <th>Day</th>
    <th>Start</th>
    <th>Duration</th>
    <th>Room</th>
    <th>Trainer Name</th>
    <th>Trainer Surname</th>
  </tr>
  <?php
  
  while($row = mysqli_fetch_row($q1Res)){ 
    echo"<tr>";
    foreach($row as $fld)

        echo "
            <td>
                $fld
            </td>
        ";

    echo "<tr>";
}
  
  
  ?>
</table>

<form action ="courseSelectV1.php" method = "get">    
        <button type ="submit"> Search again </button>
    </form>

    
</body>

</html>