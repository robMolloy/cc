<?php

class progress extends defaultObject {
    public $datarow = [];
    public $errors = [];
    public $exists = False;
    public $valid = False;
    public $success = False;
    public $newlyAdded = False;

    public $checks = [];
    public $labelrow = [];
    public $sensitivedatarow = [];
    public $table = ['name'=>'con_progress','label'=>'progress','primarykey'=>'prg_id','userkey'=>'prg_usr_id'];
    
    
    function updateDatarowBeforeSave(){
		if($this->exists){
			
		} else {
			//~ edit before save
            if($this->valid){
				$this->datarow['prg_time_added'] = time();
                $this->datarow['prg_usr_id'] = getUserId();
				//~ trigger_error(notice($this->datarow));
                //~ $this->datarow['prg_workout'] = $_REQUEST;
			}
		}
    }
    
    
}

?>
