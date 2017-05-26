<?php
include('db.php');
include('header.php');

include('nav.php');
include('aside.php');


$result = mysql_query("SELECT N_operation , Date_debut_initiale , Date_fin_initiale , TIMESTAMPDIFF(MINUTE , Date_debut_initiale, Date_fin_initiale) AS 'DUREE_EX_THEO_MIN' , FLOOR( TIMESTAMPDIFF(MINUTE , Date_debut_initiale, Date_fin_initiale)/60) AS 'HEURE' , (TIMESTAMPDIFF(MINUTE , Date_debut_initiale, Date_fin_initiale)- FLOOR( TIMESTAMPDIFF(MINUTE , Date_debut_initiale, Date_fin_initiale)/60)*60 )AS 'MINUTE' , Date_debut , Date_fin , TIMESTAMPDIFF(MINUTE , Date_debut, Date_fin) AS 'DUREE_EX_REEL_MIN' , FLOOR( TIMESTAMPDIFF(MINUTE , Date_debut, Date_fin)/60) AS 'HEURE_REEL' , (TIMESTAMPDIFF(MINUTE , Date_debut, Date_fin)- FLOOR( TIMESTAMPDIFF(MINUTE , Date_debut, Date_fin)/60)*60 )AS 'MINUTE_REEL' , ( TIMESTAMPDIFF(MINUTE , Date_debut_initiale, Date_fin_initiale) - TIMESTAMPDIFF(MINUTE , Date_debut, Date_fin) ) AS 'GAIN_MINUTE' , CASE WHEN ((TIMESTAMPDIFF(MINUTE , Date_debut_initiale, Date_fin_initiale) >= TIMESTAMPDIFF(MINUTE , Date_debut, Date_fin))and ( TIMESTAMPDIFF(MINUTE , Date_debut, Date_fin) >= 30 ))THEN 'respect de temps' WHEN TIMESTAMPDIFF(MINUTE , Date_debut_initiale, Date_fin_initiale) < TIMESTAMPDIFF(MINUTE , Date_debut, Date_fin) THEN 'depassement de temps' WHEN (TIMESTAMPDIFF(MINUTE , Date_debut, Date_fin)<TIMESTAMPDIFF(MINUTE , Date_debut_initiale, Date_fin_initiale)) and (TIMESTAMPDIFF(MINUTE , Date_debut, Date_fin)< 30 ) THEN 'non respect' ELSE '' END AS 'REMARQUE' ,(TIMESTAMPDIFF(MINUTE , Date_debut_initiale, Date_debut)) AS 'decalage_declenchement' , CASE WHEN (TIMESTAMPDIFF(MINUTE , Date_debut_initiale, Date_debut))> 30 THEN 'non respect de decalage' ELSE '' END AS 'avertissement' FROM `delaiatp` ") ;


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Tableau delai ATP
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active">KPI</li>
            <li class="active">Tableau delai ATP</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">





     <!--   <script type="text/javascript">

            $(document).ready(function() {
                $('#datatables').DataTable({
                    "autoWidth": false,
                    buttons: [
                        'copy', 'excel', 'pdf'
                    ],
                });
            } );


        </script>-->




        <div class="row">

            <div class="col-md-12 form-group-sm">
                <div class="box box-warning">

                    <div class="box-body ">

                        <table id="datatables" class="table table-striped table-bordered"   width="100%">
                            <thead>
                            <tr>
                                <th>N OPERATION</th>
                                <th>Date Debut Initiale</th>
                                <th>Date Fin Initiale</th>
                                <th>DUREE EX THEO MIN</th>
                                <th>Heure</th>
                                <th>Minute</th>
                                <th>Date Debut</th>
                                <th>Date Fin </th>
                                <th>DUREE EX REELMIN</th>
                                <th>Heure reel</th>
                                <th>Minute reel</th>
                                <th>GAIN MINUTE </th>
                                <th>REMARQUE </th>
                                <th>Decalage declenchement </th>
                                <th>Avertissement</th>
                            </tr>

                            </thead>
                            <tbody>
                            <?php
                            while ( $row = mysql_fetch_array($result))   {
                                ?>
                                <tr>
                                    <td> <?php echo utf8_encode($row['N_operation'])?> </td>
                                    <td> <?php echo utf8_encode($row['Date_debut_initiale'])?> </td>
                                    <td> <?php echo utf8_encode($row['Date_fin_initiale'])?> </td>
                                    <td> <?php echo utf8_encode($row['DUREE_EX_THEO_MIN'])?> </td>
                                    <td> <?php echo utf8_encode($row['HEURE'])?> </td>
                                    <td> <?php echo utf8_encode($row['MINUTE'])?> </td>
                                    <td> <?php echo utf8_encode($row['Date_debut'])?> </td>
                                    <td> <?php echo utf8_encode($row['Date_fin'])?> </td>
                                    <td> <?php echo utf8_encode($row['DUREE_EX_REEL_MIN'])?> </td>
                                    <td> <?php echo utf8_encode($row['HEURE_REEL'])?> </td>
                                    <td> <?php echo utf8_encode($row['MINUTE_REEL'])?> </td>
                                    <td> <?php echo utf8_encode($row['GAIN_MINUTE'])?> </td>
                                    <td> <?php echo utf8_encode($row['REMARQUE'])?> </td>
                                    <td> <?php echo utf8_encode($row['decalage_declenchement'])?> </td>
                                    <td> <?php echo utf8_encode($row['avertissement'])?> </td>

                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>


                    </div>
                    <!-- ./box-body -->

                </div>
                <!-- ./box -->

            </div>
            <!-- /.col   -->

        </div>
        <!-- /.row -->


</div>
<!-- /.row -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include ('footer.php');
?>





<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>



<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>


<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>

<!--<script src="plugins/datatables/jquery.dataTables.min.js"></script>-->
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>



</body>
</html>
