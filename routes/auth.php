<?php

$route->get('/user/registration', 'create', 'Auth\\RegistrationController');
$route->post('/user/registration', 'store', 'Auth\\RegistrationController');