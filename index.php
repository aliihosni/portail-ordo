<?php
include ('db.php');
include ('header.php');


include ('nav.php');
include ('aside.php');
?>




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
          Accueil
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
      </ol>
    </section>


    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="icon ion-checkmark-circled"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">TOC rétablis</span>
              <span class="info-box-number">
                  <?php
                  $sql = ("SELECT count(*) FROM `incidents` WHERE `Etat` Like 'R%' ");
                  $rs = mysql_query($sql);
                  //-----------^  need to run query here

                  $result = mysql_fetch_array($rs);
                  echo $result[0];?>
              </span>
                <a href="#" class="small-box-footer pull-right text-green" data-toggle="modal" data-target="#tocretabli">Voir en détails <i class="fa fa-arrow-circle-right"></i></a>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->

        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="icon ion-load-a"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">TOC en cours</span>
                <span class="info-box-number"><?php

                    $sql = ("SELECT count(*) FROM `incidents` WHERE `Etat` Like 'En%' ");
                    $rs = mysql_query($sql);
                    //-----------^  need to run query here

                    $result = mysql_fetch_array($rs);
                    //here you can echo the result of query
                    echo $result[0];
                    ?>
                </span>
                <a href="#" class="small-box-footer pull-right text-yellow" data-toggle="modal" data-target="#tocrencours">Voir en détails <i class="fa fa-arrow-circle-right"></i></a>

            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-blue"><i class="ion-loop"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">ATP en cours</span>
              <span class="info-box-number">
                  <?php $sql = ("SELECT COUNT(*) FROM `swan_map` where `Etat` like 'init%'");
                  $rs = mysql_query($sql);
                  //-----------^  need to run query here

                  $result = mysql_fetch_array($rs);
                  //here you can echo the result of query
                  echo $result[0];
                  ?>
              </span>
                <a href="#" class="small-box-footer pull-right text-blue" data-toggle="modal" data-target="#atpencours">Voir en détails <i class="fa fa-arrow-circle-right"></i></a>

            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="icon ion-ios-pulse-strong"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">ATP Dépassement</span>
                <span class="info-box-number"><?php
                    $sql = ("SELECT count(*) FROM `swan` where `Etat` Like 'Initialis%' and `fin`< now()");
                    $rs = mysql_query($sql);
                    //-----------^  need to run query here

                    $result = mysql_fetch_array($rs);
                    //here you can echo the result of query
                    echo $result[0];

                    ?>
                </span>
                <a href="#" class="small-box-footer pull-right text-red" data-toggle="modal" data-target="#atpnonclotures">Voir en détails <i class="fa fa-arrow-circle-right"></i></a>

            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->








        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="tocretabli">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-success text-green">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">TOC RÉTABLIS</h4>
                    </div>

                    <div class="modal-body">
                        <?php
                         include ('dashboard/tocsepare.php');
                        ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    </div>

                </div>
            </div>
        </div>



        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="tocrencours">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-warning text-yellow">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">TOC EN COURS</h4>
                    </div>

                    <div class="modal-body">
                        <?php
                        include ('dashboard/tocencours.php');
                        ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    </div>

                </div>
            </div>
        </div>



        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="atpencours">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info text-blue">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">ATP EN COURS</h4>
                    </div>

                    <div class="modal-body">
                        <?php
                        include ('dashboard/atpencours.php');
                        ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    </div>

                </div>
            </div>
        </div>


        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="atpnonclotures">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-red">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">ATP DÉPASSEMENT</h4>
                    </div>

                    <div class="modal-body">
                        <?php
                        include ('dashboard/atpnonclotures.php');
                        ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    </div>

                </div>
            </div>
        </div>












      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include ('footer.php');
?>
<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>


<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
</body>
</html>
