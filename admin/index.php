<?php
require('dbconn.php');
?>

<?php
if ($_SESSION['RollNo']) {
    require('header.php');
    $sql1="select count(*) as ct from lms.user where Date(RegDate) = curdate()";
    $sql2="select count(*)as ct from lms.book where Date(RegDate) = curdate() ";
    //$sql2="select count(*),DATE(RegDate) date,type from user where Date(RegDate) = curdate() and type='Faculty' group by RegDate,type";
    $sql3="select count(*)as ct from lms.record where Date(Date_of_Issue) = curdate()  ";
    $sql4="select count(*)as ct from lms.record where Date(Date_of_Return) = curdate() ";
    $result=$conn->query($sql1);
    $row=$result->fetch_assoc();
    $mt=$row['ct'];
    $result=$conn->query($sql2);
    $row=$result->fetch_assoc();
    $bt=$row['ct'];
    $result=$conn->query($sql3);
    $row=$result->fetch_assoc();
    $it=$row['ct'];
    $result=$conn->query($sql4);
    $row=$result->fetch_assoc();
    $rt=$row['ct'];
    $sql1="select count(*) as ct from lms.user where Date(RegDate)>=date_add(curdate(),interval -Day(curdate())+1 day) and type<>'admin'";
    $sql2="select count(*) as ct from lms.book where Date(RegDate)>=date_add(curdate(),interval -Day(curdate())+1 day)";
    $sql3="select count(*)as ct from lms.record where Date(Date_of_Issue) >=date_add(curdate(),interval -Day(curdate())+1 day)";
    $sql4="select count(*)as ct from lms.record where Date(Date_of_Return) >=date_add(curdate(),interval -Day(curdate())+1 day)";
    //echo $sql3;
    $result=$conn->query($sql1);
    $row=$result->fetch_assoc();
    $mm=$row['ct'];
    $result=$conn->query($sql2);
    $row=$result->fetch_assoc();
    $bm=$row['ct'];
    $result=$conn->query($sql3);
    $row=$result->fetch_assoc();
    $im=$row['ct'];
    $result=$conn->query($sql4);
    $row=$result->fetch_assoc();
    $rm=$row['ct'];
    $sql1="select count(*) as ct from lms.user where type='student'";
    $sql2="select count(*) as ct from lms.user where type ='Faculty'";
    $sql3="select count(*)as ct from lms.book";
    $sql4="select count(*)as ct from lms.record where Date_of_Return is null and Date_of_issue is not null";
    //echo $sql1;
    $result=$conn->query($sql1);
    $row=$result->fetch_assoc();
    $sy=$row['ct'];
    $result=$conn->query($sql2);
    $row=$result->fetch_assoc();
    $fy=$row['ct'];
    $result=$conn->query($sql3);
    $row=$result->fetch_assoc();
    $by=$row['ct'];
    $result=$conn->query($sql4);
    $row=$result->fetch_assoc();
    $iy=$row['ct'];
    $sql5="select count(*) as ct from lms.record where Date_of_Return is not null";
    $result=$conn->query($sql5);
    $row=$result->fetch_assoc();
    $return_total=$row['ct'];
    $sql6="select count(*) as ct from lms.record where Renew_Date is not null";
    $result=$conn->query($sql6);
    $row=$result->fetch_assoc();
    $rtotal=$row['ct'];
    ?>

      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Dashboard</h2>
          </div>
        </div>

        <section class="no-padding-top no-padding-bottom">
            <div class="container-fluid" style="text-align: center; padding-bottom: 20px"><strong class="text-primary">Today's Report</strong> </div>

            <div class="container-fluid">
            <div class="row">
              <div class="col-md-3 col-sm-6">
                <div class="statistic-block block index">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon"><i class="icon-user-1"></i></div><strong>Today's Added Member</strong>
                    </div>
                    <div class="number dashtext-1"><?php echo $mt ?></div>
                  </div>
                  <div class="progress progress-template">
                    <div role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-1"></div>
                  </div>
                </div>
              </div>
                <div class="col-md-3 col-sm-6">
                    <div class="statistic-block block index ">
                        <div class="progress-details d-flex align-items-end justify-content-between">
                            <div class="title">
                                <div class="icon"><i class="icon-user-1"></i></div><strong>Today's Added Book</strong>
                            </div>
                            <div class="number dashtext-2"><?php echo $bt ?></div>
                        </div>
                        <div class="progress progress-template">
                            <div role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-2"></div>
                        </div>
                    </div>
                </div>
              <div class="col-md-3 col-sm-6">
                <div class="statistic-block block index ">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon"><i class="icon-contract"></i></div><strong>Today's Issued Books</strong>
                    </div>
                    <div class="number dashtext-3"><?php echo $it ?></div>
                  </div>
                  <div class="progress progress-template">

                    <div role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-3"></div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="statistic-block block index">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon"><i class="icon-paper-and-pencil"></i></div><strong>Today's Returned books</strong>
                    </div>
                    <div class="number dashtext-4"><?php echo $rt ?></div>
                  </div>
                  <div class="progress progress-template">
                    <div role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-4"></div>
                  </div>
                </div>
              </div>
               </div>
          </div>
        </section>
          <section class="no-padding-top no-padding-bottom">
              <div class="container-fluid" style="text-align: center; padding-bottom: 20px"><strong class="text-primary">Current Month's Report</strong> </div>
              <div class="container-fluid">
                  <div class="row">
                      <div class="col-md-3 col-sm-6">
                          <div class="statistic-block block index">
                              <div class="progress-details d-flex align-items-end justify-content-between">
                                  <div class="title">
                                      <div class="icon"><i class="icon-user-1"></i></div><strong>This month's added Member</strong>
                                  </div>
                                  <div class="number dashtext-1"><?php echo $mm ?></div>
                              </div>
                              <div class="progress progress-template">
                                  <div role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-1"></div>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-3 col-sm-6">
                          <div class="statistic-block block index">
                              <div class="progress-details d-flex align-items-end justify-content-between">
                                  <div class="title">
                                      <div class="icon"><i class="icon-user-1"></i></div><strong>This month's added Books</strong>
                                  </div>
                                  <div class="number dashtext-2"><?php echo $bm ?></div>
                              </div>
                              <div class="progress progress-template">
                                  <div role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-2"></div>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-3 col-sm-6">
                          <div class="statistic-block block index">
                              <div class="progress-details d-flex align-items-end justify-content-between">
                                  <div class="title">
                                      <div class="icon"><i class="icon-contract"></i></div><strong>This month's Issued Books</strong>
                                  </div>
                                  <div class="number dashtext-3"><?php echo $im ?></div>
                              </div>
                              <div class="progress progress-template">
                                  <div role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-3"></div>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-3 col-sm-6">
                          <div class="statistic-block block index">
                              <div class="progress-details d-flex align-items-end justify-content-between">
                                  <div class="title">
                                      <div class="icon"><i class="icon-paper-and-pencil"></i></div><strong>This month's Returned Books</strong>
                                  </div>
                                  <div class="number dashtext-4"><?php echo $rm ?></div>
                              </div>
                              <div class="progress progress-template">
                                  <div role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-4"></div>
                              </div>
                          </div>
                      </div>

                  </div>
              </div>
          </section>
          <section class="no-padding-top no-padding-bottom">
              <div class="container-fluid" style="text-align: center; padding-bottom: 20px"><strong class="text-primary">Overall Report</strong> </div>
              <div class="container-fluid">
                  <div class="row">
                      <div class="col-md-3 col-sm-6">
                          <div class="statistic-block block index">
                              <div class="progress-details d-flex align-items-end justify-content-between">
                                  <div class="title">
                                      <div class="icon"><i class="icon-user-1"></i></div><strong>Total Number of Student</strong>
                                  </div>
                                  <div class="number dashtext-1"><?php echo $sy ?></div>
                              </div>
                              <div class="progress progress-template">
                                  <div role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-1"></div>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-3 col-sm-6">
                          <div class="statistic-block block index">
                              <div class="progress-details d-flex align-items-end justify-content-between">
                                  <div class="title">
                                      <div class="icon"><i class="icon-user-1"></i></div><strong>Total Number of Faculty</strong>
                                  </div>
                                  <div class="number dashtext-2"><?php echo $fy ?></div>
                              </div>
                              <div class="progress progress-template">
                                  <div role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-2"></div>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-3 col-sm-6">
                          <div class="statistic-block block index">
                              <div class="progress-details d-flex align-items-end justify-content-between">
                                  <div class="title">
                                      <div class="icon"><i class="icon-contract"></i></div><strong>Total Number of Books</strong>
                                  </div>
                                  <div class="number dashtext-3"><?php echo $by ?></div>
                              </div>
                              <div class="progress progress-template">
                                  <div role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-3"></div>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-3 col-sm-6">
                          <div class="statistic-block block index">
                              <div class="progress-details d-flex align-items-end justify-content-between">
                                  <div class="title">
                                      <div class="icon"><i class="icon-paper-and-pencil"></i></div><strong>Total Number of Issued books</strong>
                                  </div>
                                  <div class="number dashtext-4"><?php echo $iy ?></div>
                              </div>
                              <div class="progress progress-template">
                                  <div role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-4"></div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </section>
        <section>
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-4 index">
                <div class="stats-with-chart-2 block">
                  <div class="title"><strong class="d-block">Issue Request</strong><span class="d-block"></span></div>
                  <div class="piechart chart">
                    <canvas id="pieChartHome1"></canvas>
                    <div class="text"><strong class="d-block"><?php echo $iy?></strong><span class="d-block">Issue</span></div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 index">
                <div class="stats-with-chart-2 block">
                  <div class="title"><strong class="d-block">Renew Request</strong><span class="d-block"></span></div>
                  <div class="piechart chart">
                    <canvas id="pieChartHome2"></canvas>
                    <div class="text"><strong class="d-block"><?php echo $rtotal?></strong><span class="d-block">Renew</span></div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 index">
                <div class="stats-with-chart-2 block">
                  <div class="title"><strong class="d-block">Return Request</strong><span class="d-block"></span></div>
                  <div class="piechart chart">
                    <canvas id="pieChartHome3"></canvas>
                    <div class="text"><strong class="d-block"><?php echo $return_total ?></strong><span class="d-block">Return</span></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

<?php
require ('footer.php');
}
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>