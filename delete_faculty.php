<?php include('menu.php') ?>

<div class="main">
    <div class="wrapper">
        <h1>Delete faculty</h1></br>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Faculty ID: </td>
                    <td>
                        <input type="text" name="faculty_id"placeholder="Enter your id">
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
        $faculty_id=$_POST['faculty_id'];
        $sql="SELECT * from faculty";
					
		$res=mysqli_query($conn,$sql) or die(mysqli_error());
		if($res==TRUE)
		{
			$count=mysqli_num_rows($res);
				if($count>0)
				{
					while($rows=mysqli_fetch_assoc($res))
						{
							if($faculty_id==$rows['faculty_id'])
                            {

                                $sql="DELETE FROM faculty WHERE faculty_id='$faculty_id'";
        
                                $res=mysqli_query($conn,$sql)or die(mysqli_error());
                                 if($res==TRUE)
                                    {
                                        $_SESSION['delete']='deleted successfully';
                                         header('location:'.SITEURL.'admin/faculty.php');   
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



