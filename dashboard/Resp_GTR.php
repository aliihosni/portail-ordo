<?php
$year=mysql_query(" SELECT YEAR(CURRENT_DATE) AS 'year'  ");
$sql = "SELECT `RespectGTR`, COUNT(*) AS 'Tauxrespect' FROM `gtr` WHERE `RespectGTR` LIKE '0' GROUP BY `RespectGTR` ";
$res=mysql_query($sql);
$sqlk = "SELECT `RespectGTR`, COUNT(*) AS 'Tauxrespect' FROM `gtr` WHERE `RespectGTR` LIKE '1' GROUP BY `RespectGTR` ";
$resk=mysql_query($sqlk);


?>


<script type="text/javascript">
    $(function () {
            $('#gtr').highcharts({
                colors: ['#fedc00', '#ff6600', '#4fbf87', '#4bb3e8', '#9164cd', '#ffb3e5'],
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie',
                    backgroundColor: null,
                    style: {
                        fontFamily: 'Dosis, sans-serif'
                    }
                },
                title: {
                    text: ' <?php while($row = mysql_fetch_array($year)) { echo $row['year']; }?>',
                    style: {
                        fontSize: '16px',
                        fontWeight: 'bold',
                        textTransform: 'uppercase'
                    }
                },
                tooltip: {
                    borderWidth: 0,
                    backgroundColor: 'rgba(219,219,216,0.8)',
                    shadow: false,
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: false
                        },
                        showInLegend: true
                    },
                    candlestick: {
                        lineColor: '#404048'
                    }
                },
                background2: '#F0F0EA',

                series: [{
                    name: 'Taux',
                    colorByPoint: true,


                    data: [ <?php while ( $row = mysql_fetch_array($res)) {    ?> {

                        name: ' <?php echo utf8_encode($row['RespectGTR'])?> GTR non respectée',
                        y: <?php echo utf8_encode($row['Tauxrespect'])?>

                    }, <?php } ?>
                        <?php while ( $row = mysql_fetch_array($resk)) {    ?> {

                            name: ' <?php echo utf8_encode($row['RespectGTR'])?> GTR respectée',
                            y: <?php echo utf8_encode($row['Tauxrespect'])?>

                        }, <?php } ?>


                    ]
                }]
            });

    });

</script>