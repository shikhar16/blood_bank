<?php
include'header.html';
echo'<h3 style="color:#00cc00;font-family:Comic sans ms;font-size:30px;margin-left:1290px;margin-top:0px;">Administrator</h3>';
echo '<a href="logout.php" class="btn btn-primary" style="margin-left:1400px;">Log out</a></br> ';
?>

<h2 style="color:#00cc00;font-family:Comic sans ms;font-size:30px;margin-left:10px;margin-top:0px;">Enter ID & name of the patient to approve blood donation request:</h2>
<div style="color:#f2f2f2;font-size:20px; margin-left:10px">
<form action="blood_donation_approve.php" method="POST">
</br>
Patient ID: <input type=text name="id" style="font-size:25px;
    background:#ffff99;
    border-radius:8px;
    color:brown;"><br><br>
Patient Name: <input type=text name="name" style="font-size:25px;
    background:#ffff99;
    border-radius:8px;
    color:brown;"><br><br>
<input type="submit" value="Submit" class="btn btn-success btn-lg" style="font-size:20px;margin-left:10px">
</form>
</div>
</br></br>

<?php
require 'connect.php';
ob_start();
session_start();
echo '<div style="font-size:20px;text-transform:capitalize;padding-left:20px;border-radius:10px;color:#f2f2f2;">';
$current_file=$_SERVER['SCRIPT_NAME'];
if(isset($_SERVER['HTTP_REFERER'])&&!empty($_SERVER['HTTP_REFERER']))
 {$http_referer=$_SERVER['HTTP_REFERER'];}

 if(isset($_SESSION['user_id'])&& !empty($_SESSION['user_id']))
 {    

$query="select * from `request` where `allow`!='yes'";

 $i=0;
 $k=1;
 if($query_run=mysql_query($query))
    {
      $query_num_rows=mysql_num_rows($query_run);
      while($query_row=mysql_fetch_assoc($query_run))
      {
          $i++;
          echo 'ID: '.$query_row['id'].'<br>';
          $name[$i]=$query_row['name'];
          echo 'Patient full name: '.$query_row['name'].'<br>';
          echo 'Patient Blood Group: '.$query_row['bloodgroup'].'<br>';
          echo 'patient age: '.$query_row['age'].'<br>';
          echo 'When patient needs blood: '.$query_row['day'].'/'.$query_row['month'].'/'.$query_row['year'].'<br>';
          echo 'No of Units Blood required: '.$query_row['units'].'<br>';
          echo 'Mobile number: '.$query_row['mob_no'].'<br>';
          echo 'Location: '.$query_row['location'].'<br>';
          echo 'Hospital Name: '.$query_row['hospital'].'<br>';
          echo 'Address: '.$query_row['address'].'<br>';
          echo 'Purpose: '.$query_row['purpose'].'<br><br><br>';
          $store[$i]=$query_row['id'];
       }
     }

                    if(isset($_POST['id'])&&isset($_POST['name']))
                    {
                      $id=$_POST['id'];
                      $name=$_POST['name'];
                      if(!empty($id)&&!empty($name))
                      {
                              $query1="select `id` from `request` where `id`='$id' && `name`='$name' ";
                              if($query_run1=mysql_query($query1))
                        {
                               if(mysql_num_rows($query_run1)!=0)
                          {
                              $query="update `request` set `allow`='yes' where `id`='$id' && `name`='$name' ";
                              if($query_run=mysql_query($query))
                              {
                                 echo '<div class="alert-danger" style="font-size:20px;text-transform:capitalize;padding-left:20px;border-radius:10px;">';
                                   echo'<h4>'.$name.' request approved </h4>';
                                  echo'</div>';

                              }
                          }
                          else
                           { echo '<div class="alert-danger" style="font-size:20px;text-transform:capitalize;padding-left:20px;border-radius:10px;">';
                           echo'Incorrect details';
                           echo'</div>'; }

                        }


                      }
                             else
                              { echo '<div class="alert-danger" style="font-size:20px;text-transform:capitalize;padding-left:20px;border-radius:10px;">';
                              echo'Please fill all details';
                              echo'</div>'; }

                    }

 }
 else
 {
    echo'please login to continue';
 }
 echo'</div>';
?>



