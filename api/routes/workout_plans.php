<?php

Flight::route('GET /workout_plans', function(){
    $instructor_id = Flight::query('instructor_id');
    $offset = Flight::query('offset', 0);
    $limit = Flight::query('limit', 25);
    $search = Flight::query('search');
    Flight::json(Flight::workoutPlanService()->get_workout_plans($instructor_id, $offset, $limit, $search));
});

Flight::route('POST /workout_plans', function(){
    $data = Flight::request()->data->getData();
    Flight::json(Flight::workoutPlanService()->add($data));
});


?>
