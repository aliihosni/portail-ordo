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
        <button type="submit" name="submit" value="f" class="btn btn-warning pull-right">Valider</button>
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