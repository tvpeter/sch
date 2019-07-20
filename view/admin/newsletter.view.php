<?php require 'adminheader.php';  ?>            
<div class="container-fluid">
                <div class="row">
                      <div class="col-lg-6">
                        <div class="card card-outline-primary">
                            <div class="card-header">
                        <div class="text-white">UPLOAD TERM'S NEWSLETTER</div></div>
                <?php  if (isset($error['class'])) {  echo "<span class='alert alert-danger'>".$error['class']."</span>";  }
                if (isset($succ['insert'])) {  echo "<span class='alert alert-success'>".$succ['insert']."</span>";  }
                 ?>
                       <form action="#" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                                    <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3">Session</label>
                                                <div class="col-sm-9">
                                                    <select class="custom-select" name="session" required aria-required="true">
                                                            <?= $gsession; ?>
                                                        </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3">Term</label>
                                                <div class="col-sm-9">
                                                    <select class="custom-select" name="term" required aria-required="true">
                                                            <?= $gterm; ?>
                                                        </select></div>
                                            </div>
                                        </div>
                             <div class="form-group">
                                <div class="row">
                                <label class="col-sm-3">Newsletter:</label>
                                    <div class="col-sm-9">
                    <input type="file" class="form-control" required="required" name="newsletter">
                    <?php if (isset($error['newsletter'])) {  echo "<span class='alert alert-danger'>".$error['newsletter']."</span>";  } ?>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                <div class="row">
                                <label class="col-sm-3">TITLE:</label>
                                    <div class="col-sm-9">
                    <input type="text" class="form-control" required="required" name="ntitle"> 
                                            </div>
                                            </div>
                                        </div>

                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="offset-sm-3 col-md-9">
                                            <button type="submit" class="btn btn-primary" name="submit"> <i class="fa fa-check"></i> Submit</button>
                                                 </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                        </div>
                    </div>
                         <div class="col-lg-6">
                    <div class="card card-outline-primary"> <div class="card-header">   
                            <div class="text-white">
                                <?php if (empty($letters)) {
                                    echo "NO NEWSLETTERS POSTED";
                                }  else{ 
                    echo "RECENT NEWSLETTERS FOR THE VARIOUS TERMS AND SESSIONS"; 
                                   ?>
                            </div></div>
                            <div class="card-body">
                                
                                    <table class="table table-striped"> 
                                    <tr>
                                                <td>SN</td>
                                                <td>TITLE</td> 
                                                <td>SESSION</td>
                                                <td>TERM</td>
                                                <td>VIEW</td>
                                                <td>DELETE</td>
                                            </tr>  
                                    <?php $n = 0;
                                    foreach ($letters as $letter) {
                                        $n++;
                                        extract($letter);
                                     ?>                  
                                              <tr>
                                                <td><?= $n; ?></td>
                                                <td class="text-info"><?= $title; ?></td>
                                                <td><?=  $session; ?></td> 
                                                <td><?= $term; ?></td>
    <td><a href="<?= $name; ?>" title="Details" target="_blank"><i class="fa fa-telegram fa-2x"></i></a></td>
            <td><a href="delete.php?ns=<?= $session ?>&nt=<?= $term ?>" title="Delete" onclick="return confirm('Are you sure you want to delete a newsletter?')"><i class="fa fa-trash fa-2x"></i></a></td>
                                            </tr> 
                                            <?php } ?>
                                            
                                            
                                      
                                    </table>
                                </div>
                         
                             <?php } ?>
                      
                        </div>
                     </div>
                    
                </div>
             </div>
           
           <?php require 'adminfooter.php'; ?>