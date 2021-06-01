<?php include('menu.php') ?>

<div class="main">
    <div class="wrapper">
        <h1>Add Class</h1></br>
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>class name </td>
                    <td>
                        <input type="text" name="class_name"placeholder="Enter the class no.">
                    </td>
                </tr> 
                <tr>
                    <td>year number </td>
                    <td>
                        <select name="class_year_number">
                        <option value="select">--SELECT--</option>
                        <option value='E1'>E1</option>
                        <option value='E2'>E2</option>
                        <option value='E3'>E3</option>
                        <option value='E4'>E4</option>
                    </td>
                </tr>
                
                <tr>
                    <td>Department Name: </td>
                    <td>
                        <select name="class_department_name">
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
                        <input type="submit" name="submit" value="Add class" class="btn-secondary">
                     </td>
                </tr>
                </br>
                    
            </table>
        </form>
        <?php include("footer.php");?>
<?php
    
    if(isset($_POST['submit']))
    { //get data from form
       $class_name=$_POST['class_name'];
       $class_year_number=$_POST['class_year_number'];
       $class_department_name=$_POST['class_department_name'];
       
      
       //inserting data into sdepartmentql
       $sql1="INSERT INTO  class  SET
       class_number='$class_name',
       class_year_number='$class_year_number',
       class_department_name='$class_department_name'
      ";
        
       //execute query and save data in data base
       $res1=mysqli_query($conn,$sql1) or die(mysqli_error());
       if ($res1==TRUE)
       {
           $_SESSION['add']='inserted successfully';
           header("location:".SITEURL.'admin/class.php');
       }
       else{
            echo 'failed to insert_data';
           
       }
      
      
   }
   ?>
       