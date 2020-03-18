<?php

function likes(array $names):string {

$string = '';

//return if empty array	
if (empty($names)) return 'no one likes this';

//count strings in array
$count = count($names);

//prepare string for return
switch ($count) {
	case 1: $string = $names[0]; break;
	case 2: $string = $names[0] . ' and ' . $names[1]; break;
	case 3: $string = $names[0] . ', ' . $names[1] . ' and ' . $names[2]; break;
	default: $string = $names[0] . ', ' . $names[1] . ' and ' . ($count - 2) . ' others'; break;
}	
$string .= ' likes this';

return $string;
}