<?php
include'header.php';
@$id=$_GET['id'];
if(isset($_POST['export']))
{
$output='';
$sql="SELECT * from student ";

$res=mysqli_query($con,$sql);
$rc=mysqli_num_rows($res);
if($rc>0)
{
	$output .='
 <table border="1">
	<tr>
	      <th>rollno</th>
	      <th>name</th>
	      <th>college</th>
	      <th>branch</th>
	      <th>percentage</th>
	      <th>company</th>
	</tr>';
	while($row=mysqli_fetch_array($res))
	{
		$output .=
		' <tr>
		                    <td>'.$row["rollno"].'</td>
							<td>'.$row["name"].'</td>
							<td>'.$row["college"].'</td>
							<td>'.$row["branch"].'</td>
							<td>'.$row["percentage"].'</td>
							<td>'.$row["id"].'</td>
					 </tr>';
	}
	$output .='</table>';
	header('Content-Type:application/xls');
	header('Content-Disposition:attachement;filename=download.xls');
		  echo $output;
}
}
?>