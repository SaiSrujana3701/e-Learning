<?php include('menu.php') ?>
    <div class="main">
        <div class="wrapper">
            <h1>Add department</h1></br>
             <?php
                if(isset($_SESSION['upload']))
                {
                    echo $_SESSION['upload'];
                    unset( $_SESSION['upload']);
                }
            ?>
            <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset( $_SESSION['add']);
            }
            ?>
            <form action="" method="POST" enctype="multipart/form-data">   <!-- THIS IS THE FORM OF METHOD POST -->
                <table class="tbl-30">
                    <tr>
                        <td>Department Name </td>
                        <td>
                            <input type="text" name="department_name" placeholder="Enter your full name">
                         </td>
                    </tr> 
               
                    <tr>    
                        <td>Department image</td>
                        <td>
                            <input type="file" name="department_image">
                        </td>
                     </tr>
                
                    <tr>
                        <td colspan="2"> 
                            <input type="submit" name="submit" value="add department" class="btn-secondary">
                        </td>
                    </tr>
                    </br>
                </table>
            </form>
            </br>

    <?php include("footer.php");?>
  
    <?php
        if(isset($_POST['submit']))
        { 
            //get data from form
            echo $department_name=$_POST['department_name'];
            //print_r($_FILES['department_image']);
            //die();
      
            if(isset($_FILES['department_image']['name']))
            {
                $department_image=$_FILES['department_image']['name'];
                $source_path=$_FILES['department_image']['tmp_name'];
                $destination_path="../images/departments/".$department_image;

                $upload=move_uploaded_file($source_path,$destination_path);
                if($upload==FALSE)
                {
                    $_SESSION['upload']="upload falied";
                    header("location:".SITEURL.'admin/adddepartment.php');
                }
            }
       
        //inserting data into sql
        $sql="INSERT INTO  department  SET
        department_name='$department_name',
        department_image='$department_image'
        ";

        //execute query and save data in data base
        $res=mysqli_query($conn,$sql)or die(mysqli_error());
        if ($res == TRUE)
        {
            $_SESSION['add']='Department added Successfully';
            header("location:".SITEURL.'admin/department.php');
        }
        else{
            echo 'failed to insert_data';
        }   
    }
?>