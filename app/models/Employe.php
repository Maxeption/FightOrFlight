<?php 

class Employe {

    static public function getAll(){
        $stmt = DB::connect()->prepare('SELECT * FROM employe');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    static public function getEmploye($data){
        $id = $data['id'];
        try{
            $query = 'SELECT * FROM employe WHERE id=:id';
            $stmt = DB::connect()->prepare($query);
            $stmt->execute(array(":id" => $id));
            $employe = $stmt->fetch(PDO::FETCH_OBJ);
            return $employe;
        }catch(PDOException $ex){
            echo 'error' . $ex->getMessage();
        }
    }

    static public function add($data){
        $stmt = DB::connect()->prepare('INSERT INTO employe (names, dob, pass_w, status_e) VALUES (:names,:dob,:pass_w,:status_e)');
        $stmt->bindParam(':names',$data['names']);
        $stmt->bindParam(':dob',$data['dob']);
        $stmt->bindParam(':pass_w',$data['pass_w']);
        $stmt->bindParam(':status_e',$data['status_e']);

        if($stmt->execute()){
            return 'ok';
        }else{
            return 'error';
        }
        
    }
    static public function update($data){
        $stmt = DB::connect()->prepare('UPDATE employe SET names=:names, dob=:dob, pass_w=:pass_w, status_e=:status_e WHERE id=:id');
        $stmt->bindParam(':id',$data['id']);
        $stmt->bindParam(':names',$data['names']);
        $stmt->bindParam(':dob',$data['dob']);
        $stmt->bindParam(':pass_w',$data['pass_w']);
        $stmt->bindParam(':status_e',$data['status_e']);
        if($stmt->execute()){
            return 'ok';
        }else{
            return 'error';
        }
        
    }

    static public function delete($data){
        $id = $data['id'];
        try{
            $query = 'DELETE FROM employe WHERE id=:id';
            $stmt = DB::connect()->prepare($query);
            $stmt->execute(array(":id" => $id));
            if($stmt->execute()){
                return 'ok';
            }
        }catch(PDOException $ex){
            echo 'error' . $ex->getMessage();
        }
    }

    static public function searchEmploye($data){
        $search = $data['search'];
        try{
            $query = 'DELETE FROM employe WHERE names LIKE ?';
            $stmt = DB::connect()->prepare($query);
            $stmt->execute(array('%'.$search.'%'));
            // return $employes->fetchAll();
        }catch(PDOException $ex){
            echo 'error' . $ex->getMessage();
        }
    }
}


?>