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
echo "<th>Name</th>";
echo "<th>Time</th>";
echo "</tr>";

//Variables
$firstDate = date('Y-m-d', strtotime($_POST['firstDatum']));
$lastDate = date('Y-m-d', strtotime($_POST['lastDatum']));

if (isset($_POST['sortAlphabetMultiDates'])){
  if (isset($_POST['firstDatum']) && isset($_POST['lastDatum'])){
    $sqlAlpha = "SELECT * FROM students JOIN timeTable ON students.studentid = timeTable.studentidd WHERE DATE_FORMAT(timenow,'%Y-%m-%d') >= '$firstDate' AND DATE_FORMAT(timenow,'%Y-%m-%d') <= '$lastDate' ORDER BY firstname ASC ";

    //Preparing Statement
    if (!($stmt = $stmt = mysqli_prepare($conn,$sqlAlpha))){
      die();
    }
    if (!mysqli_stmt_execute($stmt)){
      die();
    }

    $result = mysqli_stmt_get_result($stmt);

    if (is_null($result)){
      echo "Thing is NULL BOIIII";
    }

    if ($result->num_rows > 0){
      while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        echo "<tr><td>".htmlentities($row['firstname'])." ".htmlentities($row['lastname'])."</td><td>".htmlentities($row['timenow'])."</td></tr>";
      }
    }

    //Exit Route
    echo "<center><button style=".'font-size:20pt;'." ><a href=".'WHS-AdMiN788.php'.">Quick Go Back</a></button></center>";
    echo "<h2>Check In's</h2>";
    //Ending the table
    echo "</table></center>";
  }
}
  if (isset($_POST['sortTimeLogMultiDates'])){
    if (isset($_POST['firstDatum']) && isset($_POST['lastDatum'])){
      $sqlAlpha = "SELECT * FROM students JOIN timeTable ON students.studentid = timeTable.studentidd WHERE DATE_FORMAT(timenow,'%Y-%m-%d') >= '$firstDate' AND DATE_FORMAT(timenow,'%Y-%m-%d') <= '$lastDate' ORDER BY timenow ASC ";

      //Preparing Statement
      if (!($stmt = $stmt = mysqli_prepare($conn,$sqlAlpha))){
        die();
      }
      if (!mysqli_stmt_execute($stmt)){
        die();
      }

      $result = mysqli_stmt_get_result($stmt);

      if (is_null($result)){
        echo "Thing is NULL BOIIII";
      }

      if ($result->num_rows > 0){
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
          echo "<tr><td>".htmlentities($row['firstname'])." ".htmlentities($row['lastname'])."</td><td>".htmlentities($row['timenow'])."</td></tr>";
        }
      }

      //Exit Route
      echo "<center><button style=".'font-size:20pt;'." ><a href=".'WHS-AdMiN788.php'.">Quick Go Back</a></button></center>";
      echo "<h2>Check In's</h2>";
      //Ending the table
      echo "</table></center>";
    }
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
