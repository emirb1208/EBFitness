<?php
require_once dirname(__FILE__)."/dao/AccountDao.class.php";
require_once dirname(__FILE__)."/dao/UserDao.class.php";
require_once dirname(__FILE__)."/dao/InstructorDao.class.php";
require_once dirname(__FILE__)."/dao/FitnessGoalDao.class.php";
require_once dirname(__FILE__)."/dao/WorkoutPlanDao.class.php";

$dao = new UserDao();

$users = $dao->get_all($_GET['offset'], $_GET['limit']);

echo json_encode($users, JSON_PRETTY_PRINT);
?>
