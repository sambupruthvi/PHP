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

</style>
<?php
$username = "z1804923";
$password = "1995Mar27";
$database = "z1804923";

try
{
$dsn = "mysql:host=courses;dbname=z1804923";
$pdo = new PDO($dsn,$username,$password);
}

catch(PDOexception $e)
{
echo "Failed:";
}

echo "<b>Names of the Flights booked the Passengers:</b><br>";
echo "<br>";
$num = $_GET['flightnum'];
$sql = "SELECT flightnum FROM manifest,passenger WHERE passenger.passnum = manifest.passnum AND passenger.passnum = ? ;";

$prepared = $pdo->prepare($sql);
$result = $prepared->execute((array($_GET["people"])));
//$row = $prepared->fetch();
//echo "$row";
if($prepared->rowCount() !=NULL){
echo "<table border = '1'; class = 'table'>";
echo "<tr>";
echo "<th>Flight Num</th>";
echo "</tr>";
while(($row = $prepared->fetch())){
//echo "<table border = '1'; class = 'table'>";
echo "<tr>";
echo "<td>".$row['flightnum']."</td>";
echo "</tr>";
//echo "Booked flight:".$row['flightnum'];
}
echo "</table>";
}

else{
        echo "<b>Sorry! No Flights Booked.</b>";
}

?>
</body>
</html>

