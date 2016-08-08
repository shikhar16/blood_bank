<?php
include'header.html';
require 'core.php';                                         //or include.php
require 'connect.php';
if(loggedin())                                               //i am right now at index, so $current_file in loginform will have value index.php
{

header('Location: loggedin.php');


}
else
{
include 'loginform.php';
echo'<h3 style="color:#f2f2f2;font-family:Comic sans ms;font-size:20px;margin-left:20px;margin-top:40px;">Not Registered in yet!!   Register here:</h3>';
echo '<a href="register.php" class="btn btn-primary" style="margin-left:20px;">Register</a> ';
echo'<br><br>';
echo'<h3 style="color:#f2f2f2;font-family:Comic sans ms;font-size:20px;margin-left:20px;margin-top:60px;">Login as a guest:</h3>';
echo '<a href="guest.php" class="btn btn-primary" style="margin-left:20px;">Guest Login</a> ';
echo'<h3 style="color:#f2f2f2;font-family:Comic sans ms;font-size:20px;margin-left:20px;margin-top:80px;">Post your Blood Request:</h3>';
echo '<a href="request.php" class="btn btn-primary" style="margin-left:20px;">Blood Request</a>';
}

?>
