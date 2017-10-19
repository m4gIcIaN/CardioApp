<?php
//Database Information
$server = "#";
$username = "#";
$password = "#";
$db = "#";

//Making the Connection
$conn = mysqli_connect($server, $username, $password, $db);

//Setup query
$query = "USE #";
$result_set = mysqli_query($conn, $query);

//Starting the Table
echo "<center><table>";
echo "<tr>";
echo "<th>Grade</th>";
echo "<th>First Name</th>";
echo "<th>Last Name</th>";
echo "<th>Time</th>";
echo "</tr>";

//Show todays date by Alphabet
if (isset($_POST['sortAlphabet'])){
  //The Query
  $sqlA = "SELECT * FROM students JOIN timeTable ON students.studentid = timeTable.studentidd WHERE DATE_FORMAT(timenow,'%m/%d/%Y') = DATE_FORMAT(NOW(), '%m/%d/%Y') ORDER BY firstname ASC";

  //Preparing Statement
  if (!($stmt = $stmt = mysqli_prepare($conn,$sqlA))){
    die();
  }
  if (!mysqli_stmt_execute($stmt)){
    die();
  }

  $result = mysqli_stmt_get_result($stmt);

  //Displays Table
  if ($result->num_rows > 0){
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
      echo "<tr><td>".htmlentities($row['grade'])."</td><td>".htmlentities($row['firstname'])."</td><td>".htmlentities($row['lastname'])."</td><td>".htmlentities($row['timenow'])."</td></tr>";
    }
  }
  //Exit Route
  echo "<center><button style=".'font-size:20pt;'." ><a href=".'WHS-AdMiN788.php'.">Quick Go Back</a></button></center>";
  echo "<h2>Today's Check In's</h2>";
  //Ending the table
  echo "</table></center>";
}

//Show todays date by Time Log
if (isset($_POST['sortTimeLog'])){
  //The Query
  $sqlB = "SELECT * FROM students JOIN timeTable ON students.studentid = timeTable.studentidd WHERE DATE_FORMAT(timenow,'%m/%d/%Y') = DATE_FORMAT(NOW(), '%m/%d/%Y') ORDER BY timenow ASC";

  //Preparing Statement
  if (!($stmt = $stmt = mysqli_prepare($conn,$sqlB))){
    die();
  }
  if (!mysqli_stmt_execute($stmt)){
    die();
  }

  $result = mysqli_stmt_get_result($stmt);

  //Displays Table
  if ($result->num_rows > 0){
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
      echo "<tr><td>".htmlentities($row['grade'])."</td><td>".htmlentities($row['firstname'])."</td><td>".htmlentities($row['lastname'])."</td><td>".htmlentities($row['timenow'])."</td></tr>";
    }
  }
  //Exit Route
  echo "<center><button style=".'font-size:20pt;'." ><a href=".'WHS-AdMiN788.php'.">Quick Go Back</a></button></center>";
  echo "<h2>Today's Check In's</h2>";
  //Ending the table
  echo "</table></center>";
}
?>

<!DOCTYPE html>
<html>
<head>
<style>
  table, tr, td, th{
    border: solid black 1px;
    border-collapse: collapse;
    padding:3px;
    text-align:center;
  }

  table{
    margin:20px 0px;
  }

  th{
    font-size:30pt;
  }

  td{
    font-size:26pt;
  }
</style>
</head>
</html>
