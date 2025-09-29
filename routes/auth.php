<?php

$route->get('/user/registration', 'create', 'Auth\\RegistrationController');
$route->post('/user/registration', 'store', 'Auth\\RegistrationController');

$route->get('/user/login', 'create', 'Auth\\LoginController');
$route->post('/user/login', 'store', 'Auth\\LoginController');