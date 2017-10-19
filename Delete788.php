<?php
if(isset($_POST['obrisi']) && isset($_POST['Delete'])){
  //Getting Box Values
  $obrisiBroj = $_POST['obrisi'];
  //Database Information
  $server = "#";
  $username = "#";
  $password = "#";
  $db = "#";
  //Making the Connection
  $conn = mysqli_connect($server, $username, $password, $db);
  //Setup USE DATABASE
  $query = "USE #";
  $result_set = mysqli_query($conn, $query);
  //DELETE USER
  $sqlDelete = "DELETE FROM students WHERE studentid=".$obrisiBroj."";
  //Calling the DELETE Query
  if ($queryDelete = mysqli_query($conn, $sqlDelete)){
    echo "<center><h1>USER SUCCESSFULLY DELETED</h1></center>";
    echo "<center><button style=".'font-size:20pt;'." ><a href=".'WHS-AdMiN788.php'.">Quick Go Back</a></button></center>";
  } else {
    echo "<center><h1>USER SUCCESSFULLY DELETED</h1></center>";
    echo "<center><button style=".'font-size:20pt;'." ><a href=".'WHS-AdMiN788.php'.">Quick Go Back</a></button></center>";
  }
}
?>
