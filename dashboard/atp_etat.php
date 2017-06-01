<?php

$last_moday =  date('Y-m-d',strtotime('last monday' , strtotime('tomorrow'))) ;

$next_monday = date('Y-m-d',strtotime('next monday')) ;


$begin = new DateTime( $last_moday );
$end = new DateTime( $next_monday );

$interval = new DateInterval('P1D');
$daterange = new DatePeriod($begin, $interval ,$end);


$tab = array();
$sql = ("SELECT demandeur.equipe, swan.Demandeur FROM swan,demandeur where demandeur.`Demandeur`=swan.`Demandeur`+'%' and STR_TO_DATE(fin , '%Y-%m-%d' ) between STR_TO_DATE('".$last_moday."' , '%Y-%m-%d') and STR_TO_DATE('".$next_monday."' , '%Y-%m-%d') group by demandeur.equipe");
$result = mysql_query($sql);

while($row = mysql_fetch_array($result)) {

    if ( !isset($tab[utf8_encode($row["Demandeur"])]) && $row["Demandeur"]!="" && $row["Demandeur"]!=" " && $row["Demandeur"]!="Demandeur" ) {

        $tab[utf8_encode($row["Demandeur"])] = '{ name :"'. utf8_encode($row["equipe"]).'" , data: ['  ;

    }


}


foreach($daterange as $date){


    $d = $date->format("Y-m-d") ;

    $sql2 = ("SELECT demandeur.equipe, swan.Demandeur FROM swan,demandeur where demandeur.`Demandeur`=swan.`Demandeur`+'%' and STR_TO_DATE(fin , '%Y-%m-%d' ) between STR_TO_DATE('".$last_moday."' , '%Y-%m-%d') and STR_TO_DATE('".$next_monday."' , '%Y-%m-%d') group by demandeur.equipe");
    $result2 = mysql_query($sql2);

    while($row2 = mysql_fetch_array($result2)) {

        $sql3 = ("SELECT count(*) as 'number' FROM swan where STR_TO_DATE(fin , '%Y-%m-%d' ) = STR_TO_DATE('".$d."' , '%Y-%m-%d') and Demandeur = '".$row2["Demandeur"]."' ");
        $result3 = mysql_query($sql3);
        while($row3 = mysql_fetch_array($result3)) {

            $tab[utf8_encode($row2["Demandeur"])] = $tab[utf8_encode($row2["Demandeur"])] .$row3["number"]. ",";

        }

    }
    mysql_data_seek($result2,0);

}


?>


<style type="text/css">
    ${demo.css}
</style>



<script>

    $(function () {
        $('#atp_etat').highcharts({
            colors: ['#fedc00', '#ff6600', '#4fbf87', '#4bb3e8', '#9164cd', '#ffb3e5'],
            chart: {
                backgroundColor: null,
                style: {
                    fontFamily: 'Dosis, sans-serif'
                },
                type: 'column'
            },
            title: {
                text: ' ',
                style: {
                    fontSize: '16px',
                    fontWeight: 'bold',
                    textTransform: 'uppercase'
                }
            },

            xAxis: {
                categories: ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'],
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
                    text: 'Nombre des ATP',
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
                foreach ($tab as &$value) {

                    $value = $value . "] }, ";
                    echo $value;

                }

                ?>


            ]
        });
    });
</script>
