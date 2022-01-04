<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require dirname(__FILE__).'/../vendor/autoload.php';
require dirname(__FILE__)."/dao/AccountDao.class.php";
require dirname(__FILE__)."/dao/UserDao.class.php";
require dirname(__FILE__)."/dao/InstructorDao.class.php";
require dirname(__FILE__)."/dao/FitnessGoalDao.class.php";
require dirname(__FILE__)."/dao/WorkoutPlanDao.class.php";

Flight::register('accountDao', 'AccountDao');

Flight::route('GET /accounts', function(){
    Flight::json(Flight::accountDao()->get_all(0,10));
});

Flight::route('GET /accounts/@id', function($id){
    Flight::json(Flight::accountDao()->get_by_id($id));
});

Flight::route('POST /accounts', function(){
    $request = Flight::request()->data->getData();
    Flight::json($Flight::accountDao()->add($data));
});

Flight::route('PUT /accounts/@id', function($id){
    $request = Flight::request();
    $data = $request->data->getData();
    Flight::accountDao()->update($id, $data);
    $account = Flight::accountDao()->get_by_id($id);
    Flight::json($account);
});


Flight::start();

?>
