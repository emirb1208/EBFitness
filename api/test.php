<?php
require_once dirname(__FILE__)."/dao/AccountDao.class.php";

//$user_dao = new UserDao();

//$user = $user_dao -> get_user_by_id("10");

 //------------------------------------

$account_dao = new AccountDao();

//$account = $account_dao -> get_account_by_email("emir.beba@stu.ibu.edu.ba");

$account = [
    "name" => "Armin123" ,
    "surname" => "Sarak",
    "age" => 28,
    "gender" => "M",
    "address" => "nn",
    "contact" => 06031 ,
    "email" => "arminsarak@gmail.com"
];

//echo $query;



/*$query .= " WHERE ${id_column} = :id";

$stmt= $this->connection->prepare($query);
$entity['id'] = $id;
$stmt->execute($entity);
}*/



$account = $account_dao -> add_account($account);

print_r($account);

?>
