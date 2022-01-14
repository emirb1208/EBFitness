<?php

Flight::route('POST /workout_plans', function(){
    $data = Flight::request()->data->getData();
    Flight::json(Flight::workoutPlanService()->add($data));
});


?>
