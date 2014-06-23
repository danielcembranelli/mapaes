<?ini_set ('max_execution_time','400000000000'); ?>
<?
# Configuracoes de banco de dados
$host ="wesell.ns1.com.br"; // Host valor padrao é localhost
$usuariodb="ga2gerenci38414"; //Usuario de Conexao com  o MySQL
$senhadb="qe8e0d54"; // Senha de Conexao com o MySQL
$db="ga2gerenciament"; //Banco de Dados MySQL


# Nao alterar nada abaixo
$conexao=mysql_connect ("$host", "$usuariodb", "$senhadb") or die ('Não foi possivel conectar com o usuario: ' . mysql_error());
mysql_select_db ("$db") or die("não foi possivel");

$tabela = 'segvida';
$tabela_empresas = "segvida_empresas";
$tabela__plano_empresa = "segvida_plano_empresa";
$tabela__plano = "segvida_plano";
$tabela_segurados = "segvida_segurados";
$tabela_boleto = "segvida_boleto";
$tabela_login = "segvida_login";
$tabela_parceiro = "segvida_parceiro";
$tabela_coberturas = "segvida_coberturas";
$tabela_plano_email = "segvida_plano_email";
$tabela_taxa = "segvida_taxa";
?>


<center>
<?
$sql = mysql_query("SELECT DISTINCT `numeroempresa` FROM `segvida_boleto` WHERE `numeroempresa` between '$CODIGOINICIAL' and '$CODIGOFINAL' AND `plano` = '$plano' AND `situacao` = 'A'"); 
$busca     = "SELECT DISTINCT `numeroempresa` FROM `segvida_boleto` WHERE `numeroempresa` between '$CODIGOINICIAL' and '$CODIGOFINAL' AND `plano` = '$plano' AND `situacao` = 'A'"; 
$total_reg = "10";
$paginas = $_GET['paginas']; 
if (!$paginas) { 
   $pc = "1"; 
   } else { 
   $pc = $paginas; 
} 
$inicio = $pc-1; 
$inicio = $inicio*$total_reg; 

?>
<?php 
echo "<table width=100% border=0 cellpadding=2 cellspacing=2>"; 
?>
<?php 
$colunas = "1"; 
$limite = mysql_query("$busca LIMIT $inicio,$total_reg"); // busca no banco de dados 
$todos = mysql_query("$busca");                           // busca no banco de dados 
$tar = mysql_num_rows($limite);
$tr = mysql_num_rows($todos);                             // verifica o número total de registros 
$tp = $tr / $total_reg;                                   // verifica o número total de páginas 
$tp = (int) $tp;                                          // Tira os quebrados do resultado 
if ($tp!=($tr / $total_reg)) { $tp++; } 
?>
<?php 
if ($tar>0) { 
for ($i = 0; $i < $tar; $i++) { 
if (($i%$colunas)==0) { 
echo "</tr>"; 
echo "<tr>"; 
} 
?>
<?php 
$dados = mysql_fetch_array($limite); 
$id = $dados[numeroempresa]; 
?><td width='50%'  valign='top'>
<table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse' bordercolor='#FFFF00' width='100%' id='AutoNumber1'>
  <tr>
    <td width='100%' bordercolor='#FFFF00'>
<?
$gera = mysql_query("SELECT * FROM $tabela_empresas where NUMEROEMPRESA = '$dados[numeroempresa]' order by NUMEROEMPRESA");
$geran = mysql_num_rows($gera);
$ger = mysql_fetch_array($gera); 
?>
Enviando messagem para empresa <? echo $id ?><br />
E-mail enviado para <? echo $ger[EMAILCOB] ?><br />
Boleto em aberto = <? echo $geran ?>
<?
$template = mysql_query("SELECT * FROM segvida_plano_email where plano = '$plano'");
$templaten = mysql_num_rows($template);
if (!$template){
?>Problemas na conexão<?
}else{
if ($templaten==0){
?>
                Não a dados registrados<br>
<?
}else {
while ($tem = mysql_fetch_array($template)){ 
$message = $tem[refaturamento];
$message = str_replace("%%PLANO%%",$plano,$message);
$message = str_replace("%%EMPRESA%%",$ger[RAZAO],$message);
$message = str_replace("%%SENHA%%",$ger[SENHAINTENET],$message);
$message = str_replace("%%COBRANCA%%",$ger[NUMEROEMPRESA],$message);
$message = str_replace("%%CNPJ%%",$ger[CNPJCPF],$message);
$descritivo = mysql_query("SELECT * FROM $tabela__plano where plano = $plano");
while ($des = mysql_fetch_array($descritivo)){ 
$message = str_replace("%%DESCRITIVO%%",$des[SEGUIMENTO],$message);
}

$nome = "$tem[remetente]";
$email = "$tem[email]";

/* Assunto */

$subject = "Re-Aviso de Faturamento";

$headers = "MIME-Version: 1.0\n";

$headers .= "Content-type: text/html; charset=iso-8859-1\n";

$headers .= "From: $nome <$email>\n";



/* Enviando a mensagem */
$email = "ga2@cohrion.com.br";
$envio = mail($email, $subject, $message, $headers);

if(!$envio){
 print 'Erro ao enviar';
 } else {
  print 'Mensagem Enviada com Sucesso!';
 }
} } }
?>
  </tr>

</table>
</td>
<?php 
} 
} else { 
echo "Nenhum registro encontrado"; 
} 
?>                        

