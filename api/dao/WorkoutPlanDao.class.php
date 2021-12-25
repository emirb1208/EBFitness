<?php
require_once dirname(__FILE__)."/BaseDao.class.php";

class WorkoutPlanDao extends BaseDao {

  public function __construct(){
    parent::__construct("workout_plans");
  }
}
?>
