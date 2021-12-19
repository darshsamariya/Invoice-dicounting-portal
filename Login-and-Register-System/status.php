
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
<th>Amount</th>
<th>Status</th>
<th>Bank</th>
</tr>   
<?php

$m=$_SESSION['email'];
$query= "SELECT buyername,amount,status,bank from requests where id LIKE '$m%'";
if(count(fetchAll($query))>0){
    foreach(fetchAll($query) as $row){
// output data of each row
echo "<tr><td>" . $row["buyername"]. "</td><td>" . $row["amount"] . "</td><td>"
. $row["status"]. "</td> <td>" . $row["bank"]. "</td> </tr>";
}
echo "</table>";
} else { echo "0 results"; }

?>

</table>
<a href="index.php" style="text-align: center;">Go back to home page</a>
</body>
</html>

 