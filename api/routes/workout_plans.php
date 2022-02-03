<?php
/**
 * @OA\Get(path="/workout_plans", tags={"x-user", "workout-plans"},
 *     @OA\Parameter(type="integer", in="query", name="instructor_id", description="Id of instructor which is enrolled to that workout plan"),
 *     @OA\Parameter(type="integer", in="query", name="offset", default=0, description="Offset for pagination"),
 *     @OA\Parameter(type="integer", in="query", name="limit", default=25, description="Limit for pagination"),
 *     @OA\Parameter(type="string", in="query", name="search", description="Search string for workout plan. Case insensitive search."),
 *     @OA\Parameter(type="string", in="query", name="order", default="-id", description="Sorting for return elements. -column_name ascending order by column_name or +column_name descending order by column_name"),
 *     @OA\Response(response="200", description="List workout plans")
 * )
 */
Flight::route('GET /workout_plans', function(){
    $instructor_id = Flight::query('instructor_id');
    $offset = Flight::query('offset', 0);
    $limit = Flight::query('limit', 25);
    $search = Flight::query('search');
    $order = Flight::query('order', '-id');

    Flight::json(Flight::workoutPlanService()->get_workout_plans($instructor_id, $offset, $limit, $search, $order));
});

/**
 * @OA\Get(path="/workout_plans/{id}", tags={"x-user", "workout-plans"},
 *     @OA\Parameter(type="integer", in="path", name="id", default=1, description="Id of workout plan"),
 *     @OA\Response(response="200", description="Fetch individual workout plan based on id")
 * )
 */

Flight::route('GET /workout_plans/@id', function($id){
    Flight::json(Flight::workoutPlanService()->get_by_id($id));
});

/**
 * @OA\Post(path="/admin/workout_plans", tags={"x-admin", "workout-plans"}, security={{"ApiKeyAuth": {}}},
 *   @OA\RequestBody(description="Basic workout plan info", required=true,
 *       @OA\MediaType(mediaType="application/json",
 *    			@OA\Schema(
 *    				 @OA\Property(property="name", required="true", type="string", example="New Workout Plan",	description="Name of the workout plan" ),
 *    				 @OA\Property(property="description", type="string", example="Workout Plan Description",	description="Description of workout plan" ),
 *             @OA\Property(property="instructor_id", type="integer", in="query", type="integer", example="3", description="Add instructor to that workout plan")
 *          )
 *       )
 *     ),
 *  @OA\Response(response="200", description="Workout Plan that has been added into database with ID assigned.")
 * )
 */
Flight::route('POST /admin/workout_plans', function(){
    $data = Flight::request()->data->getData();
    Flight::json(Flight::workoutPlanService()->add($data));
});

/**
 * @OA\Put(path="/admin/workout_plans/{id}", tags={"x-admin", "workout-plans"}, security={{"ApiKeyAuth": {}}},
 *   @OA\Parameter(@OA\Schema(type="integer"), in="path", name="id", default=1),
 *   @OA\RequestBody(description="Basic workout plan info that is going to be updated", required=true,
 *       @OA\MediaType(mediaType="application/json",
 *    			@OA\Schema(
 *    				 @OA\Property(property="name", type="string", example="My Workout Plan",	description="Name of the workout plan" ),
 *    				 @OA\Property(property="description", type="string", example="Workout Plan Description",	description="Description of the workout plan" )
 *          )
 *       )
 *     ),
 *     @OA\Response(response="200", description="Update Workout Plan based on id")
 * )
 */

Flight::route('PUT /admin/workout_plans/@id', function($id){
    $data = Flight::request()->data->getData();
    Flight::json(Flight::workoutPlanService()->update($id, $data));
});

?>
