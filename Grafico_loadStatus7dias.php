<?php
include("config.php");
// generate some random data
srand((double)microtime()*1000000);

$data = array();
$obra = array();
$manutencao = array();
$disponivel = array();
$ob = array();
$Sql = mysql_query("SELECT E.ativo, D.labelDesc, count(*) as valor, (100/(Select count(*) from equipamento where excluido='n' And ativo!='v'))*count(*) as total FROM hostplaz_escad.equipamento E inner join hostplaz_escad.desc_status D on (D.ativoDesc=E.ativo) where E.excluido='n' And E.ativo!='v' group by ativo");

while ($sq = mysql_fetch_array($Sql)){
    $d[$sq[ativo]] = number_format($sq[total],2);
}
mysql_free_result($Sql);
	$data[] = date("d/m");
    $obra[] = $d[o];
    $manutencao[] = $d[m];
    $disponivel[] = $d[d];	
    $ob[] = $d[b];

$Sql = mysql_query("SELECT data, mes, obra, manutencao, disponivel,ob, (100/(obra+manutencao+disponivel+ob)) as porcem FROM dip_diaria_geral d order by dia desc Limit 7;");

while ($sq = mysql_fetch_array($Sql)){
	$data[] = $sq[data].'/'.$sq[mes];
    $obra[] = $sq[obra]*$sq[porcem];
    $manutencao[] = $sq[manutencao]*$sq[porcem];
    $disponivel[] = $sq[disponivel]*$sq[porcem];	
    $ob[] = $sq[ob]*$sq[porcem];
    
}
mysql_free_result($Sql);

//array_reverse($data);

include_once( 'open-flash-chart/ofc-library/open-flash-chart.php' );
$g = new graph();
$g->title( 'Ultimos 7 dias', '{font-size: 14px;}' );
$g->bg_colour = '#FFFFFF';
$g->set_data(array_reverse($obra));
$g->line_hollow( 2, 4, '#20558a', 'Obra', 10 );

$g->set_data(array_reverse($manutencao));
$g->line_hollow( 2, 4, '#009661', 'Manutencao', 10 );

$g->set_data(array_reverse($disponivel));
$g->line_hollow( 2, 4, '#C79810', 'Disponivel', 10 );

$g->set_data(array_reverse($ob));
$g->line_hollow( 2, 4, '#d01f3c', 'Ob', 10 );
// label each point with its value
$g->set_x_labels(array_reverse($data));
$g->set_tool_tip( '#val#%' );
// set the Y max
$g->set_y_max(100);
// label every 20 (0,20,40,60)
$g->y_label_steps(6);

//$g->bg_colour = '#FFFFFF';
//$g->pie(60,'#FFFFFF','{display:none;}',false,1);
//
// pass in two arrays, one of data, the other data labels
//
//$g->pie_values( $data, $label, $links );
//
// Colours for each slice, in this case some of the colours
// will be re-used (3 colurs for 5 slices means the last two
// slices will have colours colour[0] and colour[1]):
//
//$g->pie_slice_colours( array('#d01f3c','#C79810','#009661','#20558a','#356aa0') );
//$g->set_tool_tip( 'Frota em #x_label#<br>Qtde: #val#%' );

echo $g->render();
?>
