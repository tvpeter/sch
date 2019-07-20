 <?php require 'adminheader.php';  ?> 
 <script src="js/lib/chart-js/Chart.bundle.js"></script>        
    
         <div class="container-fluid">
          <div class="row"> <div class="col-md-12">
             <div class="card"> <div class="card-body">
            <div class="row">              
            <form  method="post" name="form1">
            <div class="row"> <div class="col-md-4">
            <select class="custom-select" name="session" required aria-required="true"> <?= $session; ?></select>
                           </div>  
            <div class="col-md-4">
        <select class="custom-select" name="term" required aria-required="true">
            <?= $gterm; ?> </select> </div>

             <div class="col-md-4">
             <button type="submit" class="btn btn-dark btn-outline" name="check"><i class="fa fa-check"></i>Check</button></div>
                             </form></div></div>
                        </div><hr><br>

                        <?php 
                               if (empty($tclasses)) {
                                 echo "select to view performance by subject per class ";
                             }else{
                                $k = 0;
                                foreach ($tclasses as $cc) {
                                  extract($cc);
                                  $k++;
                        $subjAvg =$query->subAndAvg(["class"=>$class, "session"=>$_POST['session'], "term"=>$_POST['term']]);
                                      ?>
                                    <div class="row">
                               <div class="col-md-4">
                                
                             <h4>PERFORMANCE TABLE FOR <?= $class." ".$_POST['session']." ".$_POST['term']; ?></h4>  
                        <table class="table table-striped">  
                        <thead><tr>
                        <th>#</th>
                        <th>SUBJECT</th>
                        <th>TOTAL STUDENTS</th>
                        <th>PERFORMANCE AVG</th>
                        <th>NO. WITH PASS</th>   
                        </tr></thead><tbody>
                        <?php
                            $n = 0;
                        $subjects = []; $scores = [];
                              
                                foreach ($subjAvg as $sbav) {
                                    $n++;
                                    extract($sbav);
                                    array_push($subjects, $subj);
                                    array_push($scores, round($classavg, 2));
          $stdInSubj = $query->lookUp("admno", "scores", ["term"=>$_POST['term'], "session"=>$_POST['session'], "class"=>$class, "subj"=>$subj]);

        $passedNo = $query->passedStudents("scores", "total", ["term"=>$_POST['term'], "session"=>$_POST['session'], "class"=>$class, "subj"=>$subj]);
                                    ?><tr>
                                        <td><?= $n; ?></td>
                                        <td><?= $subj; ?></td>
                                        <td><?= $stdInSubj; ?></td>
                                        <td><?= round($classavg, 2); ?></td>
                                        <td><?= $passedNo; ?></td>
                                    </tr>
                                          <?php  }  
                                                                         ?> 
                                                                                                                                          
                                        </tbody>
                                    </table>  
                                </div>

        <div class="col-md-8">
       <h4>PERFORMANCE BAR CHART FOR <?= $class." ".$_POST['session']." SESSION ".$_POST['term']; ?> BY SUBJECTS</h4>
                    <canvas id="myChart<?=$k;?>"></canvas></div></div><hr>
                       
                               <script>
var ctx = document.getElementById("myChart<?= $k;?>").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($subjects); ?>,
        datasets: [{
            label: 'AVERAGE PERFORMANCE',
            data: <?php echo json_encode($scores); ?>,
            backgroundColor:'#7DBBFD',           
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>
 <?php } } ?>
                    </div>
               
               </div>

                       </div>
        <?php require 'adminfooter.php'; ?>