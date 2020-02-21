<?php
class progressList extends defaultListObject {
    public $datarows = [];
    public $sensitivedatarow = [];
    public $labelrow = [];
    public $table = ['name'=>'con_progress','label'=>'progress','primarykey'=>'prg_id','userkey'=>'prg_usr_id'];
    public $order = 'prg_time_added';
    public $direction = 'DESC';
    public $defaultFilters = [];
    public $filters = [];
    
    function setDefaultFilters(){
        $this->defaultFilters = ['='=>[$this->table['userkey']=>getUserId()]];
    }
    
   
}
?>
