<?php
	if(isset($_POST['id'])){
		$exitFlight = new FlightController();
		$flight = $exitFlight->getOneFlight();
}else{
    Redirect::to('home');
}
	if(isset($_POST['submit'])){
		$exitFlight = new FlightController();
		$exitFlight->updateFlight();
	}
?>

<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto"></div>
        <div class="card">
            <div class="card-header"><h1>Update Flight Information:</h1></div>
            <div class="card-body bg-light">
                <div>
                    <a href="<?php echo BASE_URL;?>" class="btn btn btn-secondary mr-2 mb-2">
                        <i class="fas fa-home"></i>
                    </a>
                    <a href="<?php echo BASE_URL;?>logout" title="Logout" class="btn btn-outline-primary float-end">
                        <i class="fas fa-user"></i> <?php echo $_SESSION['username'];?> | Logout
                    </a>
                </div>
                <form method="post">
                    <div class="form-group">
                        <label for="origin">Origin</label>
                        <input type="text" name="origin" class="form-control" placeholder="Origin"
                        value="<?php echo $flight->origin; ?>">
                    </div> 
                    <div class="form-group">
                        <label for="destination">Destination:</label>
                        <input type="text" name="destination" class="form-control" placeholder="destination"
                        value="<?php echo $flight->destination; ?>">
                        <input type="hidden" name="id" value="<?php echo $flight->id;?>">
                    </div>
                    <div class="form-group">
                        <label for="dep_time">Departure Date/time:</label>
                        <input type="datetime-local" name="dep_time" class="form-control" placeholder="Departure Date/Time"
                        value="<?php echo $flight->dep_time; ?>">
                    </div>
                    <div class="form-group">
                        <label for="return_time">Return Date/time:</label>
                        <input type="datetime-local" name="return_time" class="form-control" placeholder="Return Date/Time"
                        value="<?php echo $flight->return_time; ?>">
                    </div>
                    <div class="form-group">
                        <label for="seats">Seats</label>
                        <input type="number" min="1" max="400" name="seats" class="form-control" placeholder="Seats"
                        value="<?php echo $flight->seats; ?>">
                    </div>
                    <div class="form-group">
                        <label for="flighttype">Flight type</label>
                        <select class="form-control" name="flighttype">
                            <option value="One way" 
                            <?php echo $flight->flighttype ? 'selected' : '' ?>
                            >One way</option>

                            <option value="Round Trip"
                            <?php echo !$flight->flighttype ? 'selected' : '' ?>
                            >Round Trip</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary mt-3" name="submit">Add</button>
                    </div>

                </form>
            </div>
        </div>
    </div>



</div>