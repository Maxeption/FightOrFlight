<?php

class Flight
{

    static public function getAll()
    {
        $stmt = DB::connect()->prepare('SELECT * FROM flight');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    static public function getAllres($user_id)
    {
        if ($_SESSION['role'] == 1) {
            $stmt = DB::connect()->prepare('SELECT
                reservation.id,
                reservation.origin,
                reservation.destination,
                reservation.dep_time,
                users.fname,
                reservation.flight_id,
                reservation.flight_type
            FROM
                reservation
            INNER JOIN users ON reservation.user_id = users.id;');
            $stmt->execute();
            return $stmt->fetchAll();
        } else {
            $stmt = DB::connect()->prepare('SELECT * FROM reservation WHERE user_id=:user_id');
            $stmt->bindParam(':user_id', $user_id);
            $stmt->execute();
            return $stmt->fetchAll();
        }
    }

    static public function getflight($data)
    {
        $id = $data['id'];
        try {
            $query = 'SELECT * FROM flight WHERE id=:id';
            $stmt = DB::connect()->prepare($query);
            $stmt->execute(array(":id" => $id));
            $flight = $stmt->fetch(PDO::FETCH_OBJ);
            return $flight;
        } catch (PDOException $ex) {
            echo 'error' . $ex->getMessage();
        }
    }

    static public function add($data)
    {
        $stmt = DB::connect()->prepare('INSERT INTO flight (origin, destination, dep_time, return_time, seats, flighttype) VALUES (:origin,:destination,:dep_time,:return_time,:seats,:flighttype)');
        $stmt->bindParam(':origin', $data['origin']);
        $stmt->bindParam(':destination', $data['destination']);
        $stmt->bindParam(':dep_time', $data['dep_time']);
        $stmt->bindParam(':return_time', $data['return_time']);
        $stmt->bindParam(':seats', $data['seats']);
        $stmt->bindParam(':flighttype', $data['flighttype']);
        if ($stmt->execute()) {
            return 'ok';
        } else {
            return 'error';
        }
    }
    static public function update($data)
    {
        $stmt = DB::connect()->prepare('UPDATE flight SET origin=:origin, destination=:destination, dep_time=:dep_time, return_time=:return_time, seats=:seats, flighttype=:flightype WHERE id=:id');
        $stmt->bindParam(':id', $data['id']);
        $stmt->bindParam(':origin', $data['origin']);
        $stmt->bindParam(':destination', $data['destination']);
        $stmt->bindParam(':dep_time', $data['dep_time']);
        $stmt->bindParam(':return_time', $data['return_time']);
        $stmt->bindParam(':seats', $data['seats']);
        $stmt->bindParam(':flighttype', $data['flighttype']);
        if ($stmt->execute()) {
            return 'ok';
        } else {
            return 'error';
        }
    }
    static public function delete($data)
    {
        $id = $data['id'];
        try {
            $query = 'DELETE FROM flight WHERE id=:id';
            $stmt = DB::connect()->prepare($query);
            $stmt->execute(array(":id" => $id));
            if ($stmt->execute()) {
                return 'ok';
            }
        } catch (PDOException $ex) {
            echo 'error' . $ex->getMessage();
        }
    }
    static public function deleteRev($data)
    {
        $id = $data['id'];
        try {
            $query = 'DELETE FROM reservation WHERE id=:id';
            $stmt = DB::connect()->prepare($query);
            $stmt->execute(array(":id" => $id));
            if ($stmt->execute()) {
                return 'ok';
            }
        } catch (PDOException $ex) {
            echo 'error' . $ex->getMessage();
        }
    }

    static public function searchflight($data)
    {
        $search = $data['search'];
        try {
            $query = 'DELETE FROM flight WHERE origin LIKE ?';
            $stmt = DB::connect()->prepare($query);
            $stmt->execute(array('%' . $search . '%'));
            // return $flights->fetchAll();
        } catch (PDOException $ex) {
            echo 'error' . $ex->getMessage();
        }
    }

    static public function reserve($data)
    {
        $stmt = DB::connect()->prepare('SELECT * FROM flight WHERE id=:id');
        $stmt = DB::connect()->prepare('INSERT INTO reservation (user_id, flight_id, flight_type, origin, destination, dep_time) VALUES (:user_id,:flight_id,:flight_type,:origin,:destination,:dep_time)');
        $stmt->bindParam(':user_id', $data['user_id']);
        $stmt->bindParam(':flight_id', $data['flight_id']);
        $stmt->bindParam(':flight_type', $data['flighttype']);
        $stmt->bindParam(':origin', $data['origin']);
        $stmt->bindParam(':destination', $data['destination']);
        $stmt->bindParam(':dep_time', $data['dep_time']);
        $stmt->execute();

        if ($data['flighttype'] === 'Round Trip') {
            $stmt = DB::connect()->prepare('INSERT INTO reservation (user_id, flight_id, flight_type, origin, destination, dep_time) VALUES (:user_id,:flight_id,:flight_type,:origin,:destination,:dep_time)');
            $stmt->bindParam(':user_id', $data['user_id']);
            $stmt->bindParam(':flight_id', $data['flight_id']);
            $stmt->bindParam(':flight_type', $data['flighttype']);
            $stmt->bindParam(':origin', $data['destination']);
            $stmt->bindParam(':destination', $data['origin']);
            $stmt->bindParam(':dep_time', $data['ret_time']);
            $stmt->execute();
        }
    }
    static public function addpass($data)
    {
        for ($i = 0; $i < count($data['fullname']); $i++) {
            $stmt = DB::connect()->prepare('INSERT INTO passenger (user_id, reservation_id, fullname) VALUES (:user_id,:reservation_id,:fullname)');
            $stmt->bindParam(':user_id', $data['user_id']);
            $stmt->bindParam(':reservation_id', $data['reservation_id']);
            $stmt->bindParam(':fullname', $data['fullname'][$i]);
            $stmt->execute();
        }
    }
}
