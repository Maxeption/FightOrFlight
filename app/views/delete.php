<?php 
	if(isset($_POST['id'])){
		$deleteFlight = new FlightController();
		$deleteFlight->deleteFlight();
        Redirect::to("home");
	}


?>