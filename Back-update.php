<?php
$msg="";
if($_SERVER['REQUEST_METHOD']=='POST'){
   require_once 'db.php';

    $id= $_REQUEST['user_id'];
    $user= $_REQUEST['username'];
    $mobile= $_REQUEST['mobileno'];
    $dob=$_REQUEST['dob'];
   
     $cmd="UPDATE info SET user_name='$user',mobile_no='$mobile',dob='$dob' WHERE user_id='$id'  ";

            if($conn->query($cmd)){
                $msg="User successfully updated";
            } else{
                $msg=$conn->error;
            }
         }else{
            $msg="Invalid request";
         }
      
  header("location:index.php?tok=".$msg); 
