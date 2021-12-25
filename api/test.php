<?php
require_once dirname(__FILE__)."/dao/AccountDao.class.php";
require_once dirname(__FILE__)."/dao/UserDao.class.php";

$user_dao = new UserDao();

//$user = $user_dao -> update_user(13, ["username" => "Emir"]);
$user_dao->update(15, [
    "password" => "password1234"
]);

$user = $user_dao-> get_by_id(15);
print_r($user);

?>
