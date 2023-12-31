<?php

use Classes\Auth;
use Classes\Personal;

session_start();

require_once '../../../Classes/Auth.php';
require_once '../../../Classes/Personal.php';
require_once '../../../../vendor/autoload.php';

$personal = new Personal();
$auth = new Auth();

$id = $_SESSION['user_id'];
$oldPassword = $_POST['old_password'];
$newPassword = $_POST['new_password'];

if (empty($oldPassword)) {
    die('Поле "Старый пароль" должно быть заполнено');
}

if (empty($newPassword)) {
    die('Поле "Новый пароль" должно быть заполнено');
}

if (mb_strlen($newPassword) <= 7) {
    die('Новый пароль должен содержать не менее 8 символов');
}

$newPassword = password_hash($newPassword, PASSWORD_BCRYPT);
$user = $auth->getUserById($id);

if (!password_verify($oldPassword, $user->password)) {
   die('Неверный старый пароль');
}

try {
    $personal->changePassword([
        'id' => $id,
        'new_password' => $newPassword,
    ]);
} catch (Exception $e) {
    die($e->getMessage());
}

header('Location: /views/personal/index.php');
