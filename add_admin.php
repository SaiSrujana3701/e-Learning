<?php include('menu.php') ?>

<div class="main">
    <div class="wrapper">
        <h1>Add Admin</h1></br>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Admin ID: </td>
                    <td>
                        <input type="text" name="Admin_id"placeholder="Enter your id">
                    </td>
                </tr> 
                
                <tr>
                    <td>Full Name: </td>
                    <td>
                        <input type="text" name="Admin_full_name"placeholder="Enter your full name">
                    </td>
                </tr> 
               
                <tr>
                    <td>Password</td>
                    <td>
                        <input type="password" name="Admin_password"placeholder="Enter your password">
                    </td>
                </tr>
                
                <tr>
                    <td colspan="2"> 
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                     </td>
                </tr>
                </br>
                    
            </table>
        </form>
            </br>



<?php include("footer.php");?>
    </body>
</html> 
<?php
     
     if(isset($_POST['submit']))
     { //get data from form
        $Admin_id=$_POST['Admin_id'];
        $Admin_full_name=$_POST['Admin_full_name'];
        $Admin_password=md5($_POST['Admin_password']);
        //inserting data into sql
        $sql="INSERT INTO  tbl_admin  SET
        Admin_ID='$Admin_id',
        Admin_full_name='$Admin_full_name',
        Admin_password='$Admin_password'
        ";
        //execute query and save data in data base
        
        $res=mysqli_query($conn,$sql)or die(mysqli_error());
        if ($res == TRUE)
        {
            $_SESSION['add']='Admin Added Successfully';
            header("location:".SITEURL.'admin/admin.php');
        }
        else{
            echo 'failed to insert_data';
        }
       
       
    }
    
   
      

?>