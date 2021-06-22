<?php
	if(isset($_POST['id'])){
		$exitEmploye = new EmployesController();
		$employe = $exitEmploye->getOneEmploye();
}else{
    Redirect::to('home');
}

	if(isset($_POST['submit'])){
		$exitEmploye = new EmployesController();
		$exitEmploye->updateEmploye();
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
                        <label for="names">Name:</label>
                        <input type="text" name="names" class="form-control" placeholder="Name"
                        value="<?php echo $employe->names; ?>">
                    </div> 
                    <div class="form-group">
                        <label for="dob">DOB:</label>
                        <input type="date" name="dob" class="form-control" placeholder="DOB"
                        value="<?php echo $employe->dob; ?>">
                        <input type="hidden" name="id" value="<?php echo $employe->id;?>">
                    </div>
                    <div class="form-group">
                        <label for="pass_w">Pass:</label>
                        <input type="text" name="pass_w" class="form-control" placeholder="Pass"
                        value="<?php echo $employe->pass_w; ?>">
                    </div>
                    <div class="form-group">
                        <label for="status_e">Status:</label>
                        <select class="form-control" name="status_e">
                            <option value="1" 
                            <?php echo $employe->status_e ? 'selected' : '' ?>
                            >Active</option>

                            <option value="0"
                            <?php echo !$employe->status_e ? 'selected' : '' ?>
                            >Non-Active</option>
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