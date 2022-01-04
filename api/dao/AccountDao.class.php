<?php
require_once dirname(__FILE__)."/BaseDao.class.php";

class AccountDao extends BaseDao {

  public function __construct(){
    parent::__construct("accounts");
  }

  public function update_account_by_email($email, $account){
    $this->update("accounts", $email, $account, "email");
  }

  public function get_account_by_email($email){
    return $this->query_unique("SELECT * FROM accounts WHERE email = :email", ["email" => $email]);
  }

  public function get_accounts($search, $offset, $limit){
    return $this->query("SElECT *
                         FROM accounts
                         WHERE LOWER(name) LIKE CONCAT('%', :name, '%')
                         LIMIT ${limit} OFFSET ${offset}", ["name" => strtolower($search)]);
  }

}
?>
