<?php

Flight::route('GET /user/workout_plans', function(){
    $instructor_id = Flight::query('instructor_id');
    $offset = Flight::query('offset', 0);
    $limit = Flight::query('limit', 25);
    $search = Flight::query('search');
    $order = Flight::query('order', '-id');

    Flight::json(Flight::workoutPlanService()->get_workout_plans($instructor_id, $offset, $limit, $search, $order));
});

/**
 * @OA\Get(path="/user/workout_plans/{id}", tags={"x-user", "workout-plans"}, security={{"ApiKeyAuth": {}}},
 *     @OA\Parameter(type="integer", in="path", name="id", default=1, description="Id of workout plan"),
 *     @OA\Response(response="200", description="Fetch individual workout plan")
 * )
 */

Flight::route('GET /user/workout_plans/@id', function($id){
    Flight::json(Flight::workoutPlanService()->get_by_id($id));
});

Flight::route('POST /user/workout_plans', function(){
    $data = Flight::request()->data->getData();
    Flight::json(Flight::workoutPlanService()->add($data));
});

Flight::route('PUT /user/workout_plans/@id', function($id){
    $data = Flight::request()->data->getData();
    Flight::json(Flight::workoutPlanService()->update($id, $data));
});


?>
