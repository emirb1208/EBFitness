<?php

Flight::route('POST /users/register', function(){
    $data = Flight::request()->data->getData();
    Flight::json(Flight::userService()->register($data));
});

Flight::route('GET /users/confirm/@token', function($token){
    Flight::userService()->confirm($token);
    Flight::json(["message" => "Your account has been activated"]);
});

Flight::route('GET /users/@id', function($id){
    $user = Flight::userService()->get_by_id($id);
    Flight::json($user);
});
?>
