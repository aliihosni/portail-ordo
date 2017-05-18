<?php
$result = mysql_query("SELECT * FROM `swan_map` where `Etat` Like 'init%'  ") ;
?>

<script type="text/javascript">
    $(function () {
        $('#datatables_atpencours').DataTable({

        });
    });

</script>

<table id="datatables_atpencours" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>ID</th>
        <th>Date Début</th>
        <th>Date Fin</th>
        <th>Noeud</th>
        <th>Description</th>
        <th>Etat</th>
        <th>Impact</th>
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
            <td> <?php echo utf8_encode($row['Etat'])?> </td>
            <td> <?php echo utf8_encode($row['Impact'])?> </td>


        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
