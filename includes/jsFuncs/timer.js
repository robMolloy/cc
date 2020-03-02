function createTimerPanel(){
	if(!document.getElementById('timerPanel')){
		let tPanel = '<div id="timerPanel" class="hidden"></div>';
		document.querySelector('body').insertAdjacentHTML('afterbegin','<div id="timerPanel" class="hidden"></div>');
	}
}

function toggleTimerPanel(){
	if(!document.getElementById('timerPanel')){createTimerPanel();}
	document.getElementById('timerPanel').classList.toggle("hidden");
}


