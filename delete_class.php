<?php include('menu.php') ?>

<div class="main">
    <div class="wrapper">
        <h1>Delete  Class</h1></br>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Class Name: </td>
                    <td>
                        <input type="text" name="class_name"placeholder="Enter your class_name">
                    </td>
                </tr> 
                <tr>
                    <td colspan="2"> 
                        <input type="submit" name="submit" value="Delete Admin" class="btn-teritory">
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
        $class_name=$_POST['class_name'];
        $sql="SELECT * from class";
					
		$res=mysqli_query($conn,$sql) or die(mysqli_error());
		if($res==TRUE)
		{
			$count=mysqli_num_rows($res);
				if($count>0)
				{
					while($rows=mysqli_fetch_assoc($res))
						{
							if($class_name==$rows['class_number'])
                            {

                                $sql="DELETE FROM class WHERE class_number='$class_name'";
        
                                $res=mysqli_query($conn,$sql)or die(mysqli_error());
                                 if($res==TRUE)
                                    {
                                        $_SESSION['delete']='deleted successfully';
                                        header("location:".SITEURL.'admin/class.php'); 
                                    }
                                else{
                                        
                                    }
                            }
							
						
       
                        }
                    }
                }
            }
?>        



