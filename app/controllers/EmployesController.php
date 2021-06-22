<?php 

class EmployesController{

    public function getAllEmployes(){
        $employes = Employe::getAll();
        return $employes;
    }

    public function getOneEmploye(){
        if(isset($_POST['id'])){
            $data = array(
                'id' => $_POST['id']
            );
            $employe = Employe::getEmploye($data);
            return $employe;
        }
    }

    public function findEmployes(){
        if(isset($_POST['search'])){
            $data = array('search' => $_POST['search']);
        };
        $employes = Employe::searchEmploye($data);
        return $employes;
    }

    public function addEmploye(){
        if(isset($_POST['submit'])){
            $data = array(
                'names' => $_POST['names'],
                'dob' => $_POST['dob'],
                'pass_w' => $_POST['pass_w'],
                'status_e' => $_POST['status_e'],
            );
            $result = Employe::add($data);
            if($result === 'ok'){
                    Session::set('success', 'Flight Added');
                    Redirect::to('home');
            }else{
               echo $result ;
            }
        }
    }
    public function updateEmploye(){
        if(isset($_POST['submit'])){
            $data = array(
                'id' => $_POST['id'],
                'names' => $_POST['names'],
                'dob' => $_POST['dob'],
                'pass_w' => $_POST['pass_w'],
                'status_e' => $_POST['status_e'],
            );
            $result = Employe::update($data);
            if($result === 'ok'){
                Session::set('success', 'Flight Updated');
                    Redirect::to('update');
            }else{
               echo $result ;
            }
        }
    }
    public function deleteEmploye(){
        if(isset($_POST['id'])){
            $data['id'] = $_POST['id'];
            $result = Employe::delete($data);
            if($result === 'ok'){
                Session::set('success', 'Flight Deleted');
                    Redirect::to('delete');
            }else{
               echo $result ;
            }
        }
    }
}

?>