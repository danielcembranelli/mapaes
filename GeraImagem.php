<?
/*
**********************************************************************************************
 SCRIPT PHP PARA GERAÇÃO DE IMAGENS ALEATÓRIAS
 
 Autor: Rafael M. Salvioni
 Data: 19/05/2005
 
 Críticas, sugestões, elogios, bugs: rafsalvioni@bol.com.br
 
 LIMITAÇÕES: Usar com o PHP 4.0.2 ou superior com a bilbioteca GD instalada!!!!
**********************************************************************************************
*/
//Gera a chave que será mostrada na imagem
function GeraChave($tamanho){
	$Validos="ABCDEFGHIJKLMNOPQRSTUVXZWY0123456789abcdefghijklmnopqrstuvxzwy0123456789";
	$Chave=null;
	for($i=0;$i<$tamanho;$i++){
	    $Chave.=$Validos{rand(0,strlen($Validos)-1)};
	}
//	return $Chave;
	return "Teste";
}
//Gera a imagem com a chave embutida
function GeraImagem(){
	global $Chave;
	$Chave=GeraChave(6);//cria a chave (no caso com 6 caracteres)
	$Imagem=ImageCreate(100,40);//cria uma imagem 100x40
	$CorFundo=ImageColorAllocate($Imagem,0,0,0);//Cor de fundo (preto, no caso)
	$CorTexto=ImageColorAllocate($Imagem,255,255,255);//Cor do texto (branco, no caso)

	ImageString($Imagem,5,23,10,$Chave,$CorTexto);
	ImageJpeg($Imagem,"chave.jpg");//salva a imagem (troque o nome, se quiser)
	ImageDestroy($Imagem);//apaga a imagem da memória do servidor
}
GeraImagem();//chama a função
//mostra a imagem (colque onde quiser na pagina)
echo "<img src=\"chave.jpg\" border=\"0\">";

//Para validar um formulario, utilize a variavel $Chave, pois ela é global
?>
</BODY>
</HTML>
