<?php
$conn = mysqli_connect('localhost','root','','searchandsecure');
$user = $_POST['user'];
$pass = $_POST['pass'];
$query = mysqli_query($conn,"SELECT * FROM tbl_admin WHERE username='$user' AND password='$pass'");
if(mysqli_num_rows($query)>0)
{
	echo 'Login Successfully';
	setcookie('user',$user, time() + 86400, "/");
    	
}	 
else{
	echo 'Login Failed';
}
?>