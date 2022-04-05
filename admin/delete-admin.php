<?php 
     include('../config/constants.php');

     $id=$_GET['Id'];

     $sql="DELETE FROM table_admin WHERE Id=$id";

     $res=mysqli_query($conn, $sql);

     if($res==TRUE)
     {
         $_SESSION['delete']="<div class='success'>Admin Deleted Successfully!!!</div>";
         header('location:'.SITEURL.'admin/manage-admin.php');
     }
     else
     {
        $_SESSION['delete']="<div class='error'>Failed to Delete Admin.Please Try again Later.</div> ";
        header('location:'.SITEURL.'admin/manage-admin.php');
     }


?>