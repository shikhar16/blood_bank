<?php
  require 'core.php';
  require 'connect.php';
  include'header.html';
  echo '<a href="index.php" class="btn btn-primary" style="margin-left:1300px;">Go Back</a> </br>';
  echo '<div class="alert-danger" style="font-size:20px;text-transform:capitalize;padding-left:20px;border-radius:10px;">';
  if(!loggedin())
{
    if(isset($_POST['firstname'])&&isset($_POST['lastname'])&&isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['gender'])&&isset($_POST['bloodgroup'])&&isset($_POST['location'])&&isset($_POST['distance'])&&isset($_POST['mob_no'])&&isset($_POST['yob'])&&isset($_POST['mob'])&&isset($_POST['dob'])&&isset($_POST['secure']))
 {
      $firstname=$_POST['firstname'];
      $lastname=$_POST['lastname'];
      $username=$_POST['username'];
      $password=$_POST['password'];
      $password_again=$_POST['password_again'];
      $password_hash=md5($password);
      $gender=$_POST['gender'];
      $bloodgroup=$_POST['bloodgroup'];
      $location=$_POST['location'];
      $distance=$_POST['distance'];
      $mob_no=$_POST['mob_no'];
      $yob=$_POST['yob'];
      $mob=$_POST['mob'];
      $dob=$_POST['dob'];
      @$checkbox=$_POST['checkbox'];

      if(!empty($firstname)&&!empty($lastname)&&!empty($username)&&!empty($password)&&!empty($location)&&!empty($mob_no))
   {
  if(!empty($checkbox))
{
if($_SESSION['secure']==$_POST['secure'])
{
        if($password!=$password_again)
        echo'password dont match';
        else
    {
          $query="select `username` from `donor` where `username`='$username'";
          $query_run=mysql_query($query);

          if(mysql_num_rows($query_run)==1)
          echo 'The username '.$username.' already exists.';
          else
          {
            $query="insert into `donor` values('','".mysql_real_escape_string($firstname)."','".mysql_real_escape_string($lastname)."','".mysql_real_escape_string($username)."','".mysql_real_escape_string($password_hash)."','".mysql_real_escape_string($gender)."','".mysql_real_escape_string($bloodgroup)."','".mysql_real_escape_string($location)."','".mysql_real_escape_string($distance)."','".mysql_real_escape_string($mob_no)."','".mysql_real_escape_string($yob)."','".mysql_real_escape_string($mob)."','".mysql_real_escape_string($dob)."')";
            if($query_run=mysql_query($query))
            {
              $query="select `id` from `donor` where `username`='".mysql_real_escape_string($username)."' and `password`='".mysql_real_escape_string($password_hash)."'";
              $query_run=mysql_query($query);
              $user_id=mysql_result($query_run,0,'id');
              $_SESSION['user_id']=$user_id;
              header('Location: index.php');
            }
            else
            echo 'Sorry we can\'t register you at this time.Try again later';
          }


    }
}
else
{
      echo 'incorrect,try again';
      $_SESSION['secure']=rand(1000,9999);
}
}
else
echo'Please tick the checkbox if it is okay to display your details.';

   }
      else
      echo 'All fields are required';
 }
 echo'</div>';
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
<div style="font-size:20px ;margin-left:50px;margin-top:50px;color:#f2f2f2;">
<form action="register.php" method="POST">
Firstname: <input type="text" name="firstname" maxlength="40" id="a1" value="<?php if(isset($firstname)){echo $firstname;} ?>">     &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
Lastname: <input type="text" name="lastname" maxlength="40" id="a1"  value="<?php if(isset($lastname)){echo $lastname;} ?>"><br><br>
Username: <input type="text" name="username" maxlength="40" id="a1"  value="<?php if(isset($username)){echo $username;} ?>">      &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
Bloodgroup: <select id="a1" name="bloodgroup">
<option value="A+">A+</option><option value="A-">A-</option><option value="B+">B+</option><option value="B-">B-</option>
<option value="O+">O+</option><option value="O-">O-</option><option value="AB+">AB+</option><option value="AB-">AB-</option>
<option value="A1+">A1+</option><option value="A1-">A1-</option><option value="A2+">A2+</option><option value="A2-">A2-</option>
<option value="A1B+">A1B+</option><option value="A1B-">A1B-</option><option value="A2B+">A2B+</option><option value="A2B-">A2B-</option><option value="BOMBAY BLOOD GROUP">BOMBAY BLOOD GROUP</option>
</select></br></br>
Password: <input type="password" name="password" maxlength="32" id="a1" > &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
Mobile number: <input type="text" name="mob_no" id="a1"  value="<?php if(isset($mob_no)){echo $mob_no;} ?>"><br><br>
Re-enter password:<input type="password" name="password_again" id="a1"  maxlength="30" >&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
Distance from hospital(in KM): <input type="text" id="a1"  name="distance" maxlength="100"><br><br>
Gender:<br><input type="radio" name="gender" checked="checked" value="male">Male &nbsp <input type="radio" name="gender" value="female">Female<br><br>
Location:<br><textarea name="location" rows="7" cols="40" id="a1"></textarea><br><br>
Date of birth:<br><select id="a1" name="yob">
  <option value="">---Select year---</option>
  <?php for ($i = 1950; $i < date('Y'); $i++) : ?>
  <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
  <?php endfor; ?>
</select>
<select name="mob" id="a1">
  <option value="">---Select month---</option>
  <?php for ($i = 1; $i <= 12; $i++) : ?>
  <option value="<?php echo ($i < 10) ? '0'.$i : $i; ?>"><?php echo $i; ?></option>
  <?php endfor; ?>
</select>
<select name="dob" id="a1">
  <option value="">---Select date---</option>
  <?php for ($i = 1; $i <= 31; $i++) : ?>
  <option value="<?php echo ($i < 10) ? '0'.$i : $i; ?>"><?php echo $i; ?></option>
  <?php endfor; ?>
</select><br><br>
<img src="generate.php"/></br>
Type the value you see:<input type="text" id="a1"  name="secure" size="6"><br><br>
<input type="checkbox" name="checkbox" id="a1"> I authorise the website to display my telephone number so that the needy could contact me when there is an emergency.
<br>
<input type="submit" value="Register" class="btn btn-success btn-lg">
</form>
</div>
</body>
</html>
 <?php
}
 else if(loggedin())
 {
   echo'you are already registered and logged in';
 }
 ?>
