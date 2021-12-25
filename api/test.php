<?php
require_once dirname(__FILE__)."/dao/AccountDao.class.php";
require_once dirname(__FILE__)."/dao/UserDao.class.php";
require_once dirname(__FILE__)."/dao/InstructorDao.class.php";
require_once dirname(__FILE__)."/dao/FitnessGoalDao.class.php";
require_once dirname(__FILE__)."/dao/WorkoutPlanDao.class.php";

$dao = new WorkoutPlanDao();

$workoutplan = [
    "description" => "Here will be some description"
];

$dao->update(3, [
  "description" => "Here will be some description"
]);

$workoutplan = $dao->get_all_workout_plans();  //add($workoutplan);
print_r($workoutplan);
?>