</table>  <br>
<center>
<?
// Calcula o valor das paginas anterior e proxima 

$anterior = $pc -1; 
$proximo = $pc +1; 
//echo "<FONT SIZE=3 face=Verdana><b>"; 
//if ($pc>1) { 
//   echo "<a href='?paginas=$anterior&galeria=$galeria&pagina=$paginas' class=\"navegacao0\"><<< Anterior</a> "; 
//   } else { 
//   echo ""; 
//} 
//echo "<font class=navegacao3> |</font> "; 

// aqui começa a parte mais chata, ele calcula os numeros do miolo da barra de paginação 

$cont1 = $pc-5; 
$cont2 = $pc+5; 
if ($cont1<1) { 
    $cont1=1; 
    $cont2=11; 
    if ($tp<=11) { 
        $cont2=$tp; 
    } 
} 
if ($tp>11) { 
    if ($pc+5>=$tp) { 
        $cont2=$tp; 
        $cont1=$tp-11; 
    } 
} 
$cont2++; 
$cont=$cont1; 

// feito os calculos, aqui monta-se o miolo da barra 

//while ($cont!=$cont2) { 
//      IF ($pc==$cont){ 
//          ECHO (" <B><font class=navegacao3>[$cont]</font></B> <font class=navegacao>|</font> "); // se for a pagina atual, mostrar entre [ ] 
//          } ELSE { 
//          ECHO (" <A HREF=\"?paginas=$cont&galeria=$galeria&pagina=$pagina\" class=\"navegacao3\">$cont </A> <font class=navegacao>|</font> ");   // se não for, mostrar numero com link 
//      } 
//      $cont++; 
//} 
if ($pc<$tp) { 
//   echo " <a href='?CODIGOINICIAL=$CODIGOINICIAL&CODIGOFINAL=$CODIGOFINAL&paginas=$proximo' class=\"navegacao3\">Próxima >>></a>"; 
   ?>
<script>window.setTimeout('changeurl();',2000); function changeurl(){window.location='?CODIGOINICIAL=<? echo $CODIGOINICIAL ?>&CODIGOFINAL=<? echo $CODIGOFINAL?>&paginas=<? echo $proximo ?>&plano=<? echo $plano ?>';}</script>

   <?
   } else { 
   echo ""; 
   echo "<script> alert(\"Re-Aviso enviado com sucesso\")</script>";
} 
echo "</font></b></center></td></tr>"; 
?> 
<? mysql_free_result($gera); ?>
<? mysql_free_result($sql); ?>
<br />
Enviando <? echo $pc?> de <? echo $tp ?>
