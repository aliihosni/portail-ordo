<form action="kpi.php" method="POST" name="upload" id="form1" enctype="multipart/form-data" class="form-horizontal" >
    <div class="form-group">
        <label for="table3" class="col-sm-4 control-label">Choisir Table</label>

        <div class="col-sm-8">
            <select  class="form-control select2" name="table3">
                <option value="gtr">GTR</option>
                <option value="incidents">INCIDENTS</option>
                <option value="tp">ATP</option>
            </select>
        </div>
    </div>


    <div class="form-group">
        <label for="nom" class="col-sm-4 control-label">Choisir KPI</label>

        <div class="col-sm-8">
            <select  class="form-control select2" name="nom">

                <?php
                error_reporting(E_ERROR | E_WARNING | E_PARSE);
                $hostname_conexion_orange = "localhost";
                $database_conexion_orange = "pfe";
                $username_conexion_orange = "root";
                $password_conexion_orange = "";
                $conexion_orange = mysql_pconnect($hostname_conexion_orange, $username_conexion_orange, $password_conexion_orange) or trigger_error(mysql_error(),E_USER_ERROR);
                mysql_select_db($database_conexion_orange, $conexion_orange);


                $get=mysql_query("SELECT distinct nom  FROM kpi ");
                while($row = mysql_fetch_assoc($get))
                {
                    ?>
                    <option value = "<?php echo($row['nom'])?>" >
                        <?php echo($row['nom'])?>
                    </option>
                    <?php
                }
                ?>
            </select>
        </div>
    </div>



    <div class="form-group">
        <label for="formule" class="col-sm-4 control-label">Formule SQL</label>

        <div class="col-sm-8">
            <input name="formule" class="form-control"  placeholder="Formule">
        </div>
    </div>

    <div class="box-footer">
        <button type="submit" class="btn btn-warning pull-right">Valider</button>
    </div>


</form>




<script type="text/javascript">
    $(function () {
        $(".select2").select2();
        $('#date1').datepicker({
            autoclose: true
        });
    });
</script>