<?php include('menu.php') ?>

<div class="main">
    <div class="wrapper">
        <h1>Delete Admin</h1></br>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Admin ID: </td>
                    <td>
                        <input type="text" name="Admin_id"placeholder="Enter your id">
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
        $Admin_id=$_POST['Admin_id'];
        $sql="SELECT * from tbl_admin";
					
		$res=mysqli_query($conn,$sql) or die(mysqli_error());
		if($res==TRUE)
		{
			$count=mysqli_num_rows($res);
				if($count>0)
				{
					while($rows=mysqli_fetch_assoc($res))
						{
							if($Admin_id==$rows['Admin_ID'])
                            {

                                $sql="DELETE FROM tbl_admin WHERE Admin_ID=$Admin_id";
        
                                $res=mysqli_query($conn,$sql)or die(mysqli_error());
                                 if($res==TRUE)
                                    {
                                            echo 'DELETED';
                                            break;
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



