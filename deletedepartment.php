<?php include('menu.php') ?>
    <div class="main">
        <div class="wrapper">
            <h1>Delete department</h1></br>
            <form action="" method="POST">
                <table class="tbl-30">
                    <tr>
                        <td>Department name: </td>
                        <td>
                            <input type="text" name="department_name"placeholder="Enter your department_name">
                        </td>
                    </tr> 
                    <tr>
                        <td colspan="2"> 
                            <input type="submit" name="submit" value="Delete department" class="btn-teritory">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
<?php include('footer.php') ?>
<?php 
    if(isset($_POST['submit']))
    {
        //get data from form
        $department_name=$_POST['department_name'];
        $sql="SELECT * from department where department_name='$department_name'";
					
		$res=mysqli_query($conn,$sql) or die(mysqli_error());
		if($res==TRUE)
		{
			$count=mysqli_num_rows($res);
				if($count==1)
				{
					$rows=mysqli_fetch_assoc($res);
                    $department_image=$rows['department_image'];
						
                    $sql1="DELETE FROM department WHERE department_name='$department_name'";
                    $path="../images/departments/".$department_image;
                    $remove=unlink($path);

                    $res1=mysqli_query($conn,$sql1)or die(mysqli_error());
                    if($res1==TRUE)
                    {
                        $_SESSION['delete']="deleted successfully";
                        header('location:'.SITEURL.'admin/department.php');
                    }
                    else{
                        ECHO 'CANNOT BE DONE';
                    }    
                }
        }
    }
?>        