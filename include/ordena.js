function alterapagina() {
	if(document.tipo.select.selectedIndex == "") {
		alert("Escolha uma op��o");
		return;
	}
	else  {
		document.location.href=document.tipo.select[document.tipo.select.selectedIndex].value
	}
}