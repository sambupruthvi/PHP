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
$sql = "INSERT INTO manifest (flightnum, flightDate, passnum, seatnum) VALUES (?,?,?,?);";
$stmt = $pdo->prepare($sql);
$add = $stmt->execute(array($_GET['flightnum'],$_GET['flightDate'],$_GET['passnum'],$_GET['seatnum']));
echo "<b><i>A Flight Manifest has been added:</i><b>";
echo "<br><br>";
$sql = "SELECT flightnum,flightDate,passnum,seatnum FROM manifest;";
$result = $pdo->query($sql);
if ($result -> rowCount() > 0)
{
echo "<table border = '1'><tr>";
echo "<th>Flight Num</th>";
echo "<th>Flight Date</th>";
echo "<th>Passenger Num</th>";
echo "<th>Seat Num</th>";
echo "</tr>";
while($row = $result->fetch())
{
echo "<tr>";
echo "<td>".$row['flightnum']."</td>";
echo "<td>".$row['flightDate']."</td>";
echo "<td>".$row['passnum']."</td>";
echo "<td>".$row['seatnum']."</td>";
echo "</tr>";
}
echo "</table>";
}
?>

</body>
</html>

