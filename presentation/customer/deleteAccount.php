<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php
if($_SESSION["rol"] == "customer"){
    $customer = $_GET["id"];    
    $customerInfo = new Customer();
    $info = $customerInfo->consultAll();
    foreach ($info as $i){
        if ($i -> getId() == $customer){            
            $customerInfo ->deleteAccount($customer);       
        }           
    }
    echo "<script>alert('Account deleted');window.location = 'index.php';</script>";   
}else{
    echo "Sorry. You do not have permissions";
}

