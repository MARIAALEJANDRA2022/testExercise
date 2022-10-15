<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php     
    $created = false;
    if(isset($_POST["register"])){
        $customer_exists = new Customer();        
        if (filter_input(INPUT_POST, 'id') == $customer_exists ->consult_exists(filter_input(INPUT_POST, 'id'))){
            echo "<script>alert('The entered id is already registered');</script>";
            $created = false;
        }else{
            $customer = new Customer (filter_input(INPUT_POST, 'id'),filter_input(INPUT_POST, 'name'),
                    filter_input(INPUT_POST, 'last_name'),filter_input(INPUT_POST, 'city'), 
                    filter_input(INPUT_POST, 'mail'),filter_input(INPUT_POST, 'password'));
            $customer -> create();
            $created = true;
        }
    }
?>
<div class="container">
    <div class="row mt-3">
    	<div class="col-3"></div>
       	<div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h3>Customer Registration</h3>
    		</div>
    		<div class="card-body">
                    <?php if ($created) { ?>						
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?php 
    				echo "Data entered"; 
    				echo "<script>setTimeout(\"location.href = 'index.php';\",1500);</script>";
                            ?>
    			</div>
                    <?php } ?>
                    <form
                        action=<?php echo "index.php?pid=" . base64_encode("presentation/register.php") ?>
                        method="post">
    			<div class="form-group">
                            <input type="text" name="id" class="form-control" placeholder="ID" required="required">
    			</div>
    			<div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Name" required="required">
    			</div>
    			<div class="form-group">
                            <input type="text" name="last_name" class="form-control" placeholder="Last name" 
                                   required="required">
    			</div>
    			<div class="form-group">
                            <input type="text" name="city" class="form-control" placeholder="City" required="required">
    			</div>
    			<div class="form-group">
                            <input type="text" name="mail" class="form-control" placeholder="Mail" required="required">
    			</div>
    			<div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Password" 
                                   required="required">
    			</div>
    			<div class="text-center">
                            <button onclick="location.href='<?php echo "index.php" ?>'" class="btn btn-primary"> 
                                Return to 
                            </button>
                            <button  type="submit" name="register" class="btn btn-primary"> Sign up</button>				  							
    			</div>
                    </form>
    		</div>
            </div>
    	</div>
    </div>
</div>
