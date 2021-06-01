<?php include('menu.php');?>
<html>
	<?php if(isset($_GET['class_name']))  //GETTING THE CLASS NAME FROM THE PREVIOUS PAGE
    {
        $class_number=$_GET['class_name'];
		$_SESSION['class']=$class_number;
    }
	?>
	<?php if(isset($_SESSION['year']))
	{
		$year_number=$_SESSION['year'];
	}
	if(isset($_SESSION['branch']))
	{	
		$course_department_name=$_SESSION['branch'];
	}
?>	
	<head>
		<title>Course</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="css/course.css">
	</head>
	<body>
		<div class="circle">
			<img class="boy" src="imgs/course3.jpg">
			<div class="content">
				<h2><?php echo $course_department_name?></h2>
				<h2><?php echo $year_number?></h2>
				<h2><?php echo $class_number?></h2>
			</div>
		</div>
		<ul id="autoWidth" class="cs-hidden">
			<div class="row">
			<?php
				$sql="SELECT * from course where course_department_name='$course_department_name' and 
				course_year_number='$year_number' and course_class_name='$class_number'";
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
							if($c==4)
							{
								$c=1;
								?>
								</div>
								<div class="row">
								<?php
							}
							$course_id=$rows['course_id'];
				 			$course_name=$rows['course_name'];
				 			$course_image=$rows['course_image'];
							?>
							<div class="column">
		        				<li class="item-a">
  									<div class="box">
										<div class="slide-img">
											<a href="<?PHP echo SITEURL;?>student/content.php?course_id=<?php echo $course_id;?>"><img src="<?php echo SITEURL ; ?>images/courses/<?php echo $course_image; ?>" alt="Ai"></a>
										</div>
										<div class="detail-box">
											<div class="type">
												<a href="<?PHP echo SITEURL;?>student/content.php?course_id=<?php echo $course_id;?>"><?php echo $course_name ?></a>
											</div>
										</div>
									</div>	
								</li>
							</div>
							<?php
						}
					}
				}
				?>
 				</div>
			</ul>
		<script src="js/back.js"></script>
	</body>
<?php include("footer.php") ?>
</html>
