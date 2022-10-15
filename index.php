<?php
session_start();
require "logic/Customer.php";
require "persistence/Connection.php";
$pagNoSession = array(
    "presentation/register.php",
    "presentation/recoverPassword.php",
    "presentation/authenticate.php",
    "presentation/sendMail.php",
    "presentation/passwordChange.php"
);

if (isset($_GET["sesion"]) && $_GET["sesion"] == 0) {
    $_SESSION["id"] = null;
}
$pid = null;
if (isset($_GET["pid"])) {
    $pid = base64_decode($_GET["pid"]);
}
?>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.1/css/all.css" />
        <link href="https://bootswatch.com/4/minty/bootstrap.css" rel="stylesheet" />	
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <title text-center>Basic Excersice</title>
    </head>
    <body background="img/background.jpg">
        <?php 
            if (isset($pid)) {
                if (isset($_SESSION["id"])) {
                    if($_SESSION["rol"] == "customer"){
                        include "presentation/customerMenu.php";
                    }
                    include $pid;
                }else if (in_array($pid, $pagNoSession)) {
                    include $pid;
                } else {
                    header("Location: index.php");
                }
            } else {
                include "presentation/home.php";
            }
        ?>
    </body>
</html>
