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

//Check if Search has been clicked
if (isset($_POST['search'])){
  //Variables
  $studID = $_POST['searchSSID'];
  //Quering
  $searchQ = "SELECT *, DATE_FORMAT(timenow, '%m/%d/%Y') FROM timeTable WHERE studentidd=".$studID."";
  $result = mysqli_query($conn, $searchQ);
  //Showing Data
  echo "<center><table>";
  echo "<tr>
        <th>Time Log for ".$studID."</th>
        <tr></center>";
  if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
      echo "<center><tr><td>".$row['timenow']."</td></tr></center>";
    }
  } else {
    echo "0 results";
  }
}

  echo "<center><button style=".'font-size:20pt;'." ><a href=".'WHS-AdMiN788.php'.">Quick Go Back</a></button></center>";
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
