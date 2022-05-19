<?php
include('db_connection.php');
?>

<html>
<head>
	

</head>

<body>

<center>
<button><a href="registration.php">ADD NEW STUDENT</a></button>

&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button><a href="display.php">HOME PAGE</a></button>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button><a href="logout.php">LOGOUT</a></button>

</center>
<br>
<hr>
<br>
	
<?php
$select = mysqli_query ($connection, "SELECT * FROM registration");
$num = mysqli_num_rows($select);

if($num == false){
	echo "Data not found";
}else{
?>

<div class="tableview">	
<table border="2" width="100%" align="center">
	<caption>STUDENTS REGISTRATION - MWENGE CATHOLIC UNIVERSITY COLLEGE</caption>
	<tr>
		<th>S/No</th>
		<th>REG. No.</th>
		<th>FIRST NAME</th>
		<th>LAST NAME</th>
		<th>AGE</th>
		<th>USERNAME</th>
		<th>PHONE No.</th>
		<th>ADDRESS</th>
		<th colspan="2">ACTION</th>
	</tr>
	
<?php
$i = 1;
while($rows = mysqli_fetch_array ($select)){
?>
	<tr>
		<td align="center"><?php echo $i++;?></td>
		<td><?php echo $rows ['st_id'];?></td>
		<td><?php echo $rows ['st_fname'];?></td>
		<td><?php echo $rows ['st_lname'];?></td>
		<td align="center"><?php echo $rows ['st_age'];?></td>
		<td><?php echo $rows ['st_username'];?></td>
		<td><?php echo $rows ['st_phone'];?></td>
		<td><?php echo $rows ['st_address'];?></td>
		<td>
			<?php
				$student_id = $rows['student_id'];
					echo "<a href='edit_registration.php?student_id=$student_id'><button>EDIT</button></a>";
			?>
		</td>
		
		<td>
			<?php
				$student_id = $rows['student_id'];
					echo "<a href='delete_registration.php?student_id=$student_id'><button>DELETE</button></a>";
			?>
		</td>
	</tr>
<?php
}
?>
</table>
</div>

<?php
}
?>

</body>
</html>