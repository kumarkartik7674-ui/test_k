<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
             <div class="card mt-5 border-primary">
                <div class="card-header text-bg-primary text-center">
                     Register Here
                </div>
                 <div class="card-body">
                   <form method="post" action="register.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class=" fw-medium my-2">User name</label>
                        <input type="text" placeholder="Enter here" name="username" class="form-control">
                    </div>  
                    <div class="form-group">
                        <label class=" fw-medium my-2">Mobile no.</label>
                        <input type="text" placeholder="Enter here" name="mobileno" class="form-control">
                    </div> 
                    <div class="form-group">
                        <label class=" fw-medium my-2">Date Of Birth</label>
                        <input type="date" placeholder="Enter here" name="dob" class="form-control">
                    </div>  
                    <div class="form-group">
                        <label class=" fw-medium my-2">Upload File</label>
                        <input type="file" placeholder="Enter here" name="file" class="form-control">
                    </div>  
                   <button type="submit" class="btn btn-primary w-100 my-2">Register</button>

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
            <div class="col-lg-7">
                <div class="card mt-5 border-warning">
                    <div class="card-header text-bg-danger   text-center">Available data</div>
                    <div class="card-body">
                             <table class="table">
                                         <thead>
                                            <tr>
                                                <th>Photo</th>
                                                <th>User name</th>
                                                <th>Mobile no.</th>
                                                <th>Date of Birth</th>
                                                <th>Remove</th>
                                                <th>Update</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                           require_once 'db.php';
                                           $res=$conn->query("SELECT * FROM info");
                                           while ($rw=$res->fetch_assoc()){
                                            ?>
                                              <tr>
                                                <td><img src="<?php echo $rw['image'];?>" style='height:40px'></td>
                                                <td> <?php echo $rw['user_name'];?></td>
                                                <td><?php echo $rw['mobile_no'];?></td>
                                                <td><?php echo $rw['dob'];?></td>



                    <td>
                          <button class=" btn btn-rounded btn-info"><a href="delete.php?id=<?php echo $rw['user_id'];?>&file=<?php echo $rw['image']; ?>" style="text-decoration:none;color:black">Delete</a></button>

                       <button class=" btn btn-rounded btn-info"><a href="update.php?id=<?php echo $rw['user_id'];?>" style="text-decoration:none;color:black">Update</a></button>
                                               </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                               </table>

                    </div>
                </div>
            </div>

        </div>
    </div>
</body>
</html>