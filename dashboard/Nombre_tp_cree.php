


<?php

$sql = "SELECT MONTHNAME(`fin`) as 'mois' , COUNT(*) AS 'NBmois' FROM `atp` where `fin` BETWEEN CURRENT_DATE - INTERVAL 1 MONTH AND CURRENT_DATE ";
$res=mysql_query($sql);
$sql1 = "SELECT COUNT(*) AS 'NBmois' FROM `atp` where `fin` BETWEEN CURRENT_DATE - INTERVAL 1 MONTH AND CURRENT_DATE ";
$res1=mysql_query($sql1);
$row1 = mysql_fetch_array($res1);
?>



<style type="text/css">
    ${demo.css}
</style>

<script type="text/javascript">
    $(function () {
        $('#nb_tp_m_1').highcharts({
            colors: ['#ff6600', '#fedc00',  '#4fbf87', '#4bb3e8', '#9164cd', '#ffb3e5'],
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
                    text: 'Mois'
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Nombre des ATP',
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

                    ['<?php echo utf8_encode($row['mois'])?>' , <?php echo utf8_encode($row1['NBmois'])?>], <?php } ?>

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


