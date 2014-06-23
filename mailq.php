<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<style>
div{
margin-bottom:3px;
padding:6px;
background:#FFFFCC;
}

</style>

<body>
<?
$ponteiro = fopen ("http://200.152.208.161/mailq.txt", "r");

//LÊ O ARQUIVO ATÉ CHEGAR AO FIM
while (!feof ($ponteiro)) {
	//LÊ UMA LINHA DO ARQUIVO
?>
<div>
<?=$linha = fgets($ponteiro, 4096);?>
</div>
<? } ?>
<? fclose ($ponteiro); ?>	
	
</body>
</html>
