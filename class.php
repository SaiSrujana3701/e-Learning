<html>
	<?php include("menu.php") ?>      
	<head>
		<title>CLASSES</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="css/class.css">
	</head>
	<body>
		<?php
		if(isset($_GET['year_number']))    // GETTING THE YEAR NUMBER FROM THE PREVIOUS PAGE
        {
			$year_number=$_GET['year_number'];
		}
		$_SESSION['year']=$year_number;
		?>

		<?php 
		if(isset($_SESSION['branch']))
		{
      		$class_department_name=$_SESSION['branch'];	  
		} 
		?>
		<div class="container">
			<div class="parent-div">
				<div class="row">	
				<?php
					$sql="SELECT * from class where class_department_name='$class_department_name' and class_year_number='$year_number'";
					$res=mysqli_query($conn,$sql) or die(mysqli_error());
					if($res==TRUE)
					{
						$count=mysqli_num_rows($res);
						if($count>0)
						{
							while($rows=mysqli_fetch_assoc($res))
							{
								$class_name=$rows['class_name'];
								?>
								<div class="column">
									<div class="child-div">
										<div class="content">
											<a href="<?PHP echo SITEURL;?>student/course.php?class_name=<?php echo $class_name;?>"><h1><?php echo $class_name ?></h1></a>
										</div>
									</div>
								</div>
								<?php
							}
						}
					}
					?>
				</div>
			</div>
			<div class="img-col">
				<img src="imgs/class.png" alt="classes">
			</div>
		</div>
		<script src="js/back.js"></script>
	</body>
	<?php include("footer.php") ?>
</html>
