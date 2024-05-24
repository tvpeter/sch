<?php require'adminheader.php'; ?>
            <!-- Container fluid  -->
            <div class="container-fluid">
                <style type="text/css">
                    .img{border-radius: 50%; height: 200px; width: auto; margin: 20px 20px; float: none;}
                </style>
                      <div class="row">
                         <div class="col-md-6">
                            <div class="card">
                            <div class="card-body">
                                <div class="card-two">
                                
            <div align="center"> <?php if (!empty($passport)){  echo "<img src='passports/$passport' class='img'>";  } ?></div>
                                    <div class="row">
                                     <span class="text-right col-md-3">Name:</span>
                                    <span class="col-md-9"><?= $name; ?></span></div><hr>

                                    <div class="row">
                         <span class="text-right col-md-3">Addmission Number:</span>
                            <span class="col-md-9"><?= $admno; ?></span></div><hr>
                                    
                                     <div class="row">
                                <span class="text-right col-md-3">Date of Birth:</span>
                                    <span class="col-md-9"><?= $dob; ?></span></div><hr>
                                    
                                    <div class="row">
                                     <span class="text-right col-md-3">Gender:</span>
                                    <span class="col-md-9"><?= $sex; ?></span></div><hr>
                                    
                                    <div class="row">
                            <span class="text-right col-md-3">Admitted Date:</span>
                            <span class="col-md-9"><?= $dater; ?></span></div><hr>
                                    
                                    <div class="row">
                                     <span class="text-right col-md-3">Address:</span>
                                <span class="col-md-9"><?= $address; ?></span></div><hr>
                                    
                                    <div class="row">
                                 <span class="text-right col-md-3">Phone:</span>
                            <span class="col-md-9"><?= $phone; ?></span></div><hr>

                                    <div class="row">
                            <span class="text-right col-md-3">Email Address:</span>
                            <span class="col-md-9"><?= $email; ?></span></div><hr>
                                    
                                    <div class="row">
                             <span class="text-right col-md-3">Promoted Date:</span>
                            <span class="col-md-9"><?= $dater; ?></span></div><hr>
                                <div class="row">
                                <span class="text-right col-md-3">Session:</span>
                                    <span class="col-md-9"><?= $session; ?></span></div><hr>
                                     <div class="row">
                                <label class="text-right col-md-3">Current Class:</label>
                                    <div class="col-md-9"><?= $class; ?></div></div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                           <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs profile-tab" role="tablist">
       <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Edit Scores</a> </li>
       <?php     if ($query->lookUp("id", "sessionstatus", ["session"=>$session, "status"=>"editable"]) == 1) { ?>
    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Update Profile</a> </li>
       <?php  } ?>

         <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#performance" role="tab">Performance</a> </li>                                
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="home" role="tabpanel">
                                    <div class="card-body"><br>
                                    
        <div><span><a href="viewsubjects.php?cid=<?= $admno ?>& session=<?= $session ?>& class=<?= $class ?>&term=Term I" class="btn btn-primary"><i class="fa fa-tag"></i>&nbsp;Term I</a> </span>
         <span style="font-style: italic;">  Record <?= $name ?> First Term Assessment and Exams</span>
                                           </div><hr>
        <div><a href="viewsubjects.php?cid=<?= $admno; ?>& class=<?= $class; ?>& session=<?= $session; ?> &term=Term II" class="btn btn-primary"><i class="fa fa-tags"></i>&nbsp;Term II</a><span style="font-style: italic;"> Record <?= $name ?> Second Term Assessment and Exams</span> </div><hr>
        <div><a href="viewsubjects.php?cid=<?= $admno; ?>& class=<?= $class; ?>& session=<?= $session; ?> &term=Term III" class="btn btn-primary"><i class="fa fa-tasks"></i>&nbsp;Term III</a> <span style="font-style: italic;">Record <?= $name ?> Third Term Assessment and Exams</span> </div>
                                    </div>
                                </div>

                                       <!--second tab-->
                                <div class="tab-pane" id="profile" role="tabpanel">
                                  <div class="card-body"><br>
        <form class="form-horizontal form-material" method="post" name="form1" enctype="multipart/form-data">
                                            <div class="form-group row">
           <label class="control-label text-right col-md-3">Name</label>
                                            <div class="col-md-9">
            <input type="text" class="form-control" name="uname" value="<?= $name; ?>">
                                            </div>
                                        </div>
                                         <div class="form-group row">
            <label class="control-label text-right col-md-3">Date of Birth:</label>
                                            <div class="col-md-9">
            <input type="text" class="form-control" name="udob" value="<?= $dob; ?>">
                                            </div>
                                        </div>
                                            
                                             <div class="form-group row">
                <label class="control-label text-right col-md-3">Gender:</label>
                                            <div class="col-md-9">
            <input type="text" class="form-control" name="gender" value="<?= $sex; ?>">
                                            </div>
                                        </div>

                                         <div class="form-group row">
                    <label class="control-label text-right col-md-3">Address:</label>
                                            <div class="col-md-9">
        <input type="text" class="form-control" name="uaddress" value="<?= $address; ?>">
                                            </div>
                                        </div>
                                         <div class="form-group row">
                    <label class="control-label text-right col-md-3">Phone:</label>
                                            <div class="col-md-9">
            <input type="text" class="form-control" name="uphone" value="<?= $phone; ?>">
                                            </div>
                                        </div>
                                         <div class="form-group row">
                <label class="control-label text-right col-md-3">Class:</label>
                                            <div class="col-md-9">
        <input type="text" class="form-control" name="uclass" value="<?= $class; ?>">
                                            </div>
                                        </div>
                   <div class="form-group row">
        <label class="control-label text-right col-md-3">Email:</label>
                            <div class="col-md-9">
         <input type="text" class="form-control" name="umail" placeholder="email@email.com" value="<?= $email; ?>">
                                            </div>
                                        </div>
                 <div class="form-group row">
                 <label class="control-label text-right col-md-3">New Passport:</label>
         <div class="col-md-9">
          <input type="file" class="form-control" name="upassport">
        <?php  if (isset($error['image'])) {  echo "<span class='text-danger'>".$error['image']."</span>";  } ?>
                                            </div>
                                        </div>
                                                                                     
            <div class="form-group"><div class="col-sm-12">
          <button class="btn btn-primary" name="update" type="submit">UPDATE</button>
                    </div></div></form></div></div>
            <div class="tab-pane" id="performance" role="tabpanel">
                <div class="card-body"><br> 
  <div class="p-3 mb-2 bg-dark text-white">First Term <?= $session; ?> Session:</div><hr>
                 <p class="text-primary">Average:  <?php if ($firstTerm['avg']) {
               echo round($firstTerm['avg'], 2);} else { echo"Not yet computed"; } ?></p>
           <p class="text-primary">Position: <?php if ($firstTerm['position']) {
                echo $firstTerm['position']; } else { echo"Not yet computed"; } ?></p>
