<?php
if(isset($_POST['idbroj']) && isset($_POST['prvoime']) && isset($_POST['zadnjuimu']) && isset($_POST['razred']) && isset($_POST['Add'])){
  //Getting Box Values
  $brojID = $_POST['idbroj'];
  $imeprvu = $_POST['prvoime'];
  $imezadnju = $_POST['zadnjuimu'];
  $tvojrazred = $_POST['razred'];
  //Database Information
  $server = "#";
  $username = "#";
  $password = "#";
  $db = "#";
  //Making the Connection
  $conn = mysqli_connect($server, $username, $password, $db);
  //Setup USE DATABASE
  $query = "#";
  $result_set = mysqli_query($conn, $query);
  //Add USER
  $sqladd = "INSERT INTO students(firstname, lastname, studentid, grade) VALUES('".$imeprvu."','".$imezadnju."',".$brojID.",".$tvojrazred.")";
  //Call the Query
  if ($queryADD = mysqli_query($conn, $sqladd)){
    echo "<center><h1>USER SUCCESSFULLY ADDED</h1></center>";
    echo "<center><button style=".'font-size:20pt;'." ><a href=".'WHS-AdMiN788.php'.">Quick Go Back</a></button></center>";
  } else {
    echo "<center><h1>USER NOT ADDED</h1></center>";
    echo "<center><button style=".'font-size:20pt;'." ><a href=".'WHS-AdMiN788.php'.">Quick Go Back</a></button></center>";
  }
}
?>
