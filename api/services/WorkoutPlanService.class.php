<?php

require_once dirname(__FILE__).'/BaseService.class.php';
require_once dirname(__FILE__).'/../dao/WorkoutPlanDao.class.php';

class WorkoutPlanService extends BaseService{

  public function __construct(){
    $this->dao = new WorkoutPlanDao();
  }

  public function add($workout_plan){

      try{
        return parent::add($workout_plan);
      } catch (\Exception $e){
        if (!function_exists('str_contains')) {
        function str_contains(string $haystack, string $needle): bool
        {
            return '' === $needle || false !== strpos($haystack, $needle);
        } }

        if (str_contains($e->getMessage(), 'workout_plans.uq_workoutplan_name')) {
            throw new Exception("Workout Plan with same name already exists in the database", 400, $e);
        } else {
            throw $e;
          }
      }
}

}
?>