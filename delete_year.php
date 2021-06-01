<?php include('menu.php') ?>

<div class="main">
    <div class="wrapper">
        <h1>Delete department</h1></br>
        <form action="" method="POST">
            <table class="tbl-30">
            <tr>
                    <td>Year no: </td>
                    <td>
                        <input type="text" name="year_number"placeholder="Enter your year number">
                    </td>
                </tr> 

                <tr>
                    <td>Department name: </td>
                    <td>
                        <input type="text" name="year_department_name"placeholder="Enter your department_name">
                    </td>
                </tr> 
                <tr>
                    <td colspan="2"> 
                        <input type="submit" name="submit" value="Delete year" class="btn-teritory">
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
       echo $year_number=$_POST['year_number'];
       echo $year_department_name=$_POST['year_department_name'];

        $sql="SELECT * from year where year_department_name='$year_department_name' and  year_number='$year_number'";
					
		$res=mysqli_query($conn,$sql) or die(mysqli_error());
		if($res==TRUE)
		{
			$count=mysqli_num_rows($res);
				if($count!=0)
				{
					while($rows=mysqli_fetch_assoc($res))
                    {
                    echo $year_image=$rows['year_image'];
						
                                $sql1="DELETE FROM year WHERE year_department_name='$year_department_name' and  year_number='$year_number'";
                                $path="../images/years/".$year_image;
                                $remove=unlink($path);
                                $res1=mysqli_query($conn,$sql1)or die(mysqli_error());
                                 if($res1==TRUE)
                                    {
                                            $_SESSION['delete']="deleted successfully";
                                            header('location:'.SITEURL.'admin/year.php');
                                           
                                    }
                                else{
                                         ECHO 'CANNOT BE DONE';
                                    }
                            
							
						
                    }
                        
                    
                }
            }
    }
?>        



