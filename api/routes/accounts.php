<?php

/**
* @OA\Info(title="", version="0.1")
* @OA\OpenApi(
*     @OA\Server(url="http://localhost/ebfitness/api/", description="Development Environment" )
* )

 */

/**
 * @OA\Get(
 *     path="/accounts",
 *     @OA\Response(response="200", description="List accounts from database")
 * )
 */

Flight::route('GET /accounts', function(){
    $offset = Flight::query('offset', 0);
    $limit = Flight::query('limit', 25);
    $search = Flight::query('search');
    $order = Flight::query('order', "-id");

    Flight::json(Flight::accountService()->get_accounts($search, $offset, $limit, $order));
    });

Flight::route('GET /accounts/@id', function($id){
    Flight::json(Flight::accountService()->get_by_id($id));
});

Flight::route('POST /accounts', function(){
    $data = Flight::request()->data->getData();
    Flight::json(Flight::accountService()->add($data));
});

Flight::route('PUT /accounts/@id', function($id){
    $data = Flight::request()->data->getData();
    Flight::json(Flight::accountService()->update($id, $data));
});


?>
