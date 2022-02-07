<?php

Flight::route('GET /instructors', function(){
    $offset = Flight::query('offset', 0);
    $limit = Flight::query('limit', 25);
    $search = Flight::query('search');
    $order = Flight::query('order', '-id');

    Flight::json(Flight::instructorService()->get_instructors($offset, $limit, $search, $order));
});

?>
