<?php
    include('functions.php');
    $id = $_GET['id'];
    
    $query="update requests set status='Rejected' where `id`='$id';";
        if(performQuery($query)){
            echo "<script>alert('Request Rejected')</script>";
        }else{
            echo "Unknown error occured. Please try again.";
        }

?>
<br/><br/>
<a href="2home.php">Back</a>