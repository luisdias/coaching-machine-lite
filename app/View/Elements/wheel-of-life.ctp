<?php
	$i = 1;
	
	echo '<style>'."\n";
	foreach ($wheelSlices as $wheelSlice):
		echo '#ex' . $i . 'Slider .slider-handle {background: #' . $wheelSlice['color'] . ';}';
		echo "\n";
		$i++;
	endforeach;
	
	echo '</style>'."\n"."\n";
	
	echo '<div class="row">'."\n";
	echo '<canvas id="myChart" class="col-md-8"></canvas>'."\n";
	echo '<div class="col-md-4">'."\n";	
	
	$i = 1;	
	reset($wheelSlices);
	foreach ($wheelSlices as $wheelSlice):	
		echo '<div class="row">'."\n";
		echo '<div class="col-md-12">'."\n";
		echo '<h3>'. $wheelSlice['title'] .'</h3>'."\n";
		echo '<input id="ex'. $i .'" data-slider-id="ex'. $i .'Slider" type="text" data-slider-min="0" data-slider-max="100" data-slider-step="10" data-slider-value="100"/>'."\n";
		echo '</div>'."\n";
		echo '</div>'."\n";
		$i++;
	endforeach;
	
	$myScript = "";	
	$i = 1;	
	reset($wheelSlices);
	$myScript .= '<script>'."\n";
	foreach ($wheelSlices as $wheelSlice):	
		$myScript .= '$("#ex'. $i .'").slider({'."\n";
		$myScript .= '	formatter: function(value) {'."\n";
		$myScript .= '		return value;'."\n";
		$myScript .= '	}'."\n";
		$myScript .= '});'."\n";
		$i++;
	endforeach;
	
	$i = 1;
	reset($wheelSlices);
	foreach ($wheelSlices as $wheelSlice):		
		$myScript .= '$("#ex'. $i .'").on("slide", function(slideEvt) {'."\n";
		$myScript .= '	myPolarAreaChart.segments[0].value = slideEvt.value;'."\n";
		$myScript .= '	myPolarAreaChart.update();'."\n";
		$myScript .= '});'."\n";
		$i++;
	endforeach;
	
	$myScript .= 'var ctx = document.getElementById("myChart").getContext("2d");';

	$myScript .= '
	var options = [ { 
		scaleShowLabelBackdrop : true,
		scaleBackdropColor : "rgba(255,255,255,0.75)",
		scaleBeginAtZero : true,
		scaleBackdropPaddingY : 2,
		scaleBackdropPaddingX : 2,
		scaleShowLine : true,
		segmentShowStroke : true,
		segmentStrokeColor : "#000000",
		segmentStrokeWidth : 10,
		animationSteps : 100,
		animationEasing : "easeOutBounce",
		animateRotate : true,
		animateScale : false,
		legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
	}
	];'."\n";
	
	$myScript .= 'var data = [';
	$i = 1;
	reset($wheelSlices);
	foreach ($wheelSlices as $wheelSlice):		
		$myScript .= '    {'."\n";
		$myScript .= '        value: 100,'."\n";
		$myScript .= '        color:"#'. $wheelSlice['color'] .'",'."\n";
		$myScript .= '        highlight: "#fefe00",'."\n";
		$myScript .= '        label: "'.$wheelSlice['title'].'"'."\n";
		$myScript .= '    },';
		$i++;
	endforeach;	
	$myScript .= '];'."\n";
	$myScript .= 'var myPolarAreaChart = new Chart(ctx).PolarArea(data, options);'."\n";
	
	$myScript .= '</script>'."\n";
	
	//echo $myScript;
?>