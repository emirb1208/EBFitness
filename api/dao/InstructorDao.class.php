<?php
require_once dirname(__FILE__)."/BaseDao.class.php";

class InstructorDao extends BaseDao {

  public function __construct(){
    parent::__construct("instructors");
  }

  public function get_instructors($offset, $limit, $search, $order){
    list($order_column, $order_direction) = self::parse_order($order);

    $params = [];
    $query = "SELECT *
              FROM instructors
              WHERE 1=1";

    if (isset($search)){
          $query .= "AND ( LOWER(name) LIKE CONCAT('%', :search, '%') OR LOWER(surname) LIKE CONCAT('%', :search, '%'))";
          $params['search'] = strtolower($search);
        }

    $query .= " ORDER BY ${order_column} ${order_direction} ";
    $query .= "LIMIT ${limit} OFFSET ${offset}";

    return $this->query($query, $params);
  }

}
?>
