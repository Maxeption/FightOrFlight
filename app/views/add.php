<?php
    if(isset($_POST{'submit'})){
        $newFlight = new FlightController();
        $newFlight->addFlight();
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto"></div>
        <div class="card">
            <div class="card-header">Add a Flight:</div>
            <div class="card-body bg-light">
                <a href="<?php echo BASE_URL; ?>" class="btn btn-sm btn-secondary mr-2 mb-2">
                    <i class="fas fa-home"></i>
                </a>
                <form method="post">
                    <div class="form-group">
                        <label for="origin">Origin :</label>
                        <input type="text" name="origin" class="form-control" placeholder="Origin">
                    </div> 
                    <div class="form-group">
                        <label for="destination">Destination:</label>
                        <input type="text" name="destination" class="form-control" placeholder="Destination">
                    </div>
                    <div class="form-group">
                        <label for="dep_time">Departure Date/Time:</label>
                        <input type="datetime-local" name="dep_time" class="form-control" placeholder="Departure Date/Time">
                    </div>
                    <div class="form-group">
                        <label for="return_time">Return Date/Time:</label>
                        <input type="datetime-local" name="return_time" class="form-control" placeholder="Return Date/Time">
                    </div>
                    <div class="form-group">
                        <label for="seats">Seats :</label>
                        <input type="number" min="1" max="400" name="seats" class="form-control" placeholder="Seats">
                    </div>
                    <div class="form-group">
                        <label for="flighttype">Flight Type:</label>
                        <select class="form-control" name="flighttype">
                            <option value="One Way">One Way</option>
                            <option value="Round Trip">Round Trip</option>
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