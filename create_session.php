<?php
session_start();
if(isset($_POST['data'])){
	$_SESSION['name'] = $_POST['data'];
}
echo $_SESSION['name'];

?>