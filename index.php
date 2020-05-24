<?php
	require('db_config.php'); 
	$sql = "SELECT value1,reading_time FROM SensorData ORDER BY id DESC LIMIT 30";
?>
 
 
<!DOCTYPE html>
<html>
<head>
	<title>物联网平台</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
	<script src="https://code.highcharts.com/highcharts.js"></script>
</head>
<body>
 
 
<?php

 
if ($result = $conn->query($sql)) {
    while ($row = $result->fetch_assoc()) {    
        $row_value1 = $row["value1"];
        $datetime = $row['reading_time']; 
   
	 $time= strtotime($row['reading_time'])*1000.0181; // chuyển sang dạng format unix  *1000
	 
	 $data[] = "[$time,$row_value1]";
	
    }
    $result->free();
}
 
?>
 
 
<script type="text/javascript">
 
$(function () { 
    $('#container').highcharts({
        chart: {
            type: 'line'
        },
        title: {
            text: '室内温度'
        },
        xAxis: {
            type: 'datetime',
			
        },
        yAxis: {
            title: {
                text: '温度'
            }
        },
        series: [{
            name: '客厅',
            data: [<?php echo join($data, ',') ?>]
        }]
    });
	
});
</script>
 
 
<div class="container">
	<br/>
	<h2 class="text-center">家庭温度</h2>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">仪表盘</div>
                <div class="panel-body">
                    <div id="container"></div>
                </div>
            </div>
        </div>
    </div>
</div>
 
 
</body>
</html>