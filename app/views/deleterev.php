<?php 
	if(isset($_POST['id'])){
		$deleteRev = new FlightController();
		$deleteRev->deleteRev();
        Redirect::to("reserve");
	}


?>