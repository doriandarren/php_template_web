<?php

use Core\App;
use Core\Database;
use Core\Validator;



$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

// Validaciones de los input que llegan por POST

if (!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address';
}

if (!Validator::string($password, 7, 255)) {
    $errors['password'] = 'Please provide a password of at least 7 characters';
}

if (!empty($errors)) {
    view('registration/create.view.php', [
        'errors' => $errors
    ]);
    exit();
}


// Conectamos a la DB y comprobamos si existe el email
$db = App::resolve(Database::class);

$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();

if ($user) {
    // $errors['email'] = 'User with this email already exists';
    // view('registration/create.view.php', [
    //     'errors' => $errors
    // ]);
    // die();
    header('Location: /');
    exit();
} else {
    $db->query('insert into users(email, password) values (:email, :password)', [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT)
    ]);

    login($user);

    header('Location: /');
    exit();
}
