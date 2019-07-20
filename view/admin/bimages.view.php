<?php require 'adminheader.php';  ?>            
<div class="container-fluid">
    <style type="text/css">
                    .img{height: 150px; width: auto; margin: 20px 20px; float: none;}
                </style>
                <div class="row">
                      <div class="col-lg-6">
                        <div class="card card-outline-primary">
                            <div class="card-header text-white">UPLOAD SLIDING IMAGE</div>
                <?php  if (isset($error['class'])) {  echo "<span class='alert alert-danger'>".$error['class']."</span>";  }
                if (isset($succ['insert'])) {  echo "<span class='alert alert-success'>".$succ['insert']."</span>";  }
                 ?>
<form action="#" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">                             <div class="form-group">
                                <div class="row">
                                <label class="col-sm-3">Image:</label>
                                    <div class="col-sm-9">
                    <input type="file" class="form-control" required="required" name="file">
                    <?php if (isset($msg['error'])) {  echo "<span class='alert alert-danger'>".$msg['error']."</span>";  } ?>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="form-actions">
                                            <div class="col-md-12">
                                                    <div class="offset-sm-3 col-md-9">
                                <button type="submit" class="btn btn-primary" name="submit"> 
                                <i class="fa fa-check"></i> Submit</button>
                                                 </div>
                                        </div>
                                    </div>
                                </form>
                        </div>
                    </div>
                         <div class="col-lg-6">
                        <div class="card card-outline-primary">                              
                            <div class="card-header text-white">
                                <?php if (empty($images)) {
                                    echo "NO IMAGES UPLOADED YET";
                                }  else{ 
                                    
                                    echo "RECENT SLIDING IMAGES"; 
                                                                  

                                    ?>
                            </div>
                            <div class="card-body">
                                
                                    <table class="table"> 
                                    <thead><tr><td>SN</td><td>IMAGE</td><td>REMOVE</td></tr> </thead>
                                    <tbody>
                                    <form method="post"> 
                                    <?php $n = 0;
                                    foreach ($images as $image) {
                                        $n++;
                                        extract($image);
                                     ?>                  
                            <tr><td><?= $n; ?></td><td><img src="<?= $image; ?>" class="img"></td>
                        <td><input type="checkbox" name="delete[]" value="<?= $id; ?>"></td> </tr> 
                                            <?php } ?>  </tbody> 
                    <tfoot><tr><td colspan="3" class="text-center"><button type="submit" class="btn btn-danger" name="remove"> <i class="fa fa-trash"></i> Delete</button></td></tr></tfoot>
                                            </form>                         
                                    </table>
                                </div>
                         
                             <?php } ?>
                      
                        </div>
                     </div>
                    
                </div>
             </div>
           
           <?php require 'adminfooter.php'; ?>