<?php
$msg="";
if(isset($_GET['id'])&& isset($_GET['file'])){
    require_once 'db.php';

    $id=$_GET['id'];
    $file=$_GET['file'];

     $cmd="DELETE FROM info WHERE user_id='$id' ";

            if($conn->query($cmd)){
                unlink($file);
                $msg="User successfully deleted";
            } else{
                $msg=$conn->error;
            }
         }else{
            $msg="User id not found";
         }
        
        
header("location:index.php?tok=".$msg);
