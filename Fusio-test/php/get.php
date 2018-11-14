<?php
require_once("db.php");

$sql="SELECT * FROM profile ORDER BY ID DESC";
$result = mysqli_query($conn,$sql);

while($data = mysqli_fetch_array($result))
{   
    echo "<tr>";
    echo "<td>$data[0]</td>";
    echo "<td>$data[1]</td>";
    echo "<td>$data[2]</td>";
    echo "<td>$data[3]</td>";
    echo "<td>$data[4]</td>";
    echo "<td>$data[5]</td>";
    echo "<td>$data[6]</td>";
    echo "<td>$data[7]</td>";
    echo "<td><img width='50' height='50' src='clients/imgs/$data[8]'/></td>";
    echo "</tr>";
}
?>