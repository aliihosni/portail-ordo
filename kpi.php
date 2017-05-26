<?php
include ('db.php');
include('header.php');

include('nav.php');
include('aside.php');
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Ajouter
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active">KPI</li>
            <li class="active">Ajouter</li>
        </ol>
    </section>





    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-6">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Ajouter un ATP</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                            <?php
                            include "KPI/import_atp.php";
                            ?>

                    </div>
                    <!-- ./box-body -->

                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->


            <div class="col-md-6">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Ajouter un GTR</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <?php
                        include "KPI/import_gtr.php";
                        ?>

                    </div>
                    <!-- ./box-body -->

                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->

        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-md-6">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Ajouter un KPI</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <?php
                        include "KPI/import_kpi.php";
                        ?>

                    </div>
                    <!-- ./box-body -->

                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->

            <div class="col-md-6">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Formule KPI</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <?php
                        include "KPI/ajout_formule.php";
                        ?>

                    </div>
                    <!-- ./box-body -->

                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>




    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include ('footer.php');
?>


    <script type="text/javascript">
        $(function() {

            // We can attach the `fileselect` event to all file inputs on the page
            $(document).on('change', ':file', function() {
                var input = $(this),
                    numFiles = input.get(0).files ? input.get(0).files.length : 1,
                    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                input.trigger('fileselect', [numFiles, label]);
            });

            // We can watch for our custom `fileselect` event like this
            $(document).ready( function() {
                $(':file').on('fileselect', function(event, numFiles, label) {

                    var input = $(this).parents('.input-group').find(':text'),
                        log = numFiles > 1 ? numFiles + ' files selected' : label;

                    if( input.length ) {
                        input.val(log);
                    } else {
                        if( log ) alert(log);
                    }

                });
            });

        });
    </script>

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

<script src="plugins/select2/select2.full.min.js"></script>

</body>
</html>




<?php

if (isset($_POST['submit'])) {




    if ($_POST['submit'] == 'atp') {
        require("PHPExcel/reader.php"); // php excel reader
        $file= $_POST['fichier'] ;
        $connection=new Spreadsheet_Excel_Reader(); // our main object
        $connection->read($file);
        ini_set('max_execution_time', 1000);


        $rowSize = count(@$connection->sheets[0]["cells"] ) ;                                   // nombre de ligne
        $columnSize = max( array_map('count', @$connection->sheets[0]["cells"]) ) ;             // nombre de colonnes


        $startrow=1;
        $endrow= $rowSize+1;
        $startcol=1;
        $endcol=$columnSize+1;
        $l= 1;
        $c= 1;
        $excel = array();
        $dmo = 0; $dmc = 0; $dma = 0;


        for($i=2;$i<10;$i++)
        { // we read row to row

            for ($j=$startcol;$j<$endcol;$j++)
                // we read col to col
            {

                if ( ord(@$connection->sheets[0]["cells"][$i][$j] )==0){ @$excel[$l][$c]= "NULL" ;}
                else { @$excel[$l][$c]= @$connection->sheets[0]["cells"][$i][$j] ;}
                $excel[$l][$c]= mysql_real_escape_string($excel[$l][$c]);

                //   echo @$excel[$l][$c]; echo "*****";
                $c++;
            }
            $sql= " INSERT IGNORE INTO tp   Values('".$excel[$l][1]."','".$excel[$l][2]."','".$excel[$l][3]."','".$excel[$l][4]."','".gmdate("Y-m-d H:i:s", ($excel[$l][5] - 25569) * 86400+1)."','".gmdate("Y-m-d H:i:s", ($excel[$l][6] - 25569) * 86400+1)."','".gmdate("Y-m-d H:i:s", ($excel[$l][7] - 25569) * 86400+1)."','".gmdate("Y-m-d H:i:s", ($excel[$l][8] - 25569) * 86400+1)."','".gmdate("Y-m-d H:i:s", ($excel[$l][9] - 25569) * 86400+1)."','".$excel[$l][10]."','".$excel[$l][11] ."','".$excel[$l][12]."') ";
            //echo $sql;



            $res=     mysql_query($sql, $conexion_orange) or die(mysql_error());


            $c= 1;
            $l++;
        }

    }



    if ($_POST['submit'] == 'gtr') {
        require("PHPexcel/reader.php"); // php excel reader
        $file= "C:\Users\ASUS\Downloads\GTR.xls";
        //$file= ".$_POST['fichier'].";
        $connection=new Spreadsheet_Excel_Reader(); // our main object
        $connection->read($file);


        $rowSize = count(@$connection->sheets[0]["cells"] ) ;                                   // nombre de ligne
        $columnSize = max( array_map('count', @$connection->sheets[0]["cells"]) ) ;             // nombre de colonnes


        $startrow=1;
        $endrow= $rowSize+1;
        $startcol=1;
        $endcol=$columnSize+1;
        $l= 1;
        $c= 1;
        $excel = array();
        mysql_select_db($database_conexion_orange, $conexion_orange);


        for($i=2;$i<$endrow;$i++)
        { // we read row to row

            for ($j=$startcol;$j<$endcol;$j++)
                // we read col to col
            {

                if ( ord(@$connection->sheets[0]["cells"][$i][$j] )==0){ @$excel[$l][$c]= "NULL" ;}
                else { @$excel[$l][$c]= @$connection->sheets[0]["cells"][$i][$j] ;}
                $excel[$l][$c]= mysql_real_escape_string($excel[$l][$c]);

                //   echo @$excel[$l][$c]; echo "*****";
                $c++;
            }
            $sql= " INSERT INTO gtr (`debut_incident`,`code_noeud`,`zone`,`impact_service`,`nature`,`duree`,`origine`,`sous_famille`,`cel2g`,`cel3g`,`cause`,`action_corrective`,`ticket`,`eds_activation`,`IDIT`,`duree_activation`,`duree_relle`,`seuil_gtr`,`respect_gtr`) Values('".gmdate("Y-m-d H:i:s", ($excel[$l][1] - 25569) * 86400+1)."','".$excel[$l][2]."','".$excel[$l][3]."','".$excel[$l][4]."','".$excel[$l][5]."','".$excel[$l][6]."','".$excel[$l][7]."','".$excel[$l][8]."','".$excel[$l][9]."','".$excel[$l][10]."','".$excel[$l][11]."','".$excel[$l][12]."','".$excel[$l][13]."','".gmdate("Y-m-d H:i:s", ($excel[$l][14] - 25569) * 86400+1)."','".$excel[$l][15]."','".$excel[$l][16]."','".$excel[$l][17]."','".$excel[$l][18]."','".$excel[$l][19]."' ) ";
            //echo $sql;



            $res=     mysql_query($sql, $conexion_orange) or die(mysql_error());


            $c= 1;
            $l++;
        }
    }


//add-kpi

    if ($_POST['submit'] == 'k') {


        $sql2= " ALTER TABLE ".$_POST['table2']."  ADD ".$_POST['kpi']." ".$_POST['type']."   ";

        $res2=  mysql_query($sql2, $conexion_orange) or die(mysql_error());

        $sql3= " INSERT INTO kpi (`nom`,`table`)VALUES ('".$_POST['kpi']."','".$_POST['table2']."');  ";

        $res3=  mysql_query($sql3, $conexion_orange) or die(mysql_error());
    }


//add-formule

    if ($_POST['submit'] == 'f') {

        $sql3= utf8_decode(" UPDATE ".$_POST['table3']." SET ".$_POST['nom']." = ".$_POST['formule']." ");
        $res3=  mysql_query($sql3, $conexion_orange) or die(mysql_error());
    }
}





?>