<?php
// session_start(); 
class categories{
    private $pdo;

    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }

    public function getCategory($category){
        $query = "SELECT * from $category";
        
        try{
            $statement = $this->pdo->prepare($query);
            $statement->execute();

            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            
            return $result;

        }catch(PDOException $e){
            $e->getMessage();
            return false;
        }
    }
    public function add_file($table_name, $title){
        $query = "INSERT into ".$table_name." (`arabic_name`) values (:arabic_name)";

        try{
            $statement = $this->pdo->prepare($query);

            $statement->bindParam(":arabic_name", $title);

            $statement->execute();
            return true;
            
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    public function back($table_name){
        $query = "SELECT MAX(id) AS id FROM ".$table_name;

        try{
            $statement = $this->pdo->prepare($query);
            $statement->execute();
            $result = $statement->fetch();
            return $result['id'];

        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    public function delete_file($table_name, $id){
        $query = "delete from ".$table_name." where id = :id";
      

        try{
            $statement = $this->pdo->prepare($query);

            $statement->bindParam(":id", $id);

            $statement->execute();
            return true;
            
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

}



?>
    
}



?>