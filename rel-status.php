<?
function data($data) {
$result = explode('-',$data);
return $result[2].'/'.$result[1].'/'.$result[0];
}
function CalculaDias($tipo,$dt,$dias){

	
	$d = explode('/',data($dt)); 
	if($tipo=='D'){
		$Data = date("Y-m-d",mktime (0,0,0,$d[1],$d[0]+$dias,$d[2]));
	}
	if($tipo=='M'){
		$Data = date("Y-m-d",mktime (0,0,0,$d[1]+$dias,$d[0],$d[2]));
	}
	if($tipo=='A'){
		$Data = date("Y-m-d",mktime (0,0,0,$d[1],$d[0],$d[2]+$dias));
	}
	return $Data;
	
}
function countIntervaloDias($dtInicio,$dtFinal,$dtInicioCompara,$dtFinalCompara,$Uteis='N'){
	if($dtInicio>$dtInicioCompara){
		$di = explode("-",$dtInicio);
	} else {
		$di = explode("-",$dtInicioCompara);
	}
	if($dtFinal<$dtFinalCompara){
		$df = explode("-",$dtFinal);
	} else {
		$df = explode("-",$dtFinalCompara);
	}
	
	$d1 = mktime(0,0,0,$di[1],$di[2]-1, $di[0]);
	$d2 = mktime(0,0,0,$df[1],$df[2], $df[0]);
	$tempo_unix = $d2-$d1;
	$dias = floor($tempo_unix /(24*60*60));
	if($Uteis=='S'){
		$dias-=countDiasNaoUteis($di[0].'-'.$di[1].'-'.$di[2],$df[0].'-'.$df[1].'-'.$df[2]);
	}
	
	if($dias<0){
		return 0;
	} else {
		return $dias;
	}
}
$t['b'] = 0;
$t['d'] = 0;
$t['m'] = 0;
$t['o'] = 0;
$t['v'] = 0;

set_time_limit(0);
$sql = mysql_connect("177.52.160.26", "hostplaz_daniel", "]IoK0zd9") or die (mysql_error()); 
mysql_select_db ("hostplaz_escad") or die("não foi possivel");


$Sqlw = mysql_query("SELECT idEquipamento FROM statusmaquinalog where dtSml between '2012-01-01' and '2013-06-07' group by idEquipamento Limit ".$_REQUEST[x].",".$_REQUEST[z].";") or die (mysql_error());
while($w = mysql_fetch_array($Sqlw)){


$i=0;
$e=array();

$Sql = mysql_query("SELECT DATE_FORMAT(sm.dtSml,'%Y-%m-%d') as dt, sm.idEquipamento, s.ativo, s.ID_PATIO FROM statusmaquinalog sm inner join status s on (s.id=sm.idStatus) where sm.idEquipamento='".$w[idEquipamento]."' And sm.dtSml between '2012-01-01' and '2013-06-03' order by sm.idEquipamento");
$q = mysql_num_rows($Sql);
while($s = mysql_fetch_array($Sql)){
$i++;
$e[$i]['DATA'] = $s[dt];
$e[$i]['ATIVO'] = $s[ativo];
$e[$i]['ID'] = $s[idEquipamento];
$e[$i]['PATIO'] = $s[ID_PATIO];
}

for($a=1;$a<=$q;$a++){
	echo $e[$a]['DATA'].' ['.$e[$a]['ATIVO'].$e[$a]['PATIO'].'] | <br>';
	$Diferenca = countIntervaloDias($e[$a]['DATA'],$e[$a+1]['DATA'],$e[$a]['DATA'],$e[$a+1]['DATA'],'N');
	
	$insert = mysql_query("insert into dip_status values ('','".$e[$a]['PATIO']."','".$e[$a]['ATIVO']."','".$e[$a]['DATA']."','".$e[$a]['ID']."')");
	
	if($Diferenca>1){
		for($d=1;$d<($Diferenca-1);$d++){
			echo CalculaDias('D',$e[$a]['DATA'],$d).' ['.$e[$a]['ATIVO'].$e[$a]['PATIO'].']<br>';
			$insert = mysql_query("insert into dip_status values ('','".$e[$a]['PATIO']."','".$e[$a]['ATIVO']."','".CalculaDias('D',$e[$a]['DATA'],$d)."','".$e[$a]['ID']."')");
		}
		
		
	}
	
	
	if($a==$q){
		
	$Diferenca = countIntervaloDias($e[$a]['DATA'],'2013-06-07',$e[$a]['DATA'],'2013-06-07','N');
	
	//$insert = mysql_query("insert into dip_status values ('','".$e[$a]['PATIO']."','".$e[$a]['ATIVO']."','".$e[$a]['DATA']."','".$e[$a]['PATIO']."')");
	
	if($Diferenca>1){
		for($d=1;$d<($Diferenca-1);$d++){
			echo CalculaDias('D',$e[$a]['DATA'],$d).' ['.$e[$a]['ATIVO'].$e[$a]['PATIO'].'] **<br>';
			$insert = mysql_query("insert into dip_status values ('','".$e[$a]['PATIO']."','".$e[$a]['ATIVO']."','".CalculaDias('D',$e[$a]['DATA'],$d)."','".$e[$a]['ID']."')");
		}
		
		
	}
		
	}

}
}
?>