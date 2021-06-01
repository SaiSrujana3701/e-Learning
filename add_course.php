<?php include('menu.php') ?>
<div class="main">
    <div class="wrapper">
        <h1>Add Course</h1></br>
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Course ID: </td>
                    <td>
                        <input type="text" name="course_id"placeholder="Enter the course id">
                    </td>
                </tr> 
                <tr>
                    <td>Course Name</td>
                    <td>
                        <input type="text" name="course_name"placeholder="Enter the course name">
                    </td>
                </tr> 
                <tr>
                    <td>Course Image</td>
                    <td>
                        <input type="file" name="course_image"placeholder="Enter the course name">
                    </td>
                </tr> 
                <tr>
                    <td>Class Name</td>
                    <td>
                        <input type="text" name="course_class_name"placeholder="Enter the class name">
                    </td>
                </tr> 
                <tr>
                    <td>Faculty ID:</td>
                    <td>
                        <input type="text" name="course_faculty_id"placeholder="Enter the faculty_id">
                    </td>
                </tr> 
                <tr>
                    <td>Year Number </td>
                    <td>
                        <select name="course_year_number">
                        <option value="select">--SELECT--</option>
                        <option value='E1'>E1</option>
                        <option value='E2'>E2</option>
                        <option value='E3'>E3</option>
                        <option value='E4'>E4</option>
                        </select>
                    </td>
                </tr>
                
                <tr>
                    <td>Department Name: </td>
                    <td>
                        <select name="course_department_name">
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
                        <input type="submit" name="submit" value="Add course" class="btn-secondary">
                     </td>
                </tr>
                </br>
                    
            </table>
        </form>
        <?php include("footer.php");?>
<?php
    
    if(isset($_POST['submit']))
    { //get data from for
        $course_id=$_POST['course_id'];
        $course_name=$_POST['course_name'];
        if(isset($_FILES['course_image']['name']))
       {
           $course_image=$_FILES['course_image']['name'];
           $source_path=$_FILES['course_image']['tmp_name'];
           $destination_path="../images/courses/".$course_image;


           $upload=move_uploaded_file($source_path,$destination_path);
           if($upload==FALSE)
           {
               $_SESSION['upload']="upload falied";
               header("location:".SITEURL.'admin/addcourse.php');
               
           }

       }
       else{
           echo 'no-image';
       }
        $course_=$_POST['course_name'];
        $course_faculty_id=$_POST['course_faculty_id'];
       $course_class_name=$_POST['course_class_name'];
       $course_year_number=$_POST['course_year_number'];
       $course_department_name=$_POST['course_department_name'];
       
      
       //inserting data into sdepartmentql
       $sql1="INSERT INTO  course  SET
       course_id='$course_id',
       course_name='$course_name',
       course_image='$course_image',
       course_faculty_id='$course_faculty_id',
       course_class_name='$course_class_name',
       course_year_number='$course_year_number',
       course_department_name='$course_department_name'
      ";
        
       //execute query and save data in data base
       $res1=mysqli_query($conn,$sql1) or die(mysqli_error());
       if($res1==TRUE)
       {
        $_SESSION['add']='inserted successfully';
       
        header('location:'.SITEURL.'admin/course.php');
        die();
       
       }
       else
       {
            echo 'failed to insert_data';
           
       }
      
   }
?>       