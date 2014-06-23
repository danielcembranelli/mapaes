<? include("config.php");?>
<?php header("Content-Type: text/html;  charset=ISO-8859-1",true); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<script type="text/javascript" src="js/jquery-1.2.3.pack.js"></script>
<script>
function processXML(obj,form){
      //pega a tag cidade
      var dataArray   = obj.getElementsByTagName("cidade");
      document.getElementById(form).options.length = 1;
	  //total de elementos contidos na tag cidade
	  if(dataArray.length > 0) {
	     //percorre o arquivo XML paara extrair os dados
         for(var i = 0 ; i < dataArray.length ; i++) {
            var item = dataArray[i];
			//contéudo dos campos no arquivo XML
			var codigo    =  item.getElementsByTagName("codigo")[0].firstChild.nodeValue;
			var descricao =  item.getElementsByTagName("descricao")[0].firstChild.nodeValue;
			
	        //idOpcao.innerHTML = "--Selecione uma das opções abaixo--";
			
			//cria um novo option dinamicamente  
			var novo = document.createElement("option");
			    //atribui um ID a esse elemento
			    novo.setAttribute("id", "opcoes");
				//atribui um valor
			    novo.value = codigo;
				//atribui um texto
			    novo.text  = descricao;
				//finalmente adiciona o novo elemento
				document.getElementById(form).options.add(novo);
				//document.addMercadoria.products_atributo.options.add(novo);
		 }
	  }
	  else {
	    //caso o XML volte vazio, printa a mensagem abaixo
		//idOpcao.innerHTML = "--Sem complemento para o destino--";
	  }	  
   }
function listaFamilia(){
	//alert($('#formfamilia').serialize());
	$.post("xmlFamilia.php",$('#formfamilia').serialize(), function(data){
		processXML(data,'FAMILIA')
		document.getElementById('STATUS').options.length=1;
		document.getElementById('ANO').options.length=1;
		});   
}
function listaStatus(id){
	//alert($('#formfamilia').serialize());
	$.post("xmStatus.php",$('#formfamilia').serialize(), function(data){
		processXML(data,'STATUS')
		
		});   
}
function listaAno(id){
	//alert(id);
	$.post("xmlEquipamento.php",$('#formfamilia').serialize(), function(data){
		processXML(data,'ANO')
		document.getElementById('STATUS').options.length=1;
		});   
}
</script>
<style>
select{
	width:500px;
	font-size:9px;
}
</style>
<body>
<form id="formfamilia" name="filtro" method="post" action="RelatorioFiltro.php" target="_blank">
  <select name="FM[]" size="5" multiple="multiple" id="FM" onchange="listaFamilia(this.value)">
  <option value="VAZIO">Selecione...</option>
    <? 
	$Sql = mysql_query("SELECT fm.id, fm.nome, count(*) as total FROM equipamento e inner join familia f on (f.id=e.familia) left join familia_master fm on (fm.id=f.master) where e.excluido='n' group by fm.id order by fm.nome") or die (mysql_error());
	while ($sg = mysql_fetch_array($Sql)){
	?>
    <option value="<?=$sg[id]?>"><?=$sg[nome]?> (<?=$sg[total]?>)</option>
    <? } ?>
  </select>
  <br />
  <select name="FAMILIA[]" size="5" multiple="multiple" id="FAMILIA" onchange="listaAno(this.value)">
    <option value="VAZIO">Selecione...</option>
</select>
  <br />
  <select name="ANO[]" size="5" multiple="multiple" id="ANO" onchange="listaStatus(this.value)">
    <option value="VAZIO">Selecione...</option>
</select>
  <br />
  <select name="STATUS[]" size="10" multiple="multiple" id="STATUS">
    <option value="VAZIO">Selecione...</option>
</select>
  <br />
<input width="54" type="image" height="16" align="middle" src="imagens/layout_btbuscar.gif">
</form>
</body>
</html>