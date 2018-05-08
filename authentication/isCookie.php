<?php
if(isset($_COOKIE['user']))
{
	header("Location: admin/dashboard.php");
}
?>