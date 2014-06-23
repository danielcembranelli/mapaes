<?
# Configuracoes de banco de dados
$host ="177.52.160.26"; // Host valor padrao  localhost
$usuariodb="hostplaz_escad"; //Usuario de Conexao com  o MySQL
$senhadb="]IoK0zd9"; // Senha de Conexao com o MySQL
$db="hostplaz_escad"; //Banco de Dados MySQL
# Nao alterar nada abaixo
$conexao=mysql_connect ("$host", "$usuariodb", "$senhadb") or die ('No foi possivel conectar com o usuario: ' . mysql_error());
mysql_select_db ("$db") or die("no foi possivel");
$data = date("Y-m-d");

        $SqlFMaster = mysql_query("SELECT p.ID_PATIO, (SELECT count(*) FROM `obra` WHERE status = 'a' And `patio` = p.ID_PATIO) as OBRA, (SELECT count(*) FROM `equipamento_obra` WHERE `PATIO` =p.ID_PATIO And status = 'a') as EOBRA, (Select count(*) from equipamento E inner join status S on (S.id=E.status) where E.excluido='n' And E.ativo='d' And S.ID_PATIO=p.ID_PATIO) as DISPONIVEL, (Select count(*) from equipamento E inner join status S on (S.id=E.status) where E.excluido='n' And E.ativo='m' And S.ID_PATIO=p.ID_PATIO) as MANUTENCAO FROM patio p order by p.ID_PATIO");
        while ($sM = mysql_fetch_array($SqlFMaster)){ 

			$insert = mysql_query("insert into dip_patio values ('','$sM[ID_PATIO]',NOW(),'$sM[DISPONIVEL]','$sM[MANUTENCAO]','$sM[OBRA]','$sM[EOBRA]');");
			
		}
		mysql_free_result($SqlFMaster);
		
		$SqlDipE = mysql_query("Select o.id, o.contrato, o.cliente, (Select count(*) from equipamento_obra eo where eo.obra=o.id And eo.status='a') as qtda from obra o where o.status='a'");
		while ($sE = mysql_fetch_array($SqlDipE)){
		
			$insert = mysql_query("insert into dip_equipamento_obra values ('',NOW(),'$sE[id]','$sE[qtda]')") or die (mysql_error());
		
		}
		mysql_free_result($SqlDipE);

$data = date("Y-m-d");
$hora = date("h:m");
$sql = mysql_query ("INSERT INTO `auto` ( `id` , `data`  , `hora`, `modo` ) VALUES ('', '$data', '$hora', 'batchM');");
if (!$sql){
echo "No foi possivel a consulta.";}
else{}
?>
