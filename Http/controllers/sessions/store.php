<?php

use Core\Authenticator;
use Http\Forms\LoginForm;



$attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
];


$form = LoginForm::validate($attributes);


$signedIn = (new Authenticator)->attempt($attributes['email'], $attributes['password']);


if (!$signedIn) {
    $form->error(
        'email', 
        'No matching account found fot that email address and password'
    )->throw();
}

redirect('/');


