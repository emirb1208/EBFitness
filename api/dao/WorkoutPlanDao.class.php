<?php
require_once dirname(__FILE__)."/BaseDao.class.php";

class WorkoutPlanDao extends BaseDao {

  public function __construct(){
    parent::__construct("workout_plans");
  }

  public function get_workout_plans($instructor_id, $offset, $limit, $search, $order){
    list($order_column, $order_direction) = self::parse_order($order);

    $params = [];
    $query = "SELECT *
              FROM workout_plans
              WHERE 1=1";

    if(isset($instructor_id)){
    $query .=" instructor_id = :instructor_id ";
    $params["insturctor_id"]=$instructor_id;
    }

    if (isset($search)){
          $query .= "AND ( LOWER(name) LIKE CONCAT('%', :search, '%') OR LOWER(description) LIKE CONCAT('%', :search, '%'))";
          $params['search'] = strtolower($search);
        }

    $query .= " ORDER BY ${order_column} ${order_direction} ";
    $query .= "LIMIT ${limit} OFFSET ${offset}";

    return $this->query($query, $params);
  }

}
?>
