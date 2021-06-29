<?php

if ($_SESSION['role'] == 0) {
    Redirect::to(BASE_URL);
}

if (isset($_POST['find'])) {
    $data = new FlightController();
    $flights = $data->findFlights();
} else {
    $data = new FlightController();
    $flights = $data->getAllFlights();
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto"></div>
        <div class="card">
            <div class="card-body bg-light">
                <div>
                    <h1> <i class="fa fa-user-shield"></i> Admin Dashboard
                        <a href="<?php echo BASE_URL; ?>logout" title="Logout" class="btn btn-outline-primary float-end">
                            <i class="fas fa-user"></i> <?php echo $_SESSION['username']; ?> | Logout
                        </a>
                        <a href="<?php echo BASE_URL; ?>add" class="btn btn btn-secondary m-2">
                            <i class="fas fa-plus"></i> Add New Flight
                        </a>
                        <a href="<?php echo BASE_URL;?>allres" title="allres" class="btn btn-primary me-4 float-end ">
                            <i class="fas fa-plane"></i>
                            All Reservations
                        </a>
                    </h1>
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col"><i class="fa fa-passport"></i> ID</th>
                            <th scope="col"><i class="fa fa-plane-departure"></i> Origin</th>
                            <th scope="col"><i class="fa fa-map-marked-alt"></i> Destination</th>
                            <th scope="col"><i class="fa fa-clock"></i> Departure Time</th>
                            <th scope="col"><i class="fa fa-clock"></i> Return Time</th>
                            <th scope="col"><i class="fa fa-chair"></i> Seats</th>
                            <th scope="col"><i class="fa fa-location-arrow"></i> Flight Type</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($flights as $flight) : ?>
                            <tr>
                                <th scope="row"><?php echo $flight['id']; ?></th>
                                <td><?php echo $flight['origin']; ?></td>
                                <td><?php echo $flight['destination']; ?></td>
                                <td><?php echo $flight['dep_time']; ?></td>
                                <td><?php echo $flight['return_time'] ?></td>
                                <td><?php echo $flight['seats']; ?></td>
                                <td>
                                    <?php echo $flight['flighttype'] == "One Way"
                                        ?
                                        '<h5><span class="badge bg-primary"><i class="fa fa-location-arrow"></i> One Way</span></h5>'
                                        :
                                        '<h5><span class="badge bg-secondary"><i class="fa fa-exchange-alt"></i> Round Trip</span></h5>'
                                    ?>
                                </td>
                                </td>
                                <td class="d-flex flex-row">
                                    <form method="post" class="me-2" action="update">
                                        <input type="hidden" name="id" value="<?php echo $flight['id']; ?>">
                                        <button class="btn btn btn-warning"><i class="la la-edit fa fa-edit"></i></button>
                                    </form>
                                    <form method="post" class="me-2" action="delete">
                                        <input type="hidden" name="id" value="<?php echo $flight['id']; ?>">
                                        <button class="btn btn btn-danger"><i class="fa fa-trash la la-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <a href="<?php echo BASE_URL; ?>home" class="btn btn-sm btn-primary" title="Admin gateway"><i class="fa fa-users"></i> Back Home</a>
            </div>
        </div>
    </div>



</div>