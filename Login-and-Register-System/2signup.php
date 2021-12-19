<?php
 //we need session for the log in thingy XD 
 
    include("functions.php");
    include('session.php');
    $m=$_SESSION['email'];
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


  </head>
    <?php
        if(isset($_POST['submit'])){
            $sellername = $_POST['sellername'];
            $buyername = $_POST['buyername'];
            $type = $_POST['type'];
            $amount = $_POST['amount'];

            $message = "$sellername would like to get an invoice discount for $buyername Order";     
            $query = "INSERT INTO `requests` (`sellername`, `buyername`, `type`, `amount`, `message`, `date`,`bank`,`id`) VALUES ";
            
            if(isset($_POST['axis']))
            {
              $bank="axis";
              $id=$m." ".$sellername." ".$bank;
              $query.="('$sellername', '$buyername', '$type', '$amount', '$message', CURRENT_TIMESTAMP,'$bank','$id'),";
            }
            if(isset($_POST['hdfc']))
            {
              $bank="hdfc";
              $id=$m." ".$sellername." ".$bank;
              $query.="('$sellername', '$buyername', '$type', '$amount', '$message', CURRENT_TIMESTAMP,'$bank','$id'),";
            }
            if(isset($_POST['tvs']))
            {
              $bank="tvs";
              $id=$m." ".$sellername." ".$bank;
              $query.="('$sellername', '$buyername', '$type', '$amount', '$message', CURRENT_TIMESTAMP,'$bank','$id'),";
            }
            $query=substr($query, 0, -1);
            if(performQuery($query)){
                echo "<script>alert('Your account request is now pending for approval. Please wait for confirmation. Thank you.')</script>";
            }else{
                echo "<script>alert('No banks Selected. or request already applied')</script>";
            }
        }
  
   
    ?>
 
  <body class="text-center">
      <div class="container">
            <form method="post" class="form-signin">
              <img class="mb-4" src="./img/apply.jpg" alt="" width="172" height="172">
              <h1 class="h3 mb-3 font-weight-normal">Invoice Discount</h1>
              <label for="inputEmail" class="sr-only">Sellername</label>
              <input name="sellername" type="text" id="inputEmail" class="form-control" placeholder="Sellername" required autofocus>
                <label for="inputEmail" class="sr-only">Buyer name</label>
              <input name="buyername" type="text" id="inputEmail" class="form-control" placeholder="Buyername" required autofocus>
                <label for="inputEmail" class="sr-only">Type</label>
              <input name="type" type="text" id="inputEmail" class="form-control" placeholder="Type" required autofocus>
              <label for="inputPassword" class="sr-only">Amount</label>
              <input name="amount" type="number" id="inputEmail" class="form-control" placeholder="Amount" required>
              <h2>Apply to:</h2>
              <input type="Checkbox" name="axis" value="yes">AXIS
<input type="Checkbox" name="hdfc" value="yes">HDFC
<input type="Checkbox" name="tvs" value="yes">TVS
              <button name="submit" class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>


              <a href="index.php" class="mt-5 mb-3 text-muted">Go back to home page</a>
            </form>
          </div>
      
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
