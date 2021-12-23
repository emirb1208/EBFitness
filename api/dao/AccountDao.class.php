<?php
  require_once dirname(__FILE__)."/BaseDao.class.php";

class AccountDao extends BaseDao {

  public function add_account($account) {

  }

  public function get_account_by_id($user_id) {
    return $this->query_unique("SELECT * FROM users WHERE user_id = :user_id", ["user_id" => $user_id]);

  }

  public function get_account_by_email($email){
      return $this->query_unique("SELECT * FROM accounts WHERE email = :email", ["email" => $email]);
    }
}

?>
