<? include("config.php");         
$where='';
//RECEBE PARÃMETRO                     
for($i=0;$i<count($_POST[FM]);$i++){
	$where.= "(f.master='".$_POST[FM][$i]."' And e.excluido='n')";
	if($i<(count($_POST[FM])-1)){
		$where.= " or ";
	}
}

//QUERY 
$sql = "SELECT f.id, f.nome, count(*) as total FROM equipamento e inner join familia f on (f.id=e.familia) where ".$where." group by f.id order by f.nome";            
//EXECUTA A QUERY               
//echo $sql;
$sql = mysql_query($sql) or die (mysql_error());       

$row = mysql_num_rows($sql);    
//VERIFICA SE VOLTOU ALGO 

	

   //XML
   $xml  = "<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>\n";
   $xml .= "<cidades>\n";               
   
   //PERCORRE ARRAY    
	   
	   for($i=0; $i<$row; $i++) {  
      $codigo    = mysql_result($sql, $i, "id"); 
	  $descricao = mysql_result($sql, $i, "nome");
	  $total = mysql_result($sql, $i, "total");
      $xml .= "<cidade>\n";     
      $xml .= "<codigo>".$codigo."</codigo>\n";                  
      $xml .= "<descricao>".$descricao." (".$total.")</descricao>\n";         
      $xml .= "</cidade>\n";    

	   
   }
   $xml.= "</cidades>\n";
   
   //CABEÇALHO
   Header("Content-type: application/xml; charset=iso-8859-1"); 
                                               

//PRINTA O RESULTADO  
echo $xml;
mysql_free_result($sql);             
?>
