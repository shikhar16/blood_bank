<?php
  require'connect.php';
  include'header.html';
  echo'<h3 style="color:#00cc00;font-family:Comic sans ms;font-size:30px;margin-left:1300px;margin-top:0px;">Guest Login</h3>';
  echo '<a href="index.php" class="btn btn-primary" style="margin-left:1300px;">Go Back</a> ';
  echo '<div style="font-size:20px;text-transform:capitalize;padding-left:20px;border-radius:10px;color:#f2f2f2;">';
  echo'<h1>Available Donor List:</h1>';
  $query="select `firstname`,`lastname`,`mob_no` from `donor` where `bloodgroup`='".mysql_real_escape_string(@$_POST['bloodgroup'])."'";
  $query_run=mysql_query($query);
  $query_num_rows=mysql_num_rows($query_run);
  if($query_num_rows>0)
  {
  while($query_row=mysql_fetch_assoc($query_run))
  {
    echo 'Name: '.$query_row['firstname'].'&nbsp'.$query_row['lastname'].'<br>';
    echo 'Mobile No: '.$query_row['mob_no'].'<br><br>';
  }
  }
  else if(isset($_POST['submit']) && $query_num_rows==0)
  {echo '<div class="alert-danger" style="font-size:20px;text-transform:capitalize;padding-left:20px;border-radius:10px;">';
  echo'No results found!';
  echo'</div>';}
  echo'</div>';

?>

<form action="guest.php" method="POST">
</br></br>
<div style="font-size:20px;text-transform:capitalize;color:#f2f2f2;margin-left:20px;">Select Bloodgroup:
<select name="bloodgroup" style="font-size:25px;background:#ffff99;border-radius:8px;color:brown;">
<option value="A+">A+</option><option value="A-">A-</option><option value="B+">B+</option><option value="B-">B-</option>
<option value="O+">O+</option><option value="O-">O-</option><option value="AB+">AB+</option><option value="AB-">AB-</option>
<option value="A1+">A1+</option><option value="A1-">A1-</option><option value="A2+">A2+</option><option value="A2-">A2-</option>
<option value="A1B+">A1B+</option><option value="A1B-">A1B-</option><option value="A2B+">A2B+</option><option value="A2B-">A2B-</option><option value="BOMBAY BLOOD GROUP">BOMBAY BLOOD GROUP</option>
</select><br></br>
<input type="submit" value="Search" name="submit" class="btn btn-success btn-lg">
</form>
</div>