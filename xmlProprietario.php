<? include("config.php");         

//RECEBE PARÃMETRO                     
        

//QUERY 
$sql = "SELECT p.nomeProprietario, p.idProprietario FROM proprietario p  where statusProprietario='A' ";
if($_REQUEST[idTp]!=''){
$sql .=" And p.tipoProprietario='".$_REQUEST[idTp]."'";
}
$sql .=" order by nomeProprietario";            
//EXECUTA A QUERY               
$sql = mysql_query($sql) or die (mysql_error());       

$row = mysql_num_rows($sql);    
//VERIFICA SE VOLTOU ALGO 

	

   //XML
   $xml  = "<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>\n";
   $xml .= "<cidades>\n";               
   
   //PERCORRE ARRAY    
	   
	   for($i=0; $i<$row; $i++) {  
      $codigo    = mysql_result($sql, $i, "idProprietario"); 
	  $descricao = mysql_result($sql, $i, "nomeProprietario");
      $xml .= "<cidade>\n";     
      $xml .= "<codigo>".$codigo."</codigo>\n";                  
      $xml .= "<descricao>".$descricao."</descricao>\n";         
      $xml .= "</cidade>\n";    

	   
   }
   $xml.= "</cidades>\n";
   
   //CABEÇALHO
   Header("Content-type: application/xml; charset=iso-8859-1"); 
                                               

//PRINTA O RESULTADO  
echo $xml;
mysql_free_result($sql);             
?>
