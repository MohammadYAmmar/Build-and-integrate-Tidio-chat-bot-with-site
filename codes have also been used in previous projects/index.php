<!-- UI control panel to IoT for Robots with PHP and my SQL | Integrated with chat bot Tidio -->
<!-- Project when intren in Smart methods  -->

<?php
//include 'response.php';

////Define the required variables for the local database
$servername = "localhost";
$username = "root";
$password = "";
$db = "ui_control_panel_robots";

//server name, user name , password , database
$conn = mysqli_connect($servername, $username, $password,$db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
 }
 echo "Connected successfully, the response      ";

 

 //to response page and store data in mySQL

 	//Forwards
 	if (isset($_POST['Forwards-submit'])) { //Forwards-submit it is (name) in input
	$sql = "INSERT INTO robot_control_commands(`Forwards`, `Left`, `STOP`, `Right`, `Backwards`)
	VALUES  ('F', '', '', '', '')";

	if ($conn->query($sql) === TRUE) {
  	echo "New record created successfully";
	} else {
  	echo "Error: " . $sql . "<br>" . $conn->error;
	}
	}

	//Backwards
	if (isset($_POST['Backwards-submit'])) {
	$sql = "INSERT INTO `robot_control_commands` (`Forwards`, `Left`, `STOP`, `Right`, `Backwards`) 
	VALUES ('', '', '', '', 'B');";
	
	if ($conn->query($sql) === TRUE) {
	  echo "New record created successfully";
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
	}

	//Right
	if (isset($_POST['Right-submit'])) {
	$sql = "INSERT INTO `robot_control_commands` (`Forwards`, `Left`, `STOP`, `Right`, `Backwards`) 
	VALUES ('', '', '', 'R', '');";
	
	if ($conn->query($sql) === TRUE) {
	  echo "New record created successfully";
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}	
	$conn->close();
	}

	//Left
	if (isset($_POST['Left-submit'])) {
	$sql = "INSERT INTO `robot_control_commands` (`Forwards`, `Left`, `STOP`, `Right`, `Backwards`) 
	VALUES ('', 'L', '', '', '');";
	
	if ($conn->query($sql) === TRUE) {
	  echo "New record created successfully";
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
		}

    //STOP
	if (isset($_POST['STOP-submit'])) {
	$sql = "INSERT INTO `robot_control_commands` (`Forwards`, `Left`, `STOP`, `Right`, `Backwards`) 
	VALUES ('', '', 'S', '', '');";
	
	if ($conn->query($sql) === TRUE) {
	  echo "New record created successfully";
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	$conn->close();
	}
	
?>

<!DOCTYPE html>
<meta charset="UTF-8">
<html>

<!-- to link chatbot Tidio ! -->
<script src="//code.tidio.co/cqdokz1pj7fgsfwapbikevklepyo9k2f.js" async></script>

<head>
    <title>Mohammad Y A IoT Control</title>
    <main>control panel for Robots</main>

<link rel="stylesheet" href="styles.css"> <!-- to link css -->

</head>

<body>
    <div class="container">
<form action="" method="post">
<input type="hidden" name="action" value="submit" />

<h1>

	<input id="Forwards" type="submit" name="Forwards-submit" value="Forwards"
	<button class="button_normal" type="button" id = "Forwards"
    input type="submit">
</button>
</h1>

<h2>

<input id="Left" type="submit" name="Left-submit" value="Left"
	<button class="button_normal" type="button" id = "Left"
    input type="submit">
</button>


<input id="STOP" type="submit" name="STOP-submit" value="STOP"
	<button class="button_red" type="button" id = "STOP"
    input type="submit">
</button>


<input id="Right" type="submit" name="Right-submit" value="Right"
	<button class="button_normal" type="button" id = "Right"
    input type="submit">
</button>

</h2>

<h3>
<input id="Backwards" type="submit" name="Backwards-submit" value="Backwards"
	<button class="button_normal" type="button" id = "Backwards"
    input type="submit">
</button>

</h3>

</form>

</div>

</body>

</html>