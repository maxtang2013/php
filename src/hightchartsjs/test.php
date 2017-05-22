<?php

	$gross = ['Amount' => [3,4,65,12,8,18,13]];

	$grossFirst = ['Amount' => [5,2,22,14,8.5,15,17]];

	$dates = [];

	for($i=0; $i<=count($gross); $i=$i+1)
  	{
        $dates[] = sprintf("05/%2d", $i);
    }

?>

<script src="../../js/jquery-3.2.1.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>


<script type="text/javascript">
	var grossRevenue=<?=json_encode($gross['Amount'])?>;
    var GrossFirstTimeRevenue=<?=json_encode($grossFirst['Amount'])?>;
    
    $(function(){
        Highcharts.chart('chartContainer', {
            title: {
                text: 'Marketing Reporting'
            },
            yAxis: {
                title: {
                    text: 'Cost/Sales'
                }
            },
            xAxis: {
                categories: <?=json_encode($dates)?>
            },
            tooltip: {
                formatter: function() {
                    var text = '';
                    var d = this.series.data

                    text =this.key +'<br>';
                    if(this.series.name=='Total First Time Sales'||
                        this.series.name=='Total Refunds'||this.series.name=='Total Chargebacks'||this.series.name=='Total Recurring Payments')
                        text +=this.series.name+': <b>'+d[this.point.index].y+'</b>';
                    else if(this.series.name=='Roi (First Time)'||this.series.name=='Roi (Future)'||this.series.name=='Roi ')
                        text +=this.series.name+': <b>'+d[this.point.index].y+'%</b>';
                    else
                        text +=this.series.name+': <b>$'+addCommas(d[this.point.index].y)+'</b>';
                    return text;
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },
            series: [
                {
                    name: 'Gross Revenue',
                    data: grossRevenue
                },
                {
                    name: 'Gross First Time Revene',
                    data: GrossFirstTimeRevenue
                },
            ]

        });
    });

	function addCommas(nStr)
    {
        nStr += '';
        x = nStr.split('.');
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + ',' + '$2');
        }
        return x1 + x2;
    }
</script>

<div class="container-fluid" id="chartContainer"></div>