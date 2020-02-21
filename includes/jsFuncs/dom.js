
function appendToWrapperMain(html){
	document.getElementById('wrapperMain').insertAdjacentHTML('beforeend',html);
}

function appendAboveNthPanelInWrapperMain(params={}){
	let html = params.html;
	let allPanels = document.getElementById('wrapperMain').querySelectorAll('.panel');
	
	let position = issetReturn(()=>params.position,0);
	position = position=='' || position=='first' ? 0 : position;
	position = position>=allPanels.length ? 'last' : position;
	
	if(position=='last'){appendToWrapperMain(html);}
	else{allPanels[position].insertAdjacentHTML('beforeBegin',html);}
}
