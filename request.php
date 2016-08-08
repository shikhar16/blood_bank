<?php
require 'connect.php';
include'header.html';
echo '<a href="index.php" class="btn btn-primary" style="margin-left:1300px;">Go Back</a> ';
echo'<h3 style="color:#00cc00;font-family:Comic sans ms;font-size:30px;margin-left:550px;margin-top:0px;">POST BLOOD REQUEST</h3>';
if(isset($_POST['name'])
&&isset($_POST['bloodgroup'])
&&isset($_POST['age'])
&&isset($_POST['day'])
&&isset($_POST['month'])
&&isset($_POST['year'])
&&isset($_POST['units'])
&&isset($_POST['mob_no'])
&&isset($_POST['hospital'])
&&isset($_POST['location'])
&&isset($_POST['address'])
&&isset($_POST['purpose']))
{
   $name=$_POST['name'];
   $bloodgroup=$_POST['bloodgroup'];
   $age=$_POST['age'];
   $day=$_POST['day'];
   $month=$_POST['month'];
   $year=$_POST['year'];
   $units=$_POST['units'];
   $mob_no=$_POST['mob_no'];
   $location=$_POST['location'];
   $hospital=$_POST['hospital'];
   $address=$_POST['address'];
   $purpose=$_POST['purpose'];

   if(!empty($name)&&!empty($age)&&!empty($day)&&!empty($month)&&!empty($year)&&!empty($units)&&!empty($mob_no)&&!empty($hospital))
   {
     $query="insert into `request` values('','".mysql_real_escape_string($name)."','".mysql_real_escape_string($bloodgroup)."','".mysql_real_escape_string($age)."','".mysql_real_escape_string($day)."','".mysql_real_escape_string($month)."','".mysql_real_escape_string($year)."','".mysql_real_escape_string($units)."','".mysql_real_escape_string($mob_no)."','".mysql_real_escape_string($location)."','".mysql_real_escape_string($hospital)."','".mysql_real_escape_string($address)."','".mysql_real_escape_string($purpose)."','')";
     if($query_run=mysql_query($query))
     header('Location:request_success.php');
     else
     {
     echo '<div class="alert-danger" style="font-size:20px;text-transform:capitalize;padding-left:20px;border-radius:10px;">';
     echo 'Sorry we can\'t register you at this time.Try again later';
     echo'</div>';
     }
   }
   else
   {

   echo '<div class="alert-danger" style="font-size:20px;text-transform:capitalize;padding-left:20px;border-radius:10px;">';
    echo'Please fill all fields';
  echo'</div>';
   }


}
?>
<html>
<head>
<style type="text/css">
  #a1
  {
    font-size:25px;
    background:#ffff99;
    border-radius:8px;
    color:brown;
  }
</style>
</head>
<body>
<div style="font-size:20px;text-transform:capitalize;padding-left:20px;border-radius:10px;color:#f2f2f2;">
<form action="request.php" method="POST">
Patient Full Name: <input type="text" name="name" id="a1"><br><br>
Patient Bloodgroup: <select name="bloodgroup" id="a1">
<option value="A+">A+</option><option value="A-">A-</option><option value="B+">B+</option><option value="B-">B-</option>
<option value="O+">O+</option><option value="O-">O-</option><option value="AB+">AB+</option><option value="AB-">AB-</option>
<option value="A1+">A1+</option><option value="A1-">A1-</option><option value="A2+">A2+</option><option value="A2-">A2-</option>
<option value="A1B+">A1B+</option><option value="A1B-">A1B-</option><option value="A2B+">A2B+</option><option value="A2B-">A2B-</option><option value="BOMBAY BLOOD GROUP">BOMBAY BLOOD GROUP</option>
</select><br><br>
Patient Age: <input type="text" name="age"  id="a1"><br><br>
When you need blood: <select name="day"  id="a1">
  <option value="">---Select date---</option>
  <?php for ($i = 1; $i <= 31; $i++) : ?>
  <option value="<?php echo ($i < 10) ? '0'.$i : $i; ?>"><?php echo $i; ?></option>
  <?php endfor; ?>
</select>
<select name="month" id="a1">
  <option value="">---Select month---</option>
  <?php for ($i = 1; $i <= 12; $i++) : ?>
  <option value="<?php echo ($i < 10) ? '0'.$i : $i; ?>"><?php echo $i; ?></option>
  <?php endfor; ?>
</select>
<select name="year"  id="a1">
  <option value="">---Select year---</option>
  <?php for ($i = 2016; $i <=2017; $i++) : ?>
  <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
  <?php endfor; ?>
</select><br><br>
How many units you need: <input type="text" name="units" id="a1"><br><br>
Mobile Number: <input type="text" name="mob_no" id="a1"><br><br>
Location: <input type="text" name="location" id="a1"><br><br>
Hospital Name: <input type="text" name="hospital" id="a1"><br><br>
Address: <textarea name="address" rows="7" cols="25" id="a1"></textarea><br><br>
Purpose: <textarea name="purpose" rows="7" cols="40" id="a1"></textarea><br><br>
<input type="submit" value="submit" class="btn btn-success btn-lg">
</form>
</div>
</body>
