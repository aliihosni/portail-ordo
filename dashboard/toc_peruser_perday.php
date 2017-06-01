
<style type="text/css">
    ${demo.css}
</style>


<script>
    $(function () {
        $('#charts_per_user_day').highcharts({
            colors: ['#fedc00', '#ff6600', '#4fbf87', '#4bb3e8', '#9164cd', '#ffb3e5'],
            chart: {
                backgroundColor: null,
                style: {
                    fontFamily: 'Dosis, sans-serif'
                },
                type: 'column'
            },

            title: {
                text: '<?php  echo "Le ".date('d/M/Y',strtotime('-1 day')) ; ?>',
                style: {
                    fontSize: '16px',
                    fontWeight: 'bold',
                    textTransform: 'uppercase'
                }
            },
            xAxis: {
                categories: [
                    <?php
                    $sql = "SELECT `EDS actif` as 'user', COUNT(*) AS 'Nbuser' FROM incidents where (`Date debut` >= CURRENT_DATE - INTERVAL 1 DAY) and (`Date debut` <= CURRENT_DATE) GROUP BY `EDS actif` ";
                    $result=mysql_query($sql);

                    while($row = mysql_fetch_array($result)) {
                        echo "'".utf8_encode($row["user"])."',";
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
                align: 'right',
                x: -30,
                verticalAlign: 'top',
                y: 25,
                floating: true,
                backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
                borderColor: '#CCC',
                borderWidth: 1,
                shadow: false,
                itemStyle: {
                    fontWeight: 'bold',
                    fontSize: '13px'
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

                $sql2 = "SELECT Etat FROM incidents where (`Date debut` >= CURRENT_DATE - INTERVAL 1 DAY) and (`Date debut` <= CURRENT_DATE) GROUP BY `Etat`";
                $result2=mysql_query($sql2);



                while($row2 = mysql_fetch_array($result2)) {
                    $tab="";
                    $incid = $row2["Etat"];
                    $tab = "{ name : '".utf8_encode($incid)."' , data : [";
                    $sql = "SELECT `EDS actif` as 'user' FROM incidents where (`Date debut` >= CURRENT_DATE - INTERVAL 1 DAY) and (`Date debut` <= CURRENT_DATE) GROUP BY `EDS actif` ";
                    $result=mysql_query($sql);
                    while($row = mysql_fetch_array($result)) {
                        $user = $row["user"];

                        $sql3 = "SELECT COUNT(*) AS 'number' FROM incidents where (`Date debut` >= CURRENT_DATE - INTERVAL 1 DAY) and (`Date debut` <= CURRENT_DATE) and `EDS actif` LIKE '".$user."' and `Etat` LIKE '".$incid."' ";
                        $result3=mysql_query($sql3);
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
