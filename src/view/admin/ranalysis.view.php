 <?php require 'adminheader.php';  ?> 
 <script src="js/lib/chart-js/Chart.bundle.js"></script>        
    
         <div class="container-fluid">
          <div class="row"><div class="col-md-12">
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
                             </form>
                        </div></div></div><hr><br><br>

                        <?php 
                               if (empty($tclasses)) {
                                 echo "select to view results performance for a term ";
                             }else{
                                $k = 0;
                                foreach ($tclasses as $cc) {
                                  extract($cc);
                                       $k++; $pieArray = [];
                    $totalStudents = $query->lookUp("admno", "results", ["session"=>$_POST['session'], "term"=>$_POST['term'], "class"=>$class]);
                    
                    $passedNo = $query->passedStudents("results", "avg", ["term"=>$_POST['term'], "session"=>$_POST['session'], "class"=>$class]);
                     array_push($pieArray, $passedNo);
                    $failedNo = $totalStudents - $passedNo;
                     array_push($pieArray, $failedNo);


                                      ?>
                                    <div class="row">
                               <div class="col-md-6">
                                
                             <h4>RESULTS PERFORMANCE TABLE FOR <?= $class." ".$_POST['session']." ".$_POST['term']; ?></h4>  
                        <table class="table table-striped">  
                        <thead><tr>
                         <th>TOTAL STUDENTS</th>
                         <th>PASSED (AVG >= 50)</th>
                           <th>FAILED (AVG < 50) </th>   
                        </tr></thead><tbody>
                                       
                              <tr><td><?= $totalStudents; ?></td>
                                  <td><?= $passedNo; ?></td>
                                   <td><?= $failedNo; ?></td>
                                    </tr>                             
                                        </tbody>
                                    </table>  
                                </div>

        <div class="col-md-6">
       <h4>RESULTS PERFORMANCE PIECHART FOR <?= $class." ".$_POST['session']." SESSION ".$_POST['term']; ?></h4>
                    <canvas id="pieChart<?=$k;?>"></canvas></div></div><hr>
                       
                               <script>

var ctx = document.getElementById( "pieChart<?=$k;?>" );
ctx.height = 120;
    var myChart = new Chart( ctx, {
    type: 'pie',
    data: {
      datasets: [ {
        data: <?= json_encode($pieArray); ?>,
        backgroundColor: [
                                    "green",
                                    "red"
                                ],
        hoverBackgroundColor: [
                                    "green",
                                    "red"
                                ]

                            } ],
      labels: [
                            "Passed",
                            "Failed"
                        ]
    },
    options: {
      responsive: true
    }
  } );


</script>
 <?php } } ?>
                    </div>
               
               </div>

                       </div>
        <?php require 'adminfooter.php'; ?>