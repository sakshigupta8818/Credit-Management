<?php 
$conn = mysqli_connect('localhost','root','','credit');
$query = 'SELECT * FROM user';
$result = mysqli_query($conn,$query);
?>
