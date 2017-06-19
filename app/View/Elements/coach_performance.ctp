<div class="panel panel-info">
    <div class="panel-heading"><h3><?php echo __('Coach Performance (based on your self evaluation)'); ?></h3></div>
    <div class="panel-body">
        <canvas id="myChart"></canvas>
    </div>
    <div class="panel-footer"></div>
</div>
<?php 
$labels = '';
$data = '';
$code = '';

if (!empty($coach_performance)) { 
    foreach ($coach_performance as $performance):
        $labels .= "'" . $performance['Meeting']['number'] . "', ";
        $se = $performance['Meeting']['self_evaluation'];
        $data .= ( is_null($se) ? 0 : $se) . ',';
    endforeach;
    
    $labels = substr($labels , 0, -2);
    $data = substr($data , 0, -1);

    $code ="
    var data = {
    labels : [ " . $labels . " ], 
    datasets : [
        {
			fillColor: 'rgba(220,220,220,0.5)',
			strokeColor: 'rgba(151,187,205,1)',
			highlightFill: 'rgba(220,220,220,0.75)',
			highlightStroke: 'rgba(220,220,220,1)',			
            pointHighlightFill : '#fff', 
            pointHighlightStroke : 'rgba(151,187,205,1)',
            data: [ " . $data . " ],
            fill: false
        },
    ]
    };

    var options = {
        responsive: true
    };        
    
    var ctx = new Chart(document.getElementById('myChart').getContext('2d')).Line(data, options);";
} 

$this->Html->script('chart/Chart.min.js', array('block' => 'scriptBottom'));
$this->Html->scriptBlock($code, array('block' => 'scriptBottom'));
?>