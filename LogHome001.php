<?php
session_start();
$sql = "SELECT * FROM students WHERE studentid= ?";
$verify = "SELECT * FROM students WHERE student = ".$_COOKIE['userid']."";


$server = "#";
$username = "#";
$password = "#";
$db = "#";

$conn = mysqli_connect($server, $username, $password, $db);

$row = mysqli_query($conn, $verify);

if (!($stmt = $stmt = mysqli_prepare($conn,$sql))){
	die();
}

if (!mysqli_stmt_bind_param($stmt, "i", $_COOKIE['userid'])){
	die();
}

if (!mysqli_stmt_execute($stmt)){
	die();
}

$result = mysqli_stmt_get_result($stmt);

if ($_COOKIE['userid'] != $row['studentid']){
	  $i = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$first = $i['firstname'];
		$last = $i['lastname'];
		$student_id = $i['studentid'];
} else {
	header("Location: http://dedic.waukeeapeximd.com/index.php");
	exit();
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Logged In</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

	<style type="text/css">
	@media only screen
	 and (min-device-width : 1280px)
	 and (max-device-width : 1280px)
	 and (orientation : landscape)
	 and (-webkit-min-device-pixel-ratio: 1)  {

		 #Trcenje{
				 margin-bottom:0px;
				 margin-top:50px;
		 }

		 #idnumber{
			 margin-top: 0px;
			 margin-bottom: 25px;
			 padding:20px 20px 20px 20px;
			 font:20pt;
			 text-align: center;
			 text-decoration-color: black;
			 border:solid black 2pt;
			 border-radius: 10px;

		 }

		 body{
			 background:purple;
			 background-size: 100%;
			 height: 100%;
			 width: 100%;
			 overflow: hidden;

}

			.gold{
				 background-color: gold;
				 padding: 10px 20px;
				 border: solid black 2pt;
				 border-radius: 10px;
				 margin-top:100px;
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

		 #upt{
			 margin: 30px 180px;
			 border: solid 5px black;
		 }

		 .blockquote-footer{
			 margin-bottom: 40px;
			 font-size:20px;
		 }

		 .card-header{
			 border-bottom: solid 5px black;
		 }

		 .checkGold{
			 background-color: gold;
			 padding: 20px 40px;
			 border: solid black 2pt;
			 border-radius: 10px;
			 margin-top:20px;
			 margin-bottom:15px;
		 }

		 .Check{
			 margin-bottom: 10px;
		 }
	 }

	 #Trcenje{
			 margin-bottom:0px;
			 margin-top:50px;
	 }

	 #idnumber{
		 margin-top: 0px;
		 margin-bottom: 25px;
		 padding:20px 20px 20px 20px;
		 font:20pt;
		 text-align: center;
		 text-decoration-color: black;
		 border:solid black 2pt;
		 border-radius: 10px;

	 }

	 body{
		 background:purple;
		 background-size: 100%;
		 height: 100%;
		 width: 100%;
		 overflow: hidden;

}

		.gold{
			 background-color: gold;
			 padding: 10px 20px;
			 border: solid black 2pt;
			 border-radius: 10px;
			 margin-top:100px;
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

	 #upt{
		 margin: 30px 180px;
		 border: solid 5px black;
	 }

	 .blockquote-footer{
		 margin-bottom: 40px;
		 font-size:20px;
	 }

	 .card-header{
		 border-bottom: solid 5px black;
	 }

	 .checkGold{
		 background-color: gold;
		 padding: 20px 40px;
		 border: solid black 2pt;
		 border-radius: 10px;
		 margin-top:20px;
		 margin-bottom:15px;
	 }

	 .Check{
		 margin-bottom: 10px;
	 }
	</style>
</head>
<body>
	<center><img id="Trcenje" src="/Img/Trcenje.png"></img></center>
	<div id="upt">
		<div class="card">
		 <center><div class="card-header">
			 <?php
			 	echo $student_id;
			 ?>
		  </div>
		  <div class="card-body">
		    <blockquote class="blockquote mb-0">
		      <?php
					echo "<p>You have sucessfully logged in as ". $first ." ". $last. ".</p>";
		      echo "<footer class=".'blockquote-footer'.">If you are not ".$first." ".$last." then exit immediatly.</footer>";
					?>
					<form action="checkedInFunction.php" method="POST">
					<div class="Check"><center><button class="checkGold" name="checkbtn">Check In</button></center></div>
				</form>
					<div class="exit"><center><a href="index.php" class="gold">Exit</a></center></div>
		    </blockquote>
		  </div> </center>
		</div>
		</div>
</body>
</html>
