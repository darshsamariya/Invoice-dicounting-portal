<?php
    include('functions.php');
    $id = $_GET['id'];
    $query = "select * from `requests` where `id` = '$id'; ";
    if(count(fetchAll($query)) > 0){
        foreach(fetchAll($query) as $row){
            $sellername = $row['sellername'];
            $buyername = $row['buyername'];
            $type = $row['type'];
            $amount = $row['amount'];
            $bank=$row['bank'];
            $message = "$bank bank accepted your invoice discounting application";
            $query = "INSERT INTO `accepted` (`sellername`, `buyername`, `type`, `amount`, `message`, `date`,`bank`) values ('$sellername', '$buyername', '$type', '$amount', '$message', CURRENT_TIMESTAMP,'$bank')";

        }
        $q2= "update requests set status='Accepted' WHERE `id`='$id';";
        $q3="update requests set status='Rejected' where `buyername`='$buyername' and `sellername`='$sellername';";
        if(performQuery($query) and performQuery($q3) and performQuery($q2)){
            echo "<script>alert('Your Account has been accepted')</script>";
        }else{
            echo "<script>alert('Invoice already discounted')</script>";
        }
    }else{
        echo "Error occured.";
    }
?>
<br/><br/>
<a href="2home.php">Back</a>