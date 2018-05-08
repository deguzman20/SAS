<?php
$conn = mysqli_connect('localhost','root','','searchandsecure');
$user = $_POST['user'];
$newpass = $_POST['pass'];
$query = mysqli_query($conn,"UPDATE tbl_admin SET password='$newpass' WHERE username='$user'");
    

?>