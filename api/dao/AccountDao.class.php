<?php
require_once dirname(__FILE__)."/BaseDao.class.php";

class AccountDao extends BaseDao {

  public function add_account($account) {
    $sql = "INSERT INTO accounts (name, surname, age, gender, contact, address, email) VALUES (:name, :surname, :age, :gender, :contact, :address, :email)";
    $stmt= $this->connection->prepare($sql);
    $stmt->execute($account);
    $account['id'] = $this->connection->lastInsertId();
    return $account;
  }

  public function get_account_by_id($user_id) {
    return $this->query_unique("SELECT * FROM users WHERE user_id = :user_id", ["user_id" => $user_id]);
  }

  public function get_account_by_email($email){
    return $this->query_unique("SELECT * FROM accounts WHERE email = :email", ["email" => $email]);
    }

  public function update_account($id, $user){

  }

}
?>
