<?php
require_once dirname(__FILE__)."/BaseDao.class.php";

class AccountDao extends BaseDao {

  public function add_account($account) {
    return $this->insert("accounts", $account);
  }

  public function update_account($id, $account){
    $this->update("accounts", $id, $account);
  }

  public function update_account_by_email($email, $account){
    $this->update("accounts", $email, $account, "email");
  }

  public function get_account_by_id($id) {
    return $this->query_unique("SELECT * FROM accounts WHERE id = :id", ["id" => $id]);
  }

  public function get_account_by_email($email){
    return $this->query_unique("SELECT * FROM accounts WHERE email = :email", ["email" => $email]);
    }


}
?>
