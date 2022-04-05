<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">\
        <h1>Update Admin</h1>
        <br /> <br />

        <?php
            $id=$_GET['Id'];

            $sql="SELECT * FROM table_admin WHERE Id=$id";

            $res=mysqli_query($conn, $sql);

            if($res==TRUE)
            {
                $count=mysqli_num_rows($res);

                if($count==1)
                {
                    $row=mysqli_fetch_assoc($res);

                    $full_name=$row['full_name'];
                    $username=$row['username'];

                }
                else
                {
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
            }
        
        
        ?>

        <form action="" method="POST">
            <table class="tb1-30">
                <tr>
                    <td>Name</td>
                    <td>
                        <input type="text" name="full_name" value="<?php echo $full_name;?>">
                    </td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td>
                        <input type="text" name="username" value="<?php echo $username;?>">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="Id" value="<?php echo $id;?>">
                        <input type="submit" name="submit" value="SUBMIT" class="btn-sec1">
                    </td>                
                </tr>
            </table>
    </div>
</div>

<?php
    if(isset($_POST['submit']))
    {
        $id=$_POST['Id'];
        $full_name=$_POST['full_name'];
        $username=$_POST['username'];
        
        $sql="UPDATE table_admin SET
        full_name='$full_name',
        username='$username'
        WHERE Id='$id'
        ";

        $res=mysqli_query($conn,$sql);

        if($res==TRUE)
        {
            $_SESSION['update']="<div class='success'>Admin Updated Successfully!!!</div>";
            header('location:'.SITEURL.'admin/manage-admin.php');
        
        }
        else
        {
            $_SESSION['update']="<div class='error'>Failed to Update Amin. Please Try Again Later.</div>";
            header('location:'.SITEURL.'admin/manage-admin.php');
        

        }
    }

?>

<?php include('partials/footer.php'); ?>