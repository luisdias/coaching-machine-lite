<?php
if ( substr($action_date,0,10) == substr($created,0,10) ) {
	echo '<i class="glyphicon glyphicon-ok"></i>';
}
if ( substr($action_date,0,10) > substr($created,0,10) ) {
	echo '<i class="glyphicon glyphicon-star"></i>';
}
if ( substr($action_date,0,10) < substr($created,0,10) ) {
	echo '<i class="glyphicon glyphicon-star-empty"></i>';
}
?>