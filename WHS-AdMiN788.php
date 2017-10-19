<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<style>
  @media only screen
	 and (min-device-width : 1280px)
	 and (max-device-width : 1280px)
	 and (orientation : landscape)
	 and (-webkit-min-device-pixel-ratio: 1)  {

      body{
        background-color:purple;
      }

      #Admin788 {
        margin-top:10px;
      }

      .inner{
         background-color: gold;
         padding: 10px 20px;
         border: solid black 2pt;
         border-radius: 10px;
         margin-top:15px;
         margin-bottom: 30px;
         font-size:20px;
     }

     a:link{
         color:black;
         text-decoration:none;
     }

     a:hover{
         color:black;
         text-decoration:none;
     }

     a:visited{
         color:black;
         text-decoration:none;
     }

     a:active{
         color:black;
         text-decoration:none;
     }

     a{
         color:black;
         text-decoration:none;
     }

     .card{
       margin:10px 50px;
       border:solid 5px black;
     }

     .card-header{
       border-bottom:solid 5px black;
       font-size:18pt;
     }

     .buttonS{
       margin:10px 0px 15px 0px;
     }

     .inputS{
       border:solid black 2px;
       margin:10px 10px;
       text-align:center;
       font-size:16pt;
     }

     .Sec{
       border:solid black 3px;
       margin: 15px 100px;
       padding:15px 0px;
     }

     #to{
       padding-top:10px;
     }

     .gold{
        background-color: gold;
        padding: 10px 20px;
        border: solid black 2pt;
        border-radius: 10px;
        margin-top:10px;
        font-size:20px;
    }


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
      font-size:16pt;
    }

    td{
      font-size:14pt;
    }


   p {
      font-size:16pt;
   }

 }

 body{
   background-color:purple;
 }

 #Admin788 {
   margin-top:10px;
 }

 .inner{
    background-color: gold;
    padding: 10px 20px;
    border: solid black 2pt;
    border-radius: 10px;
    margin-top:15px;
    margin-bottom: 30px;
    font-size:20px;
}

a:link{
    color:black;
    text-decoration:none;
}

a:hover{
    color:black;
    text-decoration:none;
}

a:visited{
    color:black;
    text-decoration:none;
}

a:active{
    color:black;
    text-decoration:none;
}

a{
    color:black;
    text-decoration:none;
}

.card{
  margin:10px 50px;
  border:solid 5px black;
}

.card-header{
  border-bottom:solid 5px black;
  font-size:18pt;
}

.buttonS{
  margin:10px 0px 15px 0px;
}

.inputS{
  border:solid black 2px;
  margin:10px 10px;
  text-align:center;
  font-size:16pt;
}

.Sec{
  border:solid black 3px;
  margin: 15px 100px;
  padding:15px 0px;
}

#to{
  padding-top:10px;
}

.gold{
   background-color: gold;
   padding: 10px 20px;
   border: solid black 2pt;
   border-radius: 10px;
   margin-top:10px;
   font-size:20px;
}


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
 font-size:16pt;
}

td{
 font-size:14pt;
}


p {
 font-size:16pt;
}


  </style>

</head>

<body>

<!-- SHOW WHOLE STUDENTS TABLE-->
<form action="WHS-AdMiN788.php" method="POST">
  <center><img id="Admin788" src="/Img/Admin.png"></img></center>

  <div class="card">
	 <center> <div class="card-header">
	    Click Here To View All Attendance .... Ever
	  </div>
	  <div class="card-body">
	    <blockquote class="blockquote mb-0">
        <center><button type="submit" class="gold" name="showall"><a>Show</a></button></center>
	    </blockquote>
	  </div> </center>
    <?php
    if(isset($_POST['showall'])){
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
      //Get Query
      $showT = mysqli_query($conn, "SELECT *, COUNT(studentid) FROM students JOIN timeTable ON students.studentid = timeTable.studentidd GROUP BY studentid ORDER BY lastname ASC");

      //Totals
      $signInTotal = mysqli_query($conn, "SELECT COUNT(studentidd) AS signTotal FROM timeTable JOIN students ON timeTable.studentidd=students.studentid");
      $studentTotal = mysqli_query($conn, "SELECT COUNT(DISTINCT studentidd) AS studTotal FROM timeTable JOIN students ON timeTable.studentidd=students.studentid");

      //fetch_assoc
      $totalSignIn = $signInTotal->fetch_assoc();
      $totalStudent = $studentTotal->fetch_assoc();

      //Show All Data
      echo "<center><table>";
      echo "<tr>
            <th><b>First Name</b></th>
            <th><b>Last Name</b></th>
            <th><b>Student ID</b></th>
            <th><b>Grade</b></th>
            <th><b>Count</b></th>
            </tr>";
      if ($showT->num_rows > 0) {
      while($row = $showT->fetch_assoc()) {
          echo "<tr><td>" . $row['firstname']. "</td><td> " . $row["lastname"]. "</td><td>" . $row["studentid"]."</td><td>" . $row["grade"]."</td><td>".$row["COUNT(studentid)"]."</td></tr>";
        }
      } else {
        echo "0 results";
      }
      //Display Totals
      echo "<tr><td colspan=5 style='text-align:center;'>TOTAL STUDENTS: ".$totalStudent['studTotal']."</td></tr>";
      echo "<tr><td colspan=5 style='text-align:center;'>TOTAL SIGN-INS: ".$totalSignIn['signTotal']."</td></tr>";
      //End Table
      echo "</table></center>";
    }
    ?>
  </form>
	</div>
  <div class="card">
	 <center> <div class="card-header">
	    See Attendance By Date
	  </div>
