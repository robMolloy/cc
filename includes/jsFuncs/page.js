function loadHeaderBarContents(page=''){
	let pages = Object.keys(workouts);
	let outArr = pages.map((page)=>`<a class="tab" id="tab_${formatStringForUrl(page,'')}" onclick="loadWorkoutChecklist('${page}');">${ucFirstOfEachWord(page)}</a>`);
	document.querySelector('header').innerHTML = 
		`<span id="tabs">
			${loggedIn ? `<a class="tab" id="tab_progress" onclick="loadProgress();">Progress</a>` : ``}
			${outArr.join('')}
		</span>
		<span id="settings"><a href="log${loggedIn ? `out` : `in`}.php">Log ${loggedIn ? `Out` : `In`}</a></span>`;
	
	highlightHeaderTab(page);
}

function highlightHeaderTab(page=''){
	document.querySelectorAll('.tab').forEach((tab)=>{
		if(tab.id == `tab_${formatStringForUrl(page,'')}`){tab.classList.add('highlight');}
		else {tab.classList.remove('highlight');}
	});
}

async function loadWorkoutChecklist(workout){
	highlightHeaderTab(workout);	
	clearWrapperMain();

	let exercises = workouts[workout];
	let progress = await getWorkoutProgress(workout);
	
	if(loggedIn){appendToWrapperMain(`<div id="progress_${workout}" class="panel progressPanel" onclick="loadProgress()">${getProgressBarHtml(workout,progress)}</div>`);}
	
	Object.keys(exercises).forEach((step)=>{
		let cbRows = [];
		let details = exercises[step];
		let progressions = exercises[step]['progressions'];
		
		Object.keys(progressions).forEach((i)=>{
			let progression = parseInt(step)*3+parseInt(i)+1;
			let checkboxCell = loggedIn 
				? 	`<td>
						<input 
							onchange="saveProgressUsingElement(this);" 
							class="${workout}" 
							id="${workout}_${progression}" 
							type="checkbox" 
							value="${progression}" 
							${progress>=progression ? `checked="checked"` : ``}
						>
					</td>`
				: 	``;
			
			cbRows.push(`<tr><td>${progressions[i].sets} x ${progressions[i].reps}</td>${checkboxCell}</tr>`);
		});
		
		appendToWrapperMain(`
			<div class="panel">
				<div>
					<div class="borderRight h100">
						<div>${details.name}</div>
						<div class="font80">${isset(()=>details['description']) ? `` : `There is no description for the ${details.name} ${workout} exercise`}</div>
					</div>
					<span style="width:75px;"><table style="width:100%;">${cbRows.join('')}</table></span>
				</div>
			</div>`);
	});
}

function updateProgressBoxesInWrapperMain(progress){
	let allCheckboxes = document.querySelectorAll('.wrapperMain input[type=checkbox]');
	allCheckboxes.forEach((elm)=>{
		if(Number(elm.value)<Number(progress)){elm.checked=true;}
		if(Number(elm.value)>Number(progress)){elm.checked=false;}
	});
}

async function saveProgress(workout,progress){
	let f = new FormData();
	f.append('prg_workout',workout);
	f.append('prg_progress',progress)
	
	let json = initJson(await ajax({'file':'nav/exercises.nav.php?nav=saveProgress','f':f}));
	
	showInfoBar(json.success ? 'Progress Updated Successfully' : 'Unable To Update Successfully');
	updateProgressBoxesInWrapperMain(progress);
	updateProgressBar(workout,progress);
}

function saveProgressUsingElement(elm){
	let f = new FormData();
	let elmValue = parseInt(elm.value);
	let prg_workout = elm.id.split('_')[0];
	let prg_progress = elm.checked ? elmValue : elmValue-1;
	
	saveProgress(prg_workout,prg_progress);
}

async function getWorkoutProgress(workout){
	let f = new FormData();
	f.append('prg_workout',workout);
	let progressJson = initJson(await ajax({'file':'nav/exercises.nav.php?nav=getWorkoutProgress','f':f}));

	return issetReturn(()=>progressJson['datarows'][0]['prg_progress'], 0);
}

async function getProgress(){
	let f = new FormData();
	return initJson(await ajax({'file':'nav/exercises.nav.php?nav=getProgress','f':f}));
}

async function loadProgress(){
	highlightHeaderTab('progress');
	clearWrapperMain();
	let progress = await getProgress();
	Object.keys(progress).forEach((workout,key)=>{
		appendToWrapperMain(`
			<div class="panel progressPanel" onclick="loadWorkoutChecklist('${workout}')">
				${getProgressBarHtml(workout,progress[workout])}
			</div>
		`);
	});
}

function getProgressBarHtml(workout,progress){
	return `<div>
				<div>${workout}</div>
				<span>${progress}/30</span>
			</div>
			<div class="progressBar">
				${'<div class="progressUnit highlight"></div>'.repeat(progress)}
				${'<div class="progressUnit"></div>'.repeat(30-progress)}
			</div>`;
}

function loadIndexPage(){
	loadHeaderBarContents();
	if(loggedIn){loadProgress();}
	else {loadLoginHtml();}
}

function updateProgressBar(workout,progress){
	document.getElementById(`progress_${workout}`).innerHTML = getProgressBarHtml(workout,progress);
}
