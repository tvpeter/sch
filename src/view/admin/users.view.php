<?php require 'adminheader.php';  ?>            
<div class="container-fluid">
      <div class="row"><div class="col-lg-6"> 
        <div class="card card-outline-primary">
<h4 class="card-header text-white text-center">CREATE NEW USER</h4>
    <?php  if (isset($succ['insert'])) { echo "<span class='alert alert-success'>".$succ['insert']."</span>";  } ?>
                            <div class="card-body m-t-15">
    <form action="#" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                <div class="form-group"><div class="row">
        <label class="col-sm-3">Staff Name:</label><div class="col-sm-9">
            <input type="text" class="form-control" required="required" name="sname"> 
                    <?php  if (isset($error['sname'])) {  echo "<span class='text-danger'>".$error['sname']."</span>";  } ?>
                                </div></div></div>
                <div class="form-group"><div class="row">
        <label class="col-sm-3">Phone Number:</label><div class="col-sm-9">
            <input type="number" class="form-control" required="required" name="snumber"> 
    <?php  if (isset($error['snumber'])) {  echo "<span class='text-danger'>".$error['snumber']."</span>";  } ?>
                                </div></div></div>
                <div class="form-group"><div class="row">
        <label class="col-sm-3">Email:</label><div class="col-sm-9">
            <input type="text" class="form-control" required="required" name="semail"> 
                <?php  if (isset($error['semail'])) {  echo "<span class='text-danger'>".$error['semail']."</span>";  } ?>
                                </div></div></div>

                    <div class="form-group"><div class="row">
                    <label class="col-sm-3">Class</label><div class="col-sm-9">
            <select class="custom-select" name="class" required aria-required="true">
                    <option selected="selected" value="" disabled="disabled">select</option>
                     <option value="admin">admin</option>
                    <?php foreach ($classes as $class): ?>  
                <option value="<?= $class['class']; ?>"><?= $class['class']; ?></option>
                                    <?php endforeach; ?>
                                </select>
    <?php  if (isset($error['class'])) {  echo "<span class='text-danger'>".$error['class']."</span>";  } ?>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="form-group">
            <div class="row"><label class="col-sm-3">Username</label>
            <div class="col-sm-9">        
     <input type="text" class="form-control" required="required" name="uname" pattern=".{4,}"   required title="Username should be atleast 4 characters long"> 
     <?php  if (isset($error['uname'])) {  echo "<span class='text-danger'>".$error['uname']."</span>";  } ?>
                    </div></div></div>

                    <div class="form-group"><div class="row">
                    <label class="col-sm-3">Password</label>
                    <div class="col-sm-9">
        <input type="password" class="form-control" required="required" name="pword" pattern=".{6,}"   required title="password be atleast 6 characters long">
        <?php  if (isset($error['pword'])) {  echo "<span class='text-danger'>".$error['pword']."</span>";  } ?> </div></div></div>

                <div class="form-group"><div class="row">
                <label class="col-sm-3">Confirm Password:</label><div class="col-sm-9">
        <input type="password" class="form-control" required="required" name="cpword" pattern=".{6,}"   required title="password should be atleast 6 characters long"> 
                    <?php  if (isset($error['cpword'])) {  echo "<span class='text-danger'>".$error['cpword']."</span>";  } ?>
                                </div></div></div>

        <div class="form-group"><div class="row">
                <label class="col-sm-3">Signature:</label><div class="col-sm-9">
    <input type="file" class="form-control" name="sign">
    <?php  if (isset($error['sign'])) {  echo "<span class='text-danger'>".$error['sign']."</span>";  } ?>
                        </div></div></div>

                <div class="form-actions"><div class="row">
              <div class="col-md-12"><div class="row"><div class="offset-sm-3 col-md-9">
            <button type="submit" class="btn btn-primary" name="submit"> <i class="fa fa-check"></i> Submit</button>
                             </div></div></div></div></div></form>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                                <div class="card-outline-primary">
                            <div class="card-header text-white text-center">
                                ALL STAFF, THEIR ROLES AND STATUS
                            </div></div>
                            <div class="card-body">
                                  <table class="table table-hover ">
                                        <thead>
                                            <tr><th>#</th><th>NAME</th><th>ROLE</th><th>STATUS</th><th>CLASSES</th>
                                                 <th>SUSPEND<br>/ACTIVATE</th><th>ADD/REMOVE <br> CLASSES</th>
                                                 <th>DELETE</th>
                                             </tr>
                                        </thead>
                                        <tbody>                                           
                                        <?php  $n=0;
                                         foreach ($sdetails as $st){  
                                            extract($st);
                                            $n++; ?>                                      
                                              <tr>
                                                <th scope="row"><?= $n; ?></th>
                                                <td><?=  $name; ?></td>
                                                <td><?=  strtoupper($role); ?></td>
                                                <td><?=  strtoupper($status); ?></td>
                                                <td>
        <?php if ($role == "admin") {  echo "All";        }else{
                        $stcls = $query->selectAndOrder(["class"], "tclasses", ["name"=>$id], "class", "ASC");
                 if(!empty($stcls)){  foreach ($stcls as $stcl) {
                 extract($stcl);  echo $class."; ";  } }  }    ?> </td>
    <td><?php if ($status == "active") { ?>
        <a href="delete.php?suspendid=<?= $id ?>" onclick="return confirm('Are you sure you want to suspend?')" title="Suspend Account" ><i class="fa fa-ban"></i></a>
        <?php  } else{ ?> 
     <a href="delete.php?activateid=<?= $id ?>" onclick="return confirm('Are you sure you want to activate this account?')" title="Activate Account" ><i class="fa fa-paper-plane"></i></a>
        <?php  } ?>        

    </td> 
    <td><a href="sclasses.php?stid=<?= $id; ?>"><i class="fa fa-plus"></i>/<i class="fa fa-minus"></i></a></td>
    <td><a href="delete.php?deleteid=<?= $id ?>" onclick="return confirm('Are you sure you want to delete this staff?')" title="Delete" ><i class="fa fa-trash"></i></a></td> 
                                        
                                            </tr>
                                           <?php } ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                     </div>
                </div>
             </div>
           
           <?php require 'adminfooter.php'; ?>