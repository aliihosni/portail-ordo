<?php
$mon = mysql_query("SELECT monthname((CURRENT_DATE - INTERVAL 1 MONTH)) as 'month'  ") ;
$sql = "SELECT `Etat`, COUNT(*) AS 'countstatus' FROM incidents where (`Date debut` >= CURRENT_DATE - INTERVAL 7 DAY) and (`Date debut` <= CURRENT_DATE) GROUP BY `Etat`;";
/*SELECT `Etat`, COUNT(*) AS 'countstatus' FROM incidents where (`Date debut` >= CURRENT_DATE - INTERVAL 1 MONTH) and (`Date debut` <= CURRENT_DATE) GROUP BY `Etat`;*/
$res=mysql_query($sql);
?>

<style type="text/css">
    ${demo.css}
</style>

<script type="text/javascript">

    $(function () {
        $('#w_1').highcharts({

            colors: ['#ff6600', '#fedc00',  '#4fbf87', '#4bb3e8', '#9164cd', '#ffb3e5'],
            chart: {
                type: 'column',
                backgroundColor: null,
                style: {
                    fontFamily: 'Dosis, sans-serif'
                }
            },
            title: {
                text: '<?php  echo "Semaine du ".date('d/M/Y',strtotime('-7 days'))." au ".date('d/M/Y',time()) ; ?> ',
                style: {
                    fontSize: '16px',
                    fontWeight: 'bold',
                    textTransform: 'uppercase'
                }
            },
            xAxis: {
                gridLineWidth: 1,
                labels: {
                    style: {
                        fontSize: '12px'
                    }
                },
                type: 'category',
                title: {
                    text: 'Etats des TOC'
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Nombre de TOC crées',
                    style: {
                        textTransform: 'uppercase'
                    }
                },
                minorTickInterval: 'auto',
                labels: {
                    style: {
                        fontSize: '12px'
                    }
                }
            },
            legend: {
                enabled: false
            },
            tooltip: {
                pointFormat: '{point.y} : <b> TOC </b>',
                borderWidth: 0,
                backgroundColor: 'rgba(219,219,216,0.8)',
                shadow: false
            },
            series: [{
                name: 'Population',
                data: [
                    <?php while ( $row = mysql_fetch_array($res)) {    ?>

                    ['<?php echo utf8_encode($row['Etat'])?>' , <?php echo utf8_encode($row['countstatus'])?>], <?php } ?>

                ],
                dataLabels: {
                    enabled: true,
                    rotation: -90,
                    color: '#FFFFFF',
                    align: 'right',
                    format: '{point.y}', // one decimal
                    y: 10, // 10 pixels down from the top
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Dosis, sans-serif'
                    }
                }
            }]
        });
    });
</script>
