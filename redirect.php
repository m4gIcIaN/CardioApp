<?php
      //data base Information
      $server = "#";
      $username = "#";
      $password = "#";
      $db = "#";
      //Connecting to Database
      $connection = mysqli_connect($server, $username, $password, $db);
      //Check connection
      if ($connection->connect_error){
        die("DB connection failed");
      }
      //Use database query
      $useQuery = "USE #";
      $useSet = mysqli_query($connection, $useQuery);
      //go to admin page
      if ($_POST['name' == $NUMBERS]){
        header("Location: http://dedic.waukeeapeximd.com/WHS-AdMiN788.php");
        exit();
      }
      //check if POST is Set
      if (isset($_POST['name'])){
        $sql = "SELECT * FROM students WHERE studentid='".$_POST['name']."'";
        $result = $connection->query($sql);
        $row = $result->fetch_assoc();
        if ($_POST['name'] == $row['studentid']){
          setcookie('userid', $_POST['name'], time() + 3600);
          header("Location: http://dedic.waukeeapeximd.com/LogHome001.php");
          exit();
        } else if(isset($_POST['name']) and $_POST['name'] == ' '){
          echo "<br/ ><br/ ><center><p style=".'font-size:30pt;'.">Sorry, User not Found!</p></center>";
          echo "<center><button style=".'font-size:30pt;'." ><a href=".'index.php'.">Quick Go Back</a></button></center>";
        } else if ($_POST['name'] == $NUMBERS){
          //go to admin page
          header("Location: http://dedic.waukeeapeximd.com/WHS-AdMiN788.php");
          exit();
        } else {
          echo "<br/ ><br/ ><center><p style=".'font-size:30pt;'.">Sorry, User not Found!</p></center>";
          echo "<center><button style=".'font-size:30pt;'." ><a href=".'index.php'.">Quick Go Back</a></button></center>";
        }
      }
?>
