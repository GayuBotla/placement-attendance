<?php

include 'header.php';

$id=$_GET['id'];


@$sql="DELETE from company_list where id='$id'";


$res=mysqli_query($con,$sql);
if($res)
{
	$message="deleted succesfully";
echo "<script type='text/javascript'>alert('$message')</script>";
echo "<script type='text/javascript'>location='Company list.php'</script>";
	echo "<script type='text/javascript'>alert('success')</script>";
}
?>