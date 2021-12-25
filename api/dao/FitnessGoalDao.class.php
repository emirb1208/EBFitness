<?php
require_once dirname(__FILE__)."/BaseDao.class.php";

class FitnessDao extends BaseDao {

  public function __construct(){
    parent::__construct("fitness_goals");
  }

}
?>
