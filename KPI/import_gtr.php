<form action="kpi.php" method="POST" name="upload" id="form1" enctype="multipart/form-data" >


    <div class="input-group">
        <label class="input-group-btn">
                    <span class="btn btn-info">
                        Choisir un fichier… <input type="file" name="fichier_gtr" style="display: none;" multiple="">
                    </span>
        </label>
        <input type="text" class="form-control" readonly="">
    </div>
    <div class="box-footer">
        <button type="submit" value="gtr" name="submit" class="btn btn-info pull-right">Valider</button>
    </div>


</form>