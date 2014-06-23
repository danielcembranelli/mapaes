<? include("verifica.php")?>
<html>

<head>
<meta http-equiv="Content-Language" content="pt-br">
<meta name="GENERATOR" content="Microsoft FrontPage 5.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Relação</title>
</head>

<body>
<font face="Verdana" size="2"><b>Notas Emitidas</b></font>
 <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#EFEFEF" width="100%" id="AutoNumber2">
    <tr>
      <td align="center"><font face="Verdana" size="2">Nota</font></td>
      <td align="center"><font face="Verdana" size="2">Empresa</font></td>
      <td align="center"><font face="Verdana" size="2">Contrato</font></td>
      <td align="center"><font face="Verdana" size="2">Equipamento</font></td>
      <td align="center"><font face="Verdana" size="2">Código</font></td>
      <td align="center"><font face="Verdana" size="2">Status</font></td>
      <td align="center"><font face="Verdana" size="2">Inicio | Fim</font></td>
    </tr>
<? for($i = 0; $i < count($todo); $i++){ ?>
<? $obrae = $eptoid[$i]; ?>
    <tr>
      <td align="center"><font size="1"><? echo $nota[$i]?></font></td>
      <td align="center"><font face="Verdana" size="1"><? echo $cliente[$i] ?></font>&nbsp;</td>
      <td align="center"><font face="Verdana" size="1"><? echo $contrato[$i]?></font>&nbsp;</td>
      <td align="center"><font face="Verdana" size="1"><? echo $familia[$i] ?></font></td>
      <td align="center"><font face="Verdana" size="1"><? echo $codigo[$i] ?></font></td>
      <td align="center"><font face="Verdana" size="1"><? if($status[$obrae]==A){?>Em andamento<?} elseif($status[$obrae]==C){?>Concluido<? } else {?>Não emitiu<? } ?></font></td>
      <td align="center"><font face="Verdana" size="1"><? echo $data[$i] ?></font></td>
    </tr>
<?
if($status[$obrae]==N){} else {
$data = date("Y-m-d");
$obrae = $eptoid[$i];

$sql = mysql_query("INSERT INTO `notas` ( `ID_NOTA` , `OBRA_ID` , `EQUIP_OBRA_ID` , `CONTRATO` , `TIPO_NOTA` , `NR_NOTA` , `NOTA_INI` , `NOTA_FIM` , `DATA` ) 
VALUES (
'', '$obra[$i]', '$eptoid[$i]', '$contrato[$i]', '$status[$obrae]', '$nota[$i]', '$nota_ini[$i]', '$nota_fim[$i]', '$data');");

$sql = mysql_query("UPDATE `equipamento_obra` SET `status_nota` = 'C' WHERE `id` = '$eptoid[$i]' LIMIT 1 ;");
}
?>
<? } ?>



   </table>
 


</body>

</html>