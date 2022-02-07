<?php

require_once dirname(__FILE__).'/BaseService.class.php';
require_once dirname(__FILE__).'/../dao/InstructorDao.class.php';

class InstructorService extends BaseService{

  public function __construct(){
    $this->dao = new InstructorDao();
  }

  public function get_instructors($offset, $limit, $search, $order){
    return $this->dao->get_instructors($offset, $limit, $search, $order);
  }

}
?>
