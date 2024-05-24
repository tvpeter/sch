<?php require 'adminheader.php';  ?>            

     <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                        <div class="card-content">

                        
                            <div class="mt-4">
        <div class="p-3 mb-2 bg-dark text-white text-center">Make Announcement</div>
                          <form role="form" method="post">
                          <?php  if (isset($error['fd'])) {  echo "<span class='alert alert-danger'>".$error['fd']."</span>";  }
                    
                     ?>
                          <div class="form-group">
                         <input type="text" class="form-control" placeholder="Title" name="title" required="required">
                           </div>
             <div class="form-group">
           <textarea name="anndetails" rows="8" cols="80" class="form-control" style="height:300px" required="required">
             </textarea>
            </div>
           <div class="form-group m-b-0">
           <div class="text-right">
                 
    <button class="btn btn-inverse" name="submit"> <span>Send</span> <i class="fa fa-send m-l-10"></i> </button>
                </div>
                </div>
                </form>
               </div>
                           </div>
                            </div>
                        </div>
                    </div>

                <div class="col-6">
                 <div class="card">
                   <div class="card-body">
                <div class="card-content">
                                        <div class="mt-4">
       <div class="p-3 mb-2 bg-dark text-white text-center">Recent Announcements</div>
                         <form method="post" action="">
                            <ul class="message-list">
                              <?php if (empty($anns)) {
                             echo("No announcements yet. Make announcements"); } else{


                                      foreach ($anns as $ann) {                               
                                      extract($ann);
                                      ?>                   
                        <li class="unread">
                                <div class="col-mail-1">
                    <a href="readann.php?id=<?= $id; ?>">
        <input type="checkbox" name="del[]" value="<?= $id ?>">
                      <span class="title"><?= $topic; ?></span>
                    </a>
                    </div>
                          <div class="col-mail-2">
                             <div class="date">
                              <?= substr($postime, 0, 10); ?>
                              </div>
                                 </div>
                               </li>
                            <?php }} ?>
                                                        
                              </ul>
                                               
                        <div class="form-group m-b-0">
           <div class="text-right">
          <button class="btn btn-danger" name="delete" onClick="confirm('Sure want to delete this class?')"><i class="fa fa-trash"></i>&nbsp;Delete </button>
          </form>
                </div>
                </div>

                                            </div>
                                     <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End PAge Content -->
            </div>
           
           <?php require 'adminfooter.php'; ?>