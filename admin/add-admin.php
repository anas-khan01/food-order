<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>

        <br /><br/>

        <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset ($_SESSION['add']);
            }
        ?>

        <form action="" method="POST">

            <table class="tb1-30">
                <tr>
                    <td>Name</td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter your full name">
                    </td>                
                </tr>
                <tr>
                    <td>Username</td>
                    <td>
                        <input type="text" name="username" placeholder="Create your username">
                    </td>                
                </tr>
                <tr>
                    <td>Password</td>
                    <td>
                        <input type="password" name="password" placeholder="Create your password">
                    </td>                
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="SUBMIT" class="btn-sec1">
                    </td>                
                </tr>
            </table>
        </form>
    </div>
</div>

<?php include('partials/footer.php'); ?>


<?php 
    if(isset($_POST['submit']))
    {   
        //1.Get data from form
        $full_name=$_POST['full_name'];
        $username=$_POST['username'];
        $password=md5($_POST['password']);    //encrypted using md5

        //2.Sql query to save data into database
        $sql="INSERT INTO  table_admin SET
        full_name='$full_name',
        username='$username',
        password='$password'
        ";

        //3.Execute query and save data in database
        $res=mysqli_query($conn,$sql) or die(mysqli_error());
        //4. Checking data is inserted or not
        if($res==TRUE)
        {
            $_SESSION['add']= "<div class='success'>Admin Added Successsfully!!!";
            header("location:".SITEURL.'admin/manage-admin.php');      
        }
        else
        {
            $_SESSION['add']= "<div class='error'>Failed to  Add Admin";
            header("location:".SITEURL.'admin/manage-admin.php');    
        } 
    }
?>