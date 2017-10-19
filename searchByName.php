<?php
//Database Information
$server = "#";
$username = "#";
$password = "#";
$db = "#";

//Making the Connection
$conn = mysqli_connect($server, $username, $password, $db);

//Check Connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

//Setup query
$query = "USE #";
$result_set = mysqli_query($conn, $query);

//Creating the table
echo "<center><table>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>Grade</th>";
echo "<th>Count</th>";
echo "</tr>";

if (isset($_POST['firstSearch']) || isset($_POST['lastSearch'])){

  //Variables
  $firstNSearch = $_POST['firstSearch'];
  $lastNSearch = $_POST['lastSearch'];

  //Find the Info
  $searchSql = "SELECT studentid, firstname, lastname, COUNT(studentid), grade FROM students JOIN timeTable ON students.studentid = timeTable.studentidd";

  //Checking What is inputted

  //Preparing Statement
  if (!($stmt = $stmt = mysqli_prepare($conn,$searchSql))){
  	die();
  }

  if (!mysqli_stmt_execute($stmt)){
  	die();
  }

  $result = mysqli_stmt_get_result($stmt);

  //Displays Table
  if ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
    echo "<tr><td>".htmlentities($row['studentid'])."</td><td>".htmlentities($row['grade'])."</td><td>".htmlentities($row['COUNT(studentid)'])."</td></tr>";
  }

  echo "<center><button style=".'font-size:20pt;'." ><a href=".'WHS-AdMiN788.php'.">Quick Go Back</a></button></center>";
  echo "<h2>Showing Information for Student: ".htmlentities($row['firstname']). " " .htmlentities($row['lastname'])."</h2>";
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
