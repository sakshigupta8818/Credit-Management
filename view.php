<!doctype html>
<html>
	<head>
	<title>View all users</title>
	<style>
	table,td,th
	{text-align:center;
	padding:5px;}
	th{font-size:24px;border:1px solid black;}
	td{font-size:18px;border:1px solid black;}
	#inp {
color:black;
height:28px;
width:200px;
font-weight:bold;
}
#f{	
font-weight:bold;
color:black;
	text-align:center;}
.but{
border-radius:100px;
margin-top:20px;
font-size:20px;
border:none;
height:40px;
width:150px;
font-weight:bold;
color:white;
background:rgb(16,97,144);
line-height:25px;
text-align:center;
}
.aa{text-decoration:none;
color:white;}
	</style>
	</head>
	<body>
	<center>
	<p style="margin-top:40px;font-size:35px;font-weight:bold;">View all users:</p>
	<table>
	<tr>
	<th>S.No.</th>
	<th>User's Name</th>
	<th>User's E-mail</th>
	<th>User's Credit</th>
	<th>Credit to be transferred from</th>
	</tr>
		<?php
	include_once('d.php');
		while($rows = mysqli_fetch_array($result))
		{
			$id=$rows['id'];
			?>
		<tr>
		<td><?php echo $rows['id'];echo "."; ?></td>
		<td><?php echo $rows['name']; ?></td>
		<td><?php echo $rows['email']; ?></td>
		<td><?php echo $rows['currentcredit']; ?></td>
		<td><a href="select.php?details=<?php echo $id; ?>">Transfer</a></td>
		<?php } ?>
		</tr>
	</table>
	<button type="button" class="but"><a href="index.php" class="aa">Home Page</a></button>
	<center>
	</body>
</html>