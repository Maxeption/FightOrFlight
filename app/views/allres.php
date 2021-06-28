<?php
if ($_SESSION['role'] == 0) {
    Redirect::to(BASE_URL);
}


if (isset($_POST['reserve'])) {
    $data = new FlightController();
    $flights = $data->reserveFlight();
} else {
    $data = new FlightController();
    $flights = $data->getAllreservations();
}

?>

<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto"></div>
        <div class="card">
            <div class="card-body bg-light">
                <div>
                    <a href="<?php echo BASE_URL; ?>" class="btn btn btn-secondary mr-2 mb-2">
                        <i class="fas fa-home"></i>
                    </a>
                    <a href="<?php echo BASE_URL; ?>logout" title="Logout" class="btn btn-outline-primary float-end">
                        <i class="fas fa-user"></i> <?php echo $_SESSION['username']; ?>
                    </a>
                </div>
                <div>
                    <h1>All Reservations</h1>
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Reservation ID</th>
                            <th scope="col">Origin</th>
                            <th scope="col">Destination</th>
                            <th scope="col">Departure Time</th>
                            <th scope="col">Customer</th>
                            <th scope="col">Flight ID</th>
                            <th scope="col">Flight Type</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($flights as $flight) : ?>
                            <tr>
                                <td></td>
                                <td><?php echo $flight['id']; ?></td>
                                <td><?php echo $flight['origin']; ?></td>
                                <td><?php echo $flight['destination']; ?></td>
                                <td><?php echo $flight['dep_time']; ?></td>
                                <td><?php echo $flight['fname']; ?></td>
                                <td><?php echo $flight['flight_id']; ?></td>
                                <td>
                                    <?php echo $flight['flight_type'] == "One Way"
                                        ?
                                        '<h5><span class="badge bg-primary">One Way</span></h5>'
                                        :
                                        '<h5><span class="badge bg-secondary">Round Trip</span></h5>'
                                    ?>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>