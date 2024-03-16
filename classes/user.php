<?php
session_start(); 
class user{
    private $pdo;

    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }

    public function register($firstName, $lastName, $email, $password, $repassword){
        $errors = [];

        // 1- validate email
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors["invalid-email"] = "! هذا الايميل غير صالح";
        }

        // 2- check if email is already in use
        $statement = $this->pdo->prepare("SELECT COUNT(*) FROM users WHERE user_email = :email");
        $statement->execute(array(":email"=>$email));

        $count = $statement->fetchcolumn();

        if($count){
            $errors["exist-email"] = "! هذا الايميل مٌستخدم بالفعل";
        }

        // 3- check if password = repassword
        if($password != $repassword){
            $errors["repassword"] = "! كلمة السر ليست متطابقة";
        }

        // 3- check if $errors array is empty
        if(empty($errors)){
            $query = "INSERT into users (user_fname, user_lname, user_email, user_password) values (:fname, :lname, :email, :pass)";
            $statement = $this->pdo->prepare($query);

            $statement->bindParam(":fname", $firstName);
            $statement->bindParam(":lname", $lastName);
            $statement->bindParam(":email", $email);
            $statement->bindParam(":pass", $password);
            
            if($statement->execute()){
                // $userData = $statement->fetch(PDO::FETCH_ASSOC); 
                $query2 = "SELECT * from users where user_email = :email";
                $statement2 = $this->pdo->prepare($query2);
                $statement2->execute(array(":email"=>$email));

                $userData = $statement2->fetch(PDO:: FETCH_ASSOC);

                $_SESSION["user_id"] = $userData["user_id"];
                $_SESSION["user_fname"] = $firstName;
                $_SESSION["user_lname"] = $lastName;
                $_SESSION["user_email"] = $email;
                $_SESSION["user_password"] = $password;
            }
            return true;
            
        }else{
            return $errors;
        }
    }

    public function login($email, $password){

        // $errors = [];

        $statement = $this->pdo->prepare("SELECT * from users where user_email=:email");
        $statement->execute(array(":email"=>$email));

        $userData = $statement->fetch(PDO::FETCH_ASSOC); 

        if($userData && $password == $userData["user_password"])
        {
            $_SESSION["user_id"] = $userData["user_id"];
            $_SESSION["user_fname"] = $userData["user_fname"];
            $_SESSION["user_lname"] = $userData["user_lname"];
            $_SESSION["user_email"] = $userData["user_email"];
            $_SESSION["user_password"] = $password;

            return true;

        }else{
            return false;
        }
    }

    public function update($firstName, $lastName, $email, $password, $repassword, $id){
        $errors = [];

        try{

            if($password != $repassword){
                $errors["repassword"] = "! كلمة السر ليست متطابقة";
            }

            // validate email

            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errors["invalid-email"] = "! هذا الايميل غير صالح";
            }
    
            // check if email is already in use
            $statement = $this->pdo->prepare("SELECT COUNT(*) FROM users WHERE user_email = :email");
            $statement->execute(array(":email"=>$email));
            $count = $statement->fetchcolumn();

            $statement2 = $this->pdo->prepare("SELECT * FROM users WHERE user_email = :email");
            $statement2->execute(array(":email"=>$email));
            $count2 = $statement2->fetch();
            
    
            if($count){
                if($count2["user_email"] == $email && $count2['user_id'] == $id){

                }else{
                    $errors["exist-email"] = "! هذا الايميل مٌستخدم بالفعل";
                }
            }

            // 3- check if $errors array is empty
            if(empty($errors)){
                $query = "UPDATE users set user_fname=:fname, user_lname=:lname, user_email=:email, user_password=:pass where user_id=:id";
                $statement = $this->pdo->prepare($query);
        
                    // clean code
                    $firstName = htmlspecialchars(strip_tags($firstName));
                    $lastName = htmlspecialchars(strip_tags($lastName));
                    $email = htmlspecialchars(strip_tags($email));
                    $id = htmlspecialchars(strip_tags($id));
        
                    // Bind the data
                    $statement->bindParam(":fname", $firstName);
                    $statement->bindParam(":lname", $lastName);
                    $statement->bindParam(":email", $email);
                    $statement->bindParam(":pass", $password);
                    $statement->bindParam(":id", $id);
                
                    // Execute the query
                    $statement->execute();

                    $_SESSION["user_id"] = $id;
                    $_SESSION["user_fname"] = $firstName;
                    $_SESSION["user_lname"] = $lastName;
                    $_SESSION["user_email"] = $email;
                    $_SESSION["user_password"] = $password;
                    
                    return true;

                }else{
                return $errors;
            }

        }catch(PDOException $e){
            echo $e;
            return $errors;
        }
    }
}



?>