<div class="p-3 mb-2 bg-dark text-white">Second Term <?= $session; ?> Session:</div><hr>
              <p class="text-primary">Average: <?php if ($secondTerm['avg']) {
             echo round($secondTerm['avg'], 2);} else { echo "Not yet computed"; } ?></p>
           <p class="text-primary">Position: <?php if ($secondTerm['position']) {
             echo $secondTerm['position'];} else { echo "Not yet computed"; } ?></p>
  <div class="p-3 mb-2 bg-dark text-white">Third Term <?= $session; ?> Session:</div><hr>
             <p class="text-primary">Average: <?php if ($thirdTerm['avg']) {
         echo round($thirdTerm['avg'], 2);} else { echo "Not yet computed"; } ?></p>
         <p class="text-primary">Position: <?php if ($thirdTerm['position']) {
          echo $thirdTerm['position'];} else { echo "Not yet computed"; } ?></p> 
    <div class="p-3 mb-2 bg-dark text-white">Annual Result <?= $session; ?> Session:</div><hr>
               <p class="text-primary">Average: <?php if ($annualRs['avg']) {
              echo round($annualRs['avg'], 2);} else { echo "Not yet computed"; } ?></p>
              <p class="text-primary">Position: <?php if ($annualRs['pos']) {
            echo $annualRs['pos'];} else { echo "Not yet computed"; } ?></p></div></div>
                            </div></div></div></div></div>
           <?php require 'adminfooter.php'; ?>