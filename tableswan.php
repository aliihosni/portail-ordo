<?php
include('db.php');
include('header.php');

include('nav.php');
include('aside.php');

if (isset($_POST["submit"]))
{
    $date_deb = $_POST["date_deb"];
    $date_fin = $_POST["date_fin"];

    $result = mysql_query("SELECT `Identifiant`,`debut`,`fin`,`Etat`,`Cause` , `Impact` FROM `swan` where STR_TO_DATE(debut , '%Y-%m-%d' ) >= 
STR_TO_DATE('".$date_deb."' , '%Y-%m-%d' )  and STR_TO_DATE(fin , '%Y-%m-%d' ) <= STR_TO_DATE('".$date_fin."' , '%Y-%m-%d' )" ) ;

}
else if (isset($_POST["impact"]))
{
    $type_imp = $_POST["type_imp"];

    $result = mysql_query("SELECT `Identifiant`,`debut`,`fin`,`Etat`,`Cause` , `Impact` FROM `swan` where impact = '". $type_imp."'") ;

}

else {
    $result = mysql_query("SELECT `Identifiant`,`debut`,`fin`,`Etat`,`Cause` , `Impact` FROM `swan` ") ;
}
?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Table
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
                <li class="active">ATP</li>
                <li class="active">Table</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">



            <div class="box box-warning">

                <div class="box-header">
                    <h3 class="box-title">Recherche</h3>
                </div>
                <div class="box-body">
                    <div class="row">



                    <div class="col-md-6 col-centered">
                    <form name="searchdate" method="POST" action="tableswan.php" class="form-inline"  >
                    <!-- Date dd/mm/yyyy -->
                        <label>Recherche par date</label><br>
                    <div class="form-group">



                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input class="form-control" id="date1" name="date_deb"
                                   placeholder="Date debut   MM-DD-YYY" type="date1" autocomplete="off" required/>
                        </div>
                        <!-- /.input group -->
                    </div>
                    <!-- /.form group -->

                    <!-- Date mm/dd/yyyy -->
                        <div class="form-group date">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input class="form-control" id="date2" name="date_fin" autocomplete="off"  placeholder="Date fin   MM-DD-YYY" type="date1" required/>
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->
                        <div class="form-group"> <!-- Submit button -->
                            <button class="btn btn-primary " name="submit" type="submit">Recherche</button>
                        </div>
                        </form>
                </div>
                        <!-- /.col -->



                    <div class="col-md-4 col-centered ">
                        <form name="searchdate" method="POST" action="tableswan.php" class="form-inline" id="form2" >
                            <label>Recherche par type d'impact</label><br>
                            <div class="form-group">

                            <select class="form-control select2" style="width: 100%;" id="impact" name="type_imp" required>
                                <option selected="selected" value="Sans perturbation">Sans perturbation</option>
                                <option value="Coupure franche">Coupure franche</option>
                                <option value="Perte de trafic">Perte de trafic </option>
                                <option value="Risque de coupure">Risque de coupure </option>
                            </select>
                        </div>

                            <div class="form-group"> <!-- Submit button -->
                                <button class="btn btn-primary " name="impact" type="submit">Recherche</button>
                            </div>


                        </form>


                    </div>
                        <!-- /.col -->






                        <div class="col-md-2 col-centered ">
                            <div class="btn-group pull-right" style=" padding: 10px;">
                                <div class="dropdown">
                                    <button class="btn btn-success btn-sm dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <span class="glyphicon glyphicon-th-list"></span> Export Table Data

                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                        <li><a href="#" onclick="$('#datatables').tableExport({type:'json',escape:'false'});"> <img src="ExportExcel/images/json.jpg" width="24px"> JSON</a></li>
                                        <li><a href="#" onclick="$('#datatables').tableExport({type:'json',escape:'false',ignoreColumn:'[2,3]'});"><img src="ExportExcel/images/json.jpg" width="24px">JSON (ignoreColumn)</a></li>
                                        <li><a href="#" onclick="$('#datatables').tableExport({type:'json',escape:'true'});"> <img src="ExportExcel/images/json.jpg" width="24px"> JSON (with Escape)</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#" onclick="$('#datatables').tableExport({type:'xml',escape:'false'});"> <img src="ExportExcel/images/xml.png" width="24px"> XML</a></li>
                                        <li><a href="#" onclick="$('#datatables').tableExport({type:'sql'});"> <img src="ExportExcel/images/sql.png" width="24px"> SQL</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#" onclick="$('#datatables').tableExport({type:'csv',escape:'false'});"> <img src="ExportExcel/images/csv.png" width="24px"> CSV</a></li>
                                        <li><a href="#" onclick="$('#datatables').tableExport({type:'txt',escape:'false'});"> <img src="ExportExcel/images/txt.png" width="24px"> TXT</a></li>
                                        <li class="divider"></li>

                                        <li><a href="#" onclick="$('#datatables').tableExport({type:'excel',escape:'false'});"> <img src="ExportExcel/images/xls.png" width="24px"> XLS</a></li>
                                        <li><a href="#" onclick="$('#datatables').tableExport({type:'doc',escape:'false'});"> <img src="ExportExcel/images/word.png" width="24px"> Word</a></li>
                                        <li><a href="#" onclick="$('#datatables').tableExport({type:'powerpoint',escape:'false'});"> <img src="ExportExcel/images/ppt.png" width="24px"> PowerPoint</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#" onclick="$('#datatables').tableExport({type:'png',escape:'false'});"> <img src="ExportExcel/images/png.png" width="24px"> PNG</a></li>
                                        <li><a href="#" onclick="$('#datatables').tableExport({type:'pdf',pdfFontSize:'7',escape:'false'});"> <img src="ExportExcel/images/pdf.png" width="24px"> PDF</a></li>

                                    </ul>
                                </div>
                            </div>


                        </div>
                        <!-- /.col -->



                    </div>
                    <!-- /.row -->

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->



















            <script type="text/javascript">
                $(function () {
                    $('#datatables').DataTable({
                    });
                });
                $(function(){
                    var date_input=$('input[type="date1"]'); //our date input has the name "date"
                    var options={
                        format: 'yyyy-mm-dd',
                        todayHighlight: true,
                        autoclose: true,
                    };
                    date_input.datepicker(options);
                });
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
                                            <th>Etat</th>
                                            <th>Cause</th>
                                            <th>type impact</th>
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
                                                <td> <?php echo utf8_encode($row['Etat'])?> </td>
                                                <td> <?php echo utf8_encode($row['Cause'])?> </td>
                                                <td> <?php echo utf8_encode($row['Impact'])?> </td>


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

            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
<?php include ('footer.php');
?>

<script type="text/javascript">
    $(function () {
        $(".select2").select2();
        $('#date1').datepicker({
            autoclose: true
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


<!-- bootstrap datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Select2 -->
<script src="plugins/select2/select2.full.min.js"></script>

<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>

<script type="text/javascript" src="js/tableExport.js"></script>
<script type="text/javascript" src="js/jquery.base64.js"></script>


        <script type="text/javascript" src="ExportExcel/jspdf/libs/sprintf.js"></script>
        <script type="text/javascript" src="ExportExcel/jspdf/jspdf.js"></script>
        <script type="text/javascript" src="ExportExcel/jspdf/libs/base64.js"></script>

            <script type="text/javascript" src="ExportExcel/html2canvas.js"></script>




</body>
</html>
