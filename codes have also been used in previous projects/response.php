<!DOCTYPE html>
<meta charset="UTF-8">
<html>
<title>response of IoT Control</title>
    <main>Response control panel for Robots</main>
<head>
<link rel="stylesheet" href="styles.css"> <!-- to link css -->

<html>

<?php
$homepage = file_get_contents('./index.php', true);

//Define the required variables for the local database
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
 echo "Connected successfully, the response is :      ";
 echo "\r\n";


 // write query for all pizzas
 $sql_ui_control = 'SELECT * FROM `robot_control_commands`';

 // get the result set (set of rows)
 $result = mysqli_query($conn, $sql_ui_control);

 // fetch the resulting rows as an array
 $direction_commands = mysqli_fetch_all($result, MYSQLI_ASSOC);

//Print the last value found in the local database
      echo $direction_commands[count($direction_commands)-1]['Forwards'];
      echo $direction_commands[count($direction_commands)-1]['Backwards'];
      echo $direction_commands[count($direction_commands)-1]['Right'];
      echo $direction_commands[count($direction_commands)-1]['Left'];
      echo $direction_commands[count($direction_commands)-1]['STOP'];
    
 
 // free the $result from memory (Good Practise)
 mysqli_free_result($result);

 // close connection
 mysqli_close($conn);
?>




