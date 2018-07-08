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
$sql = "INSERT INTO passenger (lastname,firstname) VALUES (?,?);";
$stmt = $pdo->prepare($sql);
$add = $stmt->execute(array($_GET['lastname'],$_GET['firstname']));
//$row = $stmt->fetch();
echo "<h3><i>A Passenger Info has been added:</i><h3>";
//echo "<br><br>";
echo "<b>Table showing the Passenger Info</b>";
$sql = "select passnum,lastname,firstname from passenger;";
$result = $pdo->query($sql);

if ($result -> rowCount() > 0)
{
echo "<table border = '1'><tr>";
echo "<th>Passenger Num</th>";
echo "<th>Last Name</th>";
echo "<th>First Name</th>";
//echo "<th>Miles</th>";
echo "</tr>";
while($row = $result->fetch())
//print_r($row);
{
echo "<tr>";
echo "<td>".$row['passnum']."</td>";
echo "<td>".$row['lastname']."</td>";
echo "<td>".$row['firstname']."</td>";
//echo "<td>".$row['miles']."</td>";
echo "</tr>";
}
echo "</table>";
}
?>

</body>
</html>


