<?php include('menu.php') ?>

<div class="main">
    <div class="wrapper">
        <h1>Delete course</h1></br>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Course ID: </td>
                    <td>
                        <input type="text" name="course_id"placeholder="Enter your id">
                    </td>
                </tr>  
                <tr>
                    <td colspan="2"> 
                        <input type="submit" name="submit" value="Delete course" class="btn-teritory">
                     </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php include('footer.php') ?>
<?php
     
     
    if(isset($_POST['submit']))
    { //get data from form
        $course_id=$_POST['course_id'];
        $sql="SELECT * from course";
					
		$res=mysqli_query($conn,$sql) or die(mysqli_error());
		if($res==TRUE)
		{
			$count=mysqli_num_rows($res);
				if($count>0)
				{
					while($rows=mysqli_fetch_assoc($res))
						{
							if($course_id==$rows['course_id'])
                            {

                                $sql="DELETE FROM course WHERE course_id='$course_id'";
        
                                $res=mysqli_query($conn,$sql)or die(mysqli_error());
                                 if($res==TRUE)
                                    {
                                        $_SESSION['delete']='deleted successfully';
                                         header('location:'.SITEURL.'admin/course.php');   
                                    }
                                else{
                                         ECHO 'CANNOT BE DONE';
                                    }
                            }
							
						
       
                        }
                    }
                }
            }
?>        



