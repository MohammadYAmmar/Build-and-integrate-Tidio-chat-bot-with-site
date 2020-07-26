<?php 
////Define the required variables for the local database
$servername = "localhost";
$username = "root";
$password = "";
$db = "Direct_the_robot";


// check connection
$conn = mysqli_connect($servername, $username, $password,$db);

// check connection
	if(!$conn){
		echo 'Connection error: '. mysqli_connect_error();
	}

if (isset($_POST['save'])) {
						$forwards = mysqli_real_escape_string($conn, $_POST['Forwards']);
						$right = mysqli_real_escape_string($conn, $_POST['Right']);
						$left = mysqli_real_escape_string($conn, $_POST['Left']);
						$Transition_process = mysqli_real_escape_string($conn, $_POST['Transition_process']);

				$sql = "INSERT INTO `directions` (`Time`, `Forwards`, `Right`, `Left`, `Transition_process`) 
				VALUES (current_timestamp(), '$forwards','$right', '$left' , '$Transition_process')";
				
				if(mysqli_query($conn, $sql)){
							// success
						} else {
							echo 'query error: '. mysqli_error($conn);
						}
						mysqli_close($conn);
	}
 ?>


<!DOCTYPE html>
<meta charset="UTF-8">
<html>

<!-- to link chatbot Tidio ! -->
<script src="//code.tidio.co/cqdokz1pj7fgsfwapbikevklepyo9k2f.js" async></script>

<head>
    <title>Mohammad Y A IoT Control</title>
    <main>Robots control panel with directions, mapping animation</main>

<link rel="stylesheet" href="styles_map_UI.css"> <!-- to link css -->
</head>

<body>
    <div class="container">
	<form  action="index.php" method="POST">
							<label>Transition process: </label>
							<input type="text" name="Transition process" class="Transition_process" placeholder="first letter, such as R: right" ><br>
							<label>Forwards steps:</label>
							<input type="text" name="Forwards" class = "Forwards inputF"><br>
							<label>Right steps:</label>
							<input type="text" name="Right" class = "Right inputR"><br>
							<label>Left steps:</label>
							<input type="text" name="Left" class = "Left inputL"><br>
							<input type="submit" name="save" value="save in database" id="save">
							<input type="submit" name="start" value="start" id="start" >
					</form>

					</div>
		<div class="Drawing">		
				<button class="buttonD">Draw the direction</button>
		</div>
		

			  <?php  	
			  if(isset($_POST['start'])){
							$sql = 'SELECT * FROM `directions`';

							// get the result set (set of rows)
							$result = mysqli_query($conn, $sql);

							// fetch the resulting rows as an array
							$directions = mysqli_fetch_all($result, MYSQLI_ASSOC);				
			  ?>

				<!-- Table to show from Database -->
			  <table style="width:100%" >
		  <tr>
		    <th>Time</th>
		    <th>Forwards</th>
		    <th>Right</th>
		    <th>Left</th>
		    <th>Transition Process</th>
		  </tr>
		  <tr>
		    <td><?php echo  $directions[count($directions)-1]['Time']; ?></td>
		    <td><?php echo  $directions[count($directions)-1]['Forwards']; ?></td>
		    <td><?php echo  $directions[count($directions)-1]['Right']; ?></td>
		    <td><?php echo  $directions[count($directions)-1]['Left']; ?></td>
		    <td><?php echo  $directions[count($directions)-1]['Transition_process']; ?></td>
		  </tr>
		  <?php mysqli_free_result($result);
			mysqli_close($conn); }//end $_POST['start']
			?>
			  </table>
			  
			  	<!-- to contral by JS -->

		 <canvas id="c" width="500" height="500"></canvas>

		<script type="text/javascript" src="dynamic.js"></script>
</body>
</html>