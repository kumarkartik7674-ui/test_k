<?php
$msg="";

function get_password(){
    $str="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz{}@123345434";
    return substr(str_shuffle($str),0,8);
}

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $user=$_REQUEST['username'];
    $mobile=$_REQUEST['mobileno'];
    $dob=$_REQUEST['dob'];

$file_name=$_FILES['file']['name'];
 echo($file_name);
$file_size=$_FILES['file']['size'];
$file_temp=$_FILES['file']['tmp_name'];
$file_type=strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

$ext=['png','jpg','webp','gif'];



    if(empty($user)){
        $msg="enter username";
    }elseif(empty($mobile)){
        $msg="enter mobile no.";
    }elseif(!is_numeric($mobile)){
        $msg="enter mobile no. in only digit";
    }elseif(strlen($mobile)!=10){
        $msg="enter mobileno. in only 10 digit";
    }elseif(empty($dob)){
        $msg="Select date of birth";
    }elseif($file_name==null){
         $msg="file not uploaded";
    }elseif($file_size>100 * 1024){
         $msg="File size too large ,more than 100KB";
    }elseif(!in_array($file_type,$ext)){
        $msg="File type only excepted, JPG , PNG , WEBP , GIF";
    }

     else{
             require_once 'db.php';
    
             
            $fileName="FILE".time().".".$file_type;
            
            $dir="uploads/".$fileName;
                        
            $userid="USR".time();
  
      if(move_uploaded_file($file_temp,$dir)){
                
            $pwd=get_password();
            $cmd="INSERT INTO info VALUES('$userid','$user','$mobile','$dob','$dir','$pwd')";

            if($conn->query($cmd)){
                $msg="User successfully registered";
            } else{
                $msg=$conn->error;
            } 
         }else{
            $msg="FILE not uploaded on server";
         }
        
        
    }

}else{
    $msg="invalid request";
}
header("location:index.php?tok=".$msg);