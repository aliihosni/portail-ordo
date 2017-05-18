<?php
$sql = "SELECT `Etat`, COUNT(*) AS 'countstatus' FROM incidents where (`Date debut` >= CURRENT_DATE - INTERVAL 1 MONTH) and (`Date debut` <= CURRENT_DATE) GROUP BY `Etat` ";

$res=mysql_query($sql);
?>
<style type="text/css">
    ${demo.css}
</style>

<script type="text/javascript">
    $(function () {
        $('#m_1').highcharts({
            colors: ['#f39c12', '#f7a35c', '#90ee7e', '#7798BF', '#aaeeee', '#ff0066', '#eeaaee',
                '#55BF3B', '#DF5353', '#7798BF', '#aaeeee'],
            chart: {
                type: 'column',
                backgroundColor: null,
                style: {
                    fontFamily: 'Dosis, sans-serif'
                }
            },
            title: {
                text: '<?php  echo date('M Y',strtotime("-1 month")); ?> ',
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
            background2: '#f0142d',
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


