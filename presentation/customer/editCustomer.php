<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php
if($_SESSION["rol"] == "customer"){
    $edited = false;    
    if(isset($_POST["edit"])){
        $exit = 0;
        $customer = new Customer($_GET["id"]);
        $customer -> consult();
        if(filter_input(INPUT_POST, 'password') == $customer ->getPassword()){
            $exit = 0;
            if (filter_input(INPUT_POST, 'mail') == $customer -> getMail()){
                $exit = 0;
                $customer = new Customer($_GET["id"], filter_input(INPUT_POST, 'name'), 
                        filter_input(INPUT_POST, 'last_name'), filter_input(INPUT_POST, 'city'), 
                        filter_input(INPUT_POST, 'mail'), filter_input(INPUT_POST, 'password'));
                $customer -> edit();
                $edited = true;
            }else{
                $exit = 1;
                $customer = new Customer($_GET["id"], filter_input(INPUT_POST, 'name'), 
                        filter_input(INPUT_POST, 'last_name'), filter_input(INPUT_POST, 'city'), 
                        filter_input(INPUT_POST, 'mail'), filter_input(INPUT_POST, 'password'));
                $customer -> edit();
                $edited = true;
            }
        }else{
            $exit = 1;
            $customer = new Customer($_GET["id"], filter_input(INPUT_POST, 'name'), 
                        filter_input(INPUT_POST, 'last_name'), filter_input(INPUT_POST, 'city'), 
                        filter_input(INPUT_POST, 'mail'), md5(filter_input(INPUT_POST, 'password')));
            $customer -> edit();

        }
    }else{
        $customer = new Customer($_GET["id"]);
        $customer -> consult();
    }
    ?>
    <div class="container">
    	<div class="row mt-3">
            <div class="col-3"></div>
    		<div class="col-6">
                    <div class="card">
        		<div class="card-header">
                            <h3>Edit Customer</h3>
    			</div>
    			<div class="card-body">
                            <?php if ($edited && $exit==1) { ?>    											
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <?php 
                    			echo "Edited data";
                			session_destroy();
                                        echo "<script>setTimeout(\"location.href = 'index.php';\",1500);</script>";                						
                                    ?>
            			</div>
                            <?php }elseif($edited && $exit==0){ ?>
    				<div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <?php 
                    			echo "Edited data";
                                        echo "<script>setTimeout(\"location.href = 'index.php?pid=" . base64_encode("presentation/customerSession.php") . "';\",1500);</script>";                						
                                    ?>
            			</div>
                            <?php }?>
                            <form
    				action="<?php echo "index.php?pid=" . base64_encode("presentation/customer/editCustomer.php") . "&id=" . $_GET["id"] ?>"
    				method="post">
                                    <div class="form-group">
    					<input type="text" name="name" class="form-control" placeholder="Name" 
                                               value="<?php echo $customer -> getName() ?>" required="required">
                                    </div>
                                    <div class="form-group">
    					<input type="text" name="last_name" class="form-control" placeholder="Last name" 
                                               value="<?php echo $customer ->getLastname() ?>" required="required">
                                    </div>
                                    <div class="form-group">
    					<input type="text" name="city" class="form-control" placeholder="City" 
                                               value="<?php echo $customer ->getCity() ?>" required="required">
                                    </div>	
                                    <div class="form-group">
    					<input type="text" name="mail" class="form-control" placeholder="Mail" 
                                               value="<?php echo $customer -> getMail() ?>" required="required">
                                    </div>	
                                    <div class="form-group">
    					<input type="password" name="password" class="form-control" placeholder="Password" 
                                               value="<?php echo $customer ->getPassword() ?>" required="required">
                                    </div>							
                                    <div class="form-group">
    					<button type="submit" name="edit" class="btn btn-primary">Edit</button>
                                    </div>
                            </form>
    			</div>
                    </div>
    		</div>
    	</div>
    </div>
<?php 
} else {
    echo "Sorry. You do not have permissions";
}