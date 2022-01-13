<?php

Flight::route('GET /accounts', function(){
        Flight::json(Flight::accountDao()->get_all(0,10));
        /*$offset = Flight::query('offset', 0);
        $limit = Flight::query('limit', 10);
        $search = Flight::query('search');
        Flight::json(Flight::accountService()->get_accounts($search, $offset, $limit));
        */
    });

Flight::route('GET /accounts/@id', function($id){
    Flight::json(Flight::accountDao()->get_by_id($id));
});

Flight::route('POST /accounts', function(){
    $data = Flight::request()->data->getData();
    Flight::json(Flight::accountDao()->add($data));
    //Flight::json(Flight::accountService()->add($data));
});

Flight::route('PUT /accounts/@id', function($id){
    $request = Flight::request();
    $data = $request->data->getData();
    Flight::accountDao()->update($id, $data);
    Flight::json(Flight::accountDao()->get_by_id($id));
    //Flight::json(Flight::accountService()->update($id, $data));
});


?>
