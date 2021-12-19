<?php
 //we need session for the log in thingy XD 
 
    include("functions.php");
    include('session.php');
   /* echo "<pre> ";
print_r($_SESSION);
echo"<pre>"; */
?>
<!DOCTYPE html>
<html>
<head>
<title>Table with database</title>
<style>
table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;
font-size: 25px;
text-align: left;
}
th {
background-color: #588c7e;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
</head>
<body>
<table>
<tr>
<th>Buyer</th>
<th>Seller</th>
<th>Amount</th>
<th>Date</th>
</tr>   
<?php

$m=$_SESSION['name'];
$query= "SELECT buyername,sellername,amount,date from accepted where bank='$m'";
if(count(fetchAll($query))>0){
    foreach(fetchAll($query) as $row){
// output data of each row
echo "<tr><td>" . $row["buyername"]. "</td><td>" . $row["sellername"] . "</td><td>"
. $row["amount"]. "</td> <td>" . $row["date"]. "</td> </tr>";
}
echo "</table>";
} else { echo "0 results"; }

?>

</table>
<a href="2home.php" style="text-align: center;">Go back to home page</a>
</body>
</html>
