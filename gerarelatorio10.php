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
<p align="center"><b><font face="Verdana">Resultados Comerciais de Acessórios - <? switch($mes) 
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
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1">
  <tr>
    <td><font face="Verdana" size="2">&nbsp;Informações</font></td>
<?  for($i=1; $i< $num; $i++) { ?>
    <td><font face="Verdana" size="2"><center><? echo $i ?></center></font></td>
<? } ?>    
    <td><font face="Verdana" size="2"><center>Média Total por Dia</center></font></td>
  </tr>
  <tr>
    <td><font face="Verdana" size="2">&nbsp;Frota Operando</font></td>
<?  for($i=1; $i< $num; $i++) { ?>

    <td><center>
    <? 
$noticia = mysql_query("SELECT * FROM dip_diaria_geral where mes = $mes And ano = $ano And data =  $i");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexão<?
}
else{
if ($notician==0){
?><? } else { ?><? while ($dom = mysql_fetch_array($noticia)){ ?>
<? echo $dom[aobra] ?>
<? $fim_obra += $dom[aobra] ?> 

			<?  } } } ?></center>
    </td>
    <? } ?>    
    <td><center><? echo number_format($fim_obra / $nume,2,',','.'); ?></center></td>
  </tr>
   <tr>
    <td><font face="Verdana" size="2">&nbsp; % Frota Operando</font></td>
<?  for($i=1; $i< $num; $i++) { ?>

    <td><center>
    <? 
$noticia = mysql_query("SELECT * FROM dip_diaria_geral where mes = $mes And ano = $ano And data =  $i");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexão<?
}
else{
if ($notician==0){
?><? } else { ?><? while ($dom = mysql_fetch_array($noticia)){ ?>
<? $total = $dom[aobra] + $dom[adisponivel] + $dom[amanutencao]; ?>
<? $dividido_disponivel = $dom[aobra] / $total * 100 ?>
<? echo number_format($dividido_disponivel,2,',','.'); ?>
<? $fim_pdisp += $dividido_disponivel ?> 
			<?  } } } ?></center>
    </td>
    <? } ?>    
    <td><center><? echo number_format($fim_pdisp / $nume,2,',','.'); ?></center></td>
  </tr>

  <tr>
    <td><font face="Verdana" size="2">&nbsp;Frota Disponível</font></td>
<?  for($i=1; $i< $num; $i++) { ?>
    <td><center>
    <? 
$noticia = mysql_query("SELECT * FROM dip_diaria_geral where mes = $mes And ano = $ano And data =  $i");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexão<?
}
else{
if ($notician==0){
?><? } else { ?><? while ($dom = mysql_fetch_array($noticia)){ ?>
<? echo $dom[adisponivel] ?>
<? $fim_disp += $dom[adisponivel] ?> 
			<?  } } } ?>    </center>
    </td>
<? } ?>    
    <td><center><? echo number_format($fim_disp / $nume,2,',','.'); ?></td>
  </tr>
  <tr>
    <td><font face="Verdana" size="2">&nbsp; % Frota Disponível</font></td>
<?  for($i=1; $i< $num; $i++) { ?>
    <td><center>
    <? 
$noticia = mysql_query("SELECT * FROM dip_diaria_geral where mes = $mes And ano = $ano And data =  $i");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexão<?
}
else{
if ($notician==0){
?><? } else { ?><? while ($dom = mysql_fetch_array($noticia)){ ?>
<? $total = $dom[aobra] + $dom[adisponivel] + $dom[amanutencao]; ?>
<? $dividido_disponivel = $dom[adisponivel] / $total * 100 ?>
<? echo number_format($dividido_disponivel,2,',','.'); ?>
<? $fim_apdisp += $dividido_disponivel ?> 
			<?  } } } ?>    </center>
    </td>
<? } ?>    
    <td><center><? echo number_format($fim_apdisp / $nume,2,',','.'); ?></td>
  </tr>
  <tr>
    <td><font face="Verdana" size="2">&nbsp;Frota Manutenção</font></td>
<?  for($i=1; $i< $num; $i++) { ?>
    <td><center>
    <? 
$noticia = mysql_query("SELECT * FROM dip_diaria_geral where mes = $mes And ano = $ano And data =  $i");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexão<?
}
else{
if ($notician==0){
?><? } else { ?><? while ($dom = mysql_fetch_array($noticia)){ ?>
<? echo $dom[amanutencao] ?>
<? $fim_manu += $dom[amanutencao] ?> 
			<?  } } } ?>    </center>
    </td>
<? } ?>    
    <td><center><? echo number_format($fim_manu / $nume,2,',','.'); ?></td>
  </tr>
  <tr>
    <td><font face="Verdana" size="2">&nbsp; % Frota Manutenção</font></td>
<?  for($i=1; $i< $num; $i++) { ?>
    <td><center>
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
<? $total = $dom[aobra] + $dom[adisponivel] + $dom[amanutencao]; ?>
<? $dividido_disponivel = $dom[amanutencao] / $total * 100 ?>
<? echo number_format($dividido_disponivel,2,',','.'); ?>
<? $fim_pmanu += $dividido_disponivel ?> 
			<?  } } } ?>    </center>
    </td>
<? } ?>    
    <td><center><? echo number_format($fim_pmanu / $nume,2,',','.'); ?></td>
  </tr>
  
  <tr>
    <td><font face="Verdana" size="2">&nbsp;Total da Frota</font></td>
<?  for($i=1; $i< $num; $i++) { ?>
    <td><center>
    <? 
$noticia = mysql_query("SELECT * FROM dip_diaria_geral where mes = $mes And ano = $ano And data =  $i");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexão<?
}
else{
if ($notician==0){
?><? } else { ?><? while ($dom = mysql_fetch_array($noticia)){ ?>
<? $total = $dom[aobra] + $dom[adisponivel] + $dom[amanutencao] ?>
<? echo $total ?>
<? $fim_total += $total ?> 
			<?  } } } ?>    </center>  </td><? } ?>    
    <td><center><? echo number_format($fim_total / $nume,2,',','.'); ?></center></td>
  </tr>
</table>

</body>

</html>