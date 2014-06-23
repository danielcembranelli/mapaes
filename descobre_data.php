<?
$data = "13/03/2005";
$result = explode('/',$data);

$novadata=date ("D",mktime (0,0,0,$result[1],$result[0], $result[2])); 
echo $novadata;
?>