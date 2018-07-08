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
$sql = "INSERT INTO flight (origination, destination, miles) VALUES (?,?,?);";
$stmt = $pdo->prepare($sql);
$add = $stmt->execute(array($_GET['origination'],$_GET['destination'],$_GET['miles']));
echo "<h3><i>A Flight Info has been added:</i><h3>";
//echo "<br><br>";
echo "<b>Table showing the Flight info</b> ";
$sql = "select flightnum,origination,destination,miles from flight;";
$result = $pdo->query($sql);
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
