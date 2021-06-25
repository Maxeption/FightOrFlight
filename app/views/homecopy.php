<?php
    if(isset($_POST['reserve'])){
        $data = new FlightController();
        $flights = $data->reserveFlight();
    } 
    $data = new FlightController();
    $flights = $data->getAllFlights();
?>

<div class="container" >
    <div class="row">
        <div class="col-md-8 mx-auto"></div>
        <div class="card">
            <div class="card-body bg-light">
            <div>
                    <h1>Reservation Dashboard
                        <a href="<?php echo BASE_URL;?>logout" title="Logout" class="btn btn-outline-primary float-end">
                            <i class="fas fa-user"></i> <?php echo $_SESSION['username'];?>
                        </a>                    
                        <a href="<?php echo BASE_URL;?>reserve" title="reserve" class="btn btn-primary me-4 float-end ">
                            <i class="fas fa-plane"></i>
                            Your Reservations
                        </a>
                    </h1>
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Origin</th>
                            <th scope="col">Destination</th>
                            <th scope="col">Departure Time</th>
                            <th scope="col">Return Time</th>
                            <th scope="col">Seats</th>
                            <th scope="col">Flight Type</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($flights as $flight) : ?>
                            <tr>
                                <th></th>
                                <th scope="row" hidden><?php echo $flight['id']; ?></th>
                                <td ><?php echo $flight['origin']; ?></td>
                                <td><?php echo $flight['destination']; ?></td>
                                <td><?php echo $flight['dep_time']; ?></td>
                                <td><?php echo $flight['return_time']?></td>
                                <td><?php echo $flight['seats']; ?></td>
                                <td>
                                    <?php echo $flight['flighttype'] == "One Way"
                                    ?
                                    '<h5><span class="badge bg-primary">One Way</span></h5>'
                                    :
                                    '<h5><span class="badge bg-secondary">Round Trip</span></h5>'
                                    ?>
                                </td>
                                <td class="d-flex flex-row">
                                    <form method="post" class="me-2">
                                        <input type="text" hidden name="id" value="<?php echo $flight['id']; ?>">
                                        <input type="text" hidden name="origin" value="<?php echo $flight['origin']; ?>">
                                        <input type="text" hidden name="destination" value="<?php echo $flight['destination']; ?>">
                                        <input type="text" hidden name="dep_time" value="<?php echo $flight['dep_time']; ?>">
                                        <input type="text" hidden name="return_time" value="<?php echo $flight['return_time']; ?>">
                                        <input type="text" hidden name="flighttype" value="<?php echo $flight['flighttype']; ?>">
                                        <button class="btn btn btn-info" type="submit" name="reserve"><i class="fa fa-plane-departure"></i> Reserve Now</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <a href="<?php echo BASE_URL;?>dashadmin" class="btn btn-sm btn-primary" title="Admin gateway" ><i class="fa fa-users-cog"></i> Admin gateway</a>
            </div> 
        </div>
    </div>
</div>


