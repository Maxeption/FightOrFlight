<?php
$data = array(
    'user_id' => $_SESSION['id'],
    'flight_id' => $_POST['id'],
    'destination' => $_POST['destination'],
    'origin' => $_POST['origin'],
    'dep_time' => $_POST['dep_time'],
    'ret_time' => $_POST['return_time'],
    'flighttype' => $_POST['flighttype'],
);
print_r($data);
	if(isset($_POST['id'])){
		$reserveFlight = new FlightController();
		$flight = $reserveFlight->getOneFlight();
}else{
    Redirect::to('home');
}
	if(isset($_POST['submit'])){
		$reserveFlight = new FlightController();
		$reserveFlight->reserveFlight();
	}
?>

<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto"></div>
        <div class="card">
            <div class="card-header">Update User Information:</div>
            <div class="card-body bg-light">
                <a href="<?php echo BASE_URL; ?>" class="btn btn-sm btn-secondary mr-2 mb-2">
                    <i class="fas fa-home"></i>
                </a>
                <form method="post">
                    <div class="form-group">
                        <label for="origin">Origin</label>
                        <input type="text" name="origin" class="form-control" placeholder="Origin"
                        value="<?php echo $flight->origin; ?>" disabled>
                    </div> 
                    <div class="form-group">
                        <label for="destination">Destination:</label>
                        <input type="text" name="destination" class="form-control" placeholder="destination"
                        value="<?php echo $flight->destination; ?>" disabled>
                        <input type="hidden" name="id" value="<?php echo $flight->id;?>" >
                    </div>
                    <div class="form-group">
                        <label for="dep_time">Departure Date/time:</label>
                        <input type="datetime-local" name="dep_time" class="form-control" placeholder="Departure Date/Time"
                        value="<?php echo $flight->dep_time; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="return_time">Return Date/time:</label>
                        <input type="datetime-local" name="return_time" class="form-control" placeholder="Return Date/Time"
                        value="<?php echo $flight->return_time; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="flighttype">Flight type</label>
                        <input type="text" name="flighttype" class="form-control" placeholder="Flight type"
                        value="<?php echo $flight->flighttype; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary mt-3" name="submit">Reserve</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



</div>