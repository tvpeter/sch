<?php require 'adminheader.php';  ?>            
<div class="container-fluid">
                      <div class="row">
        <div class="col-lg-12">
                        <div class="card card-outline-primary">
                            <div class="card-header text-white text-center">
                               STUDENT RESULTS REVIEW FOR <?= strtoupper($term)." ".$session; ?>
                            </div>
                            <div class="card-body">
                                <form action="#" method="post">
                                    <div class="form-body">
                                        <h3 class="card-title m-t-15">Student Information</h3>
                                        <hr>
                                        <div class="row p-3 bg-secondary text-white">
                                        <div class="col-md-3">Name: <?= $name; ?> </div>
                                            <div class="col-md-3"> Admission No: <?= $admno; ?> </div>
                                            <div class="col-md-3">Term: <?= $term; ?></div>
                                             <div class="col-md-3">Session: <?= $session; ?></div>
                                        </div>
                                            <div class="row p-3 bg-secondary text-white">
                                                <div class="col-md-3">Class: <?= $class; ?> </div>
                                            <div class="col-md-3"> Gender: <?= $sex; ?></div>
                                            <div class="col-md-3">Position: <?= $position; ?></div>
                                             <div class="col-md-3">Average: <?= $avg; ?></div> 
                                        </div>
                                            <hr>
                                        <div class="row p-t-20">
                                    <div class="col-md-2">
                                     <label class="control-label">AESTHETIC APPRECIATION</label>
                                    <select class="custom-select" name="aesthetic" required aria-required="true">
                                    <?= $options; ?></select> 
                                </div>       
                                    <div class="col-md-2">
                                       <label class="control-label">ATTENDANCE </label>
                                    <select class="custom-select" name="attendance" required aria-required="true">
                                    <?= $options; ?>
                                    </select> </div>
                                                
                                    <div class="col-md-2">
                                    <label class="control-label">CREATIVITY:</label>
                                     <select class="custom-select" name="creativity" required aria-required="true">
                                    <?= $options; ?>
                                    </select> </div>
                                                   
                                            <div class="col-md-2">
                                  <label class="control-label">INITIATIVE</label>
                                 <select class="custom-select" name="initiative" required aria-required="true">
                                    <?= $options; ?>
                                    </select> </div> 
                                    <div class="col-md-2">
                                     <label class="control-label">LEADERSHIP ROLE:</label>
                                    <select class="custom-select" name="leadership" required aria-required="true">
                                    <?= $options; ?></select> 
                                </div>
                                <div class="col-md-2">
                                       <label class="control-label">ORGANISATIONAL ABILITY</label>
                                      <select class="custom-select" name="orga" required aria-required="true">
                                    <?= $options; ?>
                                    </select> </div>
                                </div>
                                    <div class="row p-t-20">     
                                    <div class="col-md-2">
                                       <label class="control-label">NEATNESS </label>
                                      <select class="custom-select" name="neatness" required aria-required="true">
                                    <?= $options; ?>
                                    </select> </div>
                                                    
                                            
                                    <div class="col-md-2">
                                    <label class="control-label">OBEDIENCE:</label>
                                     <select class="custom-select" name="obedience" required aria-required="true">
                                    <?= $options; ?>
                                    </select> </div>
                                                   
                                            <div class="col-md-2">
                                         <label class="control-label">POLITENESS</label>
                                         <select class="custom-select" name="politeness" required aria-required="true">
                                    <?= $options; ?>
                                    </select> </div>

                                      <div class="col-md-2">
                                     <label class="control-label">PUNCTUALITY:</label>
                                    <select class="custom-select" name="punctuality" required aria-required="true">
                                    <?= $options; ?></select> 
                                </div>
                                           
                                    <div class="col-md-2">
                                       <label class="control-label">SELF-CONTROL </label>
                                      <select class="custom-select" name="scontrol" required aria-required="true">
                                    <?= $options; ?>
                                    </select> </div>
                                    <div class="col-md-2">
                                       <label class="control-label">HONESTY: </label>
                                      <select class="custom-select" name="honesty" required aria-required="true">
                                    <?= $options; ?>
                                    </select> </div>
                                                   
                                            </div>

                                    <div class="row p-t-20">                                               
                                    <div class="col-md-2">
                                    <label class="control-label">SENSE OF RESPONSIBILITY:</label>
                                     <select class="custom-select" name="resp" required aria-required="true">
                                    <?= $options; ?>
                                    </select> </div>
                                                   
                                            <div class="col-md-2">
                                         <label class="control-label">SOCIABILITY</label>
                                <select class="custom-select" name="sociability" required aria-required="true">
                                    <?= $options; ?>
                                    </select> </div>
                                      <div class="col-md-2">
                                     <label class="control-label">GAMES:</label>
                                    <select class="custom-select" name="games" required aria-required="true">
                                    <?= $options; ?></select> 
                                </div>
                                <div class="col-md-2">
                                     <label class="control-label">SPORTS:</label>
                                    <select class="custom-select" name="sports" required aria-required="true">
                                    <?= $options; ?></select> 
                                </div>
                                <div class="col-md-2">
                                     <label class="control-label">HANDLING OF TOOLS:</label>
                                    <select class="custom-select" name="tools" required aria-required="true">
                                    <?= $options; ?></select> 
                                </div>
                                <div class="col-md-2">
                                     <label class="control-label">HAND WRITING:</label>
                                    <select class="custom-select" name="writing" required aria-required="true">
                                    <?= $options; ?></select> 
                                </div>                                       
                                            </div>
                                            <div class="row p-t-20">                                        
                                            
                                    <div class="col-md-2">
                                    <label class="control-label">COMMUNICATION SKILLS:</label>
                                     <select class="custom-select" name="comm" required aria-required="true">
                                    <?= $options; ?>
                                    </select> </div>
                                                   
                                            <div class="col-md-2">
                                         <label class="control-label">PAINTING AND DRAWING:</label>
                                         <select class="custom-select" name="painting" required aria-required="true">
                                    <?= $options; ?>
                                    </select> </div>
                                      <div class="col-md-2">
                                     <label class="control-label">MUSICAL SKILLS:</label>
                                    <select class="custom-select" name="music" required aria-required="true">
                                    <?= $options; ?></select> 
                                </div>
                                <div class="col-md-2">
                                     <label class="control-label">CRAFT:</label>
                                    <select class="custom-select" name="craft" required aria-required="true">
                                    <?= $options; ?></select> 
                                </div>
                                <div class="col-md-2">
                                     <label class="control-label">GYMNASTICS:</label>
                                    <select class="custom-select" name="gymnastics" required aria-required="true">
                                    <?= $options; ?></select> 
                                </div>
                                <div class="col-md-2">
                                     <label class="control-label">SPIRIT OF CO-OPERATION:</label>
                                    <select class="custom-select" name="cooperation" required aria-required="true">
                                    <?= $options; ?></select> 
                                </div>                                       
                                            </div>
                                            <div class="row p-t-20">                                        
                                            
                                    <div class="col-md-2 form-group">
                                    <label class="control-label">PERSEVERANCE:</label>
                                     <select class="custom-select" name="perseverance" required aria-required="true">
                                    <?= $options; ?>
                                    </select> </div>                                           
                                     
                                <div class="col-md-2 form-group">
                                     <label class="control-label">DAYS PRESENT:</label>
                                     <input type="text" class="form-control" name="present" required="required"> 
                                </div>
                                <div class="col-md-2 form-group">
                                     <label class="control-label">TOTAL DAYS IN THE TERM:</label>
                                    <input type="number" name="totaldays" required="required">
                                </div>
                                <div class="col-md-6 form-group">
                                     <label class="control-label">RESULTS REMARKS:</label>
                                    <input type="text" name="remarks" required="required" size="45"> 
                                </div>                                       
                                            </div>
                                        </div>
                        </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-primary" name="postinfo"> <i class="fa fa-check"></i> Submit</button>
                                        <button type="reset" class="btn btn-inverse">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    </div></div>
 <?php require 'adminfooter.php'; ?>