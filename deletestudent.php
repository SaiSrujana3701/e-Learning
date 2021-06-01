<?php include('menu.php') ?>

<div class="main">
    <div class="wrapper">
        <h1>Delete Admin</h1></br>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Student ID: </td>
                    <td>
                        <input type="text" name="student_id"placeholder="Enter your id">
                    </td>
                </tr> 
                <tr>
                    <td colspan="2"> 
                        <input type="submit" name="submit" value="Delete id" class="btn-teritory">
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
        $student_id=$_POST['student_id'];
        $sql="SELECT * from student";
					
		$res=mysqli_query($conn,$sql) or die(mysqli_error());
		if($res==TRUE)
		{
			$count=mysqli_num_rows($res);
				if($count>0)
				{
					while($rows=mysqli_fetch_assoc($res))
						{
							if($student_id==$rows['student_id'])
                            {

                                $sql="DELETE FROM student WHERE student_id='$student_id'";
        
                                $res=mysqli_query($conn,$sql)or die(mysqli_error());
                                 if($res==TRUE)
                                    {
                                        $_SESSION['delete']='deleted successfully';
                                         header('location:'.SITEURL.'admin/student.php');   
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



