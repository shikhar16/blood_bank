<?php
require 'connect.php';
include'header.html';
ob_start();
session_start();
echo'<h3 style="color:#00cc00;font-family:Comic sans ms;font-size:30px;margin-left:1300px;margin-top:0px;">Administrator</h3>';
echo '<div style="font-size:20px;text-transform:capitalize;padding-left:20px;border-radius:10px;color:#f2f2f2;">';
$current_file=$_SERVER['SCRIPT_NAME'];
if(isset($_SERVER['HTTP_REFERER'])&&!empty($_SERVER['HTTP_REFERER']))
 {$http_referer=$_SERVER['HTTP_REFERER'];}

 if(isset($_SESSION['user_id'])&& !empty($_SESSION['user_id']))
 {
 echo '<a href="logout.php" class="btn btn-primary" style="margin-left:1400px;">Log out</a></br> ';
      if(isset($_POST['name']))
      {
        $name=$_POST['name'];
        if(!empty($name))
        {
            $query="select * from `donor` where `firstname`='".mysql_real_escape_string($name)."'";
            if($query_run=mysql_query($query))
            {
              $query_num_rows=mysql_num_rows($query_run);
              if($query_num_rows==0)
              {

                 echo '<div class="alert-danger" style="font-size:20px;text-transform:capitalize;padding-left:20px;border-radius:10px;">';
                 echo'Name doesn\'t exist ';
                 echo'</div>';
              }
              else
              {
                while($query_row=mysql_fetch_assoc($query_run))
                {
                 echo 'ID: '.$query_row['id'].'<br>';
                 echo 'Firstname: '.$query_row['firstname'].'<br>';
                 echo 'Lastname: '.$query_row['lastname'].'<br>';
                 echo 'Username: '.$query_row['username'].'<br>';
                 echo 'Password: '.$query_row['password'].'<br>';
                 echo 'Gender: '.$query_row['gender'].'<br>';
                 echo 'Bloodgroup: '.$query_row['bloodgroup'].'<br>';
                 echo 'Location: '.$query_row['location'].'<br>';
                 echo 'Distance from Hospital: '.$query_row['distance'].'Km<br>';
                 echo 'Mobile No: '.$query_row['mob_no'].'<br>';
                 echo 'Date of birth: '.$query_row['dob'].'/'.$query_row['mob'].'/'.$query_row['yob'].'<br>';
                 echo'<br><br>';
                }
              }
            }
        }
        else
       { echo '<div class="alert-danger" style="font-size:20px;text-transform:capitalize;padding-left:20px;border-radius:10px;">';
  echo'Please enter name to search';
  echo'</div>'; }
      }
 }

 else
 {
   header('Location:index.php');
 }
 echo'</div>';
?>


<form action="index_administrator.php" method="POST">
<br><br>
<h2 style="color:#00cc00;font-family:Comic sans ms;font-size:30px;margin-left:10px;margin-top:0px;">Search donor :</h2>
<div style="font-size:20px;text-transform:capitalize;color:#f2f2f2;margin-left:20px;">
Enter name:<input type="text" name="name" style="font-size:25px;
    background:#ffff99;
    border-radius:8px;
    color:brown;">
<input type="submit" value="Search" class="btn btn-success btn-lg">
</form>
<br><br><br><br><br>
<a href="blood_donation_approve.php" class="btn btn-primary" style="margin-left:400px;font-size:25px;">Click here to check for pending blood donation requests</a>
</div>