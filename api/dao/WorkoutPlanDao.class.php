<?php
require_once dirname(__FILE__)."/BaseDao.class.php";

class WorkoutPlanDao extends BaseDao {

  public function __construct(){
    parent::__construct("workout_plans");
  }

  public function get_workout_plans($instructor_id, $offset, $limit, $search){

    $params = ["instructor_id" => $instructor_id];
    $query = "SELECT *
              FROM workout_plans
              WHERE instructor_id = :instructor_id ";

    if (isset($search)){
          $query .= "AND ( LOWER(name) LIKE CONCAT('%', :search, '%') OR LOWER(description) LIKE CONCAT('%', :search, '%'))";
          $params['search'] = strtolower($search);
        }


    $query .= "LIMIT ${limit} OFFSET ${offset}";

    return $this->query($query, $params);
  }

}
?>
