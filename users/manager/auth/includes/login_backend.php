<?php

session_start();
require_once '../../../config/db_connect.php';

$email = $password = '';

$error = [
  'email' => '',
  'password' => '',
];

if (isset($_POST['login_manager'])) {
  $valid = TRUE;
  
  if (empty(testInput($_POST['email']))) {
    $error['email'] = 'Email is required';
    $valid = FALSE;
  } elseif (!filter_var(testInput($_POST['email']), FILTER_VALIDATE_EMAIL)) {
    $email = testInput($_POST['email']);
    $error['email'] = 'Invalid email format';
    $valid = FALSE;
  } else {
    $email = testInput($_POST['email']);
  }

  if (empty(testInput($_POST['password']))) {
    $error['password'] = 'Password is required';
    $valid = FALSE;
  } else {
    $password = testInput($_POST['password']);
    if (strlen($password) < 8) {
      $error['password'] = 'Password is too short. Min: 8 characters';
      $valid = FALSE;
    }
  }

  if ($valid) {
    $query = "SELECT * FROM pengelola WHERE email='$email' AND password='" . sha1($password) . "'";
    $result = $db->query($query);

    if (!$result) {
      die('Could not query the database: <br>' . $db->error);
    } else {
      if ($result->num_rows > 0) {
        $_SESSION['email'] = $email;
        header("Location: ../index.php");
      } else {
        $message = '<p class="alert alert-danger">Combination of username & password are not correct</p>';
      }
    }

  }
}

function testInput($data) {
  global $db;

  $data = htmlspecialchars($data);
  $data = mysqli_real_escape_string($db, $data);
  $data = stripslashes($data);
  $data = strip_tags($data);
  return $data;
}