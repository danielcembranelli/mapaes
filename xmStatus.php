<? include("config.php");         

//RECEBE PARÃMETRO                     
        

//QUERY 
if($_POST[ANO][0]=='TODOS'){
	
	for($i=0;$i<count($_POST[FAMILIA]);$i++){
	$where.= "(e.familia='".$_POST[FAMILIA][$i]."' And e.excluido='n')";
	if($i<(count($_POST[FAMILIA])-1)){
		$where.= " or ";
	}
}
	
$sql = "SELECT s.id, s.nome, count(*) as total FROM equipamento e inner join status s on (s.id=e.status) where ".$where." group by s.id order by s.nome";            
} else {
	
	
	for($i=0;$i<count($_POST[FAMILIA]);$i++){
		for($a=0;$a<count($_POST[ANO]);$a++){
			$where.= "(e.familia='".$_POST[FAMILIA][$i]."' And e.ano='".$_POST[ANO][$a]."' And e.excluido='n')";
			if($a<(count($_POST[ANO])-1)){
			$where.= " or ";
			}
		}
		if($i<(count($_POST[FAMILIA])-1)){
			$where.= " or ";
		}
	}
		
	
$sql = "SELECT s.id, s.nome, count(*) as total FROM equipamento e inner join status s on (s.id=e.status) where ".$where." And e.excluido='n' group by s.id order by s.nome";	
}
//EXECUTA A QUERY               
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
