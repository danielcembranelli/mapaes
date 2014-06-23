<?
function CalculaDias($tipo,$dt,$dias){

	
	$d = explode('/',$dt); 
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

$sql = mysql_connect("177.52.160.26", "hostplaz_daniel", "]IoK0zd9") or die (mysql_error()); 
mysql_select_db ("hostplaz_escad") or die("não foi possivel");

for($i=0;$i<=55;$i++){
	$_REQUEST[D] = CalculaDias('D','01/04/2013',$i);
$Sql = mysql_query("SELECT inicio, fim FROM obra where patio='".$_REQUEST[P]."'");
$t=0;
while($s = mysql_fetch_array($Sql)){
$d=explode('-',$s[dia]);
if($s[fim]==''){
	$s[fim]=date('Y-m-d');
}
	$n = countIntervaloDias($s[inicio],$s[fim],$_REQUEST[D],$_REQUEST[D],$Uteis='N');
	if($n>0){
		$n=1;
	}
$t+=$n;
//echo 'Cliente: '.$s[cliente].countIntervaloDias($s[inicio],$s[fim],$_REQUEST[D],$_REQUEST[D],$Uteis='N').'<br>';
//$t['b'] += $s[ob];
//$t['d'] += $s[disponivel];
//$t['m'] += $s[manutencao];
//$t['o'] += $s[obra];
//$t['v'] += $s[venda];

//echo $total = 355 - ($s[obra]+$s[manutencao]+$s[ob]);
//echo '<br><br>';
//mysql_query("Update dip_diaria_geral set obra='".$total."' where dia='".$s[dia]."'");
}
echo $_REQUEST[P].' = '.$_REQUEST[D].': '.$t.'<br>';

$insert = mysql_query("Update dip_patio set totObra='".$t."' where idPatio='".$_REQUEST[P]."' And dtDip='".$_REQUEST[D]."' Limit 1");
}


//echo $Data = date("d/m/Y",mktime (0,0,0,$d[1],$d[2]+1,$d[0]));
//
//$SqlDia = mysql_query("SELECT DATE_FORMAT(s.dtSml,'%d/%m/%Y') as dt, a.ativo, count(*) as total FROM statusmaquinalog s inner join status a on (a.id=s.idStatus) where DATE_FORMAT(s.dtSml,'%d/%m/%Y')='".$Data."' group by a.ativo");
//while($l = mysql_fetch_array($SqlDia)){
//	echo $l[ativo].' - '.$l[total].'<br>';
//	$a[$l[ativo]]=$l[total];	
//}

//$t['b'] + $a[b]-($a[m]/2);
//$t['d'] = $t['d']-($a[b]/2)+$a['d'];
//$t['m'] += $a[m]-($a[d]/2);
//$t['o'] += ($a[o]-($a[m]/2))-($a[d]/2);
//$t['v'] += $a[v];
//$Data = date("Y-m-d",mktime (0,0,0,$d[1],$d[2]+1,$d[0]));
//$Dia = date("d",mktime (0,0,0,$d[1],$d[2]+1,$d[0]));
//$Mes = date("m",mktime (0,0,0,$d[1],$d[2]+1,$d[0]));
//$Ano = date("Y",mktime (0,0,0,$d[1],$d[2]+1,$d[0]));

//print_r($t);
//$SqlDia = mysql_query("INSERT INTO  `dip_diaria_geral` (  `id` ,  `_dia` ,  `obra` ,  `manutencao` ,  `disponivel` ,  `aobra` ,  `adisponivel` ,  `amanutencao` ,  `pontos` ,  `mes` ,  `ano` ,  `data` ,  `ob` ,  `aob` ,  `dia` ,  `venda` ,  `avenda` ) VALUES ('',  '',  '".number_format($t[o])."',  '".number_format($t[m])."',  '".number_format($t[d])."',  '11',  '10',  '18',  '194',  '".$Mes."',  '".$Ano."',  '".$Dia."',  '".number_format($t[b])."',  '1',  '".$Data."',  '".number_format($t[v])."',  '0')");
?>
