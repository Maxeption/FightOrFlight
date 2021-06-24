<?php 

class FlightController{

    public function getAllflights(){
        $flights = Flight::getAll();
        return $flights;
    }
    public function getAllreservations(){
        $flights = Flight::getAllres();
        return $flights;
    }

    public function getOneflight(){
        if(isset($_POST['id'])){
            $data = array(
                'id' => $_POST['id']
            );
            $flight = Flight::getflight($data);
            return $flight;
        }
    }

    public function findflights(){
        if(isset($_POST['search'])){
            $data = array('search' => $_POST['search']);
        };
        $flights = Flight::searchflight($data);
        return $flights;
    }
    public function addflight(){
        if(isset($_POST['submit'])){
            $data = array(
                'origin' => $_POST['origin'],
                'destination' => $_POST['destination'],
                'dep_time' => $_POST['dep_time'],
                'return_time' => $_POST['return_time'],
                'seats' => $_POST['seats'],
                'flighttype' => $_POST['flighttype'],
            );
            $result = Flight::add($data);
            if($result === 'ok'){
                    Session::set('success', 'Flight Added');
                    Redirect::to('home');
            }else{
               echo $result ;
            }
        }
    }
    public function updateflight(){
        if(isset($_POST['submit'])){
            $data = array(
                'id' => $_POST['id'],
                'origin' => $_POST['origin'],
                'destination' => $_POST['destination'],
                'dep_time' => $_POST['dep_time'],
                'return_time' => $_POST['return_time'],
                'seats' => $_POST['seats'],
                'flighttype' => $_POST['flighttype'],
            );
            $result = Flight::update($data);
            if($result === 'ok'){
                Session::set('success', 'Flight Updated');
                    Redirect::to('update');
            }else{
               echo $result ;
            }
        }
    }
    public function deleteflight(){
        if(isset($_POST['id'])){
            $data['id'] = $_POST['id'];
            $result = Flight::delete($data);
            if($result === 'ok'){
                Session::set('success', 'Flight Deleted');
                    Redirect::to('delete');
            }else{
               echo $result ;
            }
        }
    }
    public function deleteRev(){
        if(isset($_POST['id'])){
            $data['id'] = $_POST['id'];
            $result = Flight::deleteRev($data);
            if($result === 'ok'){
                Session::set('success', 'Reservation Deleted');
                    Redirect::to('delete');
            }else{
               echo $result ;
            }
        }
    }
    public function reserveFlight(){
        if(isset($_POST['reserve'])){
            $data = array(
                'user_id' => $_SESSION['id'],
                'flight_id' => $_POST['id'],
                'destination' => $_POST['destination'],
                'origin' => $_POST['origin'],
                'dep_time' => $_POST['dep_time'],
                'ret_time' => $_POST['return_time'],
                'flighttype' => $_POST['flighttype'],
            );
            $result = Flight::reserve($data);
            if($result === 'ok'){
                    Session::set('success', 'Flight reserved');
                    Redirect::to('home');
            }else{
               echo $result ;
            }
        }
    }
}

?>