<?php
    if(isset($_POST['submit'])){
        $creatUser = new UserController();
        $creatUser = $creatUser->register();
    }
?>

<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto"></div>
        <div class="card">
        <div class="card-header">
        <h3 class="text-center">Register <i class="fa fa-user-plus"></i></h3>
        </div>
            <div class="card-body bg-light">
                <form method="post" class="me-2">
                    <div class="form-group">
                    <input type="text" name="fname" placeholder="Full Name" class="form-control m-2">
                    <input type="text" name="username" placeholder="Username" class="form-control m-2">
                    <input type="password" name="password" placeholder="Password" class="form-control m-2">
                    </div>
                    <button name="submit" class="btn btn-sm btn-primary m-2">Register</button>
                </form>
            </div>
            <div class="card-footer">
                <a href="<?php echo BASE_URL;?>login" class="btn btn-link">Login</a>
            </div>
        </div>
    </div>
</div>