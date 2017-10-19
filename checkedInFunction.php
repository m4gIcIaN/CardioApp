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

  //Variables
  $student__id = $_COOKIE['userid'];

  $sql = "SELECT timenow FROM timeTable WHERE studentidd=".$student__id." AND DATE(timenow) = DATE(NOW())";

  //Preparing Statement
  if (!($stmt = $stmt = mysqli_prepare($conn,$sql))){
    die();
  }
  if (!mysqli_stmt_execute($stmt)){
    die();
  }
  //Fetch result
  $result = mysqli_stmt_get_result($stmt);
  //Create Array
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

  if (isset($_POST['checkbtn'])){
    if (!(is_null($row)))
    {
      header("Location: http://dedic.waukeeapeximd.com/loggedInAlready.php");
      exit();
    }

    if (is_null($row))
    {
      $querySIDT = "INSERT INTO timeTable(studentidd, timenow) VALUES(".$student__id.", NOW())";
      $run = mysqli_query($conn, $querySIDT);
      header("Location: http://dedic.waukeeapeximd.com/CheckedIn.php");
      exit();
    }
  }
?>
