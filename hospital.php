<?php
require 'connect.php';
include'header.html';
ob_start();
session_start();
echo'<h3 style="color:#00cc00;font-family:Comic sans ms;font-size:30px;margin-left:1280px;margin-top:0px;">Hospital Staff</h3>';
$current_file=$_SERVER['SCRIPT_NAME'];
if(isset($_SERVER['HTTP_REFERER'])&&!empty($_SERVER['HTTP_REFERER']))
 {$http_referer=$_SERVER['HTTP_REFERER'];}

 if(isset($_SESSION['user_id'])&& !empty($_SESSION['user_id']))
 {
 echo '<a href="logout.php" class="btn btn-primary" style="margin-left:1400px;">Log out</a></br> ';
 echo'<br><br>';
 echo'<h3><a href="all_approved_requests.php" class="btn btn-primary" style="margin-left:50px;font-size:25px;">Check approved blood donation requests </a></h3>';
 echo'<br><br>';
 echo'<h3><a href="give_point.php" class="btn btn-primary" style="margin-left:50px;font-size:25px;">Give points to donor </a></h3>';
 }
 else
 {
   header('Location:index.php');
 }

?>