<?php
include 'header.php'; 
@$id=$_GET['id'];
$sql="SELECT * from company_list where id='$id'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res);
$id=$row['id'];
$name=$row['name'];
$date=$row['date'];
$status=$row['status'];

?>
<style type="text/css">
/*td,th,tr,table{
border:0px solid #ccc;
}*/
</style>

<?php 
if( @$_GET['msg']==1){
	?>
	<div class="alert alert-success alert-dismissible">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Successfully submitted</strong> 
	</div>
	<?php
}
if( @$_GET['msg']==3){
	?>
	<div class="alert alert-success alert-dismissible">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Successfully updated</strong> 
	</div>
	<?php
}
if( @$_GET['msg']==2){
	?>
	<div class="alert alert-danger alert-dismissible">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Failed to submit</strong> 
	</div>
	<?php
}
?>


<div class="container-fluid">
	<form method="post" class="table-bordered" enctype="multipart/form-data">
		<fieldset class="col-md-10 col-md-offset-1"><br>
			<h2 class="text-success text-center"><?php if(@$id!=""){ echo "Edit"; } else{
				echo "Add"; } ?> Company</h2><br><br>
				<div class="col-md-6 col-md-offset-3" >
					<table class="table">
						<tr>
							<th>Company Name</th>
							<td>:</td>
							<td><input type="text" name="name" class="form-control" value="<?php echo @$name ?>" autofocus required></td>
						</tr>
						<tr>
							<th>Date</th>
							<td>:</td>
							<td><input type="date" name="date" class="form-control" value="<?php echo @$date ?>" required></td>
						</tr>
						<tr>
							<th>Eligible Students List</th>
							<td>:</td>
							<td><input type="file" name="file" class="form-control" ></td>
						</tr>
						<!--<tr>
							<th>LOGO</th>
							<td>:</td>
							<td><input type="file" name="logo" class="form-control"></td>
						</tr>-->
						<tr>
							<th colspan="3">
								<center>
									<button class="btn btn-warning" name="Submit">
										<?php 
										if(@$id!=""){ echo "Update"; } 
										else{ echo "Add"; } ?>
									</button>
								</center>
							</th>
						</tr>
					</table>
				</div>
			</fieldset>
			<div class="clearfix"></div>
		</form>

		<?php 
		if (isset($_POST['Submit'])) {
			if ($id=="") {

				$name=mysqli_real_escape_string($con,$_POST['name']);
				$date=mysqli_real_escape_string($con,$_POST['date']);
				$query="INSERT INTO company_list set name='$name',`date`='$date'";
				$result = mysqli_query($con,$query);
				$last_id = mysqli_insert_id($con);

				$csv = $_FILES['file'];
				$filename = $csv['name'];
				$ext = pathinfo($filename, PATHINFO_EXTENSION);
				if ($ext=="csv") {
					$file_open = fopen($csv['tmp_name'], 'r');
					while ($data = fgetcsv($file_open, "10000",',')) {
//echo $data[0]."<br/>";
						$insert = "INSERT into student set rollno='".$data[0]."', name='".$data[1]."', college='".$data[2]."', branch='".$data[3]."', percentage='".$data[5]."', cmpny_id='".$last_id."',cmpny_name='".$name."' ";
						$result = mysqli_query($con, $insert);
					}
					if ($result) {
						// echo "<script>alert('Eligible Students are Inserted.');</script>";
						$filename = $_FILES['logo']['name'];
						$tmp_name = $_FILES['logo']['tmp_name'];
						$target   = "images/";
						$ext_array = explode(".", $filename);
						$count = count($ext_array)-1;
						$ext = $ext_array[$count];
						if ($ext=="jpeg" || $ext=="jpg" || $ext=="png" || $ext=="gif" || $ext=="bmp" || $ext=="JPEG" || $ext=="JPG") {
							$move = move_uploaded_file($tmp_name, $target.$filename);
							if ($move) {
								// $id=mysqli_real_escape_string("$_");
								$update ="UPDATE company_list set logo='$filename' where id='$last_id'"; 
								$result = mysqli_query($con,$query);
								if ($result) {
									echo "<script>alert('Successfully Added.');</script>";		
								}
								else{
									echo "<script>alert('Logo not uploded.');</script>";
								}
							}
						}
						else{
							echo "<script>alert('please check the file extention');</script>";
						}

					}
				}
				else {
					echo "Please UPload CSV file ONly.";
				}
				exit;

				// if(){
				// 	echo "<script>location.href='?msg=1'</script>";
				// }
				// else
				// {
				// 	echo "<script>location.href='?msg=2'</script>";
				// }
			}
			else{
				$name=$_POST['name'];
				$date=$_POST['date'];
				@$sql="UPDATE company_list set name='$name',date='$date' where id='$id'";
				$res=mysqli_query($con,$sql);
				if($res) {
					echo "<script>location.href='?msg=3'</script>";
				}
				else
				{
					echo "<script>location.href='?msg=2'</script>";
				}
			}

		}
		?>
	</div>


	<?php 
	include 'footer.html';

	?>

