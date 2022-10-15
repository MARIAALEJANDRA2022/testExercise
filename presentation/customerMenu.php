<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php
$customer = new Customer($_SESSION["id"]);
$customer ->consult();
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php?pid=<?php echo base64_encode("presentation/customerSession.php")?>"><i class="fas fa-home"></i></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Customer: <?php echo $customer -> getName() . " " . $customer -> getLastname(); ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">        
                    <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentation/customer/editCustomer.php")."&id=".$_SESSION["id"]?>">Edit profile</a>
                    <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentation/customer/deleteAccount.php") . "&id=".$_SESSION["id"]?>" data-toggle="tooltip" data-placement="bottom" title="Delete account" onclick="return ConfirmDelete()">Delete account</a>
                    <a class="dropdown-item" href="index.php?sesion=0">Log out</a>
                </div>
            </li>
        </ul>	
    </div>
</nav>
<script>
    function ConfirmDelete(){
            var answer = confirm("Do you agree to delete the account?");
            if (answer == true){
                return true;
            }else{
                return false;
            }
        }
</script>