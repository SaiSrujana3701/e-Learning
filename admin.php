<?php include('menu.php')?>
	<!.......main starts......>
	<div class=main>
		<div class=wrapper>
			<?php if(isset($_SESSION['add']))
			{
				echo $_SESSION['add'];
				unset($_SESSION['add']);
			}
			?>
			<?php if(isset($_SESSION['login']))
			{
				echo $_SESSION['login'];
				unset($_SESSION['login']);
			}
			?>	

			<div class=tbl-full1>	
			<!......to add admin......>
				<a href="add_admin.php" class='btn-primary'>Add Admin</a>
				<a href="update_admin.php" class="btn-secondary">update admin</a>
				<a href="deleteadmin.php" class="btn-teritory">delete admin</a>
			</div>

			<table class=tbl-full>
				<tr>
					<th>Admin_id</th>                   
					<th>Admin_name</th>
					<th>Action</th>
				</tr>

				<?php
					$sql="SELECT * from tbl_admin";
					$res=mysqli_query($conn,$sql) or die(mysqli_error());
					if($res==TRUE)
					{
						$count=mysqli_num_rows($res);
						if($count>0)
						{
							while($rows=mysqli_fetch_assoc($res))
							{
								$Admin_ID=$rows['Admin_ID'];
								$Admin_full_name=$rows['Admin_full_name'];
								?>
								<tr>
				    			<td><?PHP echo $Admin_ID;   ?></td>
								<td><?PHP echo $Admin_full_name;  ?></td>
								<td><a href="update_password.php?Admin_ID=<?php echo $Admin_ID; ?>" class="btn-primary">change_password</a></td>			
				   				</tr>
								<?PHP
							}
						}
					}
					?> 	
			</table>
		</div>
	</div>
<?php include('footer.php');?>
