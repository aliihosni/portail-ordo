<?php
include('db.php');
include('header.php');

include('nav.php');
include('aside.php');

$result = mysql_query("SELECT * FROM `swan` where `Description`=''") ;
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Table avec descriptif null
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active">ATP</li>
            <li class="active">Table avec descriptif null</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">





        <script type="text/javascript">
            $(document).ready(function() {
                $('#datatables').DataTable();
            } );
        </script>




        <div class="row">

            <div class="col-md-12 form-group-sm">

                <div class="box box-warning box-body">
                    <div class="">



                        <center>
                            <table id="datatables" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Date Début</th>
                                    <th>Date Fin</th>
                                    <th>Noeud</th>
                                    <th>Description</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                while ( $row = mysql_fetch_array($result))   {
                                    ?>
                                    <tr>
                                        <td> <?php echo utf8_encode($row['Identifiant'])?> </td>
                                        <td> <?php echo utf8_encode($row['debut'])?> </td>
                                        <td> <?php echo utf8_encode($row['fin'])?> </td>
                                        <td> <?php echo utf8_encode($row['ID_objet'])?> </td>
                                        <td> <?php echo utf8_encode($row['Description'])?> </td>

                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </center>





                    </div>
                    <!-- /.row -->
                </div>
                <!-- ./box-body -->

            </div>
            <!-- /.box -->

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

<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>



</body>
</html>
