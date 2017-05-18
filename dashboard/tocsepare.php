<?php
$result = mysql_query("SELECT`Numero ticket`, `Date debut`, `Description`, `Date de creation`, `Etat`,`Technicien resp EDS actif` FROM `incidents` WHERE `Etat` Like 'R%'  ") ;
?>

<script type="text/javascript">
    $(function () {
        $('#datatables_tocretabli').DataTable({

        });
    });

</script>

<table id="datatables_tocretabli" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>Numero ticket</th>
        <th>Date debut</th>
        <th>Description</th>
        <th>Date de creation</th>
        <th>Etat</th>
        <th>Technicien resp EDS actif</th>
    </tr>
    </thead>
    <tbody>
    <?php
    while ( $row = mysql_fetch_array($result))   {
        ?>
        <tr>
            <td> <?php echo utf8_encode($row['Numero ticket'])?> </td>
            <td> <?php echo utf8_encode($row['Date debut'])?> </td>
            <td> <?php echo utf8_encode($row['Description'])?> </td>
            <td> <?php echo utf8_encode($row['Date de creation'])?> </td>
            <td> <?php echo utf8_encode($row['Etat'])?> </td>
            <td> <?php echo utf8_encode($row['Technicien resp EDS actif'])?> </td>

        </tr>
        <?php
    }
    ?>
    </tbody>
</table>