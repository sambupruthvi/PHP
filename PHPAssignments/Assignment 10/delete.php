<html>
<head>
<style>
table {
    border-collapse: collapse;
    width: 50%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #4CAF50;
    color: white;
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
//$sql = "INSERT INTO manifest (flightnum, flightDate, passnum, seatnum) VALUES ('$_POST[flightnum]','$_POST[flightDate]','$_POST[passnum]','$_POST[seatnum]');";
$sql = "DELETE FROM manifest WHERE flightnum = ?;";
$sql2 = "DELETE FROM flight WHERE flightnum = ?;";
$stmt = $pdo->prepare($sql);
$stmt2 = $pdo->prepare($sql2);
$add = $stmt->execute(array($_GET['flightnum']));
$add2 = $stmt2->execute(array($_GET['flightnum']));
//$row = $stmt->fetch();
echo "<b><i>A Flight has been deleted:</i><b>";
echo "<br><br>";
$sql = "SELECT * FROM flight;";
$result = $pdo->query($sql);
//if (empty($add))
//{
//echo "hello";
//}
echo "Deleted!!";
if ($result -> rowCount() > 0)
{
echo "<table border = '1'><tr>";
echo "<th>Flight Num</th>";
echo "<th>Origination</th>";
echo "<th>Destination</th>";
echo "<th>Miles</th>";
echo "</tr>";
while($row = $result->fetch())
//print_r($row);
{
echo "<tr>";
echo "<td>".$row['flightnum']."</td>";
echo "<td>".$row['origination']."</td>";
echo "<td>".$row['destination']."</td>";
echo "<td>".$row['miles']."</td>";
echo "</tr>";
}
echo "</table>";
}
?>

</body>
</html>

