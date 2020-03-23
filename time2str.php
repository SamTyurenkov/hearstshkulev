<?php

function format_duration(int $seconds):string {

$string = '';
$array = array();

$mint = 2147483647; //max integer value on 32bit php ~~~68 years;
$year = 31536000;   //seconds in year with 365 days
$month = 2628288;  //seconds in average month
$day = 86400; 		//seconds in day
$hour = 3600; 		// seconds in hour
$minute = 60; 		//secounds in minute

//get values and save seconds remainder
$years = floor($seconds/$year); $seconds = $seconds % $year; 
$months = floor($seconds/$month); $seconds = $seconds % $month;
$days = floor($seconds/$day); $seconds = $seconds % $day;
$hours = floor($seconds/$hour); $seconds = $seconds % $hour;
$minutes = floor($seconds/$minute); $seconds = $seconds % $minute;

//prepare strings with proper case
$array1 = array(2,3,4);
$array2 = array(12,13,14);

if ($years % 10 == 1 && $years != 11) {
$string .= $years . ' год, ';
} elseif (in_array($years % 10,$array1) && !in_array($years,$array2)) {
$string .= $years . ' года, ';	
} elseif ($years != 0) {
$string .= $years . ' лет, ';		
}

if ($months % 10 == 1 && $months != 11) {
$array[] = $months . ' месяц';
} elseif (in_array($months % 10,$array1) && !in_array($months,$array2)) {
$array[] = $months . ' месяца';	
} elseif ($months != 0) {
$array[] = $months . ' месяцев';		
}

if ($days % 10 == 1 && $days != 11) {
$array[] = $days . ' день';
} elseif (in_array($days % 10,$array1) && !in_array($days,$array2)) {
$array[] = $days . ' дня';	
} elseif ($days != 0) {
$array[] = $days . ' дней';		
}

if ($hours % 10 == 1 && $hours != 11) {
$array[] = $hours . ' час';
} elseif (in_array($hours % 10,$array1) && !in_array($hours,$array2)) {
$array[] = $hours . ' часа';	
} elseif ($hours != 0) {
$array[] = $hours . ' часов';		
}

if ($minutes % 10 == 1 && $minutes != 11) {
$array[] = $minutes . ' минута';
} elseif (in_array($minutes % 10,$array1) && !in_array($minutes,$array2)) {
$array[] = $minutes . ' минуты';	
} elseif ($minutes != 0) {
$array[] = $minutes . ' минут';		
}

if ($seconds % 10 == 1 && $seconds != 11) {
$array[] = $seconds . ' секунда';
} elseif (in_array($seconds % 10,$array1) && !in_array($seconds,$array2)) {
$array[] = $seconds . ' секунды';	
} elseif ($seconds != 0) {
$array[] = $seconds . ' секунд';		
} elseif (empty($array)) {
$array[] = 'только что';	
}

$count = count($array);

switch ($count) {
	case 1: $string = $array[0]; break;
	case 2: $string = implode (' и ', $array); break;
	default: $string = implode (', ', $array); $string = preg_replace('/,(?!.*,)/', ' и ', $string); break;
}

return $string;
}