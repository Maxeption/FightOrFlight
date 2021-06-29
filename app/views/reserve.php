<?php
    if($_SESSION['role'] == 1){
        Redirect::to(BASE_URL); }
    
    if(isset($_POST['reserve'])){
        $data = new FlightController();
        $flights = $data->reserveFlight();
    }else{
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
                    <h1><i class="fas fa-paper-plane"></i> Your Reservations
                        <a href="<?php echo BASE_URL;?>" class="btn btn btn-secondary mr-2 mb-2">
                            <i class="fas fa-home"></i>
                        </a>
                        <a href="<?php echo BASE_URL;?>logout" title="Logout" class="btn btn-outline-primary float-end">
                            <i class="fas fa-user"></i> <?php echo $_SESSION['username'];?> | Logout
                        </a>
                    </h1>
                </div>
                    
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col"><i class="fa fa-plane-departure"></i> Origin</th>
                            <th scope="col"><i class="fa fa-map-marked-alt"></i> Destination</th>
                            <th scope="col"><i class="fa fa-clock"></i> Departure Time</th>
                            <th scope="col"><i class="fa fa-location-arrow"></i> Flight Type</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($flights as $flight) : ?>
                            <tr>
                                <td ></td>
                                <td><?php echo $flight['origin']; ?></td>
                                <td><?php echo $flight['destination']; ?></td>
                                <td><?php echo $flight['dep_time']; ?></td>
                                <td>
                                    <?php echo $flight['flight_type'] == "One Way"
                                        ?
                                        '<h5><span class="badge bg-primary"><i class="fa fa-location-arrow"></i> One Way</span></h5>'
                                        :
                                        '<h5><span class="badge bg-secondary"><i class="fa fa-exchange-alt"></i> Round Trip</span></h5>'
                                    ?>
                                </td>
                                <td class="d-flex flex-row">
                                    <form method="post" class="me-2" action="addpassenger">
                                        <input type="hidden" name="id" value="<?php echo $flight['id']; ?>">
                                        <button class="btn btn btn-info"><i class="fa fa-users"></i> <i class="fa fa-plus"></i></button>
                                    </form>
                                    <form method="post" class="me-2" action="deleterev">
                                        <input type="text" hidden name="id" value="<?php echo $flight['id']; ?>">
                                        <button class="btn btn btn-danger"><i class="fa fa-trash la la-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div> 
        </div>
    </div>
</div>


