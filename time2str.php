<?php

function format_duration(int $seconds):string {

$string = '';

$mint = 2147483647; //max integer value on 32bit php ~~~68 years;
$year = 31536000;   //seconds in year with 365 days
$month = 31536000;  //seconds in average month
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
$string .= $months . ' месяц, ';
} elseif (in_array($months % 10,$array1) && !in_array($months,$array2)) {
$string .= $months . ' месяца, ';	
} elseif ($months != 0) {
$string .= $months . ' месяцев, ';		
}

if ($days % 10 == 1 && $days != 11) {
$string .= $days . ' день, ';
} elseif (in_array($days % 10,$array1) && !in_array($days,$array2)) {
$string .= $days . ' дня, ';	
} elseif ($days != 0) {
$string .= $days . ' дней, ';		
}

if ($hours % 10 == 1 && $hours != 11) {
$string .= $hours . ' час, ';
} elseif (in_array($hours % 10,$array1) && !in_array($hours,$array2)) {
$string .= $hours . ' часа, ';	
} elseif ($hours != 0) {
$string .= $hours . ' часов, ';		
}

if ($minutes % 10 == 1 && $minutes != 11) {
$string .= $minutes . ' минута, ';
} elseif (in_array($minutes % 10,$array1) && !in_array($minutes,$array2)) {
$string .= $minutes . ' минуты, ';	
} elseif ($minutes != 0) {
$string .= $minutes . ' минут, ';		
}

if ($seconds % 10 == 1 && $seconds != 11) {
$string .= $seconds . ' секунда';
} elseif (in_array($seconds % 10,$array1) && !in_array($seconds,$array2)) {
$string .= $seconds . ' секунды';	
} elseif ($seconds != 0) {
$string .= $seconds . ' секунд';		
} else {
$string .= 'только что';	
}

//replace last comma with regex
$string = preg_replace('/,(?!.*,)/', ' и ', $string);

return $string;
}