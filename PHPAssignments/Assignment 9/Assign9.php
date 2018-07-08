<html>
<body background="http://www.dipatravels.com/images/Aircraft%20Wallpaper%2C%20flight%2C%20sky%2C%20altitude.jpg" >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!--
CSCI 466/566 - Assignment 9
Semester (Spring) 2016
File:           Assign9.php
Author:         Pruthvi Sambu
Zid:            z1804923
Section:        0003
Instructor:     Jon Lehuta
TA:             Koushik Gudla
TA:             Vishal Panguru
Date Due:       Friday, April 14, 2017

-->
</head>
<style>
table {
    border-collapse: collapse;
    width: 37%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 5px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
input[type=submit] {
    width=15%;
    background-color: #4CAF50;
    color: white;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    padding : 5px 5px;
}
input[type=submit]:hover {
    background-color: #45a049;
}
input[type=text], select {
    width: 25%;
    padding: 5px 5px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
</style>

<?php
$username = "z1804923";
$password = "1995Mar27";
$database = "z1804923";
/****************************  PHP Connection  *********************************/
try
{
$dsn = "mysql:host=courses;dbname=z1804923";
$pdo = new PDO($dsn,$username,$password);
}

catch(PDOexception $e)
{
echo "Failed:";
}
/************************** Assignment7 PHP Page   *************************************/
//echo "<img src='https://www.w3schools.com/images/w3schools_green.jpg" alt="W3Schools.com height'>";
echo "<h2 align = 'center';><u>Assignment 9</u></h2>";
echo "<b>Below are the names of the passengers:</b><br>";
echo "<br>";
$sql = "SELECT lastname, firstname FROM passenger ORDER BY  lastname ASC;";
$result = $pdo->query($sql);

if ($result -> rowCount() > 0){
echo "<table border = '1' class = 'table'>";
echo "<tr>";
echo "<th>Last name</th>";
echo "<th>First name</th>";
echo "</tr>";
while($row = $result->fetch()){
echo "<tr>";
echo "<td>".$row['lastname']."</td>";
echo "<td>".$row['firstname']."</td>";
echo "</tr>";
}
echo "</table>";
}
else{
	echo "0 results found";
}
echo "<hr>";
/*****************************Drop down box to check the names of passengers who booked the selected flight******************************************/
echo "<b>Select a Flight Number to know the passenger list:<br><br>  </b>";
echo "<form action = 'Passenger_get.php' method = 'get'>";
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
echo "<input type = 'submit'>";
echo "</form>";
}

/****************************Drop down box to check the names of the flights the passenger has booked******************************************************/
echo "<hr>";
echo "<b>Select a Passenger Name to get the Flight details:<br><br>  </b>";
echo "<form action = 'Flight_get.php' method = 'get'>";
$sql = "SELECT passnum,lastname, firstname from passenger";
$result = $pdo->query($sql);
if($result -> rowCount()>0)
{
echo "<select name = 'people'>";
while($row = $result->fetch())
{
echo "<option value='".$row['passnum'] ."'>".$row['passnum'].".".$row['firstname']." ".$row['lastname']."</option>";
}
echo "</select>";
echo "<input type = 'submit'>";
echo "</form>";
echo "<hr>";
}

/****************************************** Extra Credit **************************************************/

echo "<b>Below are the Flight Details of passengers:</b><br>";
echo "<br>";
$sql = " SELECT passenger.passnum,firstName,flightDate,origination,destination,seatnum FROM passenger,manifest,flight WHERE passenger.passnum = manifest.passnum AND manifest.flightnum = flight.flightnum;";
$result = $pdo->query($sql);

if ($result -> rowCount() > 0){
echo "<table border = '1'; class = 'table'>";
echo "<tr>";
echo "<th>Pass Num</th>";
echo "<th>First Name</th>";
echo "<th>Flight Date</th>";
echo "<th>Origination</th>";
echo "<th>Destination</th>";
echo "<th>Seat Num</th>";
echo "</tr>";
while($row = $result->fetch()){
echo "<tr>";
echo "<td>".$row['passnum']."</td>";
echo "<td>".$row['firstName']."</td>";
echo "<td>".$row['flightDate']."</td>";
echo "<td>".$row['origination']."</td>";
echo "<td>".$row['destination']."</td>";
echo "<td>".$row['seatnum']."</td>";

echo "</tr>";
}
echo "</table>";
}
else{
        echo "0 results found";
}


/************************************test file**********************************************
echo "<b>Enter the Flight Num to get the Passenger details:</b><br>";
echo "<br>";
echo "<form action='Passenger_get.php' method='get'>";
echo "Flight Number : <input type = 'text' name = 'Number'>";
echo " ";
echo "<input type = 'submit'>";
echo "</form>";*/

?>
</body>
</html>

