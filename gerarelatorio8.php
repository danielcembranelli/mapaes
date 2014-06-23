<? include ("verifica.php") ?>
<html>

<head>
<meta http-equiv="Content-Language" content="pt-br">
<meta name="GENERATOR" content="Microsoft FrontPage 5.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Nova pagina 2</title>
</head>

<body>
<p align="center"><b><font face="Verdana">Resultados Comerciais - <? switch($mes) 
{ 
case "01" : $mesext = "Janeiro";         break; 
case "02" : $mesext = "Fevereiro";         break; 
case "03" : $mesext = "Março";                 break; 
case "04" : $mesext = "Abril";                 break; 
case "05" : $mesext = "Maio";                 break; 
case "06" : $mesext = "Junho";                 break; 
case "07" : $mesext = "Julho";                 break; 
case "08" : $mesext = "Agosto";                 break; 
case "09" : $mesext = "Setembro";         break; 
case "10" : $mesext = "Outubro";         break; 
case "11" : $mesext = "Novembro";         break; 
case "12" : $mesext = "Dezembro";         break; 
} 
 
echo"$mesext" ?> de <? echo $ano ?><br>
</font></b></p>
<?
$num = cal_days_in_month(CAL_GREGORIAN, $mes, $ano); // 31
$nume = $num;
$num = $num + 1;
?>
<table border="1" cellpadding="2" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1">
  <tr>
    <td><strong><font face="Verdana" size="2">&nbsp;Informações</font></strong></td>
<?  for($i=1; $i< $num; $i++) { ?>
    <td><font face="Verdana" size="2"><center>
      <strong><? echo $i ?></strong>
    </center></font></td>
<? } ?>    
    <td><font face="Verdana" size="2"><center>
      <strong>Média Total por Dia</strong>
    </center></font></td>
  </tr>
  <tr>
    <td><strong><font face="Verdana" size="2">&nbsp;Frota Operando</font></strong></td>
<?  for($i=1; $i< $num; $i++) { ?>

    <td><center><font face="verdana" size="-2">
    <? 
$noticia = mysql_query("SELECT * FROM dip_diaria_geral where mes = $mes And ano = $ano And data =  $i");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexão<?
}
else{
if ($notician==0){
?><? } else { ?><? while ($dom = mysql_fetch_array($noticia)){ ?>
<? echo $dom[obra] ?>
<? $fim_obra += $dom[obra] ?> 

			<?  } } } ?></font></center>    </td>
    <? } ?>    
    <td><center><font face="verdana" size="-2"><? echo number_format($fim_obra / $nume,2,',','.'); ?></font></center></td>
  </tr>
   <tr>
    <td><strong><font face="Verdana" size="2">&nbsp; % Frota Operando</font></strong></td>
<?  for($i=1; $i< $num; $i++) { ?>

    <td><center><font face="verdana" size="-2">
    <? 
$noticia = mysql_query("SELECT * FROM dip_diaria_geral where mes = $mes And ano = $ano And data =  $i");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexão<?
}
else{
if ($notician==0){
?><? } else { ?><? while ($dom = mysql_fetch_array($noticia)){ ?>
<? $total = $dom[obra] + $dom[disponivel] + $dom[manutencao]+ $dom[ob]; ?>
<? $dividido_disponivel = $dom[obra] / $total * 100 ?>
<? echo number_format($dividido_disponivel,2,',','.'); ?>
<? $fim_pdisp += $dividido_disponivel ?> 
			<?  } } } ?></font></center>    </td>
    <? } ?>    
    <td><center><font face="verdana" size="-2"><? echo number_format($fim_pdisp / $nume,2,',','.'); ?></font></center></td>
  </tr>

  <tr>
    <td><strong><font face="Verdana" size="2">&nbsp;Frota Disponível</font></strong></td>
<?  for($i=1; $i< $num; $i++) { ?>
    <td><center><font face="verdana" size="-2">
    <? 
$noticia = mysql_query("SELECT * FROM dip_diaria_geral where mes = $mes And ano = $ano And data =  $i");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexão<?
}
else{
if ($notician==0){
?><? } else { ?><? while ($dom = mysql_fetch_array($noticia)){ ?>
<? echo $dom[disponivel] ?>
<? $fim_disp += $dom[disponivel] ?> 
			<?  } } } ?>    </font></center>    </td>
<? } ?>    
    <td><center><font face="verdana" size="-2"><? echo number_format($fim_disp / $nume,2,',','.'); ?></font></center></td>
  </tr>
  <tr>
    <td><strong><font face="Verdana" size="2">&nbsp; % Frota Disponível</font></strong></td>
