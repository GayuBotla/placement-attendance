<?php include 'header.php'; ?>


<link rel="stylesheet" href="css/styles.css">


<div class="row">
	<header class="rad-page-title">
		<span>Dashboard</span>
	</header>

	<div class="row rad-info-box" style="margin: 0;padding: 0"><br>
		<?php
		$query="SELECT * FROM `company_list`";
		$result=mysqli_query($con,$query);
		while($fetch=mysqli_fetch_array($result)){
			$sql="select * from student where cmpny_id='".$fetch['id']."'";
			$res=mysqli_query($con,$sql);
			$count1= mysqli_num_rows($res);

			$sql2="select * from student where cmpny_id='".$fetch['id']."' and attended_status='1'";
			$res2=mysqli_query($con,$sql2);
			$count2= mysqli_num_rows($res2);

			$sql3="select * from student where cmpny_id='".$fetch['id']."'and attended_status='0'";
			$res3=mysqli_query($con,$sql3);
			$count3= mysqli_num_rows($res3);
			?>
			<div class="col-md-4 col-xs-12"><br>
				<div class="col-md-12">
					<h3 class="text-center rad-txt-success"><?php echo $fetch['name'] ?></h3><br>
					<div class="col-md-4" style="box-shadow: none !important;">
						<h4 class="text-center">
							<a href="elgble_stu_list.php?id=<?php echo $fetch['id'];?>"><span  style="font-size:15px;color:blue" title="Eligible Students">Eligible <?php echo $count1 ?></span>
							</a>
						</h4>
					</div>
					<div class="col-md-4" style="box-shadow: none !important;">
						<h4 class="text-center">
							<a href="attendance.php?id=<?php echo $fetch['id'];?>"><span style="font-size:15px;color:green"  title="Attended Students">Attended <?php echo $count2 ?></span>
							</a>
						</h4>
					</div>
					<div class="col-md-4" style="box-shadow: none !important;">
						<h4 class="text-center">
							<a href="absentees.php?id=<?php echo $fetch['id'];?>"><span  style="font-size:15px;color:red"title="Absented Students">Absented <?php echo $count3 ?></span>
							</a>
						</h4>
					</div>
				</div>
			</div>
		<?php }?>

	</div>
</div>


	<?php 
	include 'footer.html';

	?>
