<?php
	function getWorkoutProgress($workout){
		$prg = new progressList('','',['='=>['prg_workout'=>$workout]],'','LIMIT 1');
		return $prg->sendJson();
	}
	function getWorkoutProgressValue($workout){
		$prg = new progressList('','',['='=>['prg_workout'=>$workout]],'','LIMIT 1');
		$prgJson = $prg->getJson();
		return isset($prgJson['datarows'][0]['prg_progress']) ? $prgJson['datarows'][0]['prg_progress'] : 0;
	}
?>
