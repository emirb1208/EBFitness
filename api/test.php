<?php
require_once dirname(__FILE__)."/dao/AccountDao.class.php";

//$user_dao = new UserDao();

//$user = $user_dao -> get_user_by_id("10");

 //------------------------------------

$account_dao = new AccountDao();

//$account = $account_dao -> get_account_by_email("emir.beba@stu.ibu.edu.ba");

$account = [
  "name" => "Dzelila",
  "surname" => "Mehanovic",
  "age" => 30,
  "gender" => "F",
  "contact" => 0611145,
  "address" => "NN",
  "email" => "dzelila.mehanovic@ibu.edu.ba"
];
$account = $account_dao -> add_account($account);

print_r($account);

?>
