<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php
if ($_SESSION["rol"]=="customer"){
$customer = new Customer($_SESSION["id"]);
$customer ->consult();
?>
<div class="container">
    <div class="row mt-3">
	<div class="col">
            <div class="card">
		<div class="card-header">
                    <h3>Welcome</h3>
		</div>
                <div class="card-body">
                    <h4><strong> Customer: </strong><?php echo $customer -> getName() . " " . $customer -> getLastname() ?></h4>
		</div>
            </div>
	</div>
    </div>
</div>
<?php }else{
    echo "Sorry. You do not have permissions";
}
