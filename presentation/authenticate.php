<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php
$mail = filter_input(INPUT_POST, 'mail');
$password = filter_input(INPUT_POST, 'password');

$customer = new Customer("", "", "", "", $mail, $password);
if($customer -> authenticate()){
    $_SESSION["id"] = $customer -> getId();
    $_SESSION["rol"] = "customer";
    header("Location: index.php?pid=" . base64_encode("presentation/customerSession.php"));
}else{
    header("Location: index.php?error=1");
}