<!-- Show Who Logged In Today -->
  <form action="showTodaysDate.php" method="POST">
	  <div class="card-body">
      <div class="Sec">
      <p class="p-tag">Show Today's Attendance <br />By:</p>
      <div class="buttonS"><center><button type="submit" class="gold" name="sortAlphabet">Alphabet</button></center></div>
      <div class="buttonS"><center><button type="submit" class="gold" name="sortTimeLog">Time Log</button></center></div>
      </div>
    </div>
  </form>
<!-- Show TIME LOGS OF CERTAIN DATES-->
  <form action="wideRangeDateSearch.php" method="POST">
    <div class="Sec">
      <p class="p-tag">Show Attendance By Date</p>
      <input autocomplete="off" class="inputS" type="text" name="firstDatum" placeholder="yyyy-mm-dd"></>
      <p id="to">to</p>
      <input autocomplete="off" class="inputS" type="text" name="lastDatum" placeholder="yyyy-mm-dd"></>
      <div class="buttonS"><center><button type="submit" class="inner" name="sortAlphabetMultiDates">Alphabet</button></center></div>
      <div class="buttonS"><center><button type="submit" class="inner" name="sortTimeLogMultiDates">Time Log</button></center></div>
    </div>
  </form>

<!-- Search For Student (SHOWS COUNT)-->
    <div class="Sec">
      <p class="p-tag">Search for Student</p>
      <form action="searchByName.php" method="POST">
      <input autocomplete="off" class="inputS" type="text" name="firstSearch" placeholder="First Name"></>
      <input autocomplete="off" class="inputS" type="text" name="lastSearch" placeholder="Last Name"></>
      <div class="buttonS"><center><button type="submit" name="nameSearches" class="inner">Name</button></center></div>
    </form>
    <form action="searchByIDNumber.php" method="POST">
      <input autocomplete="off" class="inputS" type="text" name="IDNumberSearch" placeholder="ID Number"></>
      <div class="buttonS"><center><button type="submit" class="gold" name="numberSearches" class="inner">ID Number</button></center></div>
    </div>
  </form>

<!-- SEARCH TIMELOG CAPABILITIES-->
  <form action="searchUser.php" method="POST">
    <div class="Sec">
      <p class="p-tag">Search for Student Time Log <br /> When they logged in</p>
      <input autocomplete="off" class="inputS" type="text" name="searchSSID" placeholder="ID Number"></>
        <div class="buttonS"><center><button type="submit" class="gold" name="search">Search</button></center></div>
    </div>
  </form>
<!-- DELETE CAPABILITIES-->
<form action="Delete788.php" method="POST">
    <div class="Sec">
      <p class="p-tag">Delete Student from Attendance</p>
      <input autocomplete="off" class="inputS" type="text" name="obrisi" placeholder="ID Number"></>
      <div class="buttonS"><center><button type="submit" class="gold" name="Delete">Delete</button></center></div>
    </div>
  </form>

<!-- ADD CAPABILITIES-->
<form action="Add788.php" method="POST">
    <div class="Sec">
      <p class="p-tag">Add Student to Attendance</p>
      <input autocomplete="off" class="inputS" type="text" name="idbroj" placeholder="ID Number"></>
      <input autocomplete="off" class="inputS" type="text" name="prvoime" placeholder="First Name"></>
      <input autocomplete="off" class="inputS" type="text" name="zadnjuimu" placeholder="Last Name"></>
      <input autocomplete="off" class="inputS" type="text" name="razred" placeholder="Grade"></>
      <div class="buttonS"><center><button type="submit" class="gold" name="Add">Add</button></center></div>
    </div>
    <!--GO BACK TO LOG IN SCREEN-->
    <div class="buttonS"><center><a href="index.php" class="inner">Back to Log In</a></center></div>
	    </blockquote>
	  </div> </center>
	</div>
</form>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</body>
</html>
