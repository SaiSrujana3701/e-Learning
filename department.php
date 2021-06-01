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
				<?php if(isset($_SESSION['delete']))
				{
					echo $_SESSION['delete'];
					unset($_SESSION['delete']);
				}
				?>
				
				<div class=tbl-full1>
				<!......to add department......>
							<a href="adddepartment.php" class='btn-primary'>Add department</a>
		         			<a href="update_department.php" class="btn-secondary">Update department</a>
				 			<a href="deletedepartment.php" class="btn-teritory">Delete department</a>
				</div>
				
				<table class=tbl-full>
					<tr>
						<th>s.no</th>
						<th>Department_name</th>                   
						<th>Department_image</th>
				    </tr>

					<?php
						$s_no=1;
					 	$sql="SELECT * from department";
						$res=mysqli_query($conn,$sql) or die(mysqli_error());
						if($res==TRUE)
						{
							$count=mysqli_num_rows($res);
							if($count>0)
							{
								while($rows=mysqli_fetch_assoc($res))
								{
									$department_name=$rows['department_name'];
									$department_image=$rows['department_image'];
									?>
									<tr>
							    	<td> <?php echo $s_no++; ?></td>
				    				<td><?PHP echo $department_name;   ?></td>
									<td>
									<?php
									if($department_image!='')
									{
										?>
										<img src="<?php echo SITEURL ; ?>images/departments/<?php echo $department_image; ?>" width="100px">
										<?php
									}
									else{
										echo "image not added";

									}
									?>			
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