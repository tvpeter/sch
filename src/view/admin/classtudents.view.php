 <?php require 'adminheader.php';  ?>          
           <div class="container-fluid">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                <form action="" method="post" name="form1">
                        <div class="row">
                <div class="col-md-6">
                <div class="row">
                <div class="col-md-3">
       <select class="form-control custom-select" name="session" required aria-required="true">
            <?= $session; ?>   </select>
        </div>  
         <div class="col-md-3">
        <select class="form-control custom-select" name="class" required aria-required="true">
        <option selected="selected" value="" disabled="disabled">Class</option>
        <?php foreach ($classes as $class): ?>  
        <option value="<?= $class['class'] ?>"><?= $class['class']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                          </div>      

        <div class="col-md-6">
            <button type="submit" class="btn btn-dark btn-outline" name="check"><i class="fa fa-check"></i>Check</button></div>
        </div>
    </div></div>
        </form><hr>
        <?php if (isset($_POST['session']) && isset($_POST['class'])){ ?>
        <div class="p-3 mb-2 bg-primary text-white" align="center"><strong><?= "ALL STUDENTS IN ".$_POST['class'] ." SESSION ".$_POST['session']; ?></strong></div>
          <div class="table-responsive m-t-40">
            <table id="myTable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr><th>SN</th><th>NAME</th><th>ADMNO</th><th>DOB</th>
                        <th>GENDER</th><th>ADDRESS</th><th>DETAILS</th>
                    </tr></thead>
                    
                <tbody>  
                     <?php $n = 0;

     foreach ($students as $student){  $n++;  
        extract($student); ?>  
                    <tr style="font-weight: bold;">
                        <td><?= $n; ?></td>
                        <td class="text-primary"><?= $name; ?></td>
                        <td class="text-danger"><?= $admno; ?></td>
                        <td><?= $dob; ?></td>
                        <td class="text-success"><?= $sex; ?></td>
                        <td><?= $address; ?></td>
        <td align="center"><a href="student.php?cid=<?= $admno ?>&session=<?= $_POST['session']; ?>" title="Details"><i class="fa fa-telegram fa-2x"></i></a></td>
                     </tr>
                   <?php }}else{ 
                   echo "SELECT CLASS AND SESSION TO VIEW THE STUDENTS IN A CLASS"; }
                   ?>    
                                                     
                                        </tbody>
                                    </table>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php require 'adminfooter.php'; ?>