<?php
include 'header.php';
$id=$_GET['id'];
$sql="SELECT * from company_list where id='$id'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res);
$id=$row['id'];
$name=$row['name'];
$date=$row['date'];
$status=$row['status'];
?>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<div class="container-fluid">
  
<form class="form-horizontal"  action="" method="post">
<fieldset>

<!-- Form Name -->
<legend>  Edit list</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="name">Name</label>  
  <div class="col-md-4">
  <input id="name" name="id" type="text" placeholder="Name"value="<?php  echo $name;?>" class="form-control input-md"  required> 
  </div> 
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="date">Date</label>  
  <div class="col-md-4">
  <input id="date" name="date" type="text" placeholder="date" value="<?php echo $date;?>"class="form-control input-md" required>
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <button id="submit" name="submit" class="btn btn-primary">SUBMIT</button>
  </div>
</div>

</fieldset>
</form>
</div>
<?php
if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$date=$_POST['date'];
	@$sql="UPDATE company_list set name='$name',date='$date' where id='$id'";
	$res=mysqli_query($con,$sql);
	if($res)
	{$message="updated succesfully";
echo "<script type='text/javascript'>alert('$message');</script>";
echo "<script type='text/javascript'>location='Company_list.php';</script>";


	}
	
}
	?>
	