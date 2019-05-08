<?php  

include "db_config.php";

if(!$_GET) {
    http_response_code(400);
    die("Bad Request");
}
else{
    $trainer = $_GET['trainer'];
    $day = $_GET['day'];
}

$conn = OpenCon();

$query = "SELECT WeekDay, StartTime, Duration, GymRoom, CType, C.Name, CLevel,  T.SSN,T.Name,
          T.Surname FROM Trainer as T, Course as C, Schedule as S WHERE WeekDay = '$day' AND Surname = '$trainer' AND S.SSN = T.SSN AND S.CId = C.CId ORDER BY StartTime DESC;";

$query_r = mysqli_query($conn, $query);
// checks if query returns not null tuple

if(mysqli_num_rows($query_r) < 1) die("No data found");
CloseCon($conn);

?>



<!DOCTYPE HTML>
<html>
<head>
<title>Found Lessons</title>
</head>

<body>

<table border=true>
  <tr>
    <th>Day</th>
    <th>Start</th>
    <th>Duration</th>
    <th>Room</th>
    <th>Course Name</th>
    <th>Course Type</th>
    <th>Course Level</th>   
    <th>Trainer SSN</th>
    <th>Trainer Name</th>
    <th>Trainer Surname</th>
  </tr>
  <?php
  
  while($row = mysqli_fetch_row($query_r)){ 
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
    <form action ="searchLesson.php" method = "get">    
        <button type ="submit"> Search again </button>
    </form>
</body>

</html>