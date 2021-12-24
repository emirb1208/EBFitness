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

  public function update_account($account_id, $account){
    $sql = "UPDATE accounts SET name = :name, surname = :surname, age = :age, gender = :gender, contact = :contact, address = :address, email = :email WHERE account_id = :account_id";
    $stmt= $this->connection->prepare($sql);
    $account['account_id'] = $account_id;
    $stmt->execute($account);
  }

  public function get_account_by_id($account_id) {
    return $this->query_unique("SELECT * FROM users WHERE account_id = :account_id", ["account_id" => $account_id]);
  }

  public function get_account_by_email($email){
    return $this->query_unique("SELECT * FROM accounts WHERE email = :email", ["email" => $email]);
    }


}
?>
