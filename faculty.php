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
				<?php if(isset($_SESSION['update']))
				{
					echo $_SESSION['update'];
					unset($_SESSION['update']);
				}
				?>

				<div class=tbl-full1>
				
					
			    		  
				
				<!......to add admin......>
							<a href="add_faculty.php" class='btn-primary'>Add Faculty</a>
		         			<a href='update_faculty.php' class="btn-secondary">Update Faculty</a>
				 			<a href="delete_faculty.php" class="btn-teritory">Delete Faculty</a>
					
				</div>
				
		
				<table class=tbl-full>
					
					
					<tr>
						<th>faculty_id</th>
						<th>faculty_name</th>                   
						<th>faculty_department</th>
						
						
						
				    </tr>
					<?php
					
					 $sql="SELECT * from faculty order by 'faculty_name' ASC";
					
					$res=mysqli_query($conn,$sql) or die(mysqli_error());
					if($res==TRUE)
					{
						$count=mysqli_num_rows($res);
						if($count>0)
						{
						
						while($rows=mysqli_fetch_assoc($res))
						{
							$faculty_id=$rows['faculty_id'];
							$faculty_name=$rows['faculty_name'];
							$faculty_department=$rows['faculty_department'];
							
							

						
							?>
							<tr>
							   
				    			<td><?PHP echo $faculty_id   ?></td>
								<td><?PHP echo $faculty_name   ?></td>
								<td><?PHP echo $faculty_department  ?></td>
								
				    			
				   			</tr>

							<?PHP

						}
						
						
					}
					}

					
					?>
					
			
	
				    	
				</table>
			</div>
		</div>
		<!.......main ends......>

		<!.......footer starts starts......>
		
		<!.......footer starts starts......>
		<?php include('footer.php');?>


		
