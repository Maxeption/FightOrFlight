<?php
    if(isset($_POST['find'])){
        $data = new EmployesController();
        $employes = $data->findEmployes();
    }else{
        $data = new EmployesController();
        $employes = $data->getAllEmployes();
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
                    <a href="<?php echo BASE_URL;?>logout" title="Déconnexion" class="btn btn-link ">
                        <i class="fas fa-user"> <?php echo $_SESSION['username'];?></i>
                    </a>
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">DOB</th>
                            <th scope="col">Pass</th>
                            <th scope="col">Status</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($employes as $employe) : ?>
                            <tr>
                                <th scope="row"><?php echo $employe['id']; ?></th>
                                <td><?php echo $employe['names']; ?></td>
                                <td><?php echo $employe['dob']; ?></td>
                                <td><?php echo $employe['pass_w']; ?></td>
                                <td>
                                    <?php echo $employe['status_e']
                                        ?
                                        '<span class="badge rounded-pill bg-success">Active
                                        </span>'
                                        :
                                        '<span class="badge rounded-pill bg-danger">Non-Active
                                        </span>'; ?></td>
                                <td class="d-flex flex-row">
                                    <form method="post" class="me-2" action="update">
                                        <input type="hidden" name="id" value="<?php echo $employe['id']; ?>">
                                        <button class="btn btn-sm btn-warning"><i class="la la-edit fa fa-edit"></i></button>
                                    </form>
                                    <form method="post" class="me-2" action="delete">
                                        <input type="hidden" name="id" value="<?php echo $employe['id']; ?>">
                                        <button class="btn btn-sm btn-danger"><i class="fa fa-trash la la-trash"></i></button>
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