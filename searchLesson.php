<?php
include "db_config.php";
$conn = OpenCon();



//first thing first: fetch infos about courses


$q1 = "SELECT Surname FROM Trainer";
$q1Res = mysqli_query($conn, $q1);

$q2 = "SELECT DISTINCT WeekDay FROM Schedule";
$q2Res = mysqli_query($conn, $q2);


CloseCon($conn);
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Search Course Infos</title>
</head>

<body>



<form action="getLesson.php" method ="get">
Select trainer:    
<select name ="trainer">
    <?php  while($row = mysqli_fetch_row($q1Res))
            foreach($row as $el)
                echo "<option value=$el>$el</option>";
    ?>
</select>
<br><br>
Select day:    
<select name ="day">
    <?php  while($row1 = mysqli_fetch_row($q2Res))
            foreach($row1 as $el1)
                echo "<option value=$el1>$el1</option>";
    ?>
</select>
<br><br>
<input type="submit">
</form>

</body>

</html>