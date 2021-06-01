<?php include("menu.php") ?>
<?php
	if(isset($_GET['department_name']))
	{
    	$department_name=$_GET['department_name'];    // GETTING THE DEPARTMENT NAME FROM THE LAST PAGE
	}
	$_SESSION['branch']=$department_name;	
?>

<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewpoint" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=egde">
		<title>YEARS</title>
		<link rel="stylesheet" type="text/css" href="css/year.css?v=<?php echo time();?>">
	</head>	
	<body>
		<div class="container">
			<div class="img-col">
				<img src="imgs/boy_year1.jpg" alt="year">
			</div>
			<div class="text-col">
			<?php
				$sql="SELECT * from year where year_department_name='$department_name'";
					
				$res=mysqli_query($conn,$sql) or die(mysqli_error());
				if($res==TRUE)
				{		
					$count=mysqli_num_rows($res);
					if($count>0)
					{
						while($rows=mysqli_fetch_assoc($res))
						{	
							$year_number=$rows['year_number'];
							$year_department_name=$rows['year_department_name'];
							?>
							<div class="row">
								<div class="box">
									<div class="content">
										<a href="<?PHP echo SITEURL;?>student/class.php?year_number=<?php echo $year_number;?>"><h1><?php echo $year_number?></h1></a>
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
		<script src="js/back.js"></script>
	</body>	
</html> 
