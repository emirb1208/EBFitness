<?php
require_once dirname(__FILE__)."/BaseDao.class.php";

class InstructorDao extends BaseDao {

  public function __construct(){
    parent::__construct("instructors");
  }

  public function get_all_instructors(){
    return $this->query("SELECT * FROM instructors", []);
  }
}
?>
