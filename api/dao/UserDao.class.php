<<?php
require_once dirname(__FILE__)."/BaseDao.class.php";

class UserDao extends BaseDao {

  public function get_user_by_id($user_id) {
    return $this->query("SELECT * FROM users WHERE user_id = :user_id", ["user_id" => $user_id]);

  }
}

 ?>
