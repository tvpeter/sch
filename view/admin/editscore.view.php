<?php require 'adminheader.php' ?>

<div class="col-lg-6">
                        <div class="card">
                            <div class="card-title">
                                <h4> STUDENTS' SCORES IN ASSESSMENT AND EXAMS</h4>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <form method="post" action="">
                                    <table class="table  table-striped">
                                        <thead>
                                            <tr>
                                                <th>NAME:</th>
                                                <th colspan="2"><?= $name; ?></th>
                                                <th>Admission No:<?= $gadmno; ?></th>
                                                 <th>Class:</th>
                                                <th><?= $gclass; ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>Subject:</th>
                                                <td><?= $gsubj; ?></td>
                                                <td colspan="2">SESSION: <?= $gsesion; ?></td>
                                                 <td>Term:</td>
                                                 <td><?= $gterm; ?></td>
                                            </tr>
                                            <tr>
                                            <td colspan="3">COMBINED CA</td>
                                            <td colspan="3"><div align="left">EXAMINATION</div></td>
                                                 
                                            </tr>
                                            <tr>
                                             <td colspan="3"><input type="number" name="test" class="form-control"  max="30" min="0" value="<?= $test; ?>"></td>
                                             <td colspan="3"><input type="number" class="form-control" name="exam" min="0" max="70" value="<?= $exam; ?>"></td>
                                             
                                          </tr>
                                          <tr>
                                     <td colspan="3"><a href="viewsubjects.php?cid=<?= htmlentities($gadmno); ?>&session=<?= $gsesion; ?>&class=<?= $gclass; ?>&term=<?= $gterm; ?>" title="Back" class="btn btn-primary"><i class="fa fa-reply"></i>&nbsp;BACK</a></td>
                                              <td colspan="3"><button type="submit" class="btn btn-primary" name="submit"> <i class="fa fa-check"></i> Update</button></td>

                                          </tr>
                                            
                                        </tbody>
                                    </table>
                                </form>
                                </div>
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>

                    <!-- /# column -->
<?php require 'adminfooter.php' ?>