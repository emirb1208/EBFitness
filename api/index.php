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

Flight::route('GET /accounts', function(){
    $dao = new AccountDao();
    $accounts = $dao->get_all(0,10);
    Flight::json($accounts);
});

Flight::route('GET /accounts/@id', function($id){
    $dao = new AccountDao();
    $account = $dao->get_by_id($id);
    Flight::json($account);
});

Flight::route('/hello3', function(){
    echo 'Hello world!3';
});

Flight::route('/hello4', function(){
    echo 'Hello world!4';
});

Flight::route('/hello5', function(){
    echo 'Hello world!5';
});

Flight::start();

?>
