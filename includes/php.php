<?php

//~ phpFuncs
//~ primary (keep order - secondary funtions use primary functions)
include('phpFuncs/__settings.php');
//~ secondary
include('phpFuncs/db.php');
include('phpFuncs/funcs_login.php');
include('phpFuncs/funcs_user.php');
include('phpFuncs/generic.php');
include('phpFuncs/page.php');
include('phpFuncs/workouts.php');


//~ classes
//~ include('/includes/classes');
include('phpClasses/class_defaultObject.php');
include('phpClasses/class_defaultListObject.php');
include('phpClasses/class_user.php');
include('phpClasses/class_progress.php');
include('phpClasses/class_progressList.php');

?>
