<?php include('../config/constants.php');    ?>



<html>
    <head>
        <title> Login-Online-Food-Order-System</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>

        <div class="login">
            <h1 class="text-center">Login</h1>
            <br><br>
            <?php
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
            ?>
            <br><br>
            <!-- login form starts here -->
            <form action ="" method="POST"class="text-center">
            Username: <br>
            <input type="text" name="username" placeholder="Enter Username"><br><br>

            Password: <br>
            <input type="password" name="password" placeholder="Enter Password"><br><br>

            <input type="submit" name= "submit" value="login" class="btn-prim">
            <br><br>
            </form>

            <!-- login form ends here -->
            <p class="text-center">Created By - <a href="">Group no 18</a></p>
        </div>


    </body>
</html>
<?php
    //check submit button is clicked or not
    if(isset($_POST['submit']))
    {

    //process for login
    //1. get the data from user
        $username =mysqli_real_escape_string($conn,$_POST['username']);
        $raw_password=md5($_POST['password']);
        $password=mysqli_real_escape_string($conn,$raw_password);

    //create sql to check weather the user with username and password exist or not 
        $sql = "SELECT * FROM table_admin WHERE username='$username' AND password='$password'";

    //3.execute the query 
        $res = mysqli_query($conn,$sql);

    //4.check weather the user exist or not
        $count = mysqli_num_rows($res);

        if($count==1)
        {
        //user available and login succesful
            $_SESSION['login']="<div class='success' >Login Succesful.</div>";
        //redirect to <homepage><dashboard>
            header('location:'.SITEURL.'admin/');
        }
        else
        {
        //user not available 
            $_SESSION['login']="<div class='error text-center' >USERNAME OR PASSWORD DID NOT MATCH</div>";
        //redirect to <homepage><dashboard>
            header('location:'.SITEURL.'admin/login.php');
        }

    }

?>
