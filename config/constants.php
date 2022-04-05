<?php   
    // start session
    session_start();
    // create constants to store non repeating values
    define('LOCALHOST','localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'food-order');
    define('SITEURL', 'http://localhost/food-order/');
    


    $conn=mysqli_connect('localhost','root','') or die(mysqli_error()); //connecting database
    $db_select=mysqli_select_db($conn,'food-order') or die(mysqli_error()); //selecting database
            


?>