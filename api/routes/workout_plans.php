<?php

Flight::route('GET /workout_plans', function(){
    Flight::json(Flight::workoutPlanService()->get_workout_plans());
});

Flight::route('POST /workout_plans', function(){
    $data = Flight::request()->data->getData();
    Flight::json(Flight::workoutPlanService()->add($data));
});


?>
