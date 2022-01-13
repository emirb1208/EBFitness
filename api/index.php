<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once dirname(__FILE__).'/../vendor/autoload.php';
require_once dirname(__FILE__)."/dao/AccountDao.class.php";
require_once dirname(__FILE__)."/dao/UserDao.class.php";
//require_once dirname(__FILE__)."/services/UserService.class.php";
//require_once dirname(__FILE__)."/services/AccountService.class.php";

Flight::register('accountDao', 'AccountDao');

require_once dirname(__FILE__)."/routes/accounts.php";

/* Utility function for reading query parameters from URL  */
/*Flight::map('query', function($username, $default_value = NULL){
  $request = Flight::request();
  $query_param = @$request->query->getData()[$username];
  $query_param = $query_param ? $query_param : $default_value;
  return $query_param;
});
*/

/* Register Business Logic layer services */
//Flight::register('userService', 'UserService');
//Flight::register('accountService', 'AccountService');

/* Include all routes */
//require_once dirname(__FILE__)."/routes/users.php";
//require_once dirname(__FILE__)."/routes/accounts.php";

Flight::start();
?>
