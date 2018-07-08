<html>
<head>
<style> 
input[type=submit] {
    width: 25%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
input:required:hover {
  opacity: 1;
}
/*input:required {
  box-shadow: 4px 4px 20px rgba(200, 0, 0, 0.85);
}*/
input[type=text], select,input[type=date] {
    width: 25%;
    padding: 8px 8px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

</style>
</head>
<body background = "https://www.fullsail.edu/resources/wallpaper-file04/MediaIcons_1920x1080.jpg">

<?php
$username = "z1804923";
$password = "1995Mar27";
$dbname = "z1804923";

try{
$dsn = "mysql:host=courses;dbname=z1804923"; 
$pdo = new PDO($dsn,$username,$password);
}
catch(PDOexception $e)
{
die ('Could not connect!'.mysql_error());
}
echo "<h2 align = 'center'>Assignment 10</h2>";
echo "<i><p align = 'right'; color = 'red' >* field required</p></i>";
echo "<h3 align = 'right'><a href='Assign9.php' target='_blank'>[+ Assignment 9]</a></h3>";
$sql = "INSERT INTO flight (flightnum, origination, destination, miles) VALUES (?,?,?,?);";
$stmt = $pdo->prepare($sql);

/******************************************Insert Flight Info*************************************************/

echo "<form method = 'get'; action = 'Addflight.php' >";
echo "<fieldset>";
echo "<legend><h3>Flight info</h3></legend>";
echo "<b>Origination:</b><br>";
echo "<input type = 'text' name = 'origination' placeholder= 'origination..' required='required'>*<br><br>";
echo "<b>Destination:</b><br>";
echo "<input type = 'text' name = 'destination' placeholder= 'destination..' required='required'>*<br><br>";
echo "<b>Miles:</b><br>";
echo "<input type = 'text' name = 'miles'><br>";
echo "<input type = 'Submit' name = 'Submit'>";
echo "</fieldset>";
echo "<br>";
echo "</form>";

/******************************************Insert Passenger Info***********************************************/

echo "<fieldset>";
echo "<legend><b>Passenger Info</b></legend>";
echo "<form method = 'get'; action = 'Addpassenger.php' >";
echo "<b>Last Name:</b><br>";
echo "<input type = 'text' name = 'lastname' placeholder= 'your last name..'required='required'>*<br><br>";
echo "<b>First Name:</b><br>";
echo "<input type = 'text' name = 'firstname' placeholder= 'your first name..'required='required'>*<br><br>";
echo "<input type = 'Submit' name = 'Submit'>";
echo "</fieldset>";
echo "</form>";

/******************************************Insert Manifest Info***********************************************/

echo "<fieldset>";
echo "<legend><b>Manifest Info</b></legend>";
echo "<form action = 'Manifest.php' method = 'post'>";
//echo "<form action = 'manifest.php' method = 'get'>";
echo "<b>Flight:<br></b>";
$sql = "SELECT flightnum,origination,destination from flight;";
$result = $pdo->query($sql);
if($result -> rowCount()>0)
{
echo "<select name = 'flightnum'>";
while($row = $result->fetch())
{
echo "<option value='".$row['flightnum'] ."'>".$row['flightnum'].".".$row['origination']."-".$row[destination]."</option>";
}
echo "</select>";
echo "<br>";
}
/************/
echo "<b>Date:</b><br>";
echo "<input type='date' name='flightDate'required='required'>*<br>";

/************/

echo "<b>Passengers:<br></b>";
$sql = "SELECT passnum,lastname, firstname from passenger";
$result = $pdo->query($sql);
if($result -> rowCount()>0)
{
echo "<select name = 'passnum'>";
while($row = $result->fetch())
{
echo "<option value='".$row['passnum'] ."'>".$row['passnum'].".".$row['firstname']." ".$row['lastname']."</option>";
}
echo "</select><br>";
}
/************/
echo "<b>SeatNum:</b><br>";
echo "<input type='text' name='seatnum'><br>";
echo "<input type = 'Submit' name = 'Submit'>";
echo "</form>";

echo "</fieldset>";

/******************************Delete a Flight(Extra Credit)**********************************/

echo "<b><p align = 'center' >Select a flight to be deleted:</p></b>";
$sql = "SELECT flightnum,origination,destination from flight;";
$result = $pdo->query($sql);
echo "<b><p align = 'center'>Flight Num:</p></b>";
echo "<form method = 'get' action = 'delete.php' align = 'center' >";
if($result -> rowCount()>0)
{
echo "<select name = 'flightnum'>";
while($row = $result->fetch())
{
echo "<option value='".$row['flightnum'] ."'>".$row['flightnum'].".".$row['origination']."-".$row[destination]."</option>";
}
echo "</select><br>";
echo "<input type = 'Submit' name = 'Submit'>";
}
echo "</form>";

?>
</body>
</html>
