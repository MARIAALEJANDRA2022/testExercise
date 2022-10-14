<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php 
$error = 0;
if (isset($_GET["error"])){
    $error = $_GET["error"];
}
?>
<div class="container">
    <?php include "presentation/header.php";?>
    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3>Authentication</h3>
                </div>
                <div class="card-body">
                    <form 
                        action=<?php echo "index.php?pid=" . base64_encode("presentacion/autenticar.php")?> 
                        method="post">
                        <?php if ($error == 1) { ?>						
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Mail or password error</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php } ?>
                        <div class="form-group">
                            <input type="email" name="mail" class="form-control" placeholder="Mail" required="required">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Password" required="required">
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">Sign in</button>	
                            <button onclick="location.href='<?php echo "index.php?pid=" . base64_encode("presentation/register.php")?>'" class="btn btn-primary"> Sign up </button>
                        </div>								
                        <p class="text-center">							
                            <a href="<?php echo "index.php?pid=" . base64_encode("presentacion/recuperarClave.php") ?>"> 
                                Did you forget the password?</a>
                        </p>										
                    </form>									
                </div>
            </div>
        </div>
    </div>
</div>
