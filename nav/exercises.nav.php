<?php
require_once('../includes/php.php');

$nav = (isset($_REQUEST['nav']) ? $_REQUEST['nav'] : '');

switch($nav){
	case 'saveProgress':
		$prg = new progress();
		$prg->updateDatarowFromRequest();
		$prg->save();
		echo $prg->sendJson();
	break;
	
	case 'getWorkoutProgress':
		echo getWorkoutProgress($_REQUEST['prg_workout']);
	break;
	
	case 'getProgress':
		$workouts = ['bridges','pull ups','push ups','raises','squats','stands'];
		
		$rtn = [];
		foreach($workouts as $k=>$workout){
			$rtn[$workout] = getWorkoutProgressValue($workout);
		}
		echo json_encode($rtn);
	break;
}
?>
