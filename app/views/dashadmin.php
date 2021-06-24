<?php

    if($_SESSION['role'] == 0){
        Redirect::to('home'); }

    if(isset($_POST['find'])){
        $data = new FlightController();
        $flights = $data->findFlights();
    }else{
        $data = new FlightController();
        $flights = $data->getAllFlights();
    }
?>

<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto"></div>
        <div class="card">
            <div class="card-body bg-light">
                <form method="post" class="input-group d-flex float-end flex-row"> 
                    <input type="text" class="form-control" name="search" placeholder="Search">
                    <button class="btn btn-primary btn-sm" type="submit" name="find">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
                <div>
                <a href="<?php echo BASE_URL;?>add" class="btn btn-sm btn-primary m-2">
                <i class="fas fa-user-plus"></i>
                </a>
                    <a href="<?php echo BASE_URL;?>logout" title="Logout" class="btn btn-link ">
                        <i class="fas fa-user"> <?php echo $_SESSION['username'];?></i>
                    </a>
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
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
                                <th scope="row"><?php echo $flight['id']; ?></th>
                                <td><?php echo $flight['origin']; ?></td>
                                <td><?php echo $flight['destination']; ?></td>
                                <td><?php echo $flight['dep_time']; ?></td>
                                <td><?php echo $flight['return_time']?></td>
                                <td><?php echo $flight['seats']; ?></td>
                                <td><?php echo $flight['flighttype']; ?>
                                </td>
                                <td class="d-flex flex-row">
                                    <form method="post" class="me-2" action="update">
                                        <input type="hidden" name="id" value="<?php echo $flight['id']; ?>">
                                        <button class="btn btn-sm btn-warning"><i class="la la-edit fa fa-edit"></i></button>
                                    </form>
                                    <form method="post" class="me-2" action="delete">
                                        <input type="hidden" name="id" value="<?php echo $flight['id']; ?>">
                                        <button class="btn btn-sm btn-danger"><i class="fa fa-trash la la-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <a href="<?php echo BASE_URL;?>home" class="btn btn-sm btn-primary" title="Admin gateway" ><i class="fa fa-users"></i> Back Home</a>
            </div>
        </div>
    </div>



</div>