<?php
require_once dirname(__FILE__)."/BaseDao.class.php";

class FitnessDao extends BaseDao {

  public function __construct(){
    parent::__construct("fitness_goals");
  }

  public function get_all_fitness_goals(){
    return $this->query("SELECT * FROM fitness_goals", []);
  }

}
?>
