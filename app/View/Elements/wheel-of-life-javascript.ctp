<?php
	$i = 1;	
	reset($configWheel);
	foreach ($configWheel as $wheelSlice):	
		echo '$("#ex'. $i .'").slider({'."\n";
		echo '	formatter: function(value) {'."\n";
		echo '		return value;'."\n";
		echo '	}'."\n";
		echo '});'."\n";
		$i++;
	endforeach;
	
	$i = 1;
	$k = 0;
	reset($configWheel);
	foreach ($configWheel as $wheelSlice):		
		echo '$("#ex'. $i .'").on("slide", function(slideEvt) {'."\n";
		echo '	$("#ex'. $i .'SliderVal").text(slideEvt.value);'."\n";
		echo '	myPolarAreaChart.segments['. $k .'].value = slideEvt.value;'."\n";
		echo '	myPolarAreaChart.update();'."\n";
		echo '});'."\n";

		echo '$("#ex'. $i .'").change(function() {'."\n";
		echo '	$("#ex'. $i .'SliderVal").text($(this).val());'."\n";
		echo '	myPolarAreaChart.segments['. $k .'].value = $(this).val();'."\n";
		echo '	myPolarAreaChart.update();'."\n";
		echo '});'."\n";		
		
		$i++;
		$k++;
	endforeach;
	
	echo 'var ctx = document.getElementById("myChart").getContext("2d");';

	echo '
	var options = [ { 
	    responsive: true,
		maintainAspectRatio: false,
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
	
	echo 'var data = [';
	$i = 1;
	reset($configWheel);
	foreach ($configWheel as $wheelSlice):		
		echo '    {'."\n";
		echo '        value: '. (is_null($wheelSlice['u']['value']) ? 100 : $wheelSlice['u']['value']) .','."\n";
		echo '        color:"#'. $wheelSlice['s']['color'] .'",'."\n";
		echo '        highlight: "#fefe00",'."\n";
		echo '        label: "'.$wheelSlice['s']['title'].'"'."\n";
		echo '    },';
		$i++;
	endforeach;	
	echo '];'."\n";
	//echo 'var myPolarAreaChart = new Chart(ctx).PolarArea(data, options);'."\n";
	
	echo '
		var width = $(\'canvas\').parent().width();
		var height = $(\'canvas\').parent().height();
		$(\'canvas\').attr("width",width);
		$(\'canvas\').attr("height",width);
		var myPolarAreaChart = new Chart(ctx).PolarArea(data, options);
	';
	
?>