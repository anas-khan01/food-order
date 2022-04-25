<?php   
    // start session
    session_start();
    // create constants to store non repeating values
    define('LOCALHOST','database-1.cvblelbxju0b.us-east-1.rds.amazonaws.com');
    define('DB_USERNAME', 'admin');
    define('DB_PASSWORD', 'temp1234');
    define('DB_NAME', 'food');
    define('SITEURL', 'http://localhost/food-order/');
    


    $conn=mysqli_connect('database-1.cvblelbxju0b.us-east-1.rds.amazonaws.com','admin','temp1234') or die(mysqli_error()); //connecting database
    $db_select=mysqli_select_db($conn,'food') or die(mysqli_error()); //selecting database
            


?>
