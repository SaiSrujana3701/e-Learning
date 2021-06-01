<?php include("menu.php") ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Departments</title>
	<link rel="stylesheet" type="text/css" href="css/department1.css">
</head>
<body>
	<ul id="autoWidth" class="cs-hidden">
		<div class="row">
		<?php
		$sql="SELECT * from department";			
		$res=mysqli_query($conn,$sql) or die(mysqli_error());
		if($res==TRUE)
		{
			$count=mysqli_num_rows($res);
			if($count>0)
			{
				$c=0;
				while($rows=mysqli_fetch_assoc($res))
				{
					$c++;
					if($c==3)
					{
						$c=1;
						?>
						</div>
						<div class="row">
						<?php
					}
					$department_name=$rows['department_name'];
					$department_image=$rows['department_image'];
					?>			
					<div class="column">
  						<li class="item-a">
  							<div class="box">
								<div class="slide-img">
									<img src="<?php echo SITEURL ; ?>images/departments/<?php echo $department_image; ?>" alt="cse">	
									<div class="overlay">
										<a href="<?PHP echo SITEURL;?>student/year.php?department_name=<?php echo $department_name;?>" class="buy-btn">Click</a>
									</div>
								</div>
								<div class="detail-box">
									<div class="type">
										<a href="<?PHP echo SITEURL;?>student/year.php?department_name=<?php echo $department_name;?>"><?php echo $department_name;?></a>
									</div>
								</div>
							</div>		
  						</li>`
  					</div>
		  			<?php
		  		}
			}
  		}
	?>	
	</div>
	<script src="js/back.js"></script>
</body>
<?php include("footer.php") ?>
</html>