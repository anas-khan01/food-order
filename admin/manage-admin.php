<?php include('partials/menu.php'); ?>

        <!-- main content section starts-->
        <div class="main-content">
            <div class="wrapper">
                <h1>Manage Admin</h1>

                <br /><br />
                <?php
                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add'];  //displaying message
                        unset($_SESSION['add']);   //removing message
                    }

                    if(isset($_SESSION['delete']))
                    {
                        echo $_SESSION['delete'];  
                        unset($_SESSION['delete']); 
                    }

                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];  
                        unset($_SESSION['update']); 
                    }

                    if(isset($_SESSION['user not found']))
                    {
                        echo $_SESSION['user not found'];
                        unset($_SESSION['user not found']);
                    }

                    if(isset($_SESSION['pwd not match']))
                    {
                        echo $_SESSION['pwd not match'];
                        unset($_SESSION['pwd not match']);
                    }

                    if(isset($_SESSION['change pwd']))
                    {
                        echo $_SESSION['change pwd'];
                        unset ($_SESSION['change pwd']);
                    }
                ?>

                <br /><br />

                <a href="add-admin.php" class="btn-prim">Add Admin</a>

                <br /><br /><br />

                <table class="tb1-full">
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Action</th>
                    </tr>

                    <?php
                        $sql="SELECT * FROM table_admin"; //query to get admin
                        $res=mysqli_query($conn,$sql);  //execute the query

                        if($res==TRUE)  
                        {
                            $count=mysqli_num_rows($res); //function to get all row in database
                             
                            $sn=1; // id increment
                            if($count>0)  //checking th number of rows
                            {
                                while($rows=mysqli_fetch_assoc($res)) //data in database
                                {
                                    $id=$rows['Id'];
                                    $full_name=$rows['full_name'];
                                    $username=$rows['username'];

                                    //displaying the values in table
                                    ?>
                                    <tr>
                                        <td><?php echo $sn++;?></td>
                                        <td><?php echo $full_name;?></td>
                                        <td><?php echo $username;?></td>
                                        <td>
                                            <a href="<?php echo SITEURL; ?>admin/change-password.php?Id=<?php echo$id;; ?>" class="btn-sec3">Change Password</a>
                                            <a href="<?php echo SITEURL; ?>admin/update-admin.php?Id=<?php echo$id;; ?>" class="btn-sec1">Update Admin</a>
                                            <a href="<?php echo SITEURL; ?>admin/delete-admin.php?Id=<?php echo $id; ?>" class="btn-sec2">Delete Admin</a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }

                        }
                    
                    ?>
                </table>

            </div>
        </div>
        <!-- main content section ends-->

<?php include('partials/footer.php'); ?>