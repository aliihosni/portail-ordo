



<style type="text/css">
    ${demo.css}
</style>



<script>

    $(function () {
        $('#tp_clo_m_1').highcharts({
            colors: ['#f39c12', '#ff442d', '#00a65a', '#477abf', '#aaeeee', '#ff0066', '#eeaaee',
                '#f0cc00', '#DF5353', '#7798BF', '#aaeeee'],
            chart: {
                backgroundColor: null,
                style: {
                    fontFamily: 'Dosis, sans-serif'
                },
                type: 'column'
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
                categories: [
                    <?php
                    $sql = "SELECT `Etat` as 'etat' FROM swan where (`fin` >= CURRENT_DATE - INTERVAL 1 MONTH) and (`fin` <= CURRENT_DATE) and `Etat` NOT LIKE 'TERMINE%' GROUP BY `Etat` ";
                    $result=mysql_query($sql);

                    while($row = mysql_fetch_array($result)) {
                        echo "'".utf8_encode($row["etat"])."',";
                    }
                    ?>
                ],
                gridLineWidth: 1,
                labels: {
                    style: {
                        fontSize: '12px'
                    }
                }
            },

            yAxis: {
                min: 0,
                minorTickInterval: 'auto',
                title: {
                    text: 'Toc per user',
                    style: {
                        textTransform: 'uppercase'
                    }
                },
                labels: {
                    style: {
                        fontSize: '12px'
                    }
                },
                stackLabels: {
                    enabled: true,
                    style: {
                        fontWeight: 'bold',
                        color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                    }
                }
            },
            legend: {

                backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
                borderColor: '#CCC',
                borderWidth: 1,
                shadow: false,
                itemStyle: {
                    fontWeight: 'bold',
                    fontSize: '9px'
                }
            },
            tooltip: {
                headerFormat: '<b>{point.x}</b><br/>',
                pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}',
                borderWidth: 0,
                backgroundColor: 'rgba(219,219,216,0.8)',
                shadow: false
            },
            plotOptions: {
                column: {
                    stacking: 'normal',
                    dataLabels: {
                        enabled: true,
                        color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
                    }
                },
                candlestick: {
                    lineColor: '#404048'
                }
            },
            background2: '#F0F0EA',
            series: [
                <?php



                $sql2 = "SELECT DISTINCT S.Etat as 'etat', D.equipe, S.Demandeur FROM swan S, demandeur D where (S.fin >= CURRENT_DATE - INTERVAL 1 MONTH) and (S.fin <= CURRENT_DATE) and S.Etat NOT LIKE 'TERMINE%' and D.Demandeur=S.Demandeur+'%'";;
                $result2=mysql_query(utf8_decode($sql2));



                while($row2 = mysql_fetch_array($result2)) {
                    $tab="";
                    $inci = utf8_encode($row2["Demandeur"]);
                    $incid = utf8_encode($row2["equipe"]);
                    $tab = "{ name : '".utf8_encode($incid)."' , data : [";
                    $sql = "SELECT `Etat` as 'etat' FROM swan where (`fin` >= CURRENT_DATE - INTERVAL 1 MONTH) and (`fin` <= CURRENT_DATE) and `Etat` NOT LIKE 'TERMINE%' GROUP BY `Etat` ";
                    $result=mysql_query($sql);
                    while($row = mysql_fetch_array($result)) {
                        $user = utf8_encode($row["etat"]);

                        $sql3 = "SELECT COUNT(*) AS 'number' FROM swan where (`fin` >= CURRENT_DATE - INTERVAL 1 MONTH) and (`fin` <= CURRENT_DATE) and `Etat` LIKE '".$user."' and `Demandeur` LIKE '".$inci."' ";
                        $result3=mysql_query(utf8_decode($sql3));
                        while($row3 = mysql_fetch_array($result3)) {
                            $tab .=  $row3["number"] . "," ;
                        }
                    }
                    $tab .=  "] }, ";
                    echo $tab;
                }





                ?>

            ]
        });
    });
</script>