<?php
require_once dirname(__FILE__)."/BaseDao.class.php";

class UserDao extends BaseDao {

  public function __construct(){
    parent::__construct("users");
  }

  public function get_all_users(){
    return $this->query("SELECT * FROM users", []);
  }

}
?>
