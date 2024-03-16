<?php 

define("DB_HOST", "localhost");
define("DB_NAME", "autism");
define("DB_USER", "root");
define("DB_PASSWORD", "");


try{
    $dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME;
    $pdo = new PDO($dsn, DB_USER, DB_PASSWORD);

}catch(PDOException $e){
    // echo "something error in connections" . DB_NAME;
    echo $e . "<br>";
}

?>