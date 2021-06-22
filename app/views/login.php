<?php 
	if(isset($_POST['submit'])){
		$logUser = new UserController();
		$logUser->log();
	}
?>

<div class="container">
    <div class="row my-4">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Login</h3>
                </div>
                <div class="card-body bg-light">
                    <form method="post" class="me-2">
                        <div class="form-group">
                            <input type="text" name="username" placeholder="Username" class="form-control m-2">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" placeholder="Password" class="form-control m-2">
                        </div>
                        <button name="submit" class="btn btn-sm btn-primary m-2">Login</button>
                    </form>
                </div>
                <div class="card-footer">
                    <a href="<?php echo BASE_URL;?>register" class="btn btn-link">Register</a>
                </div>
            </div>
        </div>
    </div>
</div>