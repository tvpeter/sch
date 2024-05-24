<?php require'adminheader.php'; ?>
            <!-- Container fluid  -->
            <style type="text/css">
                    .img {image-orientation: from-image; width: 100px; height: 70px;}
                </style>
            <div class="container-fluid">
              <div class="row">
                       <div class="col-md-12">
                        <div class="row">

                         <div class="col-md-6">
                            <div class="card">
                            <div class="card-body">
                                <div class="card-two">
                                        <p class="text-center"><strong>STAFF DETAILS</strong></p><hr>
                                   <div class="row">
                                     <span class="text-right col-md-3">Staff Name:</span>
                                    <span class="col-md-9"><?= $name; ?></span></div><hr>

                                    <div class="row">
                         <span class="text-right col-md-3">Signature:</span>

                        <span class="col-md-9"><?php if (!empty($signature)){  echo "<img src='passports/$signature' class='img'>";  } ?></span></div><hr>
                                    
                                     <div class="row">
                                <span class="text-right col-md-3">Account Status:</span>
                                    <span class="col-md-9"><?= strtoupper($status); ?></span></div><hr>
                                    
                                    <div class="row">
                                     <span class="text-right col-md-3">Role:</span>
                                    <span class="col-md-9"><?= strtoupper($role); ?></span></div><hr>
                                    
                                    <div class="row">
                            <span class="text-right col-md-3">Mobile Contact:</span>
                            <span class="col-md-9"><?= $mobile; ?></span></div><hr>
                                    
                            <div class="row"><span class="text-right col-md-3">Email:</span>
                                <span class="col-md-9"><?= $em; ?></span></div><hr>
                                <?php if (empty($staffC) && $role == "staff") {
                                           echo "STAFF NOT GRANTED ACCESS TO ANY CLASS YET";
                                       }elseif($role == "admin"){ 
                                            echo "Admin has access to all classes";
                                       }else{?>
                                <table class="table table-hover"><thead><tr> 
            <td colspan="3" class="text-center"><strong>CLASSES ACCESSED</strong></td></tr></thead>
                   <thead><tr><th>#</th><th>CLASS</th><th>REMOVE</th></tr>  </thead>
                    <tbody><?php  $sn=0;
                                     foreach ($staffC as $class){ 
                                            extract($class); $sn++; ?>          
                    <tr><th scope="row"><?= $sn; ?></th><td><?=  $class; ?></td>
                    <td><a href="delete.php?stclassid=<?= $id; ?>&stid=<?= $staffD['id']; ?>" onclick="return confirm('Sure want to remove this class this staff list?')" title="Delete class from staff list" ><i class="fa fa-trash"></i></a></td>
                                    </tr>
                                           <?php } ?></tbody>
                                           
                                        </table>                            
                                    
                                    <?php } ?>

                                </div>
                                <hr>
                                <div class="text-center">
                                    <a href="users.php" class="btn btn-primary"> <i class="fa fa-reply"></i> Back</a>
                                </div>
                            </div>
                        </div>
                    </div>




            <div class="col-lg-6"><div class="card">
                                  <div class="card-body">
                                <div class="table-responsive">
                                    <?php if ($role == "admin") {

                                        echo "CLASSES CANNOT BE ADDED OR REMOVED FOR ADMIN";
                                    } else{ ?>
                                    <table class="table table-hover">
                                          <thead>
                                    <tr><th colspan="3" class="text-center"><strong>SELECT CLASSES TO ADD</strong></th></tr>
                                            <tr>
                                           <th>#</th>
                                                <th>CLASS NAME</th>
                                                <th>ADD</th>
                                               
                                            </tr>

                                        </thead>
                                        <tbody>
<form action=""  method="post">
        <?php $n = 0;
         foreach ($addClasses as $class) {  $n++;
                    extract($class); ?>
            <tr style="font-weight: bold;">
              <th scope="row"><?= $n; ?></th>
             <td><?=  htmlentities($class); ?></td>
        <td><input type="checkbox" name="rclass[]" id="checkbox" value="<?= htmlentities($class); ?>"></td>
                                                </tr>
                                                   <?php } 
                                                   ?>    </tbody>
                <tfoot><tr>
                  <td class="text-center" colspan="3"> <button class="btn btn-inverse" name="adds" type="submit"><i class="fa fa-plus"></i>&nbsp;ADD CLASS</button></td></tr> </tfoot>    
                                                    </form>  
                                      
                                    </table>
                                <?php } 
                                ?>
                                </div>
                            </div>
                        </div>
                    </div> 


                    </div></div></div>
                </div>
           <?php require 'adminfooter.php'; ?>