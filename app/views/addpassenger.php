<?php
if (isset($_POST['id'])) {
    $exitFlight = new FlightController();
    $flight = $exitFlight->getOneFlight();
} else {
    Redirect::to('home');
}
if (isset($_POST['addpass'])) {
    $addPassenger = new FlightController();
    $addPassenger->addPassenger();
}
?>
<div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h1>Add Passengers</h1>
                    </div>
                    <div class="card-body bg-light">
                        <div>
                            <a href="<?php echo BASE_URL; ?>" class="btn btn btn-secondary mr-2 mb-2">
                                <i class="fas fa-home"></i>
                            </a>
                            <a href="<?php echo BASE_URL; ?>logout" title="Logout" class="btn btn-outline-primary float-end">
                                <i class="fas fa-user"></i> <?php echo $_SESSION['username']; ?>
                            </a>
                        </div>
                            <div class="form-group">
                                <label for="fname">Please enter your passenger's Full name</label>
                                <form method="post" id="pass_form">
                                    <input type="text" hidden value="<?php echo $_SESSION['id'] ?>" name="user_id">
                                    <input type="text" hidden value="<?php echo $_POST['id'] ?>" name="res_id">
                                </form>
                            </div>
                        <div class="form-group">
                           <button form="pass_form" type="submit" class="btn btn-primary mt-3" name="addpass">Add passenger to flight</button>
                          <button type="submit" class="btn btn-primary mt-3" id="pluspass" name="add1pass"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>