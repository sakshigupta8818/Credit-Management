<?php
	include_once('d.php');
			?>
<!doctype html>
<html>
	<head>
	<title>Select the users</title>
	<style>
	table,td,th
	{text-align:center;
	padding:5px;}
	th{font-size:24px;}
	td{font-size:18px;}
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
color:white;
background:rgb(16,97,144);
line-height:25px;
text-align:center;
}
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
	a{text-decoration:none;color:white;}

	</style>
	</head>
	<body>
	<center>
	<p style="margin-top:40px;font-size:35px;font-weight:bold;">Select the users:</p>
	<table>
	<tr><th>User Name</th>
	<th>Email</th>
	<th>Current credit</th></tr>
	<tr>
	<?php    
	$x = @$_GET['details'].'-';
$rec=@$_GET['details'];
$quer="SELECT * from user where id='$rec'";
$run1=mysqli_query($conn,$quer);
	$rows = mysqli_fetch_array($run1);  
	?>
	<td><?php echo  $rows['name']; ?> </td>
	<td><label name="view" id="inp" >
<option value="<?php echo $rows['email']; ?>" ><?php echo $rows['email']; ?></option>
</label></td>
<td>
<label name="view" id="inp" >
<option value="<?php $x = $x.$rows['currentcredit']; $rows['currentcredit']; ?>" ><?php ;echo $rows['currentcredit']; ?></option>
</label>
</td>
	</tr></table>
	
	

	<!--                  ******************               -->

	<form method='POST' action="select.php">
	<table>
	<tr>
	<th>Select the user</th>
	<th>User Name</th>
	<th>Current Credit</th>
	<th>Enter the credit</th>
	</tr>
		<?php  
		while($rows = mysqli_fetch_array($result)){
			if ($rows['id'] == $rec)
					continue;
			?>
		<tr>
		<td><input type="checkbox" class="check" name="check" id="<?php echo 'check'.$rows['id'];?>" value="<?php echo $rows['id'];?>">
		</td>
		<td><?php echo $rows['name']; ?></td>
		<td><label name="current" >
		<option value="<?php echo $rows[3]; ?>" ><?php echo $rows[3]; ?></option>
		</label></td>
		<td><input type="number" name="cred" id="<?php echo 'id'.$rows['id'];?>" disabled></td>
		<?php } ?>
		</tr>
		</table>
		<button type="button" class="but"><a href="view.php">Back</a></button>
		<input type='button' class="but" value=" Update " id="transfer"/>
	<center>
	</form>
	
	<script src="jquery.js"></script>
	<script>
		var a = new Array();
		var check_box;
		$(document).ready(function(){
			$('.check').click(function(){
				$(':checkbox:checked').each(function(i){
				check_box = $(this).val();		 
				});
				$('#id'+check_box).prop('disabled',false);
				a.push(check_box);
			});
			
		$("#transfer").click(function(){
			var i,data = "";
			for(i = 0; i < a.length; i++){
					 if (a[i] != undefined)
					 data += a[i]+"-"+$("#id"+a[i]).val()+",";
					}
					data = data + "<?php echo $x;?>";
			$.ajax({
				url:'transfer.php',
				method:'post',
				data:'data='+data,
				datatype:'text',
				success:function(e){
					alert("Transferred Successfully");
					window.location.replace("history.php?data="+e);
				}
			});
		});
			
		});
	</script>
	</body>
</html>


