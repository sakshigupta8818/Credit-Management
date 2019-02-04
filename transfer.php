<?php

if (isset($_POST['data']))
{
	$data = $_POST['data'];
}
#$data = "1-50,4-60,3-16000";
$a = explode(",",$data);

$from_id = explode("-",$a[count($a)-1])[0];
$from_credit = explode("-",$a[count($a)-1])[1];

$c_id = mysqli_connect("localhost","root","","credit");
if(mysqli_connect_error())
{
	die("Connection Not Established");
}

for($i = 0; $i < count($a) - 1; $i++){
	$to_id = explode("-",$a[$i])[0];
	$to_credit = explode("-",$a[$i])[1];
	
	$from_credit = $from_credit - $to_credit;
	
	$query = "SELECT currentcredit FROM user WHERE id='$to_id'";
	$result = mysqli_query($c_id,$query);
	$row = mysqli_fetch_array($result);
	
	$to_balance =  $row[0] + $to_credit;
	
	$query = "UPDATE user SET currentcredit='$to_balance' WHERE id='$to_id'";
	$result = mysqli_query($c_id,$query);
}
$query = "UPDATE user SET currentcredit='$from_credit' WHERE id='$from_id'";
$result = mysqli_query($c_id,$query);

echo $data;

?>