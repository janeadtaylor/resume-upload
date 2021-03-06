<?php

/**
 * Database model for Users
 */

class Users Extends DB {

    public function __construct(){
        parent::__construct();
    }
    
    public function getById($id) {
        $sql = "SELECT * from users WHERE id = ?";
       
        $user = new User();
        
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $results = $stmt->get_result();

        while($row = $results->fetch_array(MYSQLI_ASSOC)) {
            $user->setId($row["id"]);
            $user->setEmail($row["email"]);
        }
        
        return $user;
    }
    
}