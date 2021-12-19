<?php
include('session.php');
$_SESSION['pageStore'] = "index.php";

if(!isset($_SESSION['login_id'])){
header("location: login.php"); // Redirecting To login
}
/*echo '<div style="font-size: 35px;">
<strong>Hello  </strong>
<b>'
. $session_fullName
. '<b>
<a href="logout.php">Logout</a>
</div>'; */
?>
<!DOCTYPE html>
<html>

<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>

<body>

    <header class="site-header clearfix">
        <nav>
            <div class="logo">
                <img style="padding: 15px; margin-left: 20px; margin-top: 10px;" src="./img/img1.png" height=" 78 " width="140 ">
            </div>
            <div class="menu">
                <ul>
                    <li style="justify:left;"> hello  <?php echo"$session_fullName "?></li>
                    <li><a href="status.php">Check status</a><li>
                    <li>Services</li>
                    <li>ContactUs</li>
                    <li><a href="logout.php">Logout</a><li>
                </ul>
            </div>
        </nav>
        <section>
            <div class="leftside ">
                <img style="padding: 15px; margin-left: 30px; " src="./img/invoice.png">
            </div>
            <div class="rightside ">
                <h1>INVOICE DISCOUNTING</h1>
                <p> APPLY </p>
                <form action="./2signup.php">
                    <button type="submit">Welcome</button>
                </form>
            </div>

        </section>

    </header>


</body>

</html>