<form action="kpi.php" method="POST" name="upload" id="form1" enctype="multipart/form-data" class="form-horizontal" >
    <div class="form-group">
        <label for="table2" class="col-sm-4 control-label">Ajouter Table</label>

        <div class="col-sm-8">
            <select  class="form-control select2" name="table2">
                <option value="gtr">GTR</option>
                <option value="incidents">INCIDENTS</option>
                <option value="tp">ATP</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="kpi" class="col-sm-4 control-label">Ajouter KPI</label>

        <div class="col-sm-8">
            <input name="kpi" class="form-control"  placeholder="KPI">
        </div>
    </div>
    <div class="form-group">
        <label for="type" class="col-sm-4 control-label">Ajouter Type</label>

        <div class="col-sm-8">
            <input name="type" class="form-control"  placeholder="Type">
        </div>
    </div>

    <div class="box-footer">
        <button type="submit" value="k" name="submit" class="btn btn-danger pull-right">Valider</button>
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