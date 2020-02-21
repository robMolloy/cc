async function loadHeaderBarContents(){
	let loggedIn = await userIsLoggedIn();
	let pages = Object.keys(workouts);
	let outArr = pages.map((page)=>`<a class="tab" id="tab_${page}" href="${formatStringForUrl(page)}">${ucFirstOfEachWord(page)}</a>`);
	document.querySelector('header').innerHTML = 
		`<span id="tabs">
			${loggedIn ? `<a class="tab" id="tab_progress" href="index.php">Progress</a>` : ``}
			${outArr.join('')}
		</span>
		<span id="settings"><a href="log${loggedIn ? `out` : `in`}.php">Log ${loggedIn ? `Out` : `In`}</a></span>`;
}

async function loadBridgesChecklist(){
	return loadWorkoutChecklist()
}

async function loadWorkoutChecklist(workout=''){
	workout = workout=='' ? 'bridges' : workout;
	let progress = await getWorkoutProgress(workout);
	
	let exercises = workouts[workout];
	
	Object.keys(exercises).forEach((step)=>{
		let details = exercises[step];
		let progressions = exercises[step]['progressions'];
		let cbRows = []

		Object.keys(progressions).forEach((i)=>{
			progression = parseInt(step)*3+parseInt(i)+1;
			cbRows.push(`<tr>
							<td>${progressions[i].sets} x ${progressions[i].reps}</td>
							<td>
								<input 
									onchange="saveProgress(this);" 
									class="${workout}" id="${workout}_${progression}" 
									type="checkbox" 
									value="${progression}"
									${progress>=progression ? `checked="checked"` : ``}
								>
								</td>
						</tr>`);
		});
 
		let panel = `<div class="panel">
						<div>
							<div class="borderRight h100">
								<div>${details.name}</div>
								<div class="font80">
									${issetReturn(()=>details['description'],`There is no description for the ${details.name} ${workout} exercise`)}
								</div>
							</div>
							<span style="width:75px;">
								<table style="width:100%;">${cbRows.join('')}</table>
							</span>
						</div>
					</div>`;
		appendToWrapperMain(panel);
	});
}

function uncheckAllBoxesInWrapperMainWithHigherValue(elmClicked){
	let allCheckboxes = document.querySelectorAll('.wrapperMain input[type=checkbox]');
	allCheckboxes.forEach((elm)=>{
		if(Number(elm.value)<Number(elmClicked.value)){elm.checked=true}
		if(Number(elm.value)>Number(elmClicked.value)){elm.checked=false;}
	});
}

async function saveProgress(elm){
	let f = new FormData();
	let elmValue = parseInt(elm.value);
	let prg_workout = elm.id.split('_')[0];
	let prg_progress = elm.checked ? elmValue : elmValue-1;

	f.append('prg_workout',elm.id.split('_')[0])
	f.append('prg_progress',prg_progress)
	
	let json = initJson(await ajax({'file':'nav/exercises.nav.php?nav=saveProgress','f':f}));
	if(json.success){
		uncheckAllBoxesInWrapperMainWithHigherValue(elm);
		showInfoBar('Progress Updated Successfully')
	}
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
	let progress =  await getProgress();
	console.log(progress);
	Object.keys(progress).forEach((workout,key)=>{
		appendToWrapperMain(`<div class="panel">${workout} ${key}</div>`);
		
	});
}
