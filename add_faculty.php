<?php include('menu.php') ?>

<div class="main">
    <div class="wrapper">
        <h1>Add Faculty</h1></br>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Faculty ID: </td>
                    <td>
                        <input type="text" name="faculty_id"placeholder="Enter your id">
                    </td>
                </tr> 
                <tr>
                    <td>Faculty Password: </td>
                    <td>
                        <input type="password" name="faculty_password"placeholder="Enter your password">
                    </td>
                </tr>
                
                <tr>
                    <td>Faculty Name: </td>
                    <td>
                        <input type="text" name="faculty_name"placeholder="Enter your full name">
                    </td>
                </tr>
                
                <tr>
                    <td>Faculty Department: </td>
                    <td>
                        <input type="text" name="faculty_department"placeholder="department">
                    </td>
                </tr>
                
                <tr>
                    <td colspan="2"> 
                        <input type="submit" name="submit" value="Add faculty" class="btn-secondary">
                        <br></br>
                     </td>
                </tr>
                </br>
                    
            </table>
        </form>
<?php include("footer.php");?>
<?php
     
     if(isset($_POST['submit']))
     { //get data from form
        $faculty_id=$_POST['faculty_id'];
        $faculty_password=md5($_POST['faculty_password']);
        $faculty_name=$_POST['faculty_name'];
        
       
        $faculty_department=$_POST['faculty_department'];
        
        

        //inserting data into sql
        $sql="INSERT INTO faculty  SET
        faculty_id='$faculty_id',
        faculty_password='$faculty_password',
        faculty_name='$faculty_name',
        faculty_department='$faculty_department'
        ";
        //execute query and save data in data base
       
        $res=mysqli_query($conn,$sql);
        if ($res ==TRUE)
        {
            $_SESSION['add']='inserted successfully';
            header('location:'.SITEURL.'admin/faculty.php');
            DIE();
        }
        else{
            echo 'failed to insert_data';
        }
       
       
    }
    
   
      

?>