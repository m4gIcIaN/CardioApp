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
echo "<th>Name</th>";
echo "<th>Grade</th>";
echo "<th>Count</th>";
echo "</tr>";
if (isset($_POST['IDNumberSearch']) && isset($_POST['numberSearches'])){
  //Variables
  $IDSearch = $_POST['IDNumberSearch'];

  //Find the Count
  $searchCount = "SELECT timenow FROM timeTable WHERE studentidd=".$IDSearch."";
  $result = mysqli_query($conn, $searchCount);

  //Find the ASSOC
  $searchASSOC = "SELECT * FROM students WHERE studentid=".$IDSearch."";
  $result1 = mysqli_query($conn, $searchASSOC);

  if ($row = $result->fetch_assoc() && $rowinfo = $result1->fetch_assoc()){
    echo "<tr><td>".$rowinfo['firstname']." ".$rowinfo['lastname']."</td><td>" .$rowinfo['grade']. "</td><td>". $result->num_rows ."</td></tr>";
  }
}
echo "<center><button style=".'font-size:20pt;'." ><a href=".'WHS-AdMiN788.php'.">Quick Go Back</a></button></center>";
echo "<h2>Showing Information for ID: ".$IDSearch."</h2>";
echo "</table></center>";
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
