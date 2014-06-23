function alterapagina() {
	if(document.tipo.select.selectedIndex == "") {
		alert("Escolha uma opção");
		return;
	}
	else  {
		document.location.href=document.tipo.select[document.tipo.select.selectedIndex].value
	}
}