<?php
$msg="";
$rw=[];
if(isset($_GET['id'])){

    require_once 'db.php';
    $id=$_GET['id'];
  
    $res=$conn->query("SELECT * FROM info WHERE user_id='$id' ");
    $rw=$res->fetch_assoc();
          }
       else{
            $msg="User id not found";
         }
        ?>

 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Updte page</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
        <div class="col-lg-3"></div>

            <div class="col-lg-5">
             <div class="card mt-5 border-info">
                <div class="card-header text-bg-dark text-center">
                     Update Here
                </div>
                 <div class="card-body">
                   <form method="post" action="Back-update.php">

                    <div class="form-group">
                        <label class=" fw-medium my-2">User ID</label>
                        <input type="text" value="<?php echo $rw['user_id'];?>" placeholder="Enter here" name="user_id" class="form-control" readonly />
                    </div> 
                      <div class="form-group">
                        <label class=" fw-medium my-2">User Name</label>
                        <input type="text" value="<?php echo $rw['user_name'];?>" placeholder="Enter here" name="username" class="form-control">
                    </div>  

                    <div class="form-group">
                        <label class=" fw-medium my-2">Mobile no.</label>
                        <input type="text" value="<?php echo $rw['mobile_no'];?>" placeholder="Enter here" name="mobileno" class="form-control">
                    </div> 

                    <div class="form-group">
                        <label class=" fw-medium my-2">Date Of Birth</label>
                        <input type="date" value="<?php echo $rw['dob'];?>" placeholder="Enter here" name="dob" class="form-control">
                    </div>  
                   
                   <button type="submit" class="btn btn-info w-100 my-2">Register</button>

                   <div class="text-center">
                    <?php
                    if(isset($_GET['tok'])){
                        echo $_GET['tok'];
                    }
                    ?>
                   </div>
                                         
                   </form>
                </div>
             </div>
        </div>
        <div class="col-lg-4"></div>
     </div>
</div>
</body>
</html>
        