<?  for($i=1; $i< $num; $i++) { ?>
    <td><center><font face="verdana" size="-2">
    <? 
$noticia = mysql_query("SELECT * FROM dip_diaria_geral where mes = $mes And ano = $ano And data =  $i");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexão<?
}
else{
if ($notician==0){
?><? } else { ?><? while ($dom = mysql_fetch_array($noticia)){ ?>
<? $total = $dom[obra] + $dom[disponivel] + $dom[manutencao]+ $dom[ob]; ?>
<? $dividido_disponivel = $dom[disponivel] / $total * 100 ?>
<? echo number_format($dividido_disponivel,2,',','.'); ?>
<? $fim_apdisp += $dividido_disponivel ?> 
			<?  } } } ?>    </font></center>    </td>
<? } ?>    
    <td><center><font face="verdana" size="-2"><? echo number_format($fim_apdisp / $nume,2,',','.'); ?></font></center></td>
  </tr>
  
  <tr>
    <td><strong><font face="Verdana" size="2">&nbsp;Frota Manutenção</font></strong></td>
<?  for($i=1; $i< $num; $i++) { ?>
    <td><center><font face="verdana" size="-2">
    <? 
$noticia = mysql_query("SELECT * FROM dip_diaria_geral where mes = $mes And ano = $ano And data =  $i");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexão<?
}
else{
if ($notician==0){
?><? } else { ?><? while ($dom = mysql_fetch_array($noticia)){ ?>
<? echo $dom[manutencao] ?>
<? $fim_manu += $dom[manutencao] ?> 
			<?  } } } ?>  </font></center>    </td>
<? } ?>    
    <td><center><font face="verdana" size="-2"><? echo number_format($fim_manu / $nume,2,',','.'); ?></font></center></td>
  </tr>
  <tr>
    <td><strong><font face="Verdana" size="2">&nbsp; % Frota Manutenção</font></strong></td>
<?  for($i=1; $i< $num; $i++) { ?>
    <td><center><font face="verdana" size="-2">
    <? 
$noticia = mysql_query("SELECT * FROM dip_diaria_geral where mes = $mes And ano = $ano And data =  $i");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexão<?
}
else{
if ($notician==0){
?>
<? } else { ?>
<? while ($dom = mysql_fetch_array($noticia)){ ?>
<? $total = $dom[obra] + $dom[disponivel] + $dom[manutencao]+ $dom[ob]; ?>
<? $dividido_disponivel = $dom[manutencao] / $total * 100 ?>
<? echo number_format($dividido_disponivel,2,',','.'); ?>
<? $fim_pmanu += $dividido_disponivel ?> 
			<?  } } } ?>  </font></center>    </td>
<? } ?>    
    <td><center><font face="verdana" size="-2"><? echo number_format($fim_pmanu / $nume,2,',','.'); ?></font></center></td>
  </tr>
  
  
  
  
  
  <tr>
    <td><strong><font face="Verdana" size="2">&nbsp;Frota Obervação</font></strong></td>
<?  for($i=1; $i< $num; $i++) { ?>
    <td><center><font face="verdana" size="-2">
    <? 
$noticia = mysql_query("SELECT * FROM dip_diaria_geral where mes = $mes And ano = $ano And data =  $i");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexão<?
}
else{
if ($notician==0){
?><? } else { ?><? while ($dom = mysql_fetch_array($noticia)){ ?>
<? echo $dom[ob] ?>
<? $fim_ob += $dom[ob] ?> 
			<?  } } } ?>  </font></center>    </td>
<? } ?>    
    <td><center><font face="verdana" size="-2"><? echo number_format($fim_ob / $nume,2,',','.'); ?></font></center></td>
  </tr>
  <tr>
    <td><strong><font face="Verdana" size="2">&nbsp; % Frota Observação</font></strong></td>
<?  for($i=1; $i< $num; $i++) { ?>
    <td><center><font face="verdana" size="-2">
    <? 
$noticia = mysql_query("SELECT * FROM dip_diaria_geral where mes = $mes And ano = $ano And data =  $i");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexão<?
}
else{
if ($notician==0){
?>
<? } else { ?>
<? while ($dom = mysql_fetch_array($noticia)){ ?>
<? $total = $dom[obra] + $dom[disponivel] + $dom[manutencao]+ $dom[ob]; ?>
<? $dividido_disponivel = $dom[ob] / $total * 100 ?>
<? echo number_format($dividido_disponivel,2,',','.'); ?>
<? $fim_pob += $dividido_disponivel ?> 
			<?  } } } ?>  </font></center>    </td>
