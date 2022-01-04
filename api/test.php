<?php
require_once dirname(__FILE__)."/dao/AccountDao.class.php";
require_once dirname(__FILE__)."/dao/UserDao.class.php";
require_once dirname(__FILE__)."/dao/InstructorDao.class.php";
require_once dirname(__FILE__)."/dao/FitnessGoalDao.class.php";
require_once dirname(__FILE__)."/dao/WorkoutPlanDao.class.php";

$dao = new UserDao();

/*for ($i = 0; $i < 50; $i++){
  $dao->add([
    "name" => base64_encode(random_bytes(10)),
    "description" => "Some description"
  ]);
}
*/

$workoutplans = $dao->get_all($_GET['offset'], $_GET['limit']);
//print_r($workoutplans);
echo json_encode($workoutplans, JSON_PRETTY_PRINT);
?>
