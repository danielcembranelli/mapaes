<? include("config.php");         

//RECEBE PARÃMETRO                     
for($i=0;$i<count($_POST[FAMILIA]);$i++){
	$where.= "(e.familia='".$_POST[FAMILIA][$i]."' And e.excluido='n')";
	if($i<(count($_POST[FAMILIA])-1)){
		$where.= " or ";
	}
}        

//QUERY 
$sql = "SELECT e.ano, count(*) as total FROM equipamento e where ".$where." group by e.ano order by e.ano";            
//EXECUTA A QUERY               
$sql = mysql_query($sql) or die (mysql_error());       

$row = mysql_num_rows($sql);    
//VERIFICA SE VOLTOU ALGO 

	
$tot =0;
   //XML
   $xml  = "<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>\n";
   $xml .= "<cidades>\n";               
   
   //PERCORRE ARRAY    
	   
	   for($i=0; $i<$row; $i++) {  
      $codigo    = mysql_result($sql, $i, "ano"); 
	  $descricao = mysql_result($sql, $i, "ano");
	  $total = mysql_result($sql, $i, "total");
	  
	  $tot+=$total = mysql_result($sql, $i, "total");
	  
      $xml .= "<cidade>\n";     
      $xml .= "<codigo>".$codigo."</codigo>\n";                  
      $xml .= "<descricao>".$descricao." (".$total.")</descricao>\n";         
      $xml .= "</cidade>\n";    

	   
   }
   $xml .= "<cidade>\n";     
      $xml .= "<codigo>TODOS</codigo>\n";                  
      $xml .= "<descricao>todos (".$tot.")</descricao>\n";         
      $xml .= "</cidade>\n";  
   $xml.= "</cidades>\n";
   
   //CABEÇALHO
   Header("Content-type: application/xml; charset=iso-8859-1"); 
                                               

//PRINTA O RESULTADO  
echo $xml;
mysql_free_result($sql);             
?>
