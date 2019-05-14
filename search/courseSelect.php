<?php
include "../db_config.php";
$conn = OpenCon();


//first thing first: fetch infos about courses


$q1 = "SELECT CId FROM Course";
$q1Res = mysqli_query($conn, $q1);
CloseCon($conn);
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Search Course Infos</title>
</head>

<body>



<form action="getCourseInfos.php" method ="get">
Select your course:

<select name ="sub">
    <?php  while($row = mysqli_fetch_row($q1Res))
            foreach($row as $el)
                echo "<option value=$el>$el</option>";
    ?>
</select>
<input type="submit">
</form>
</body>

</html>