<? } ?>    
    <td><center><font face="verdana" size="-2"><? echo number_format($fim_pob / $nume,2,',','.'); ?></font></center></td>
  </tr>
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  <tr>
    <td><strong><font face="Verdana" size="2">&nbsp;Horas Vendidas</font></strong></td>
<?  for($i=1; $i< $num; $i++) { ?>
<td>
<?
$novonumero = str_pad($i, 2, "0", STR_PAD_LEFT);
$novonumeros = str_pad($mes, 2, "0", STR_PAD_LEFT);

$dias=date ("D",mktime (0,0,0,$novonumeros,$novonumero, $ano)); 
$caminhao = mysql_query("SELECT * FROM `caminhao_obra` WHERE `data` = '$datas' And caminhao !='cliente'");
$caminhaona = mysql_num_rows($caminhao);
if($caminhaona>=0){
$caminhaon = "1";
}
?>
<center><font face="verdana" size="-2">
    <? 
$noticia = mysql_query("SELECT * FROM dip_diaria_geral where mes = $mes And ano = $ano And data =  $i");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexão<?
}
else{
if ($notician==0){
?><? } else { ?><? while ($dom = mysql_fetch_array($noticia)){ ?>
<?
$novonumero = str_pad($i, 2, "0", STR_PAD_LEFT);
$novonumeros = str_pad($mes, 2, "0", STR_PAD_LEFT);
$datas = "$ano-$novonumeros-$novonumero";
$caminhao = mysql_query("SELECT * FROM `caminhao_obra` WHERE `data` = '$datas' And caminhao !='cliente'");
$caminhaona = mysql_num_rows($caminhao);
if($caminhaona!=0){
$caminhaon = "1";
}
$dias=date ("D",mktime (0,0,0,$novonumeros,$novonumero, $ano));
if($dias==Sun){ 
echo"0";
} else {?>

<? $abc = $dom[pontos] + $caminhaon ?>
<? echo $abc * 9 ?>
<? $fim_pont += $abc ?> 

<?  } } } ?>  
<? } ?>  </font></center>	</td>  
<? } ?>    
    <td><center><font face="verdana" size="-2"><? echo number_format($fim_pont * 9,2,',','.'); ?></font></center></td>
  </tr>
  <tr>
    <td><strong><font face="Verdana" size="2">&nbsp;Pontos Marcados</font></strong></td>
<?  for($i=1; $i< $num; $i++) { ?>
    <td><center><font face="verdana" size="-2">
    <? 
$noticia = mysql_query("SELECT * FROM dip_diaria_geral where mes = $mes And ano = $ano And data =  $i");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexão<?
}
else{
if ($notician==0){
?><? } else { ?><? while ($dom = mysql_fetch_array($noticia)){ ?>
<?
$novonumero = str_pad($i, 2, "0", STR_PAD_LEFT);
$novonumeros = str_pad($mes, 2, "0", STR_PAD_LEFT);
$dias=date ("D",mktime (0,0,0,$novonumeros,$novonumero, $ano));
$caminhao = mysql_query("SELECT * FROM `caminhao_obra` WHERE `data` = '$datas' And caminhao !='cliente'");
$caminhaona = mysql_num_rows($caminhao);
if($caminhaona!=0){
$caminhaon = "1";
}
if($dias==Sun){ 
echo"0";
} else {?>
<? echo $total_caminao_ponto = $dom[pontos] + $caminhaon?>
<? $cami += $total_caminao_ponto ?>
<?  } } } ?>    
<? } ?>
</font></center>  </td>
<? } ?>    
    <td><center><font face="verdana" size="-2"><? echo number_format($cami,2,',','.'); ?></font></center></td>
  </tr>
  <tr>
    <td><strong><font face="Verdana" size="2">&nbsp;Total da Frota</font></strong></td>
<?  for($i=1; $i< $num; $i++) { ?>
    <td><center><font face="verdana" size="-2">
    <? 
$noticia = mysql_query("SELECT * FROM dip_diaria_geral where mes = $mes And ano = $ano And data =  $i");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexão<?
}
else{
if ($notician==0){
?><? } else { ?><? while ($dom = mysql_fetch_array($noticia)){ ?>
<? $total = $dom[obra] + $dom[disponivel] + $dom[manutencao] + $dom[ob] ?>
<? echo $total ?>
<? $fim_total += $total ?> 
			<?  } } } ?>    </font></center>  </td><? } ?>    
    <td><center><font face="verdana" size="-2"><? echo number_format($fim_total / $nume,2,',','.'); ?></font></center></td>
  </tr>
</table>

</body>
</html>