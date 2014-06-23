<?
# Configuracoes de banco de dados
$host ="wesell.ns1.com.br"; // Host valor padrao é localhost
$usuariodb="escad25128"; //Usuario de Conexao com  o MySQL
$senhadb="GRLPwGzK"; // Senha de Conexao com o MySQL
$db="escad"; //Banco de Dados MySQL


# Nao alterar nada abaixo
$conexao=mysql_connect ("$host", "$usuariodb", "$senhadb") or die ('Não foi possivel conectar com o usuario: ' . mysql_error());
mysql_select_db ("$db") or die("não foi possivel");

$data = date("Y-m-d");
?>

<?
$familia = mysql_query("SELECT * FROM familia_acessorio");
$familian = mysql_num_rows($familia);
if (!$familia){
echo"Problemas na conexão";
} else {
if ($familian==0){
echo"Sem Registro de familia com essa master";
}else {
while ($fam = mysql_fetch_array($familia)){

$obra = @mysql_query("SELECT * FROM acessorio where familia = '$fam[id]' And ativo = 'o' And `excluido` != 's'");
$obran=@mysql_num_rows($obra);

$disponivel = @mysql_query("SELECT * FROM acessorio where familia = '$fam[id]' And ativo = 'd' And `excluido` != 's'");
$disponiveln=@mysql_num_rows($disponivel);

$manutencao = @mysql_query("SELECT * FROM acessorio where familia = '$fam[id]' And ativo = 'm' And `excluido` != 's'");
$manutencaon=@mysql_num_rows($manutencao);

$total = @mysql_query("SELECT * FROM acessorio where familia = '$fam[id]' And `excluido` != 's'");
$totaln=@mysql_num_rows($total);



$sql = mysql_query ("INSERT INTO `dip_diaria_afamilia` ( `id` , `data` , `familia` , `obra` , `manutencao` , `disponivel`, `total`, `master` ) VALUES ('', '$data', '$fam[id]', '$obran', '$manutencaon', '$disponiveln', '$totaln', '$fam[master]');");
if (!$sql){
echo "Não foi possivel a consulta.";}
else{}
} }
}  


?>
