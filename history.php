<?php

$data = @$_GET['data'];

$c_id = mysqli_connect("localhost","root","","credit");
if(mysqli_connect_error())
{
	die("Connection Not Established");
}

#$data = "1-50,4-60,3-16000";
$a = explode(",",$data);

$from_id = explode("-",$a[count($a)-1])[0];
$query = "SELECT * FROM user WHERE id='$from_id'";
$result = mysqli_query($c_id,$query);
$row = mysqli_fetch_array($result);
	
$from_balance =  $row['currentcredit'];
$from_name = $row['name'];

?>

<!doctype html>
<html>
	<head>
	<title>History Page</title>
	<style>
	table,td,th
	{text-align:center;
	padding:5px;}
	th{font-size:20px;
	border:1px solid black;}
	td{font-size:18px;
	border:1px solid black;}
	#inp {
color:black;
height:28px;
width:140px;
}
.but{
border-radius:100px;
margin-top:20px;
font-size:20px;
border:none;
height:40px;
width:150px;
font-weight:bold;
background:rgb(16,97,144);
line-height:25px;
text-align:center;
}
a{text-decoration:none;color:white;}
#inp {
color:black;
height:28px;
width:200px;
font-weight:bold;
}
#in {
color:black;
height:15px;
width:100px;
}
#f{
font-weight:bold;}
	
	</style>
	</head>
	<body>
	<center>
		<p style="margin-top:40px;font-size:35px;font-weight:bold;">Transfer History</p>
		<table>
		<tr>
			<th>S.No.</th>
			<th>Sender's Name</th>
			<th>Sender's Current Credit</th>
			<th>Receiver's Name</th>
			<th>Receiver's Current Credit</th>
			<th>Amount Transfered</th>
		</tr>
			<?php
			for($i = 0; $i < count($a) - 1; $i++){
				$to_id = explode("-",$a[$i])[0];
				$amount_transfer = explode("-",$a[$i])[1];
				$query = "SELECT * FROM user WHERE id='$to_id'";
				$result = mysqli_query($c_id,$query);
				$row = mysqli_fetch_array($result);
				
				$to_balance =  $row['currentcredit'];
				$to_name = $row['name'];
			?>
		<tr>
			<td><?php echo $i+1; ?></td>
			<td><?php echo $from_name; ?></td>
			<td><?php echo $from_balance; ?></td>
			<td><?php echo $to_name; ?></td>
			<td><?php echo $to_balance; ?></td>
			<td><?php echo $amount_transfer; ?></td>
		</tr>
			<?php } ?>
	
	</table>
		<button type="button" class="but"><a href="index.php">Home Page</a></button>
	<button type="button" value="VIEW" class="but"><a href="view.php">View Page</a></button>
	</center>
	</body>
	</html>