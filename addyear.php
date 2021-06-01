<?php include('menu.php') ?>

<div class="main">
    <div class="wrapper">
        <h1>Add Admin</h1></br>
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Year no: </td>
                    <td>
                        <input type="text" name="year_number"placeholder="Enter the year no.">
                    </td>
                </tr> 
                
                <tr>
                    <td>Department Name: </td>
                    <td>
                        <select name="year_department_name">
                        <option value="select">--SELECT--</option>
                        <?php
                           $sql="SELECT * from department";
                            $res=mysqli_query($conn,$sql) or die(mysqli_error());
                           
                            if($res==TRUE)
                            {
                                echo $count=mysqli_num_rows($res);
						        if($count>0)
						        {
                                     while($rows=mysqli_fetch_assoc($res))
                                     {
                                             $department_name=$rows['department_name'];
                                            ?>

                                            <option value="<?php echo $department_name;?>"><?php echo $department_name;?></option>
                                   
                                            <?php

                                    }
                                }
                            }
                           
                        ?> 
                        </select>
                    </td>
                </tr> 
                
                <tr>
                    <td colspan="2"> 
                        <input type="submit" name="submit" value="Add year" class="btn-secondary">
                     </td>
                </tr>
                </br>
                    
            </table>
        </form>
        <?php include("footer.php");?>
<?php
     
     if(isset($_POST['submit']))
     { //get data from form
        $year_number=$_POST['year_number'];
        $year_department_name=$_POST['year_department_name'];
        
       
        //inserting data into sdepartmentql
        $sql1="INSERT INTO  year  SET
        year_number='$year_number',
        year_department_name='$year_department_name'
        ";
         
        //execute query and save data in data base
        $res1=mysqli_query($conn,$sql1) or die(mysqli_error());
        if ($res1==TRUE)
        {
            $_SESSION['add']='inserted successfully';
            header("location:".SITEURL.'admin/year.php');
            die();
        }
        else{
             $_SESSION['fail']='failed to insert_data';
             header('location:',SITEURL.'admin/year.php');
             die();
        }
       
       
    }
    ?>
        